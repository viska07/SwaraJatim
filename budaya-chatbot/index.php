<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swara AI - Swara Jatim</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f7efe3;
            --bg-light: #fffaf3;
            --paper: #fffdf9;
            --brown: #70462f;
            --brown-dark: #3e281e;
            --terracotta: #ad6341;
            --gold: #c99a5b;
            --text: #342720;
            --muted: #806f62;
            --border: #e4d3bf;
            --shadow: 0 18px 45px rgba(74, 45, 29, .10);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "DM Sans", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 10% 20%, rgba(201,154,91,.13), transparent 20%),
                radial-gradient(circle at 90% 75%, rgba(173,99,65,.09), transparent 22%),
                linear-gradient(180deg, #fbf4e9 0%, var(--bg) 100%);
        }

        /*
         * Pola latar sederhana terinspirasi motif batik.
         * Dibuat dengan CSS supaya tidak membutuhkan file gambar tambahan.
         */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            opacity: .30;
            background-image:
                radial-gradient(circle, transparent 0 8px, rgba(112,70,47,.09) 8.5px 9px, transparent 9.5px),
                radial-gradient(circle, transparent 0 3px, rgba(201,154,91,.10) 3.5px 4px, transparent 4.5px);
            background-size: 42px 42px, 42px 42px;
            background-position: 0 0, 21px 21px;
        }

        .page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            overflow: hidden;
            padding: 28px 24px 42px;
        }

        /* Ornamen sudut */
        .corner {
            position: absolute;
            z-index: 0;
            width: 180px;
            height: 180px;
            pointer-events: none;
            opacity: .40;
        }

        .corner::before,
        .corner::after {
            content: "";
            position: absolute;
            border: 2px solid var(--gold);
            transform: rotate(45deg);
        }

        .corner::before {
            width: 100px;
            height: 100px;
        }

        .corner::after {
            width: 54px;
            height: 54px;
        }

        .corner-tl {
            left: -76px;
            top: 105px;
        }

        .corner-tl::before {
            top: 30px;
            left: 30px;
        }

        .corner-tl::after {
            top: 53px;
            left: 53px;
        }

        .corner-tr {
            right: -76px;
            top: 120px;
            transform: scaleX(-1);
        }

        .corner-tr::before {
            top: 30px;
            left: 30px;
        }

        .corner-tr::after {
            top: 53px;
            left: 53px;
        }

        .corner-bl {
            left: -76px;
            bottom: -65px;
        }

        .corner-bl::before {
            top: 30px;
            left: 30px;
        }

        .corner-bl::after {
            top: 53px;
            left: 53px;
        }

        .corner-br {
            right: -76px;
            bottom: -65px;
            transform: scaleX(-1);
        }

        .corner-br::before {
            top: 30px;
            left: 30px;
        }

        .corner-br::after {
            top: 53px;
            left: 53px;
        }








        .batik-band {
            position: absolute;
            z-index: 0;
            top: 29%;
            width: 46px;
            height: 250px;
            pointer-events: none;
            opacity: .34;
            border-top: 1px solid rgba(112,70,47,.32);
            border-bottom: 1px solid rgba(112,70,47,.32);
            background:
                linear-gradient(135deg, transparent 0 9px, rgba(201,154,91,.85) 9px 11px, transparent 11px 20px) 0 0 / 20px 20px,
                linear-gradient(45deg, transparent 0 9px, rgba(169,93,59,.60) 9px 11px, transparent 11px 20px) 0 0 / 20px 20px;
        }

        .batik-band.left { left: 0; }
        .batik-band.right {
            right: 0;
            transform: scaleX(-1);
        }

        .side-caption {
            position: absolute;
            z-index: 1;
            top: 55%;
            color: rgba(112,70,47,.62);
            font-family: "Playfair Display", Georgia, serif;
            font-size: .84rem;
            font-style: italic;
            line-height: 1.65;
            pointer-events: none;
        }

        .side-caption.left { left: 4.2%; }
        .side-caption.right { right: 4.2%; text-align: right; }

        .ornament-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 13px;
            color: var(--gold);
        }

        .ornament-divider::before,
        .ornament-divider::after {
            content: "";
            width: 35px;
            height: 1px;
            background: var(--gold);
        }

        .ornament-divider span {
            width: 7px;
            height: 7px;
            border: 1px solid var(--gold);
            transform: rotate(45deg);
        }

        .top {
            position: relative;
            z-index: 3;
            width: min(100%, 1120px);
            margin: 0 auto;
        }

        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            min-height: 44px;
            padding: 0 18px;
            border-radius: 999px;
            background: var(--brown);
            border: 1px solid #855338;
            color: #fff;
            text-decoration: none;
            font-size: .82rem;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(72,42,26,.14);
            transition: transform .2s ease, background .2s ease;
        }

        .back-home:hover {
            transform: translateY(-2px);
            background: var(--brown-dark);
        }

        .hero {
            position: relative;
            z-index: 2;
            width: min(100%, 930px);
            margin: 18px auto 28px;
            text-align: center;
        }

        .kicker {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 9px;
            color: var(--terracotta);
            font-size: .70rem;
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
        }

        .kicker::before,
        .kicker::after {
            content: "";
            width: 48px;
            height: 1px;
            background: var(--gold);
        }

        .hero h1 {
            margin: 0;
            color: var(--brown-dark);
            font-family: "Playfair Display", Georgia, serif;
            font-size: clamp(2.25rem, 5vw, 3.45rem);
            line-height: 1.1;
            letter-spacing: -.035em;
        }

        .hero p {
            width: min(100%, 650px);
            margin: 11px auto 0;
            color: var(--muted);
            font-size: .88rem;
            line-height: 1.7;
        }

        .content {
            position: relative;
            z-index: 3;
            width: min(100%, 900px);
            margin: 0 auto;
        }



        .culture-title {
            margin-bottom: 8px;
            color: var(--brown);
            font-family: "Playfair Display", Georgia, serif;
            font-size: 1.15rem;
            font-style: italic;
            line-height: 1.5;
        }

        .culture-list {
            margin: 0;
            padding: 0;
            list-style: none;
            font-size: .78rem;
            line-height: 2;
            letter-spacing: .04em;
        }

        .culture-list li::before {
            content: "✦";
            margin-right: 7px;
            color: var(--gold);
        }







        .floral-two {
            right: 8%;
            top: 34%;
            transform: scale(.78);
        }

        /* Ruang antara welcome dan pesan pertama */
        .welcome-message {
            margin-bottom: 24px;
        }

        .suggestions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 9px;
            max-width: 760px;
            margin: 0 auto 30px;
        }

        .suggestions-label {
            width: 100%;
            margin-bottom: 2px;
            color: var(--muted);
            font-size: .73rem;
            font-weight: 700;
            text-align: center;
        }

        .suggestion {
            padding: 8px 13px;
            border: 1px solid var(--border);
            border-radius: 999px;
            background: #fffaf4;
            color: #735644;
            font-size: .72rem;
            cursor: pointer;
            transition: .2s ease;
        }

        .suggestion:hover {
            border-color: #cba77f;
            background: #f7eadc;
            transform: translateY(-1px);
        }

        .chat-card {
            overflow: hidden;
            border: 1px solid #d3b28f;
            border-radius: 22px;
            background: var(--paper);
            box-shadow: var(--shadow);
        }

        .chat-header {
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 76px;
            padding: 14px 22px;
            color: #fff;
            background: linear-gradient(135deg, #70462f, #855136);
        }

        .bot-avatar {
            width: 46px;
            height: 46px;
            flex: 0 0 46px;
            overflow: hidden;
            border-radius: 13px;
            background: #f6eadb;
            border: 1px solid rgba(255,255,255,.45);
        }

        .bot-avatar img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .header-text {
            min-width: 0;
        }

        .header-title {
            margin-bottom: 3px;
            font-size: .91rem;
            font-weight: 700;
        }

        .status {
            display: flex;
            align-items: center;
            gap: 6px;
            color: rgba(255,255,255,.82);
            font-size: .69rem;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #78b67d;
        }

        #chatbox {
            height: 465px;
            overflow-y: auto;
            padding: 26px;
            background:
                linear-gradient(rgba(255,253,249,.96), rgba(255,253,249,.96)),
                repeating-linear-gradient(45deg, transparent 0 18px, rgba(201,154,91,.045) 18px 19px);
            scroll-behavior: smooth;
        }

        #chatbox::-webkit-scrollbar {
            width: 7px;
        }

        #chatbox::-webkit-scrollbar-thumb {
            border-radius: 999px;
            background: #d7c4af;
        }

        .welcome-message {
            max-width: 680px;
            margin: 0 auto 28px;
            padding: 20px 23px;
            border: 1px solid #eadbc9;
            border-radius: 17px;
            background: linear-gradient(135deg, #f9f0e5, #fffaf3);
            color: var(--text);
            text-align: center;
            font-size: .86rem;
            line-height: 1.75;
            box-shadow: 0 6px 20px rgba(80,49,31,.045);
        }

        .msg {
            max-width: 78%;
            margin-bottom: 17px;
            padding: 13px 16px;
            border-radius: 16px;
            font-size: .85rem;
            line-height: 1.7;
            word-break: break-word;
        }

        .msg.user {
            margin-left: auto;
            border: 1px solid #e5c8af;
            border-bottom-right-radius: 5px;
            background: #f8e7d8;
            color: var(--brown-dark);
        }

        .msg.user strong {
            display: block;
            margin-bottom: 4px;
            color: var(--terracotta);
            font-size: .69rem;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .msg.bot {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            border: 1px solid #eadfd3;
            border-bottom-left-radius: 5px;
            background: #fff;
        }

        .msg.bot .bot-icon {
            width: 33px;
            height: 33px;
            flex: 0 0 33px;
            border-radius: 9px;
            object-fit: cover;
            border: 1px solid #e5d6c6;
        }

        .bot-message-content {
            flex: 1;
            min-width: 0;
        }

        .typing-indicator {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-right: 6px;
        }

        .typing-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #9b9087;
            animation: typing 1.3s infinite ease-in-out;
        }

        .typing-dot:nth-child(2) { animation-delay: .15s; }
        .typing-dot:nth-child(3) { animation-delay: .30s; }

        @keyframes typing {
            0%, 60%, 100% {
                opacity: .35;
                transform: translateY(0);
            }
            30% {
                opacity: 1;
                transform: translateY(-3px);
            }
        }

        .input-area {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 18px;
            border-top: 1px solid #e5d6c6;
            background: #f8efe4;
        }

        .input-wrapper {
            flex: 1;
            min-width: 0;
        }

        .message-input {
            width: 100%;
            height: 46px;
            padding: 0 17px;
            border: 1px solid #dfccb7;
            border-radius: 999px;
            outline: none;
            background: #fff;
            color: var(--text);
            font-size: .83rem;
        }

        .message-input::placeholder {
            color: #a29488;
        }

        .message-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,154,91,.12);
        }

        .send-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 82px;
            height: 46px;
            flex: 0 0 82px;
            border: 1px solid var(--brown);
            border-radius: 999px;
            background: var(--brown);
            color: #fff;
            font-size: .80rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform .2s ease, background .2s ease;
        }

        .send-button:hover {
            transform: translateY(-1px);
            background: var(--brown-dark);
        }

        .quote {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            margin-top: 20px;
            color: #806652;
            font-family: "Playfair Display", Georgia, serif;
            font-size: .82rem;
            font-style: italic;
            text-align: center;
        }

        .quote::before,
        .quote::after {
            content: "";
            width: 55px;
            height: 1px;
            background: var(--gold);
        }

        @media (max-width: 900px) {
            .hero {
                margin-top: 15px;
            }
        }

        @media (max-width: 900px) {

            .hero {
                margin-top: 15px;
            }
        }

        @media (max-width: 650px) {
            .page {
                padding: 17px 13px 28px;
            }

            .back-home {
                min-height: 42px;
                padding: 0 15px;
                font-size: .78rem;
            }

            .hero {
                margin: 18px auto 21px;
            }

            .kicker {
                font-size: .62rem;
                letter-spacing: .17em;
            }

            .kicker::before,
            .kicker::after {
                width: 28px;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: .79rem;
            }

            .chat-card {
                border-radius: 18px;
            }

            .chat-header {
                padding: 14px;
            }

            #chatbox {
                height: 430px;
                padding: 18px 14px;
            }

            .msg {
                max-width: 89%;
                font-size: .81rem;
            }

            .welcome-message {
                padding: 17px;
                font-size: .79rem;
                margin-bottom: 20px;
            }

            .suggestions {
                margin-bottom: 22px;
                gap: 6px;
            }

            .suggestions-label {
                font-size: .68rem;
            }

            .suggestion {
                padding: 7px 10px;
                font-size: .67rem;
            }

            .input-area {
                padding: 10px;
                gap: 7px;
            }

            .message-input {
                height: 43px;
                padding: 0 13px;
                font-size: .78rem;
            }

            .send-button {
                width: 64px;
                height: 43px;
                flex-basis: 64px;
                font-size: .78rem;
            }

            .quote {
                font-size: .73rem;
            }

            .quote::before,
            .quote::after {
                width: 25px;
            }
        }
    
        /* =========================================================
           TAMBAHAN MOTIF BACKGROUND
           Hanya dekorasi background, tidak mengubah card AI.
           ========================================================= */
        .extra-bg-motif {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 210px;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
            opacity: .72;
        }

        .extra-bg-motif.left { left: 0; }
        .extra-bg-motif.right {
            right: 0;
            transform: scaleX(-1);
        }

        .extra-bg-motif .frame-line {
            position: absolute;
            left: 32px;
            top: 150px;
            width: 1px;
            height: 480px;
            background: rgba(112,70,47,.22);
        }

        .extra-bg-motif .frame-line::before,
        .extra-bg-motif .frame-line::after {
            content: "";
            position: absolute;
            left: -5px;
            width: 11px;
            height: 11px;
            border: 1px solid rgba(201,154,91,.65);
            transform: rotate(45deg);
            background: var(--bg-light);
        }

        .extra-bg-motif .frame-line::before { top: 92px; }
        .extra-bg-motif .frame-line::after { bottom: 92px; }

        .extra-bg-motif .wajik {
            position: absolute;
            width: 76px;
            height: 76px;
            border: 2px solid rgba(173,99,65,.55);
            transform: rotate(45deg);
            background: rgba(255,250,243,.16);
        }

        .extra-bg-motif .wajik::before {
            content: "";
            position: absolute;
            inset: 9px;
            border: 1px solid rgba(201,154,91,.75);
        }

        .extra-bg-motif .wajik::after {
            content: "";
            position: absolute;
            inset: 22px;
            border: 1px solid rgba(112,70,47,.30);
        }

        .extra-bg-motif .wajik.one {
            left: -31px;
            top: 255px;
        }

        .extra-bg-motif .wajik.two {
            left: 74px;
            top: 440px;
            width: 48px;
            height: 48px;
            opacity: .75;
        }

        .extra-bg-motif .wajik.three {
            left: -19px;
            top: 620px;
            width: 58px;
            height: 58px;
            opacity: .55;
        }

        .extra-bg-motif .diagonal {
            position: absolute;
            left: -4px;
            width: 118px;
            height: 1px;
            background: rgba(201,154,91,.52);
            transform: rotate(-45deg);
            transform-origin: left center;
        }

        .extra-bg-motif .diagonal.d1 { top: 285px; }
        .extra-bg-motif .diagonal.d2 { top: 310px; width: 88px; }
        .extra-bg-motif .diagonal.d3 { top: 335px; width: 118px; }
        .extra-bg-motif .diagonal.d4 { top: 360px; width: 88px; }
        .extra-bg-motif .diagonal.d5 { top: 385px; width: 118px; }

        .extra-bg-motif .chevron {
            position: absolute;
            width: 32px;
            height: 32px;
            border-left: 2px solid rgba(112,70,47,.35);
            border-bottom: 2px solid rgba(112,70,47,.35);
            transform: rotate(45deg);
        }

        .extra-bg-motif .chevron.c1 {
            left: 119px;
            top: 205px;
        }

        .extra-bg-motif .chevron.c2 {
            left: 10px;
            top: 540px;
            transform: rotate(45deg) scale(.70);
        }

        .extra-bg-motif .mini {
            position: absolute;
            width: 9px;
            height: 9px;
            border: 1px solid rgba(173,99,65,.58);
            transform: rotate(45deg);
        }

        .extra-bg-motif .mini.m1 { left: 101px; top: 370px; }
        .extra-bg-motif .mini.m2 { left: 55px; top: 510px; }
        .extra-bg-motif .mini.m3 { left: 128px; top: 680px; }

        @media (max-width: 1050px) {
            .extra-bg-motif {
                opacity: .42;
            }
        }

        @media (max-width: 650px) {
            .extra-bg-motif {
                width: 105px;
                opacity: .20;
            }

            .extra-bg-motif .frame-line {
                left: 15px;
            }
        }

