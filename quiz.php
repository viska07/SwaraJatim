<?php

/*
|--------------------------------------------------------------------------
| MODE QUIZ
|--------------------------------------------------------------------------
*/

$mode = $_GET["mode"] ?? "truefalse";

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Quiz - Swara Jatim
    </title>


    <!-- =====================================================
         FONT
    ====================================================== -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet"
    >


    <!-- =====================================================
         GLOBAL NAVBAR + FOOTER
    ====================================================== -->

    <link
        rel="stylesheet"
        href="navbar-footer.css"
    >


    <style>

        /* =====================================================
           QUIZ PAGE
        ====================================================== */

        :root {

            --quiz-bg: #f8f5ef;
            --quiz-white: #ffffff;
            --quiz-soft: #f2ede5;

            --quiz-dark: #241b16;
            --quiz-brown: #6b4935;
            --quiz-terracotta: #b85c38;
            --quiz-gold: #c99a5b;

            --quiz-text: #332a25;
            --quiz-muted: #756b63;

            --quiz-border: #e5ddd3;

            --quiz-green: #477a58;
            --quiz-green-soft: #e8f2ea;

            --quiz-red: #a94d45;
            --quiz-red-soft: #f8e9e7;

        }


        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {

            margin: 0;

            background:
                var(--quiz-bg);

            color:
                var(--quiz-text);

            font-family:
                "DM Sans",
                sans-serif;

        }


        /* =====================================================
           PAGE
        ====================================================== */

        .quiz-page {

            min-height: 100vh;

            background:
                var(--quiz-bg);

        }


        /* =====================================================
           MAIN
        ====================================================== */

        .quiz-main {

            width:
                min(
                    calc(100% - 48px),
                    900px
                );

            margin:
                0 auto;

            padding:
                125px 0 80px;

        }


        /* =====================================================
           TOP INTRO
        ====================================================== */

        .quiz-intro {

            margin-bottom:
                28px;

        }


        .quiz-breadcrumb {

            display: flex;

            align-items: center;

            gap: 9px;

            margin-bottom:
                18px;

            color:
                var(--quiz-muted);

            font-size:
                .80rem;

        }


        .quiz-breadcrumb a {

            color:
                var(--quiz-brown);

            text-decoration:
                none;

            font-weight:
                600;

        }


        .quiz-breadcrumb a:hover {

            color:
                var(--quiz-terracotta);

        }


        .quiz-breadcrumb span {

            color:
                #b5aaa0;

        }


        .quiz-kicker {

            margin-bottom:
                8px;

            color:
                var(--quiz-terracotta);

            font-size:
                .74rem;

            font-weight:
                700;

            letter-spacing:
                .14em;

            text-transform:
                uppercase;

        }


        .quiz-heading {

            margin:
                0 0 8px;

            color:
                var(--quiz-dark);

            font-family:
                "Playfair Display",
                Georgia,
                serif;

            font-size:
                clamp(
                    2rem,
                    5vw,
                    3rem
                );

            line-height:
                1.12;

            letter-spacing:
                -.03em;

        }


        .quiz-subtitle {

            margin:
                0;

            color:
                var(--quiz-muted);

            font-size:
                .92rem;

            line-height:
                1.7;

        }


        /* =====================================================
           QUIZ CARD
        ====================================================== */

        .quiz-card {

            overflow:
                hidden;

            border:
                1px solid
                var(--quiz-border);

            border-radius:
                24px;

            background:
                var(--quiz-white);

            box-shadow:
                0 18px 50px
                rgba(36,27,22,.08);

        }


        /* =====================================================
           QUIZ HEADER
        ====================================================== */

        .quiz-card-header {

            padding:
                26px 30px 22px;

            border-bottom:
                1px solid
                var(--quiz-border);

            background:
                #fffdf9;

        }


        .quiz-progress-top {

            display: flex;

            align-items: center;

            justify-content:
                space-between;

            gap: 20px;

            margin-bottom:
                12px;

        }


        .quiz-progress-label {

            color:
                var(--quiz-muted);

            font-size:
                .76rem;

            font-weight:
                600;

        }


        .quiz-progress-number {

            color:
                var(--quiz-brown);

            font-size:
                .76rem;

            font-weight:
                700;

        }


        #progress {

            width: 100%;

            height: 8px;

            overflow:
                hidden;

            border-radius:
                999px;

            background:
                var(--quiz-soft);

        }


        #progressFill {

            width: 0%;

            height: 100%;

            border-radius:
                inherit;

            background:
                linear-gradient(
                    90deg,
                    var(--quiz-brown),
                    var(--quiz-terracotta)
                );

            transition:
                width .35s ease;

        }


        /* =====================================================
           QUESTION AREA
        ====================================================== */

        .quiz-card-body {

            padding:
                38px 42px 42px;

        }


        .question-label {

            margin-bottom:
                10px;

            color:
                var(--quiz-terracotta);

            font-size:
                .70rem;

            font-weight:
                700;

            letter-spacing:
                .12em;

            text-transform:
                uppercase;

        }


        #questionText {

            margin:
                0 0 28px;

            color:
                var(--quiz-dark);

            font-family:
                "Playfair Display",
                Georgia,
                serif;

            font-size:
                clamp(
                    1.45rem,
                    3vw,
                    2rem
                );

            line-height:
                1.35;

        }


        /* =====================================================
           ANSWERS
        ====================================================== */

        #answersBox {

            display:
                flex;

            flex-direction:
                column;

            gap:
                11px;

        }


        .answer-option {

            position:
                relative;

            display:
                flex;

            align-items:
                center;

            gap:
                13px;

            min-height:
                58px;

            padding:
                12px 16px;

            border:
                1px solid
                var(--quiz-border);

            border-radius:
                14px;

            background:
                #ffffff;

            color:
                var(--quiz-text);

            cursor:
                pointer;

            transition:
                border-color .2s ease,
                background .2s ease,
                transform .2s ease,
                box-shadow .2s ease;

        }


        .answer-option:hover {

            transform:
                translateY(-1px);

            border-color:
                #cfbba8;

            background:
                #fffdf9;

            box-shadow:
                0 6px 18px
                rgba(36,27,22,.05);

        }


        .answer-option.selected {

            border-color:
                var(--quiz-terracotta);

            background:
                #fff7f2;

            box-shadow:
                0 7px 20px
                rgba(184,92,56,.08);

        }


        .answer-option.correct {

            border-color:
                var(--quiz-green);

            background:
                var(--quiz-green-soft);

        }


        .answer-option.incorrect {

            border-color:
                var(--quiz-red);

            background:
                var(--quiz-red-soft);

        }


        .answer-option input {

            position:
                absolute;

            opacity: 0;

            pointer-events:
                none;

        }


        .answer-marker {

            flex:
                0 0 30px;

            width: 30px;
            height: 30px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border:
                1px solid
                #d7cbc0;

            border-radius:
                50%;

            background:
                #ffffff;

            color:
                var(--quiz-brown);

            font-size:
                .74rem;

            font-weight:
                700;

            transition:
                all .2s ease;

        }


        .answer-option.checkbox
        .answer-marker {

            border-radius:
                8px;

        }


        .answer-option.selected
        .answer-marker {

            border-color:
                var(--quiz-terracotta);

            background:
                var(--quiz-terracotta);

            color:
                #ffffff;

        }


        .answer-text {

            flex:
                1;

            font-size:
                .90rem;

            font-weight:
                500;

            line-height:
                1.45;

        }


        /* =====================================================
           FEEDBACK
        ====================================================== */

        #feedback {

            margin-top:
                18px;

        }


        .feedback-box {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                12px;

            padding:
                14px 16px;

            border-radius:
                13px;

            font-size:
                .84rem;

            line-height:
                1.55;

        }


        .feedback-box.correct {

            background:
                var(--quiz-green-soft);

            color:
                #356044;

            border:
                1px solid
                #c9dfcf;

        }


        .feedback-box.incorrect {

            background:
                var(--quiz-red-soft);

            color:
                #8d403a;

            border:
                1px solid
                #ebcbc8;

        }


        .feedback-icon {

            flex:
                0 0 auto;

            font-weight:
                700;

        }


        /* =====================================================
           ACTIONS
        ====================================================== */

        .quiz-actions {

            display:
                flex;

            justify-content:
                flex-end;

            gap:
                11px;

            margin-top:
                25px;

        }


        .quiz-btn {
            min-height: 46px;
            min-width: 84px;

            padding: 0 20px;

            border: 1px solid transparent;
            border-radius: 999px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            text-align: center;
            line-height: 1;

            font-family:
                "DM Sans",
                sans-serif;

            font-size: .82rem;
            font-weight: 700;

            cursor: pointer;

            transition:
                transform .2s ease,
                background .2s ease,
                border-color .2s ease,
                box-shadow .2s ease;
        }


        .quiz-btn:hover {

            transform:
                translateY(-2px);

        }


        .quiz-btn-primary {

            background:
                var(--quiz-brown);

            color:
                #ffffff;

            box-shadow:
                0 8px 20px
                rgba(107,73,53,.16);

        }


        .quiz-btn-primary:hover {

            background:
                var(--quiz-dark);

            box-shadow:
                0 11px 25px
                rgba(36,27,22,.18);

        }


        .quiz-btn-secondary {

            border-color:
                var(--quiz-border);

            background:
                #ffffff;

            color:
                var(--quiz-brown);

        }


        .quiz-btn-secondary:hover {

            background:
                var(--quiz-soft);

        }


        /* =====================================================
           SCORE SCREEN
        ====================================================== */

        .score-screen {

            padding:
                54px 40px;

            text-align:
                center;

        }


        .score-icon {

            width: 72px;
            height: 72px;

            margin:
                0 auto 20px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                50%;

            background:
                var(--quiz-soft);

            color:
                var(--quiz-terracotta);

            font-size:
                1.8rem;

        }


        .score-screen h2 {

            margin:
                0 0 8px;

            color:
                var(--quiz-dark);

            font-family:
                "Playfair Display",
                Georgia,
                serif;

            font-size:
                2rem;

        }


        .score-screen h3 {

            margin:
                0 0 28px;

            color:
                var(--quiz-muted);

            font-size:
                1rem;

            font-weight:
                500;

        }


        .score-value {

            color:
                var(--quiz-terracotta);

            font-weight:
                700;

        }


        .score-actions {

            display:
                flex;

            justify-content:
                center;

            gap:
                10px;

            flex-wrap:
                wrap;

        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 850px) {

            .quiz-main {

                width:
                    min(
                        calc(100% - 36px),
                        900px
                    );

                padding:
                    105px 0 60px;

            }


            .quiz-card-body {

                padding:
                    32px;

            }

        }


        @media (max-width: 600px) {

            .quiz-main {

                width:
                    calc(100% - 32px);

                padding:
                    94px 0 48px;

            }


            .quiz-heading {

                font-size:
                    2rem;

            }


            .quiz-card {

                border-radius:
                    19px;

            }


            .quiz-card-header {

                padding:
                    21px;

            }


            .quiz-card-body {

                padding:
                    27px 20px 25px;

            }


            #questionText {

                font-size:
                    1.35rem;

                margin-bottom:
                    22px;

            }


            .answer-option {

                min-height:
                    54px;

                padding:
                    10px 12px;

            }


            .answer-marker {

                flex-basis:
                    28px;

                width: 28px;
                height: 28px;

            }


            .answer-text {

                font-size:
                    .84rem;

            }


            .quiz-actions {

                flex-direction:
                    column;

            }


            .quiz-btn {

                width:
                    100%;

            }


            .score-screen {

                padding:
                    42px 22px;

            }


            .score-actions {

                flex-direction:
                    column;

            }


            .score-actions
            .quiz-btn {

                width:
                    100%;

            }

        }

    </style>

