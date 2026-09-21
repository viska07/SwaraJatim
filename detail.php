<?php

include "koneksi.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {

    $query = "SELECT * FROM konten WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        $kategori = [
            1 => "Wisata",
            2 => "Kuliner",
            3 => "Pakaian & Batik",
            4 => "Tradisi"
        ];

        $category_id = isset($row['category_id'])
            ? intval($row['category_id'])
            : 0;

        $category_name = $kategori[$category_id]
            ?? "Budaya Jawa Timur";

        $title = $row['name'] ?? "Tanpa Judul";
        $description = $row['description'] ?? "";
        $image_url = $row['image_url'] ?? "";

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
                <?php echo htmlspecialchars($title); ?>
                - Swara Jatim
            </title>


            <!-- Google Fonts -->

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


            <!-- GLOBAL NAVBAR + FOOTER -->

            <link
                rel="stylesheet"
                href="navbar-footer.css"
            >


            <style>

                /* =====================================================
                   DETAIL PAGE
                   ===================================================== */

                :root {

                    --detail-bg: #f8f5ef;
                    --detail-surface: #ffffff;
                    --detail-soft: #f2ede5;

                    --detail-dark: #241b16;
                    --detail-brown: #6b4935;
                    --detail-terracotta: #b85c38;
                    --detail-gold: #c99a5b;

                    --detail-text: #332a25;
                    --detail-muted: #756b63;

                    --detail-border: #e5ddd3;

                    --detail-radius: 24px;

                    --detail-shadow:
                        0 18px 50px
                        rgba(36, 27, 22, .09);

                }


                /* =====================================================
                   BODY
                   ===================================================== */

                .detail-page {

                    min-height: 100vh;

                    background:
                        var(--detail-bg);

                    color:
                        var(--detail-text);

                    font-family:
                        "DM Sans",
                        sans-serif;

                }


                /* =====================================================
                   MAIN
                   ===================================================== */

                .detail-main {

                    width:
                        min(
                            calc(100% - 48px),
                            1180px
                        );

                    margin:
                        0 auto;

                    padding:
                        128px 0 80px;

                }


                /* =====================================================
                   BREADCRUMB
                   ===================================================== */

                .detail-breadcrumb {

                    display: flex;

                    align-items: center;

                    flex-wrap: wrap;

                    gap: 9px;

                    margin-bottom: 30px;

                    color:
                        var(--detail-muted);

                    font-size: .82rem;

                }


                .detail-breadcrumb a {

                    color:
                        var(--detail-brown);

                    text-decoration: none;

                    font-weight: 600;

                    transition:
                        color .2s ease;

                }


                .detail-breadcrumb a:hover {

                    color:
                        var(--detail-terracotta);

                }


                .detail-breadcrumb .separator {

                    color:
                        #b9afa5;

                }


                /* =====================================================
                   ARTICLE CARD
                   ===================================================== */

                .detail-card {

                    display: grid;

                    grid-template-columns:
                        minmax(0, 1fr)
                        minmax(0, 1fr);

                    min-height:
                        560px;

                    overflow: hidden;

                    border:
                        1px solid
                        var(--detail-border);

                    border-radius:
                        var(--detail-radius);

                    background:
                        var(--detail-surface);

                    box-shadow:
                        var(--detail-shadow);

                }


                /* =====================================================
                   IMAGE
                   ===================================================== */

                .detail-image {

                    position: relative;

                    min-height: 560px;

                    overflow: hidden;

                    background:
                        var(--detail-soft);

                }


                .detail-image img {

                    width: 100%;
                    height: 100%;

                    display: block;

                    object-fit: cover;

                    transition:
                        transform .6s ease;

                }


                .detail-card:hover
                .detail-image img {

                    transform:
                        scale(1.025);

                }


                /* Overlay */

                .detail-image::after {

                    content: "";

                    position: absolute;

                    inset: 0;

                    pointer-events: none;

                    background:
                        linear-gradient(
                            180deg,
                            rgba(36,27,22,.02),
                            rgba(36,27,22,.16)
                        );

                }


                /* =====================================================
                   CATEGORY BADGE
                   ===================================================== */

                .detail-category {

                    position: absolute;

                    z-index: 2;

                    top: 24px;
                    left: 24px;

                    display: inline-flex;

                    align-items: center;

                    gap: 8px;

                    padding:
                        8px 14px;

                    border-radius:
                        999px;

                    background:
                        rgba(255,255,255,.94);

                    color:
                        var(--detail-terracotta);

                    box-shadow:
                        0 8px 24px
                        rgba(36,27,22,.13);

                    font-size: .72rem;

                    font-weight: 700;

                    letter-spacing:
                        .06em;

                    text-transform:
                        uppercase;

                    backdrop-filter:
                        blur(8px);

                }


                .detail-category::before {

                    content: "";

                    width: 6px;
                    height: 6px;

                    border-radius: 50%;

                    background:
                        var(--detail-terracotta);

                }


                /* =====================================================
                   CONTENT
                   ===================================================== */

                .detail-content {

                    display: flex;

                    flex-direction: column;

                    justify-content: center;

                    padding:
                        56px 58px;

                }


                .detail-eyebrow {

                    margin-bottom: 13px;

                    color:
                        var(--detail-terracotta);

                    font-size: .75rem;

                    font-weight: 700;

                    letter-spacing:
                        .13em;

                    text-transform:
                        uppercase;

                }


                .detail-content h1 {

                    max-width:
                        560px;

                    margin:
                        0 0 22px;

                    color:
                        var(--detail-dark);

                    font-family:
                        "Playfair Display",
                        Georgia,
                        serif;

                    font-size:
                        clamp(
                            2rem,
                            4vw,
                            3.4rem
                        );

                    line-height:
                        1.12;

                    letter-spacing:
                        -.035em;

                }


                /* Decorative line */

                .detail-line {

                    width: 48px;
                    height: 3px;

                    margin-bottom: 25px;

                    border-radius:
                        999px;

                    background:
                        var(--detail-gold);

                }


                .detail-description {

                    max-width:
                        600px;

                    color:
                        var(--detail-muted);

                    font-size:
                        .96rem;

                    line-height:
                        1.85;

                }


                .detail-description p {

                    margin:
                        0 0 17px;

                }


                /* =====================================================
                   ACTION
                   ===================================================== */

                .detail-actions {

                    display: flex;

                    align-items: center;

                    gap: 13px;

                    margin-top: 30px;

                }


                .back-btn {

                    display: inline-flex;

                    align-items: center;

                    justify-content: center;

                    gap: 9px;

                    min-height: 46px;

                    padding:
                        0 20px;

                    border:
                        1px solid
                        var(--detail-brown);

                    border-radius:
                        999px;

                    background:
                        var(--detail-brown);

                    color:
                        #ffffff;

                    text-decoration: none;

                    font-size: .84rem;

                    font-weight: 700;

                    transition:
                        transform .22s ease,
                        background .22s ease,
                        box-shadow .22s ease;

                }


                .back-btn:hover {

                    transform:
                        translateY(-2px);

                    background:
                        var(--detail-dark);

                    box-shadow:
                        0 10px 22px
                        rgba(36,27,22,.15);

                }


                .back-btn-arrow {

                    font-size:
                        1.05rem;

                    line-height: 1;

                }


                /* =====================================================
                   SECONDARY LINK
                   ===================================================== */

                .gallery-link {

                    display: inline-flex;

                    align-items: center;

                    justify-content: center;

                    min-height: 46px;

                    padding:
                        0 18px;

                    border:
                        1px solid
                        var(--detail-border);

                    border-radius:
                        999px;

                    background:
                        transparent;

                    color:
                        var(--detail-brown);

                    text-decoration: none;

                    font-size: .84rem;

                    font-weight: 600;

                    transition:
                        background .2s ease,
                        border-color .2s ease;

                }


                .gallery-link:hover {

                    border-color:
                        #d3c2b1;

                    background:
                        var(--detail-soft);

                }


                /* =====================================================
                   ARTICLE NOT FOUND
                   ===================================================== */

                .detail-not-found {

                    min-height:
                        calc(100vh - 208px);

                    display: flex;

                    align-items: center;

                    justify-content: center;

                    padding:
                        120px 20px 80px;

                    text-align: center;

                }


                .not-found-card {

                    width:
                        min(
                            100%,
                            520px
                        );

                    padding:
                        50px 35px;

                    border:
                        1px solid
                        var(--detail-border);

                    border-radius:
                        var(--detail-radius);

                    background:
                        #ffffff;

                    box-shadow:
                        var(--detail-shadow);

                }


                .not-found-icon {

                    width: 58px;
                    height: 58px;

                    margin:
                        0 auto 20px;

                    display: flex;

                    align-items: center;
                    justify-content: center;

                    border-radius: 50%;

                    background:
                        var(--detail-soft);

                    color:
                        var(--detail-terracotta);

                    font-size: 1.4rem;

                }


                .not-found-card h1 {

                    margin-bottom:
                        10px;

                    color:
                        var(--detail-dark);

                    font-family:
                        "Playfair Display",
                        Georgia,
                        serif;

                    font-size:
                        1.8rem;

                }


                .not-found-card p {

                    margin-bottom:
                        24px;

                    color:
                        var(--detail-muted);

                    font-size:
                        .9rem;

                }


                /* =====================================================
                   RESPONSIVE
                   ===================================================== */

                @media (max-width: 900px) {

                    .detail-main {

                        width:
                            min(
                                calc(100% - 36px),
                                1180px
                            );

                        padding:
                            108px 0 60px;

                    }


                    .detail-card {

                        grid-template-columns:
                            1fr;

                    }


                    .detail-image {

                        min-height:
                            430px;

                        height:
                            430px;

                    }


                    .detail-content {

                        padding:
                            42px;

                    }

                }


                @media (max-width: 600px) {

                    .detail-main {

                        width:
                            calc(100% - 32px);

                        padding:
                            96px 0 48px;

                    }


                    .detail-breadcrumb {

                        margin-bottom:
                            20px;

                        font-size:
                            .76rem;

                    }


                    .detail-card {

                        border-radius:
                            19px;

                    }


                    .detail-image {

                        min-height:
                            300px;

                        height:
                            300px;

                    }


                    .detail-category {

                        top: 16px;
                        left: 16px;

                        padding:
                            7px 11px;

                        font-size:
                            .65rem;

                    }


                    .detail-content {

                        padding:
                            32px 25px 30px;

                    }


                    .detail-content h1 {

                        margin-bottom:
                            18px;

                        font-size:
                            2rem;

                    }


                    .detail-description {

                        font-size:
                            .88rem;

                        line-height:
                            1.75;

                    }


                    .detail-actions {

                        align-items:
                            stretch;

                        flex-direction:
                            column;

                    }


                    .back-btn,
                    .gallery-link {

                        width: 100%;

                    }

                }

            </style>

        </head>


        <body>

            <div class="detail-page">


                <!-- =================================================
                     GLOBAL NAVBAR
                     ================================================= -->

                <?php include 'navbar.php'; ?>


                <main class="detail-main">


                    <!-- =================================================
                         BREADCRUMB
                         ================================================= -->

                    <div class="detail-breadcrumb">

                        <a href="index.php">
                            Beranda
                        </a>

                        <span class="separator">
                            /
                        </span>

                        <a
                            href="galeri.php?id=<?php
                                echo $category_id;
                            ?>"
                        >
                            <?php
                            echo htmlspecialchars(
                                $category_name
                            );
                            ?>
                        </a>

                        <span class="separator">
                            /
                        </span>

                        <span>
                            Detail
                        </span>

                    </div>


                    <!-- =================================================
                         ARTICLE
                         ================================================= -->

                    <article class="detail-card">


                        <!-- IMAGE -->

                        <div class="detail-image">

                            <span class="detail-category">

                                <?php
                                echo htmlspecialchars(
                                    $category_name
                                );
                                ?>

                            </span>


                            <?php if (!empty($image_url)): ?>

                                <img
                                    src="<?php
                                        echo htmlspecialchars(
                                            $image_url,
                                            ENT_QUOTES
                                        );
                                    ?>"
                                    alt="<?php
                                        echo htmlspecialchars(
                                            $title,
                                            ENT_QUOTES
                                        );
                                    ?>"
                                >

                            <?php else: ?>

                                <div
                                    style="
                                        width:100%;
                                        height:100%;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        color:#756b63;
                                        font-size:.9rem;
                                    "
                                >
                                    Gambar tidak tersedia
                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- CONTENT -->

                        <div class="detail-content">

                            <div class="detail-eyebrow">

                                Mengenal Jawa Timur

                            </div>


                            <h1>

                                <?php
                                echo htmlspecialchars(
                                    $title
                                );
                                ?>

                            </h1>


                            <div class="detail-line"></div>


                            <div class="detail-description">

                                <?php
                                echo nl2br(
                                    htmlspecialchars(
                                        $description
                                    )
                                );
                                ?>

                            </div>


                            <div class="detail-actions">

                                <a
                                    class="back-btn"
                                    href="galeri.php?id=<?php
                                        echo $category_id;
                                    ?>"
                                >

                                    <span
                                        class="back-btn-arrow"
                                    >
                                        ←
                                    </span>

                                    Kembali ke Galeri

                                </a>


                                <a
                                    class="gallery-link"
                                    href="galeri.php?id=<?php
                                        echo $category_id;
                                    ?>"
                                >
                                    Lihat Koleksi
                                </a>

                            </div>

                        </div>

                    </article>

                </main>


                <!-- =================================================
                     GLOBAL FOOTER
                     ================================================= -->

                <?php include 'footer.php'; ?>


            </div>


            <!-- GLOBAL NAVBAR JS -->

            <script src="navbar.js"></script>

        </body>

        </html>

        <?php

    } else {

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
                Artikel Tidak Ditemukan - Swara Jatim
            </title>

            <link
                href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
                rel="stylesheet"
            >

            <link
                rel="stylesheet"
                href="navbar-footer.css"
            >

        </head>

        <body>

            <?php include 'navbar.php'; ?>


            <main
                class="detail-not-found"
                style="
                    min-height:60vh;
                    background:#f8f5ef;
                    padding-top:140px;
                "
            >

                <div class="not-found-card">

                    <div class="not-found-icon">
                        !
                    </div>

                    <h1>
                        Artikel Tidak Ditemukan
                    </h1>

                    <p>
                        Artikel yang kamu cari tidak tersedia
                        atau mungkin sudah dipindahkan.
                    </p>

                    <a
                        href="index.php"
                        class="back-btn"
                    >
                        ← Kembali ke Beranda
                    </a>

                </div>

            </main>


            <?php include 'footer.php'; ?>


            <script src="navbar.js"></script>

        </body>

        </html>

        <?php

    }

} else {

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
            ID Tidak Valid - Swara Jatim
        </title>

        <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        >

        <link
            rel="stylesheet"
            href="navbar-footer.css"
        >

    </head>

    <body>

        <?php include 'navbar.php'; ?>


        <main
            class="detail-not-found"
            style="
                min-height:60vh;
                background:#f8f5ef;
                padding-top:140px;
            "
        >

            <div class="not-found-card">

                <div class="not-found-icon">
                    !
                </div>

                <h1>
                    ID Artikel Tidak Valid
                </h1>

                <p>
                    Halaman detail tidak dapat dibuka
                    karena ID artikel tidak valid.
                </p>

                <a
                    href="index.php"
                    class="back-btn"
                >
                    ← Kembali ke Beranda
                </a>

            </div>

        </main>


        <?php include 'footer.php'; ?>


        <script src="navbar.js"></script>

    </body>

    </html>

    <?php

}

?>