</style>
</head>

<body>

<div class="page">

    <!-- Motif tambahan: hanya di background luar card AI -->
    <div class="extra-bg-motif left" aria-hidden="true">
        <span class="frame-line"></span>
        <span class="wajik one"></span>
        <span class="wajik two"></span>
        <span class="wajik three"></span>
        <span class="diagonal d1"></span>
        <span class="diagonal d2"></span>
        <span class="diagonal d3"></span>
        <span class="diagonal d4"></span>
        <span class="diagonal d5"></span>
        <span class="chevron c1"></span>
        <span class="chevron c2"></span>
        <span class="mini m1"></span>
        <span class="mini m2"></span>
        <span class="mini m3"></span>
    </div>

    <div class="extra-bg-motif right" aria-hidden="true">
        <span class="frame-line"></span>
        <span class="wajik one"></span>
        <span class="wajik two"></span>
        <span class="wajik three"></span>
        <span class="diagonal d1"></span>
        <span class="diagonal d2"></span>
        <span class="diagonal d3"></span>
        <span class="diagonal d4"></span>
        <span class="diagonal d5"></span>
        <span class="chevron c1"></span>
        <span class="chevron c2"></span>
        <span class="mini m1"></span>
        <span class="mini m2"></span>
        <span class="mini m3"></span>
    </div>


    <!-- Ornamen dekoratif -->
    <div class="corner corner-tl"></div>
    <div class="corner corner-tr"></div>
    <div class="corner corner-bl"></div>
    <div class="corner corner-br"></div>







    <div class="top">
        <a class="back-home" href="../index.php">
            <span aria-hidden="true">←</span>
            Kembali ke Beranda
        </a>
    </div>

    <main class="content">

        <section class="hero">
            <div class="kicker">Swara Jatim AI</div>

            <h1>Jelajahi Jawa Timur Bersama AI</h1>

            <p>
                Tanyakan tentang budaya, tradisi, kuliner, pakaian,
                kesenian, wisata, dan berbagai cerita menarik dari Jawa Timur.
            </p>

            <div class="ornament-divider" aria-hidden="true">
                <span></span>
            </div>
        </section>

        <section class="chat-card">

            <div class="chat-header">
                <div class="bot-avatar">
                    <img src="AI bot.png" alt="Swara AI">
                </div>

                <div class="header-text">
                    <div class="header-title">
                        Assistant Budaya Jawa Timur
                    </div>

                    <div class="status">
                        <span class="status-dot"></span>
                        Siap membantu menjelajahi budaya Jawa Timur
                    </div>
                </div>
            </div>

            <div id="chatbox">
                <div class="welcome-message">
                    👋 <strong>Selamat datang!</strong>
                    <br>
                    Saya siap membantu kamu menjelajahi kekayaan budaya,
                    tradisi, kuliner, kesenian, dan wisata Jawa Timur.
                    <br>
                    Silakan tanyakan apa saja.
                </div>

                <div class="suggestions">
                    <div class="suggestions-label">Contoh pertanyaan</div>

                    <button class="suggestion" type="button"
                        onclick="useSuggestion('Kuliner khas Jawa Timur apa saja?')">
                        Kuliner khas Jawa Timur
                    </button>

                    <button class="suggestion" type="button"
                        onclick="useSuggestion('Apa tradisi unik di Jawa Timur?')">
                        Tradisi unik Jawa Timur
                    </button>

                    <button class="suggestion" type="button"
                        onclick="useSuggestion('Apa saja tempat wisata terkenal di Jawa Timur?')">
                        Wisata Jawa Timur
                    </button>

                    <button class="suggestion" type="button"
                        onclick="useSuggestion('Apa pakaian adat Jawa Timur?')">
                        Pakaian adat
                    </button>

                    <button class="suggestion" type="button"
                        onclick="useSuggestion('Apa kesenian khas Jawa Timur?')">
                        Kesenian khas
                    </button>
                </div>
            </div>

            <div class="input-area">
                <div class="input-wrapper">
                    <input
                        type="text"
                        id="message"
                        class="message-input"
                        placeholder="Tanyakan sesuatu tentang Jawa Timur..."
                        autocomplete="off"
                    >
                </div>

                <button
                    type="button"
                    class="send-button"
                    id="sendButton"
                    onclick="sendMessage()"
                >
                    Kirim
                </button>
            </div>

        </section>

        <div class="quote">
            “Melestarikan Budaya, Menyatukan Generasi”
        </div>

    </main>