</head>


<body>


<div class="quiz-page">


    <!-- =====================================================
         GLOBAL NAVBAR
    ====================================================== -->

    <?php include 'navbar.php'; ?>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="quiz-main">


        <!-- =================================================
             INTRO
        ================================================== -->

        <section class="quiz-intro">


            <div class="quiz-breadcrumb">

                <a href="index.php">
                    Beranda
                </a>

                <span>/</span>

                <a href="mini-game.php">
                    Mini Game
                </a>

                <span>/</span>

                <span>
                    Quiz
                </span>

            </div>


            <div class="quiz-kicker">
                Swara Jatim Mini Game
            </div>


            <h1
                class="quiz-heading"
                id="gameTitle"
            >
                Quiz
            </h1>


            <p class="quiz-subtitle">
                Uji pengetahuanmu tentang budaya,
                kuliner, pakaian, tradisi, dan wisata
                Jawa Timur.
            </p>

        </section>


        <!-- =================================================
             QUIZ CARD
        ================================================== -->

        <section
            class="quiz-card"
            id="quizCard"
        >


            <!-- =================================================
                 HEADER / PROGRESS
            ================================================== -->

            <div class="quiz-card-header">

                <div class="quiz-progress-top">

                    <span class="quiz-progress-label">
                        Progress Quiz
                    </span>

                    <span
                        class="quiz-progress-number"
                        id="progressNumber"
                    >
                        Soal 1 dari 10
                    </span>

                </div>


                <div id="progress">

                    <div
                        id="progressFill"
                    ></div>

                </div>

            </div>


            <!-- =================================================
                 QUESTION
            ================================================== -->

            <div
                class="quiz-card-body"
                id="quizBody"
            >

                <div class="question-label">
                    Pertanyaan
                </div>


                <h2 id="questionText"></h2>


                <div id="answersBox"></div>


                <div id="feedback"></div>


                <div class="quiz-actions">

                    <button
                        type="button"
                        class="quiz-btn quiz-btn-primary"
                        id="submitBtn"
                    >
                        Jawab
                    </button>


                    <button
                        type="button"
                        class="quiz-btn quiz-btn-secondary"
                        id="nextBtn"
                        style="display:none;"
                    >
                        Soal Selanjutnya →
                    </button>

                </div>

            </div>


            <!-- =================================================
                 SCORE SCREEN
            ================================================== -->

            <div
                id="endScreen"
                style="display:none;"
            ></div>


        </section>


    </main>


    <!-- =====================================================
         GLOBAL FOOTER
    ====================================================== -->

    <?php include 'footer.php'; ?>


