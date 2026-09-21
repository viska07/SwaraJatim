<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Game - Swara Jatim</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <!-- NAVBAR + FOOTER SHARED -->
    <link rel="stylesheet" href="navbar-footer.css">

    <style>

        /* HANYA CSS MINI GAME DI SINI */

        :root {
            --bg:#f8f5ef;
            --surface:#ffffff;
            --surface-soft:#f2ede5;
            --dark:#241b16;
            --dark-soft:#3a2b23;
            --brown:#6b4935;
            --terracotta:#b85c38;
            --gold:#c99a5b;
            --text:#332a25;
            --muted:#756b63;
            --border:#e5ddd3;
            --radius-sm:10px;
            --radius-md:18px;
            --radius-lg:28px;
            --shadow-sm:0 8px 25px rgba(36,27,22,.06);
            --shadow-md:0 16px 40px rgba(36,27,22,.10);
            --max-width:1240px;
        }

        * {
            box-sizing:border-box;
            margin:0;
            padding:0;
        }

        html {
            scroll-behavior:smooth;
        }

        body {
            background:var(--bg);
            color:var(--text);
            font-family:'DM Sans',sans-serif;
            min-height:100vh;
        }

        a {
            text-decoration:none;
            color:inherit;
        }

        main {
            width:min(100% - 48px,var(--max-width));
            margin:0 auto;
            padding:128px 0 90px;
        }

        /* CSS GAME SAJA */
        
        .page-heading {
            text-align:center;
            margin-bottom:46px;
        }

        .eyebrow {
            display:inline-block;
            margin-bottom:12px;
            color:var(--terracotta);
            font-size:.82rem;
            font-weight:700;
            letter-spacing:.12em;
            text-transform:uppercase;
        }

        .page-heading h1 {
            font-family:'Playfair Display',serif;
            color:var(--dark);
            font-size:clamp(2rem,4vw,3rem);
            line-height:1.15;
            margin-bottom:12px;
        }

        .page-heading p {
            max-width:620px;
            margin:auto;
            color:var(--muted);
            line-height:1.7;
        }

        .game-list {
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:24px;
            max-width:1080px;
            margin:0 auto;
        }

        .game-card {
            display:flex;
            flex-direction:column;
            min-height:250px;
            padding:32px;
            background:var(--surface);
            border:1px solid var(--border);
            border-radius:var(--radius-md);
            box-shadow:var(--shadow-sm);
            cursor:pointer;
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }

        .game-card:hover {
            transform:translateY(-7px);
            box-shadow:var(--shadow-md);
            border-color:rgba(184,92,56,.35);
        }

        .game-icon {
            width:54px;
            height:54px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin-bottom:24px;
            border-radius:15px;
            background:var(--surface-soft);
            color:var(--terracotta);
            font-size:1.45rem;
        }

        .game-card h2 {
            font-family:'Playfair Display',serif;
            color:var(--dark);
            font-size:1.4rem;
            margin-bottom:10px;
        }

        .game-card p {
            color:var(--muted);
            line-height:1.7;
            font-size:.95rem;
        }

        .card-link {
            margin-top:auto;
            padding-top:24px;
            color:var(--terracotta);
            font-size:.9rem;
            font-weight:700;
        }

        @media (max-width:768px) {

            .game-list {
                grid-template-columns:1fr;
            }

        }

        @media (max-width:600px) {

            main {
                width:min(100% - 32px,var(--max-width));
                padding-top:112px;
                padding-bottom:65px;
            }

            .page-heading {
                margin-bottom:34px;
            }

            .page-heading h1 {
                font-size:2rem;
            }

            .game-card {
                min-height:220px;
                padding:26px;
            }

        }

        @media (max-width:400px) {

            .page-heading h1 {
                font-size:1.8rem;
            }

            .game-card {
                padding:22px;
            }

        }

    </style>

</head>

<body>

<?php include 'navbar.php'; ?>


<main>

    <section class="page-heading">

        <span class="eyebrow">
            Swara Jatim
        </span>

        <h1>
            🎮 Pilih Mini Game
        </h1>

        <p>
            Uji pengetahuanmu tentang budaya, tradisi, kuliner,
            pakaian adat, dan berbagai kekayaan Jawa Timur.
        </p>

    </section>


    <section class="game-list">

        <div
            class="game-card"
            onclick="window.location.href='quiz.php?mode=truefalse'"
        >
            <div class="game-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <h2>
                True / False
            </h2>

            <p>
                Jawab cepat dan sederhana: tentukan apakah
                pernyataan tentang budaya Jawa Timur benar atau salah.
            </p>

            <div class="card-link">
                Mulai Game
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </div>


        <div
            class="game-card"
            onclick="window.location.href='quiz.php?mode=multiplechoice'"
        >
            <div class="game-icon">
                <i class="fa-solid fa-list-check"></i>
            </div>

            <h2>
                Pilihan Ganda
            </h2>

            <p>
                Pilih satu jawaban yang benar dari beberapa
                pilihan mengenai budaya Jawa Timur.
            </p>

            <div class="card-link">
                Mulai Game
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </div>


        <div
            class="game-card"
            onclick="window.location.href='quiz.php?mode=multipleresponse'"
        >
            <div class="game-icon">
                <i class="fa-solid fa-square-check"></i>
            </div>

            <h2>
                Multiple Response
            </h2>

            <p>
                Pilih lebih dari satu jawaban yang benar
                untuk menguji pengetahuanmu lebih jauh.
            </p>

            <div class="card-link">
                Mulai Game
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </div>

    </section>

</main>


<?php include 'footer.php'; ?>


<script src="navbar.js"></script>

</body>
</html>