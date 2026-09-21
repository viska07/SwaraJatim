<?php

header("Content-Type: application/json; charset=utf-8");

$API_KEY = getenv('GEMINI_API_KEY');

if (!$API_KEY) {
    http_response_code(500);
    echo json_encode([
        "reply" => "Konfigurasi AI belum tersedia di server."
    ]);
    exit;
}

$model = "gemini-3.6-flash";

$url = "https://generativelanguage.googleapis.com/v1beta/models/$model:generateContent?key=$API_KEY";

$userMessage = trim($_POST['message'] ?? '');

if ($userMessage === '') {
    echo json_encode([
        "reply" => "Silakan ketik pertanyaan tentang budaya Jawa Timur."
    ], JSON_PRETTY_PRINT);
    exit;
}

$data = [
    "systemInstruction" => [
        "role" => "system",
        "parts" => [
            [
                "text" => "Anda adalah ChatBot SwaraJatim, asisten ramah yang bertugas mengenalkan budaya Jawa Timur secara singkat, jelas, dan akurat.

                Aturan:

                - Jika user mengetik sapaan seperti halo/hai/selamat pagi/siang/sore/malam, jawab dengan: 'Halo, Saya ChatBot SwaraJatim yang bisa membantu kamu mengenal lebih jauh tentang budaya, tradisi, kuliner, pakaian adat, kesenian, ritual, atau sejarah Jawa Timur.'

                - Hanya jawab jika pertanyaan berhubungan dengan budaya, tradisi, kuliner, pakaian adat, kesenian, ritual, sejarah, tokoh budaya, tempat bersejarah, atau filosofi kehidupan masyarakat Jawa Timur.

                - Jika tidak relevan dengan budaya Jawa Timur, jawab: 'Maaf, saya hanya bisa menjawab tentang budaya Jawa Timur.'

                - Jawaban maksimal 5 kalimat, singkat, jelas, mudah dipahami, dan tanpa bullet point.

                - Jika user menanyakan hal modern seperti event, pariwisata, atau rekomendasi makanan, jawab hanya jika masih berkaitan dengan budaya Jawa Timur.

                - Jangan memberikan opini pribadi. Berikan informasi faktual dan singkat.

                - Jika user meminta sumber sejarah atau asal-usul, berikan jawaban ringkas tanpa berspekulasi.

                - Jika user terlihat bingung, berikan penjelasan sederhana agar mudah dimengerti.

                - Jika user menggunakan bahasa yang sangat santai atau gaul, respon dengan tetap sopan namun tetap ramah.

                - Jika user salah memahami suatu budaya, luruskan dengan cara halus tanpa menghakimi.

                - Jika user meminta perbandingan (misal budaya Jawa Timur vs daerah lain), fokuslah hanya pada budaya Jawa Timur tanpa membahas detail daerah lain.

                - Hindari menyebut data yang tidak pasti atau kontroversial.

                - Jika user meminta gambar atau visual, berikan penjelasan tekstual sederhana saja karena chatbot tidak memuat gambar.

                - Sampaikan info dengan nada bersahabat, seolah mengobrol dengan teman, tapi tetap informatif."
            ]
        ]
    ],

    "contents" => [
        [
            "role" => "user",
            "parts" => [
                [
                    "text" => $userMessage
                ]
            ]
        ]
    ]
];

$jsonData = json_encode($data);

if ($jsonData === false) {
    http_response_code(500);

    echo json_encode([
        "reply" => "Data pertanyaan tidak dapat diproses."
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| REQUEST KE GEMINI DENGAN RETRY
|--------------------------------------------------------------------------
|
| 503 = Gemini sedang overload / sementara tidak tersedia.
| Kita coba ulang dengan jeda:
| 1 detik → 2 detik → 4 detik → 8 detik
|
| Ditambah jitter kecil agar request tidak semuanya masuk
| pada waktu yang sama.
|
*/

$maxRetries = 4;

$retryableCodes = [
    408,
    429,
    500,
    502,
    503,
    504
];

$response = false;
$httpCode = 0;
$curlError = '';

for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $jsonData,

        // Timeout supaya request tidak menggantung terlalu lama
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT => 60,

        // Dipertahankan seperti konfigurasi sebelumnya
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false
    ]);

    $response = curl_exec($ch);

    $curlError = curl_error($ch);

    $httpCode = curl_getinfo(
        $ch,
        CURLINFO_HTTP_CODE
    );

    curl_close($ch);


    /*
     * Kalau request berhasil, langsung berhenti retry.
     */
    if ($response !== false && $httpCode === 200) {
        break;
    }


    /*
     * Kalau error jaringan/cURL dan masih ada kesempatan retry.
     */
    $shouldRetryCurl = (
        $response === false &&
        $attempt < $maxRetries
    );


    /*
     * Kalau HTTP error yang memang bersifat sementara.
     */
    $shouldRetryHttp = (
        in_array($httpCode, $retryableCodes, true) &&
        $attempt < $maxRetries
    );


    if (!$shouldRetryCurl && !$shouldRetryHttp) {
        break;
    }


    /*
     * Exponential backoff:
     *
     * Percobaan 1 → sekitar 1 detik
     * Percobaan 2 → sekitar 2 detik
     * Percobaan 3 → sekitar 4 detik
     * Percobaan 4 → sekitar 8 detik
     *
     * Ditambah jitter 0–500 ms.
     */

    $baseDelaySeconds = pow(2, $attempt);

    $jitterMilliseconds = random_int(0, 500);

    $delayMilliseconds =
        ($baseDelaySeconds * 1000)
        + $jitterMilliseconds;

    usleep($delayMilliseconds * 1000);
}


/*
|--------------------------------------------------------------------------
| JIKA REQUEST GAGAL SETELAH SEMUA RETRY
|--------------------------------------------------------------------------
*/

if ($response === false) {

    http_response_code(502);

    echo json_encode([
        "reply" => "Maaf, koneksi ke layanan AI sedang mengalami gangguan. Silakan coba lagi beberapa saat."
    ], JSON_PRETTY_PRINT);

    exit;
}


if ($httpCode !== 200) {

    $errorData = json_decode($response, true);

    $errorMessage =
        $errorData['error']['message']
        ?? "Layanan AI sedang tidak tersedia.";

    /*
     * Jangan tampilkan detail API/key kepada user.
     */

    http_response_code($httpCode >= 400 ? $httpCode : 500);

    echo json_encode([
        "reply" => "Maaf, layanan AI sedang mengalami gangguan. Silakan coba lagi beberapa saat."
    ], JSON_PRETTY_PRINT);

    exit;
}


/*
|--------------------------------------------------------------------------
| PARSE RESPONSE GEMINI
|--------------------------------------------------------------------------
*/

$result = json_decode($response, true);

$reply =
    $result['candidates'][0]['content']['parts'][0]['text']
    ?? "Maaf, tidak ada jawaban.";


/*
|--------------------------------------------------------------------------
| BERSIHKAN FORMAT MARKDOWN
|--------------------------------------------------------------------------
*/

$reply = preg_replace('/\*\*(.*?)\*\*/', '$1', $reply);

$reply = preg_replace('/\*(.*?)\*/', '$1', $reply);

$reply = preg_replace('/\#\#\#?\s?/', '', $reply);

$reply = nl2br(trim($reply));


/*
|--------------------------------------------------------------------------
| KIRIM RESPONSE KE FRONTEND
|--------------------------------------------------------------------------
*/

echo json_encode([
    "reply" => $reply
], JSON_PRETTY_PRINT);

?>