</div>


<!-- =========================================================
     GLOBAL NAVBAR JS
========================================================== -->

<script src="navbar.js"></script>


<script>

/* ============================================================
   DATA QUIZ
   ============================================================ */


const quizTrueFalse = [

    {
        question:
            "Rawon adalah makanan khas Jawa Timur.",
        correctAnswer: true
    },

    {
        question:
            "Reog Ponorogo berasal dari Bali.",
        correctAnswer: false
    },

    {
        question:
            "Tari Gandrung berasal dari Banyuwangi.",
        correctAnswer: true
    },

    {
        question:
            "Rujak Cingur menggunakan bumbu petis khas Jawa Timur.",
        correctAnswer: true
    },

    {
        question:
            "Soto Lamongan identik dengan koya.",
        correctAnswer: true
    },

    {
        question:
            "Ludruk adalah seni musik tradisional.",
        correctAnswer: false
    },

    {
        question:
            "Pesa'an adalah pakaian adat laki-laki Madura.",
        correctAnswer: true
    },

    {
        question:
            "Taman Nasional Baluran disebut Africa van Java.",
        correctAnswer: true
    },

    {
        question:
            "Wayang Kulit berasal dari Sumatera Utara.",
        correctAnswer: false
    },

    {
        question:
            "Odheng Santapan adalah ikat kepala khas Madura.",
        correctAnswer: true
    }

];


