<?php
include "koneksi.php";

$kategori = [
    1 => "Wisata",
    2 => "Kuliner",
    3 => "Pakaian",
    4 => "Tradisi"
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Swara Jatim - Dari Jawa Timur, Untuk Nusantara</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <link rel="stylesheet" href="navbar-footer.css">

    <style>

        /* =========================================================
           RESET & VARIABLES
        ========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #f8f5ef;
            --surface: #ffffff;
            --surface-soft: #f2ede5;

            --dark: #241b16;
            --dark-soft: #3a2b23;

            --brown: #6b4935;
            --terracotta: #b85c38;
            --gold: #c99a5b;

            --text: #332a25;
            --muted: #756b63;
            --muted-light: #9b9087;

            --border: #e5ddd3;

            --radius-sm: 10px;
            --radius-md: 18px;
            --radius-lg: 28px;

            --shadow-sm: 0 8px 25px rgba(36, 27, 22, 0.06);
            --shadow-md: 0 16px 40px rgba(36, 27, 22, 0.10);

            --max-width: 1240px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            color: inherit;
        }

        button,
        input {
            font: inherit;
        }


        /* Navbar styles are loaded from navbar-footer.css */

        /* =========================================================
           HERO
        ========================================================= */

        .hero {
            min-height: 100vh;

            position: relative;

            display: flex;
            align-items: center;

            background-image:
                linear-gradient(
                    90deg,
                    rgba(20, 13, 9, 0.78) 0%,
                    rgba(20, 13, 9, 0.52) 42%,
                    rgba(20, 13, 9, 0.22) 100%
                ),
                url("Jembatan-Nasional-Suramadu.jpg");

            background-size: cover;
            background-position: center;

            color: white;
        }

        .hero::after {
            content: "";

            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;

            height: 130px;

            background: linear-gradient(
                to top,
                var(--bg),
                transparent
            );

            pointer-events: none;
        }

        .hero-content {
            width: min(100% - 48px, var(--max-width));
            margin: 78px auto 0;

            position: relative;
            z-index: 2;
        }

        .hero-text {
            max-width: 680px;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 20px;

            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;

            color: #f1d8ad;
        }

        .hero-label::before {
            content: "";

            width: 30px;
            height: 1px;

            background: var(--gold);
        }

        .hero h1 {
            font-family: "Playfair Display", serif;

            font-size: clamp(3.5rem, 7vw, 6.8rem);
            line-height: 0.95;

            font-weight: 600;

            margin-bottom: 24px;

            letter-spacing: -2px;
        }

        .hero h1 span {
            color: #e1b879;
        }

        .hero-description {
            max-width: 580px;

            color: rgba(255,255,255,0.82);

            font-size: 1.08rem;
            line-height: 1.8;

            margin-bottom: 32px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            padding: 13px 20px;

            border-radius: 10px;

            text-decoration: none;

            font-size: 0.9rem;
            font-weight: 600;

            transition: 0.3s ease;
        }

        .hero-button.primary {
            background: var(--terracotta);
            color: white;
        }

        .hero-button.primary:hover {
            background: #a94e2e;
            transform: translateY(-2px);
        }

        .hero-button.secondary {
            background: rgba(255,255,255,0.10);
            color: white;

            border: 1px solid rgba(255,255,255,0.22);

            backdrop-filter: blur(10px);
        }

        .hero-button.secondary:hover {
            background: rgba(255,255,255,0.17);
            transform: translateY(-2px);
        }

        .hero-scroll {
            position: absolute;
            z-index: 2;

            bottom: 42px;
            right: 48px;

            display: flex;
            align-items: center;
            gap: 10px;

            color: rgba(255,255,255,0.72);

            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero-scroll i {
            color: var(--gold);
        }


        /* =========================================================
           GENERAL SECTION
        ========================================================= */

        .section {
            width: min(100% - 48px, var(--max-width));
            margin: auto;
            padding: 65px 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 30px;
            margin-bottom: 25px;
        }

        .section-heading {
            max-width: 680px;
        }

        .eyebrow {
            display: block;

            margin-bottom: 10px;

            color: var(--terracotta);

            font-size: 0.72rem;
            font-weight: 700;

            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .section-title {
            font-family: "Playfair Display", serif;

            color: var(--dark);

            font-size: clamp(2rem, 4vw, 3rem);
            line-height: 1.15;

            font-weight: 600;
        }

        .section-subtitle {
            margin-top: 12px;

            color: var(--muted);

            max-width: 650px;

            font-size: 0.98rem;
            line-height: 1.8;
        }

        .view-all {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            text-decoration: none;

            color: var(--brown);

            font-size: 0.86rem;
            font-weight: 600;

            white-space: nowrap;

            transition: 0.25s ease;
        }

        .view-all:hover {
            color: var(--terracotta);
            gap: 12px;
        }


        /* =========================================================
           CATEGORY INTRO
        ========================================================= */

        .category-intro {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 30px;
            align-items: center;
            margin-bottom: 25px;
        }

        .category-intro-text {
            max-width: 680px;
        }

        .category-intro-text p {
            margin-top: 12px;

            color: var(--muted);

            font-size: 1rem;
            line-height: 1.9;
        }

        .category-stat {
            display: flex;
            justify-content: flex-end;
            gap: 38px;
        }

        .stat-item {
            text-align: right;
        }

        .stat-number {
            display: block;

            color: var(--dark);

            font-family: "Playfair Display", serif;
            font-size: 2.2rem;
            font-weight: 600;
        }

        .stat-label {
            color: var(--muted-light);

            font-size: 0.78rem;
        }


        /* =========================================================
           GALLERY
        ========================================================= */

        .gallery-section {
            background: var(--surface-soft);

            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .gallery-inner {
            width: min(100% - 48px, var(--max-width));
            margin: auto;
            padding: 65px 0;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .gallery-link {
            text-decoration: none;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;

            min-height: 350px;

            border-radius: var(--radius-md);

            background: var(--dark);

            box-shadow: var(--shadow-sm);

            isolation: isolate;

            transition: 0.4s ease;
        }

        .gallery-card:hover {
            transform: translateY(-7px);
            box-shadow: var(--shadow-md);
        }

        .gallery-image-wrapper {
            position: absolute;
            inset: 0;

            overflow: hidden;
        }

        .gallery-image-wrapper::after {
            content: "";

            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    to top,
                    rgba(20, 13, 9, 0.9),
                    rgba(20, 13, 9, 0.15) 65%,
                    rgba(20, 13, 9, 0.05)
                );
        }

        .gallery-image-wrapper img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: transform 0.6s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.07);
        }

        .gallery-badge {
            position: absolute;

            top: 18px;
            left: 18px;

            z-index: 2;

            padding: 7px 12px;

            border-radius: 50px;

            background: rgba(255,255,255,0.92);

            color: var(--dark);

            font-size: 0.68rem;
            font-weight: 700;

            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .gallery-content {
            position: absolute;

            left: 22px;
            right: 22px;
            bottom: 22px;

            z-index: 2;
        }

        .gallery-content h3 {
            color: white;

            font-family: "Playfair Display", serif;

            font-size: 1.45rem;
            font-weight: 600;

            margin-bottom: 7px;
        }

        .gallery-content p {
            color: rgba(255,255,255,0.72);

            font-size: 0.82rem;
            line-height: 1.6;
        }


        /* =========================================================
           AI SECTION
        ========================================================= */

        .ai-section {
            padding-top: 65px;
            padding-bottom: 65px;
        }

        .ai-card {
            display: grid;

            grid-template-columns: 1fr 0.9fr;

            min-height: 430px;

            overflow: hidden;

            border-radius: var(--radius-lg);

            background: var(--dark);

            color: white;

            box-shadow: 0 25px 70px rgba(36, 27, 22, 0.16);
        }

        .ai-content {
            padding: 65px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            border-right: 1px solid rgba(255,255,255,0.08);
        }

        .ai-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: #dfbb7d;

            font-size: 0.72rem;
            font-weight: 700;

            letter-spacing: 2px;
            text-transform: uppercase;

            margin-bottom: 18px;
        }

        .ai-label i {
            font-size: 0.8rem;
        }

        .ai-title {
            font-family: "Playfair Display", serif;

            font-size: clamp(2.2rem, 4vw, 3.7rem);

            line-height: 1.08;

            font-weight: 600;

            margin-bottom: 22px;
        }

        .ai-title span {
            color: #d9af6c;
        }

        .ai-description {
            max-width: 550px;

            color: rgba(255,255,255,0.68);

            font-size: 0.95rem;
            line-height: 1.9;

            margin-bottom: 30px;
        }

        .ai-feature-list {
            list-style: none;

            display: grid;
            gap: 12px;

            margin-bottom: 34px;
        }

        .ai-feature-list li {
            display: flex;
            align-items: center;
            gap: 12px;

            color: rgba(255,255,255,0.78);

            font-size: 0.84rem;
        }

        .ai-feature-list i {
            width: 25px;
            height: 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: rgba(201,154,91,0.13);

            color: #d9af6c;

            font-size: 0.65rem;
        }

        .ai-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            width: fit-content;

            padding: 13px 20px;

            border-radius: 10px;

            background: #d09a4f;
            color: #241b16;

            text-decoration: none;

            font-size: 0.86rem;
            font-weight: 700;

            transition: 0.3s ease;
        }

        .ai-button:hover {
            background: #e0b26e;
            transform: translateY(-2px);
        }


        /* AI PREVIEW */

        .ai-preview {
            padding: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #30231c;
        }

        .chat-preview {
            width: 100%;
            max-width: 430px;

            padding: 18px;

            border-radius: 20px;

            background: #fffdf9;

            box-shadow: 0 25px 55px rgba(0,0,0,0.25);
        }

        .chat-preview-header {
            display: flex;
            align-items: center;
            gap: 12px;

            padding-bottom: 15px;

            border-bottom: 1px solid var(--border);
        }

        .bot-avatar {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #ead8bd;

            color: var(--brown);

            font-size: 1rem;
        }

        .chat-preview-name strong {
            display: block;

            color: var(--dark);

            font-size: 0.85rem;
        }

        .chat-preview-name span {
            color: #8c8178;

            font-size: 0.7rem;
        }

        .online-dot {
            width: 7px;
            height: 7px;

            margin-left: auto;

            border-radius: 50%;

            background: #69a56f;

            box-shadow: 0 0 0 4px rgba(105,165,111,0.12);
        }

        .chat-messages {
            padding: 25px 5px;

            display: grid;
            gap: 14px;
        }

        .preview-message {
            max-width: 82%;

            padding: 12px 14px;

            border-radius: 13px;

            font-size: 0.76rem;
            line-height: 1.6;
        }

        .preview-message.bot {
            background: #f1ece5;
            color: var(--text);

            border-bottom-left-radius: 4px;
        }

        .preview-message.user {
            margin-left: auto;

            background: var(--terracotta);
            color: white;

            border-bottom-right-radius: 4px;
        }

        .chat-preview-input {
            display: flex;
            align-items: center;
            gap: 8px;

            padding: 7px;

            border: 1px solid var(--border);
            border-radius: 11px;
        }

        .chat-preview-input span {
            flex: 1;

            padding-left: 7px;

            color: #a0968d;

            font-size: 0.72rem;
        }

        .chat-preview-input button {
            width: 32px;
            height: 32px;

            border: none;
            border-radius: 8px;

            background: var(--terracotta);
            color: white;

            cursor: pointer;
        }


        /* =========================================================
           CONTENT SECTIONS
        ========================================================= */

        .content-section {
            padding-top: 55px;
            padding-bottom: 55px;
        }

        .content-section:nth-of-type(even) {
            background: #f1ebe2;
        }

        .content-grid {
            display: grid;

            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 20px;
        }

        .content-card {
            overflow: hidden;

            background: var(--surface);

            border: 1px solid var(--border);
            border-radius: var(--radius-md);

            box-shadow: 0 5px 18px rgba(36,27,22,0.04);

            transition: 0.35s ease;
        }

        .content-card:hover {
            transform: translateY(-6px);

            box-shadow: var(--shadow-md);

            border-color: #d7c9b9;
        }

        .content-image {
            width: 100%;
            height: 220px;

            object-fit: cover;

            display: block;

            transition: 0.5s ease;
        }

        .content-card:hover .content-image {
            transform: scale(1.04);
        }

        .content-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .location-badge {
            position: absolute;

            left: 14px;
            bottom: 14px;

            padding: 6px 10px;

            border-radius: 50px;

            background: rgba(36,27,22,0.85);
            color: white;

            font-size: 0.68rem;
            font-weight: 600;

            backdrop-filter: blur(8px);
        }

        .card-content {
            padding: 20px;
        }

        .card-content h4 {
            color: var(--dark);

            font-family: "Playfair Display", serif;

            font-size: 1.18rem;
            font-weight: 600;

            line-height: 1.35;

            margin-bottom: 7px;
        }

        .card-content p {
            color: var(--muted);

            font-size: 0.8rem;
        }

        .card-arrow {
            margin-top: 16px;

            display: inline-flex;
            align-items: center;
            gap: 7px;

            color: var(--terracotta);

            font-size: 0.75rem;
            font-weight: 700;
        }


        /* =========================================================
           MINI GAME CTA
        ========================================================= */

        .game-section {
            padding: 85px 0;
        }

        .game-card {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 40px;

            padding: 48px 55px;

            border-radius: var(--radius-lg);

            background: #e8dac5;

            overflow: hidden;
        }

        .game-card::after {
            content: "✦";

            position: absolute;

            right: 45px;
            top: -20px;

            color: rgba(107,73,53,0.08);

            font-size: 13rem;
        }

        .game-content {
            position: relative;
            z-index: 2;

            max-width: 700px;
        }

        .game-content .eyebrow {
            color: var(--brown);
        }

        .game-title {
            font-family: "Playfair Display", serif;

            color: var(--dark);

            font-size: clamp(1.8rem, 3vw, 2.8rem);

            line-height: 1.15;

            margin-bottom: 12px;
        }

        .game-description {
            color: var(--muted);

            font-size: 0.9rem;
            line-height: 1.8;
        }

        .game-button {
            position: relative;
            z-index: 2;

            flex-shrink: 0;

            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 13px 20px;

            border-radius: 10px;

            background: var(--dark);
            color: white;

            text-decoration: none;

            font-size: 0.84rem;
            font-weight: 600;

            transition: 0.3s ease;
        }

        .game-button:hover {
            background: var(--terracotta);
            transform: translateY(-2px);
        }


        /* Footer styles are loaded from navbar-footer.css */

        /* =========================================================
           SEARCH EMPTY STATE
        ========================================================= */

        .search-empty {
            display: none;

            margin-top: 20px;
            padding: 25px;

            text-align: center;

            border: 1px dashed var(--border);
            border-radius: var(--radius-md);

            color: var(--muted);
            font-size: 0.85rem;
        }


        /* =========================================================
           ANIMATION
        ========================================================= */

        .fade-up {
            animation: fadeUp 0.8s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        /* =========================================================
           RESPONSIVE - 1100px
        ========================================================= */

        @media (max-width: 1100px) {

            .nav-container {
                gap: 18px;
            }

            .nav-menu {
                gap: 18px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .ai-content {
                padding: 50px;
            }

            .footer-content {
                grid-template-columns: 1.3fr 1fr 1fr;
            }

            .footer-contact {
                grid-column: 1 / -1;
            }
        }


        /* =========================================================
           RESPONSIVE - 850px
        ========================================================= */

        @media (max-width: 850px) {

            .nav-container {
                height: 70px;
            }

            .search-container {
                display: none;
            }

            .burger-menu {
                display: flex;
            }

            .nav-menu-wrapper {
                position: absolute;

                top: 70px;
                left: 0;
                right: 0;

                display: block;

                max-height: 0;

                overflow: hidden;

                background: rgba(36,27,22,0.98);

                border-bottom: 1px solid rgba(255,255,255,0.08);

                transition: max-height 0.35s ease;
            }

            .nav-menu-wrapper.active {
                max-height: 420px;
            }

            .nav-menu {
                flex-direction: column;
                align-items: stretch;

                gap: 0;

                padding: 10px 24px 20px;
            }

            .nav-menu li {
                border-bottom: 1px solid rgba(255,255,255,0.07);
            }

            .nav-menu li:last-child {
                border-bottom: none;
            }

            .nav-menu a {
                display: block;

                padding: 15px 0;
            }

            .nav-menu a::after {
                display: none;
            }

            .category-intro {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .category-stat {
                justify-content: flex-start;
            }

            .stat-item {
                text-align: left;
            }

            .ai-card {
                grid-template-columns: 1fr;
            }

            .ai-content {
                border-right: none;
                border-bottom: 1px solid rgba(255,255,255,0.08);
            }

            .content-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .game-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }

            .footer-brand {
                grid-column: 1 / -1;
            }

            .footer-contact {
                grid-column: auto;
            }
        }


        /* =========================================================
           RESPONSIVE - 600px
        ========================================================= */

        @media (max-width: 600px) {

            .nav-container,
            .hero-content,
            .section,
            .gallery-inner,
            .footer-content,
            .footer-bottom {
                width: min(100% - 32px, var(--max-width));
            }

            .hero {
                min-height: 780px;

                background-position: 62% center;
            }

            .hero-content {
                margin-top: 70px;
            }

            .hero h1 {
                font-size: 3.6rem;
                letter-spacing: -1.5px;
            }

            .hero-description {
                font-size: 0.92rem;
                line-height: 1.7;
            }

            .hero-scroll {
                display: none;
            }

            .section,
            .gallery-inner {
                padding: 70px 0;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;

                margin-bottom: 28px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .gallery-card {
                min-height: 360px;
            }

            .category-stat {
                gap: 28px;
            }

            .stat-number {
                font-size: 1.8rem;
            }

            .ai-content {
                padding: 38px 26px;
            }

            .ai-preview {
                padding: 25px;
            }

            .chat-preview {
                padding: 14px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .content-image {
                height: 230px;
            }

            .game-card {
                padding: 35px 25px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .footer-brand,
            .footer-contact {
                grid-column: auto;
            }

            .footer-bottom {
                align-items: flex-start;
                flex-direction: column;
            }
        }


        /* =========================================================
           RESPONSIVE - 400px
        ========================================================= */

        @media (max-width: 400px) {

            .hero h1 {
                font-size: 3rem;
            }

            .hero-button {
                width: 100%;
            }

            .hero-actions {
                width: 100%;
            }

            .ai-content {
                padding: 32px 22px;
            }

            .ai-preview {
                padding: 18px;
            }

            .gallery-card {
                min-height: 330px;
            }

            .game-card {
                padding: 30px 20px;
            }
        }

    </style>
</head>


<body>


<?php include 'navbar.php'; ?>


<!-- =========================================================
     HERO
========================================================= -->

<section class="hero" id="home">

    <div class="hero-content">

        <div class="hero-text fade-up">

            <div class="hero-label">
                Warisan Jawa Timur
            </div>

            <h1>
                Swara<br>
                <span>Jatim.</span>
            </h1>

            <p class="hero-description">
                Dari tradisi yang diwariskan turun-temurun,
                rasa yang menjadi identitas, hingga cerita di
                balik setiap tempat dan kesenian.
                Mari mengenal kekayaan Jawa Timur dengan cara
                yang lebih dekat dan modern.
            </p>

            <div class="hero-actions">

                <a href="#galeri" class="hero-button primary">
                    Jelajahi Budaya
                    <i class="fa-solid fa-arrow-down"></i>
                </a>

                <a href="#ai-assistant" class="hero-button secondary">
                    Kenali dengan AI
                    <i class="fa-solid fa-sparkles"></i>
                </a>

            </div>

        </div>

    </div>


    <div class="hero-scroll">
        Scroll untuk menjelajah
        <i class="fa-solid fa-arrow-down"></i>
    </div>

</section>



<!-- =========================================================
     INTRODUCTION
========================================================= -->

<section class="section">

    <div class="category-intro">

        <div class="category-intro-text">

            <span class="eyebrow">
                Eksplorasi
            </span>

            <h2 class="section-title">
                Mengenal Jawa Timur<br>
                lebih dekat.
            </h2>

            <p>
                Swara Jatim menghadirkan ruang digital untuk
                mengenal berbagai sisi budaya Jawa Timur,
                mulai dari destinasi, kuliner, pakaian,
                hingga tradisi yang masih hidup di tengah
                masyarakat.
            </p>

        </div>


        <div class="category-stat">

            <div class="stat-item">

                <span class="stat-number">
                    04
                </span>

                <span class="stat-label">
                    Kategori Budaya
                </span>

            </div>


            <div class="stat-item">

                <span class="stat-number">
                    ∞
                </span>

                <span class="stat-label">
                    Cerita untuk Dijelajahi
                </span>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     GALLERY
========================================================= -->

<section class="gallery-section" id="galeri">

    <div class="gallery-inner">

        <div class="section-header">

            <div class="section-heading">

                <span class="eyebrow">
                    Galeri
                </span>

                <h2 class="section-title">
                    Temukan sisi lain<br>
                    Jawa Timur.
                </h2>

                <p class="section-subtitle">
                    Jelajahi koleksi budaya berdasarkan kategori
                    yang ingin kamu kenali.
                </p>

            </div>

        </div>


        <div class="gallery-grid">

            <?php

            foreach ($kategori as $cat_id => $judul_custom) {

                $sql = "SELECT * FROM konten
                        WHERE category_id = $cat_id
                        ORDER BY id DESC
                        LIMIT 1";

                $result = mysqli_query($koneksi, $sql);

                if ($row = mysqli_fetch_assoc($result)) {

                    $description = isset($row['description'])
                        ? substr(strip_tags($row['description']), 0, 110) . '...'
                        : 'Jelajahi koleksi ' . $judul_custom . ' Jawa Timur.';

                    ?>

                    <a
                        href="galeri.php?id=<?php echo $cat_id; ?>"
                        class="gallery-link searchable-item"
                        data-search="<?php echo htmlspecialchars($judul_custom . ' ' . $description); ?>"
                    >

                        <article class="gallery-card">

                            <div class="gallery-image-wrapper">

                                <img
                                    src="<?php echo htmlspecialchars($row['image_url']); ?>"
                                    alt="<?php echo htmlspecialchars($judul_custom); ?>"
                                    loading="lazy"
                                >

                                <span class="gallery-badge">
                                    <?php echo htmlspecialchars($judul_custom); ?>
                                </span>

                            </div>


                            <div class="gallery-content">

                                <h3>
                                    Galeri <?php echo htmlspecialchars($judul_custom); ?>
                                </h3>

                                <p>
                                    <?php echo htmlspecialchars($description); ?>
                                </p>

                            </div>

                        </article>

                    </a>

                    <?php
                }
            }

            ?>

        </div>


        <div class="search-empty" id="galleryEmpty">
            Tidak ada hasil yang cocok dengan pencarian.
        </div>

    </div>

</section>



<!-- =========================================================
     AI ASSISTANT
========================================================= -->

<section class="section ai-section" id="ai-assistant">

    <div class="ai-card">

        <div class="ai-content">

            <div class="ai-label">
                <i class="fa-solid fa-sparkles"></i>
                Swara Jatim AI
            </div>


            <h2 class="ai-title">
                Punya pertanyaan<br>
                tentang <span>budaya?</span>
            </h2>


            <p class="ai-description">
                Kenali Jawa Timur melalui percakapan interaktif.
                Tanyakan tentang tradisi, kuliner, pakaian adat,
                kesenian, sejarah, dan berbagai cerita budaya
                Jawa Timur kepada Swara AI.
            </p>


            <ul class="ai-feature-list">

                <li>
                    <i class="fa-solid fa-check"></i>
                    Informasi budaya Jawa Timur
                </li>

                <li>
                    <i class="fa-solid fa-check"></i>
                    Jawaban singkat dan mudah dipahami
                </li>

                <li>
                    <i class="fa-solid fa-check"></i>
                    Bisa bertanya seperti sedang mengobrol
                </li>

            </ul>


            <a
                href="budaya-chatbot/index.php"
                class="ai-button"
            >
                Mulai Bertanya
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>


        <div
            class="ai-preview"
            onclick="window.location.href='budaya-chatbot/index.php'"
            style="cursor: pointer;"
        >

            <div class="chat-preview">

                <div class="chat-preview-header">

                    <div class="bot-avatar">
                        <i class="fa-solid fa-robot"></i>
                    </div>

                    <div class="chat-preview-name">

                        <strong>
                            Swara AI
                        </strong>

                        <span>
                            Asisten Budaya Jawa Timur
                        </span>

                    </div>

                    <div class="online-dot"></div>

                </div>


                <div class="chat-messages">

                    <div class="preview-message bot">
                        Halo! 👋 Ada yang ingin kamu ketahui
                        tentang budaya Jawa Timur?
                    </div>

                    <div class="preview-message user">
                        Apa itu Ludruk?
                    </div>

                    <div class="preview-message bot">
                        Ludruk merupakan salah satu kesenian
                        tradisional Jawa Timur...
                    </div>

                </div>


                <div class="chat-preview-input">

                    <span>
                        Tanyakan sesuatu...
                    </span>

                    <button type="button">
                        <i class="fa-solid fa-arrow-up"></i>
                    </button>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     WISATA
========================================================= -->

<section class="content-section">

    <div class="section">

        <div class="section-header">

            <div class="section-heading">

                <span class="eyebrow">
                    Jelajah
                </span>

                <h2 class="section-title">
                    Wisata Jawa Timur
                </h2>

                <p class="section-subtitle">
                    Tempat-tempat yang menyimpan cerita,
                    lanskap, dan karakter Jawa Timur.
                </p>

            </div>


            <a
                href="galeri.php?id=1"
                class="view-all"
            >
                Lihat semua
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>


        <div class="content-grid">

            <?php

            $res = mysqli_query($koneksi, "
                SELECT k.*, c.name AS city_name
                FROM konten k
                LEFT JOIN cities c ON k.city_id = c.id
                WHERE k.category_id = 1
                ORDER BY k.id DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {

                ?>

                <article
                    class="content-card searchable-item"
                    data-search="<?php echo htmlspecialchars($row['name'] . ' ' . ($row['city_name'] ?? '')); ?>"
                >

                    <div class="content-image-wrapper">

                        <img
                            class="content-image"
                            src="<?php echo htmlspecialchars($row['image_url']); ?>"
                            alt="<?php echo htmlspecialchars($row['name']); ?>"
                            loading="lazy"
                        >

                        <?php if (!empty($row['city_name'])): ?>

                            <span class="location-badge">
                                <i class="fa-solid fa-location-dot"></i>
                                <?php echo htmlspecialchars($row['city_name']); ?>
                            </span>

                        <?php endif; ?>

                    </div>


                    <div class="card-content">

                        <h4>
                            <?php echo htmlspecialchars($row['name']); ?>
                        </h4>

                        <p>
                            Eksplorasi wisata Jawa Timur
                        </p>

                        <span class="card-arrow">
                            Jelajahi
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>

                    </div>

                </article>

                <?php
            }

            ?>

        </div>

    </div>

</section>



<!-- =========================================================
     PAKAIAN & BATIK
========================================================= -->

<section class="content-section">

    <div class="section">

        <div class="section-header">

            <div class="section-heading">

                <span class="eyebrow">
                    Identitas
                </span>

                <h2 class="section-title">
                    Pakaian & Batik
                </h2>

                <p class="section-subtitle">
                    Mengenal busana dan motif yang menjadi
                    bagian dari identitas budaya masyarakat
                    Jawa Timur.
                </p>

            </div>


            <a
                href="galeri.php?id=3"
                class="view-all"
            >
                Lihat semua
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>


        <div class="content-grid">

            <?php

            $res = mysqli_query($koneksi, "
                SELECT k.*, c.name AS city_name
                FROM konten k
                LEFT JOIN cities c ON k.city_id = c.id
                WHERE k.category_id = 3
                ORDER BY k.id DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {

                ?>

                <article
                    class="content-card searchable-item"
                    data-search="<?php echo htmlspecialchars($row['name'] . ' ' . ($row['city_name'] ?? '')); ?>"
                >

                    <div class="content-image-wrapper">

                        <img
                            class="content-image"
                            src="<?php echo htmlspecialchars($row['image_url']); ?>"
                            alt="<?php echo htmlspecialchars($row['name']); ?>"
                            loading="lazy"
                        >

                        <?php if (!empty($row['city_name'])): ?>

                            <span class="location-badge">
                                <i class="fa-solid fa-location-dot"></i>
                                <?php echo htmlspecialchars($row['city_name']); ?>
                            </span>

                        <?php endif; ?>

                    </div>


                    <div class="card-content">

                        <h4>
                            <?php echo htmlspecialchars($row['name']); ?>
                        </h4>

                        <p>
                            Pakaian & batik Jawa Timur
                        </p>

                        <span class="card-arrow">
                            Jelajahi
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>

                    </div>

                </article>

                <?php
            }

            ?>

        </div>

    </div>

</section>



<!-- =========================================================
     TRADISI
========================================================= -->

<section class="content-section">

    <div class="section">

        <div class="section-header">

            <div class="section-heading">

                <span class="eyebrow">
                    Warisan
                </span>

                <h2 class="section-title">
                    Tradisi Jawa Timur
                </h2>

                <p class="section-subtitle">
                    Cerita, ritual, dan kebiasaan yang menjadi
                    bagian dari perjalanan masyarakat Jawa Timur.
                </p>

            </div>


            <a
                href="galeri.php?id=4"
                class="view-all"
            >
                Lihat semua
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>


        <div class="content-grid">

            <?php

            $res = mysqli_query($koneksi, "
                SELECT k.*, c.name AS city_name
                FROM konten k
                LEFT JOIN cities c ON k.city_id = c.id
                WHERE k.category_id = 4
                ORDER BY k.id DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {

                ?>

                <article
                    class="content-card searchable-item"
                    data-search="<?php echo htmlspecialchars($row['name'] . ' ' . ($row['city_name'] ?? '')); ?>"
                >

                    <div class="content-image-wrapper">

                        <img
                            class="content-image"
                            src="<?php echo htmlspecialchars($row['image_url']); ?>"
                            alt="<?php echo htmlspecialchars($row['name']); ?>"
                            loading="lazy"
                        >

                        <?php if (!empty($row['city_name'])): ?>

                            <span class="location-badge">
                                <i class="fa-solid fa-location-dot"></i>
                                <?php echo htmlspecialchars($row['city_name']); ?>
                            </span>

                        <?php endif; ?>

                    </div>


                    <div class="card-content">

                        <h4>
                            <?php echo htmlspecialchars($row['name']); ?>
                        </h4>

                        <p>
                            Tradisi Jawa Timur
                        </p>

                        <span class="card-arrow">
                            Jelajahi
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>

                    </div>

                </article>

                <?php
            }

            ?>

        </div>

    </div>

</section>



<!-- =========================================================
     MINI GAME CTA
========================================================= -->

<section class="section game-section">

    <div class="game-card">

        <div class="game-content">

            <span class="eyebrow">
                Belajar sambil bermain
            </span>

            <h2 class="game-title">
                Seberapa kenal kamu
                dengan Jawa Timur?
            </h2>

            <p class="game-description">
                Uji pengetahuanmu tentang budaya Jawa Timur
                melalui mini game interaktif yang ringan dan
                menyenangkan.
            </p>

        </div>


        <a
            href="mini-game.php"
            class="game-button"
        >
            Main Sekarang
            <i class="fa-solid fa-gamepad"></i>
        </a>

    </div>

</section>



<?php include 'footer.php'; ?>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->






<script src="navbar.js"></script>

</body>
</html>