</div>

<script>
function useSuggestion(question) {
    const input = document.getElementById("message");
    input.value = question;
    input.focus();
}

function sendMessage() {
    const input = document.getElementById("message");
    const msg = input.value.trim();

    if (!msg) {
        return;
    }

    const chatbox = document.getElementById("chatbox");

    chatbox.innerHTML += `
        <div class="msg user">
            <strong>Anda</strong>
            ${escapeHtml(msg)}
        </div>
    `;

    chatbox.innerHTML += `
        <div class="msg bot" id="typing">
            <img src="AI bot.png" class="bot-icon" alt="Swara AI">

            <div class="bot-message-content">
                <span class="typing-indicator">
                    <span class="typing-dot"></span>
                    <span class="typing-dot"></span>
                    <span class="typing-dot"></span>
                </span>
                Sedang mengetik...
            </div>
        </div>
    `;

    chatbox.scrollTop = chatbox.scrollHeight;

    fetch("chatbot.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "message=" + encodeURIComponent(msg)
    })
    .then(function(res) {
        return res.text().then(function(raw) {
            if (!res.ok) {
                throw new Error(raw || "Server error");
            }

            try {
                return JSON.parse(raw);
            } catch (parseError) {
                console.error("Response chatbot bukan JSON:", raw);
                throw new Error(
                    "Server chatbot mengirim response yang tidak valid: " + raw
                );
            }
        });
    })
    .then(function(data) {
        const typing = document.getElementById("typing");

        if (typing) {
            typing.remove();
        }

        const reply = data.reply || "Maaf, belum ada jawaban dari Swara AI.";

        chatbox.innerHTML += `
            <div class="msg bot">
                <img src="AI bot.png" class="bot-icon" alt="Swara AI">
                <div class="bot-message-content">
                    ${reply}
                </div>
            </div>
        `;

        chatbox.scrollTop = chatbox.scrollHeight;
    })
    .catch(function(error) {
        console.error("Swara AI error:", error);

        const typing = document.getElementById("typing");

        if (typing) {
            typing.remove();
        }

        chatbox.innerHTML += `
            <div class="msg bot">
                <img src="AI bot.png" class="bot-icon" alt="Swara AI">
                <div class="bot-message-content">
                    ${escapeHtml(error.message || "Maaf, terjadi kesalahan. Silakan coba lagi.")}
                </div>
            </div>
        `;

        chatbox.scrollTop = chatbox.scrollHeight;
    });

    input.value = "";
    input.focus();
}

document.getElementById("message").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        sendMessage();
    }
});

function escapeHtml(value) {
    return String(value)
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;")
        .replaceAll('"', "&quot;")
        .replaceAll("'", "&#039;");
}
</script>

</body>
</html>