const quizMultipleChoice = [

    {
        question:
            "Makanan khas Madura adalah...",

        choices:
            [
                "Rawon",
                "Sate",
                "Gudeg",
                "Pempek"
            ],

        correctAnswer:
            "Sate"
    },

    {
        question:
            "Pakaian adat Jawa Timur adalah...",

        choices:
            [
                "Beskap",
                "Kebaya Encim",
                "Pesa'an",
                "Ulos"
            ],

        correctAnswer:
            "Pesa'an"
    },

    {
        question:
            "Tradisi 'Karapan Sapi' berasal dari...",

        choices:
            [
                "Bali",
                "Jakarta",
                "Madura",
                "Papua"
            ],

        correctAnswer:
            "Madura"
    },

    {
        question:
            "Wisata yang dijuluki 'Africa van Java' adalah...",

        choices:
            [
                "Kawah Ijen",
                "Baluran",
                "Papuma",
                "Coban Rondo"
            ],

        correctAnswer:
            "Baluran"
    },

    {
        question:
            "Kuliner dengan kuah hitam dari kluwek adalah...",

        choices:
            [
                "Bakso Malang",
                "Rawon",
                "Soto Lamongan",
                "Nasi Pecel"
            ],

        correctAnswer:
            "Rawon"
    },

    {
        question:
            "Busana Cak & Ning biasanya digunakan oleh...",

        choices:
            [
                "Duta Pariwisata Surabaya",
                "Petani",
                "Pelajar SMP",
                "Pedagang"
            ],

        correctAnswer:
            "Duta Pariwisata Surabaya"
    },

    {
        question:
            "Tari pembuka dalam pertunjukan Ludruk adalah...",

        choices:
            [
                "Tari Pendet",
                "Tari Remo",
                "Tari Jaipong",
                "Tari Topeng"
            ],

        correctAnswer:
            "Tari Remo"
    },

    {
        question:
            "Destinasi dengan fenomena blue fire adalah...",

        choices:
            [
                "Papuma",
                "Kawah Ijen",
                "Bromo",
                "Bukit Jaddih"
            ],

        correctAnswer:
            "Kawah Ijen"
    },

    {
        question:
            "Baju Manten Osing berasal dari...",

        choices:
            [
                "Tulungagung",
                "Banyuwangi",
                "Lamongan",
                "Malang"
            ],

        correctAnswer:
            "Banyuwangi"
    },

    {
        question:
            "Lontong, tauge, lentho, dan sambal petis adalah ciri dari...",

        choices:
            [
                "Lontong Balap",
                "Rujak Cingur",
                "Rawon",
                "Nasi Pecel"
            ],

        correctAnswer:
            "Lontong Balap"
    }

];


const quizMultipleResponse = [

    {
        question:
            "Yang termasuk makanan khas Jawa Timur:",

        choices:
            [
                "Rawon",
                "Pizza",
                "Rujak Cingur",
                "Sushi"
            ],

        correctAnswers:
            [
                "Rawon",
                "Rujak Cingur"
            ]
    },

    {
        question:
            "Pakaian adat berikut berasal dari Jawa:",

        choices:
            [
                "Pesa'an",
                "Hanbok",
                "Ulos",
                "Lurik"
            ],

        correctAnswers:
            [
                "Pesa'an",
                "Lurik"
            ]
    },

    {
        question:
            "Tradisi Jawa Timur:",

        choices:
            [
                "Karapan Sapi",
                "Thanksgiving",
                "Reog Ponorogo",
                "Oktoberfest"
            ],

        correctAnswers:
            [
                "Karapan Sapi",
                "Reog Ponorogo"
            ]
    },

    {
        question:
            "Yang merupakan wisata alam Jawa Timur:",

        choices:
            [
                "Gunung Bromo",
                "Pantai Klayar",
                "Menara Eiffel",
                "Kawah Ijen"
            ],

        correctAnswers:
            [
                "Gunung Bromo",
                "Pantai Klayar",
                "Kawah Ijen"
            ]
    },

    {
        question:
            "Kuliner yang menggunakan petis sebagai bahan:",

        choices:
            [
                "Rujak Cingur",
                "Tahu Tek",
                "Sushi",
                "Burger"
            ],

        correctAnswers:
            [
                "Rujak Cingur",
                "Tahu Tek"
            ]
    },

    {
        question:
            "Termasuk pakaian adat Jawa Timur:",

        choices:
            [
                "Kebaya Rancongan",
                "Baju Manten Osing",
                "Hanfu",
                "Kimono"
            ],

        correctAnswers:
            [
                "Kebaya Rancongan",
                "Baju Manten Osing"
            ]
    },

    {
        question:
            "Yang merupakan kesenian / pertunjukan:",

        choices:
            [
                "Ludruk",
                "Wayang Kulit Jawa Timur",
                "Rujak Cingur",
                "Bakso"
            ],

        correctAnswers:
            [
                "Ludruk",
                "Wayang Kulit Jawa Timur"
            ]
    },

    {
        question:
            "Tempat wisata yang berada di Banyuwangi:",

        choices:
            [
                "Kawah Ijen",
                "Ranu Kumbolo",
                "Bromo",
                "Papuma"
            ],

        correctAnswers:
            [
                "Kawah Ijen"
            ]
    },

    {
        question:
            "Kuliner Jawa Timur yang terkenal:",

        choices:
            [
                "Bakso Malang",
                "Nasi Pecel",
                "Lasagna",
                "Soto Lamongan"
            ],

        correctAnswers:
            [
                "Bakso Malang",
                "Nasi Pecel",
                "Soto Lamongan"
            ]
    },

    {
        question:
            "Seni yang berasal dari Ponorogo:",

        choices:
            [
                "Reog Ponorogo",
                "Bebaritan",
                "Tari Remo",
                "Wayang Kulit Jawa Timur"
            ],

        correctAnswers:
            [
                "Reog Ponorogo"
            ]
    }

];


/* ============================================================
   SETUP MODE
   ============================================================ */


const quizMode =
    "<?php echo htmlspecialchars($mode, ENT_QUOTES); ?>";


let currentQuiz = [];


if (
    quizMode === "multiplechoice"
) {

    currentQuiz =
        quizMultipleChoice;

}

else if (
    quizMode === "multipleresponse"
) {

    currentQuiz =
        quizMultipleResponse;

}

else {

    currentQuiz =
        quizTrueFalse;

}


/* ============================================================
   MODE TITLE
   ============================================================ */


let modeTitle =
    "True / False";


if (
    quizMode === "multiplechoice"
) {

    modeTitle =
        "Pilihan Ganda";

}

else if (
    quizMode === "multipleresponse"
) {

    modeTitle =
        "Multiple Response";

}


document.getElementById(
    "gameTitle"
).innerText =
    modeTitle;


/* ============================================================
   QUIZ STATE
   ============================================================ */


let index = 0;

let score = 0;

let answered = false;


/* ============================================================
   LOAD QUESTION
   ============================================================ */


function loadQuestion() {

    const q =
        currentQuiz[index];


    answered = false;


    document.getElementById(
        "feedback"
    ).innerHTML = "";


    document.getElementById(
        "nextBtn"
    ).style.display =
        "none";


    document.getElementById(
        "submitBtn"
    ).style.display =
        "inline-flex";


    document.getElementById(
        "questionText"
    ).innerText =
        q.question;


    document.getElementById(
        "answersBox"
    ).innerHTML =
        "";


    let html = "";


    /* ========================================================
       TRUE / FALSE
    ======================================================== */

    if (
        q.correctAnswer === true ||
        q.correctAnswer === false
    ) {

        html += createAnswerOption(
            "true",
            "True",
            "T",
            "radio"
        );


        html += createAnswerOption(
            "false",
            "False",
            "F",
            "radio"
        );

    }


    /* ========================================================
       MULTIPLE CHOICE
    ======================================================== */

    else if (
        q.correctAnswer
    ) {

        q.choices.forEach(
            function (choice, i) {

                html +=
                    createAnswerOption(
                        choice,
                        choice,
                        String.fromCharCode(
                            65 + i
                        ),
                        "radio"
                    );

            }
        );

    }


    /* ========================================================
       MULTIPLE RESPONSE
    ======================================================== */

    else {

        q.choices.forEach(
            function (choice, i) {

                html +=
                    createAnswerOption(
                        choice,
                        choice,
                        String.fromCharCode(
                            65 + i
                        ),
                        "checkbox"
                    );

            }
        );

    }


    document.getElementById(
        "answersBox"
    ).innerHTML =
        html;


    updateProgress();

}


/* ============================================================
   CREATE ANSWER OPTION
   ============================================================ */


function createAnswerOption(
    value,
    text,
    marker,
    type
) {

    const isCheckbox =
        type === "checkbox";


    return `

        <label
            class="answer-option ${isCheckbox ? "checkbox" : ""}"
        >

            <input
                type="${type}"
                name="quizAnswer"
                value="${escapeHtml(value)}"
            >

            <span class="answer-marker">
                ${marker}
            </span>

            <span class="answer-text">
                ${escapeHtml(text)}
            </span>

        </label>

    `;

}


/* ============================================================
   ESCAPE HTML
   ============================================================ */


function escapeHtml(value) {

    return String(value)
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;")
        .replaceAll('"', "&quot;")
        .replaceAll("'", "&#039;");

}


/* ============================================================
   ANSWER SELECTION
   ============================================================ */


document.addEventListener(
    "change",
    function (event) {

        if (
            !event.target.matches(
                "#answersBox input"
            )
        ) {
            return;
        }


        if (answered) {
            return;
        }


        const input =
            event.target;


        if (
            input.type === "radio"
        ) {

            document
                .querySelectorAll(
                    "#answersBox .answer-option"
                )
                .forEach(
                    function (option) {

                        option.classList.remove(
                            "selected"
                        );

                    }
                );

        }


        const option =
            input.closest(
                ".answer-option"
            );


        if (option) {

            option.classList.toggle(
                "selected",
                input.checked
            );

        }

    }
);


/* ============================================================
   PROGRESS
   ============================================================ */


function updateProgress() {

    const total =
        currentQuiz.length;


    const current =
        index + 1;


    const percent =
        (index / total) * 100;


    document.getElementById(
        "progressFill"
    ).style.width =
        percent + "%";


    document.getElementById(
        "progressNumber"
    ).innerText =
        `Soal ${current} dari ${total}`;

}


/* ============================================================
   CHECK ANSWER
   ============================================================ */


function checkAnswer() {

    if (answered) {
        return;
    }


    const q =
        currentQuiz[index];


    let correct =
        false;


    /* ========================================================
       TRUE / FALSE
       ======================================================== */

    if (
        q.correctAnswer === true ||
        q.correctAnswer === false
    ) {

        const selected =
            document.querySelector(
                "#answersBox input[name='quizAnswer']:checked"
            );


        if (!selected) {

            showSelectionWarning();

            return;

        }


        correct =
            (
                selected.value === "true"
            ) ===
            q.correctAnswer;

    }


    /* ========================================================
       MULTIPLE CHOICE
       ======================================================== */

    else if (
        q.correctAnswer
    ) {

        const selected =
            document.querySelector(
                "#answersBox input[name='quizAnswer']:checked"
            );


        if (!selected) {

            showSelectionWarning();

            return;

        }


        correct =
            selected.value ===
            q.correctAnswer;

    }


    /* ========================================================
       MULTIPLE RESPONSE
       ======================================================== */

    else {

        const selected =
            [
                ...document.querySelectorAll(
                    "#answersBox input[type='checkbox']:checked"
                )
            ]
            .map(
                function (input) {
                    return input.value;
                }
            );


        if (
            selected.length === 0
        ) {

            showSelectionWarning();

            return;

        }


        const selectedSorted =
            [...selected].sort();


        const correctSorted =
            [...q.correctAnswers].sort();


        correct =
            JSON.stringify(
                selectedSorted
            ) ===
            JSON.stringify(
                correctSorted
            );

    }


    answered = true;


    if (correct) {

        score++;

        showFeedback(
            true
        );

    }

    else {

        showFeedback(
            false
        );

    }


    markCorrectAnswer(
        q
    );


    document.getElementById(
        "submitBtn"
    ).style.display =
        "none";


    document.getElementById(
        "nextBtn"
    ).style.display =
        "inline-flex";


    if (
        index ===
        currentQuiz.length - 1
    ) {

        document.getElementById(
            "nextBtn"
        ).innerText =
            "Lihat Hasil →";

    }

}


/* ============================================================
   FEEDBACK
   ============================================================ */


function showFeedback(
    correct
) {

    const feedback =
        document.getElementById(
            "feedback"
        );


    if (correct) {

        feedback.innerHTML = `

            <div class="feedback-box correct">

                <span class="feedback-icon">
                    ✓
                </span>

                <span>
                    Jawaban kamu benar.
                    Lanjutkan ke soal berikutnya!
                </span>

            </div>

        `;

    }

    else {

        feedback.innerHTML = `

            <div class="feedback-box incorrect">

                <span class="feedback-icon">
                    ✕
                </span>

                <span>
                    Jawaban kamu belum tepat.
                    Coba lebih teliti di soal berikutnya.
                </span>

            </div>

        `;

    }

}


/* ============================================================
   SELECTION WARNING
   ============================================================ */


function showSelectionWarning() {

    document.getElementById(
        "feedback"
    ).innerHTML = `

        <div class="feedback-box incorrect">

            <span class="feedback-icon">
                !
            </span>

            <span>
                Pilih jawaban terlebih dahulu.
            </span>

        </div>

    `;

}


/* ============================================================
   MARK CORRECT ANSWER
   ============================================================ */


function markCorrectAnswer(q) {

    const options =
        document.querySelectorAll(
            "#answersBox .answer-option"
        );


    options.forEach(
        function (option) {

            const input =
                option.querySelector(
                    "input"
                );


            if (!input) {
                return;
            }


            let isCorrect =
                false;


            if (
                q.correctAnswer === true ||
                q.correctAnswer === false
            ) {

                isCorrect =
                    (
                        input.value === "true"
                    ) ===
                    q.correctAnswer;

            }

            else if (
                q.correctAnswer
            ) {

                isCorrect =
                    input.value ===
                    q.correctAnswer;

            }

            else {

                isCorrect =
                    q.correctAnswers.includes(
                        input.value
                    );

            }


            if (isCorrect) {

                option.classList.add(
                    "correct"
                );

            }


            if (
                input.checked &&
                !isCorrect
            ) {

                option.classList.add(
                    "incorrect"
                );

            }

        }
    );

}


/* ============================================================
   NEXT QUESTION
   ============================================================ */


function nextQuestion() {

    index++;


    if (
        index >=
        currentQuiz.length
    ) {

        showScore();

        return;

    }


    loadQuestion();


    window.scrollTo({

        top: 0,

        behavior: "smooth"

    });

}


/* ============================================================
   SCORE SCREEN
   ============================================================ */


function showScore() {

    const percentage =
        Math.round(
            (score / currentQuiz.length) *
            100
        );


    document.getElementById(
        "progressFill"
    ).style.width =
        "100%";


    document.getElementById(
        "progressNumber"
    ).innerText =
        "Quiz selesai";


    document.getElementById(
        "quizBody"
    ).style.display =
        "none";


    document.getElementById(
        "endScreen"
    ).style.display =
        "block";


    document.getElementById(
        "endScreen"
    ).innerHTML = `

        <div class="score-screen">

            <div class="score-icon">
                ★
            </div>


            <h2>
                Quiz Selesai!
            </h2>


            <h3>

                Kamu mendapatkan

                <span class="score-value">
                    ${score} / ${currentQuiz.length}
                </span>

                jawaban benar
                (${percentage}%).

            </h3>


            <div class="score-actions">

                <button
                    type="button"
                    class="quiz-btn quiz-btn-primary"
                    onclick="window.location.reload()"
                >
                    Main Lagi
                </button>


                <button
                    type="button"
                    class="quiz-btn quiz-btn-secondary"
                    onclick="window.location.href='mini-game.php'"
                >
                    ← Kembali ke Mini Game
                </button>

            </div>

        </div>

    `;

}


/* ============================================================
   BUTTON EVENTS
   ============================================================ */


document.getElementById(
    "submitBtn"
).addEventListener(
    "click",
    checkAnswer
);


document.getElementById(
    "nextBtn"
).addEventListener(
    "click",
    nextQuestion
);


/* ============================================================
   START QUIZ
   ============================================================ */


loadQuestion();

</script>


</body>
</html>