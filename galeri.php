<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $cat_id = intval($_GET['id']);
} else {
    echo "Kategori tidak ditemukan.";
    exit;
}

$kategori = [
    1 => "Wisata",
    2 => "Kuliner",
    3 => "Pakaian",
    4 => "Tradisi"
];

if (!isset($kategori[$cat_id])) {
    echo "Kategori tidak valid.";
    exit;
}

$judul_custom = $kategori[$cat_id];

$sql = "SELECT * FROM konten WHERE category_id = $cat_id ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql);

/*
|--------------------------------------------------------------------------
| Banner kategori
|--------------------------------------------------------------------------
| Gambar pertama dari kategori digunakan sebagai banner.
| Jadi ketika membuka:
| galeri.php?id=1  -> banner Wisata
| galeri.php?id=2  -> banner Kuliner
| galeri.php?id=3  -> banner Pakaian
| galeri.php?id=4  -> banner Tradisi
*/
$hero_image = '';
$total_konten = $result ? mysqli_num_rows($result) : 0;

if ($total_konten > 0) {
    $first_row = mysqli_fetch_assoc($result);
    $hero_image = $first_row['image_url'] ?? '';

    // Kembalikan pointer agar data tetap bisa digunakan saat looping.
    mysqli_data_seek($result, 0);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Galeri <?php echo htmlspecialchars($judul_custom); ?> - Swara Jatim
    </title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet"
    >

    <!-- Navbar & Footer Global -->
    <link rel="stylesheet" href="navbar-footer.css">

    <style>

        /* =========================================================
           GLOBAL
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

            --border: #e5ddd3;

            --radius-sm: 10px;
            --radius-md: 18px;
            --radius-lg: 28px;

            --shadow-sm:
                0 8px 25px rgba(36, 27, 22, 0.06);

            --shadow-md:
                0 16px 40px rgba(36, 27, 22, 0.10);

            --max-width: 1240px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            color: inherit;
        }


        /* =========================================================
           HERO / BANNER
           ========================================================= */

        .gallery-hero {
            position: relative;

            min-height: 360px;

            margin-top: 78px;

            display: flex;
            align-items: flex-end;

            overflow: hidden;

            background:
                linear-gradient(
                    90deg,
                    rgba(36, 27, 22, .94) 0%,
                    rgba(36, 27, 22, .72) 42%,
                    rgba(36, 27, 22, .22) 100%
                ),

                <?php
                if ($hero_image) {
                    echo "url('" .
                        htmlspecialchars($hero_image, ENT_QUOTES) .
                        "')";
                } else {
                    echo "linear-gradient(135deg, #3a2b23, #8f4e2d)";
                }
                ?>;

            background-size: cover;
            background-position: center;
        }

        .gallery-hero::after {
            content: '';

            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    0deg,
                    rgba(36, 27, 22, .38),
                    transparent 55%
                );

            pointer-events: none;
        }

        .hero-inner {
            position: relative;
            z-index: 2;

            width: min(
                100% - 48px,
                var(--max-width)
            );

            margin: 0 auto;

            padding: 46px 0 52px;

            color: #ffffff;
        }


        /* =========================================================
           BREADCRUMB
           ========================================================= */

        .breadcrumb {
            display: flex;
            align-items: center;

            gap: 9px;

            margin-bottom: 18px;

            font-size: .84rem;

            color: rgba(255, 255, 255, .82);
        }

        .breadcrumb a {
            text-decoration: none;
            transition: color .2s ease;
        }

        .breadcrumb a:hover {
            color: #ffffff;
        }

        .breadcrumb .separator {
            opacity: .5;
        }


        /* =========================================================
           HERO TEXT
           ========================================================= */

        .hero-kicker {
            display: inline-flex;
            align-items: center;

            gap: 8px;

            margin-bottom: 10px;

            color: #f0c98e;

            font-size: .78rem;
            font-weight: 700;

            letter-spacing: .12em;

            text-transform: uppercase;
        }

        .hero-kicker::before {
            content: '';

            width: 28px;
            height: 1px;

            background: #f0c98e;
        }

        .gallery-hero h1 {
            max-width: 720px;

            margin-bottom: 10px;

            font-family: 'Playfair Display', serif;

            font-size:
                clamp(
                    2.5rem,
                    5vw,
                    4.4rem
                );

            line-height: 1.04;

            letter-spacing: -.035em;
        }

        .gallery-hero p {
            max-width: 600px;

            color:
                rgba(255, 255, 255, .88);

            font-size: 1rem;
        }


        /* =========================================================
           MAIN CONTENT
           ========================================================= */

        .gallery-main {
            width: min(
                100% - 48px,
                var(--max-width)
            );

            margin: 0 auto;

            padding:
                38px 0 70px;
        }


        /* =========================================================
           CATEGORY TABS
           ========================================================= */

        .category-tabs {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 12px;

            margin-bottom: 38px;
        }

        .category-tab {
            display: flex;

            align-items: center;
            justify-content: center;

            min-height: 52px;

            padding:
                10px 18px;

            border:
                1px solid var(--border);

            border-radius: 999px;

            background:
                rgba(255, 255, 255, .68);

            color: var(--brown);

            font-size: .92rem;
            font-weight: 600;

            text-decoration: none;

            transition:
                transform .25s ease,
                background .25s ease,
                border-color .25s ease,
                box-shadow .25s ease;
        }

        .category-tab:hover {
            transform: translateY(-2px);

            border-color: var(--gold);

            background: #ffffff;

            box-shadow: var(--shadow-sm);
        }

        .category-tab.active {
            border-color: var(--brown);

            background: var(--brown);

            color: #ffffff;

            box-shadow:
                0 10px 24px
                rgba(107, 73, 53, .18);
        }


        /* =========================================================
           GALLERY HEADER
           ========================================================= */

        .gallery-heading {
            display: flex;

            align-items: flex-end;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 22px;
        }

        .gallery-heading .eyebrow {
            margin-bottom: 4px;

            color: var(--terracotta);

            font-size: .76rem;
            font-weight: 700;

            letter-spacing: .12em;

            text-transform: uppercase;
        }

        .gallery-heading h2 {
            font-family: 'Playfair Display', serif;

            color: var(--dark);

            font-size:
                clamp(
                    1.65rem,
                    3vw,
                    2.25rem
                );

            line-height: 1.2;
        }

        .gallery-count {
            flex-shrink: 0;

            color: var(--muted);

            font-size: .9rem;
        }


        /* =========================================================
           GALLERY GRID
           
           DESKTOP = 4 CARD PER BARIS
           ========================================================= */

        .gallery-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 24px;
        }


        /* =========================================================
           CARD
           ========================================================= */

        .gallery-card {
            min-width: 0;

            overflow: hidden;

            display: flex;
            flex-direction: column;

            border:
                1px solid
                rgba(229, 221, 211, .9);

            border-radius: var(--radius-md);

            background: var(--surface);

            box-shadow: var(--shadow-sm);

            cursor: pointer;

            animation:
                fadeInUp .5s ease both;

            transition:
                transform .28s ease,
                box-shadow .28s ease,
                border-color .28s ease;
        }

        .gallery-card:hover {
            transform: translateY(-6px);

            border-color: #d9c7b5;

            box-shadow: var(--shadow-md);
        }


        /* =========================================================
           CARD IMAGE
           ========================================================= */

        .card-image-wrapper {
            position: relative;

            height: 205px;

            overflow: hidden;

            background:
                var(--surface-soft);
        }

        .card-image-wrapper::after {
            content: '';

            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    180deg,
                    rgba(36, 27, 22, .05),
                    rgba(36, 27, 22, .16)
                );

            pointer-events: none;
        }

        .card-image-wrapper img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition:
                transform .5s ease;
        }

        .gallery-card:hover
        .card-image-wrapper img {
            transform: scale(1.05);
        }


        /* =========================================================
           CARD BADGE
           ========================================================= */

        .card-badge {
            position: absolute;

            z-index: 2;

            top: 14px;
            right: 14px;

            padding:
                6px 12px;

            border-radius: 999px;

            background:
                var(--terracotta);

            color: #ffffff;

            font-size: .68rem;
            font-weight: 700;

            letter-spacing: .05em;

            text-transform: uppercase;

            box-shadow:
                0 6px 16px
                rgba(184, 92, 56, .25);
        }


        /* =========================================================
           CARD CONTENT
           ========================================================= */

        .card-content {
            flex: 1;

            display: flex;
            flex-direction: column;

            padding:
                19px 19px 18px;
        }

        .card-content h3 {
            margin-bottom: 7px;

            color: var(--brown);

            font-family:
                'Playfair Display',
                serif;

            font-size: 1.18rem;

            line-height: 1.3;
        }

        .card-content p {
            display: -webkit-box;

            overflow: hidden;

            margin-bottom: 16px;

            color: var(--muted);

            font-size: .84rem;

            line-height: 1.65;

            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }


        /* =========================================================
           DETAIL BUTTON
           ========================================================= */

        .card-button {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            width: fit-content;

            margin-top: auto;

            color:
                var(--terracotta);

            font-size: .82rem;

            font-weight: 700;

            text-decoration: none;

            transition:
                gap .2s ease,
                color .2s ease;
        }

        .card-button::after {
            content: '→';

            font-size: 1.05rem;

            line-height: 1;
        }

        .card-button:hover {
            gap: 11px;

            color: var(--brown);
        }


        /* =========================================================
           EMPTY / SEARCH STATE
           ========================================================= */

        .empty-state,
        .no-results {
            grid-column: 1 / -1;

            padding: 60px 24px;

            border:
                1px dashed
                #d8cbbb;

            border-radius:
                var(--radius-md);

            background:
                rgba(255, 255, 255, .65);

            text-align: center;
        }

        .empty-state h3,
        .no-results h3 {
            margin-bottom: 8px;

            color: var(--dark);

            font-family:
                'Playfair Display',
                serif;

            font-size: 1.5rem;
        }

        .empty-state p,
        .no-results p {
            margin-bottom: 18px;

            color: var(--muted);

            font-size: .9rem;
        }

        .back-to-home {
            display: inline-flex;

            padding:
                10px 16px;

            border-radius: 999px;

            background:
                var(--brown);

            color: #ffffff;

            font-size: .85rem;
            font-weight: 600;

            text-decoration: none;
        }


        /* =========================================================
           ANIMATION
           ========================================================= */

        @keyframes fadeInUp {

            from {
                opacity: 0;

                transform:
                    translateY(12px);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0);
            }
        }


        /* =========================================================
           TABLET
           ========================================================= */

        @media (max-width: 1100px) {

            .gallery-grid {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }
        }


        /* =========================================================
           TABLET / NAVBAR BREAKPOINT
           ========================================================= */

        @media (max-width: 850px) {

            .gallery-hero {
                margin-top: 70px;

                min-height: 330px;
            }

            .hero-inner,
            .gallery-main {
                width:
                    min(
                        100% - 36px,
                        var(--max-width)
                    );
            }

            .category-tabs {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }
        }


        /* =========================================================
           SMALL TABLET
           ========================================================= */

        @media (max-width: 700px) {

            .gallery-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                gap: 16px;
            }

            .card-image-wrapper {
                height: 180px;
            }

            .card-content {
                padding: 16px;
            }

            .gallery-heading {
                align-items: flex-start;

                flex-direction: column;

                gap: 5px;
            }
        }


        /* =========================================================
           MOBILE
           ========================================================= */

        @media (max-width: 520px) {

            .gallery-hero {
                min-height: 300px;
            }

            .hero-inner {
                padding:
                    35px 0 38px;
            }

            .gallery-hero h1 {
                font-size: 2.35rem;
            }

            .gallery-hero p {
                font-size: .9rem;
            }

            .gallery-main {
                padding-top: 26px;
                padding-bottom: 50px;
            }

            .category-tabs {
                grid-template-columns: 1fr;

                gap: 8px;

                margin-bottom: 30px;
            }

            .category-tab {
                min-height: 46px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .card-image-wrapper {
                height: 220px;
            }
        }

    </style>
</head>


<body>

    <!-- =====================================================
         NAVBAR GLOBAL
         Jangan dibuat ulang di halaman ini.
         ===================================================== -->

    <?php include 'navbar.php'; ?>


    <main>

        <!-- =====================================================
             HERO / BANNER KATEGORI
             ===================================================== -->

        <section class="gallery-hero">

            <div class="hero-inner">

                <div class="breadcrumb">

                    <a href="index.php">
                        Beranda
                    </a>

                    <span class="separator">
                        ›
                    </span>

                    <span>
                        Galeri
                    </span>

                    <span class="separator">
                        ›
                    </span>

                    <span>
                        <?php echo htmlspecialchars($judul_custom); ?>
                    </span>

                </div>


                <div class="hero-kicker">
                    Swara Jatim
                </div>


                <h1>
                    Galeri
                    <?php echo htmlspecialchars($judul_custom); ?>
                </h1>


                <p>
                    Jelajahi koleksi
                    <?php echo strtolower(htmlspecialchars($judul_custom)); ?>
                    khas Jawa Timur, dari cerita lokal hingga warisan
                    yang masih hidup sampai sekarang.
                </p>

            </div>

        </section>


        <!-- =====================================================
             CONTENT GALERI
             ===================================================== -->

        <section class="gallery-main">


            <!-- =================================================
                 CATEGORY NAVIGATION
                 ================================================= -->

            <nav
                class="category-tabs"
                aria-label="Kategori galeri"
            >

                <?php foreach ($kategori as $id => $nama): ?>

                    <a
                        href="galeri.php?id=<?php echo $id; ?>"
                        class="category-tab
                        <?php echo $id === $cat_id ? 'active' : ''; ?>"
                    >

                        <?php echo htmlspecialchars($nama); ?>

                        <?php
                        if ($nama === 'Pakaian') {
                            echo ' & Batik';
                        }
                        ?>

                    </a>

                <?php endforeach; ?>

            </nav>


            <!-- =================================================
                 HEADER GALERI
                 ================================================= -->

            <div class="gallery-heading">

                <div>

                    <div class="eyebrow">
                        Koleksi
                        <?php echo htmlspecialchars($judul_custom); ?>
                    </div>

                    <h2>
                        Temukan cerita di balik setiap karya
                    </h2>

                </div>


                <div class="gallery-count">

                    Menampilkan
                    <?php echo $total_konten; ?>

                    <?php echo strtolower(
                        htmlspecialchars($judul_custom)
                    ); ?>

                </div>

            </div>


            <!-- =================================================
                 4 COLUMN CARD GRID
                 ================================================= -->

            <div
                class="gallery-grid"
                id="galleryGrid"
            >

                <?php if ($total_konten > 0): ?>

                    <?php

                    $index = 0;

                    while (
                        $row = mysqli_fetch_assoc($result)
                    ):

                        $description =
                            $row['description'] ?? '';

                        $sentences =
                            preg_split(
                                '/(?<=[.!?])\s+/',
                                $description,
                                3
                            );

                        $preview =
                            isset($sentences[0])
                                ? $sentences[0]
                                : '';

                        if (isset($sentences[1])) {
                            $preview .=
                                ' ' . $sentences[1];
                        }

                    ?>

                        <article
                            class="gallery-card"

                            style="
                                animation-delay:
                                <?php
                                echo min(
                                    $index * 0.05,
                                    0.4
                                );
                                ?>s
                            "

                            data-title="<?php
                                echo htmlspecialchars(
                                    strtolower(
                                        $row['name']
                                    ),
                                    ENT_QUOTES
                                );
                            ?>"

                            data-content="<?php
                                echo htmlspecialchars(
                                    strtolower(
                                        strip_tags(
                                            $description
                                        )
                                    ),
                                    ENT_QUOTES
                                );
                            ?>"
                        >


                            <!-- IMAGE -->

                            <div class="card-image-wrapper">

                                <img
                                    src="<?php
                                        echo htmlspecialchars(
                                            $row['image_url'],
                                            ENT_QUOTES
                                        );
                                    ?>"

                                    alt="<?php
                                        echo htmlspecialchars(
                                            $row['name']
                                        );
                                    ?>"

                                    loading="lazy"
                                >


                                <span class="card-badge">

                                    <?php
                                    echo htmlspecialchars(
                                        $judul_custom
                                    );
                                    ?>

                                </span>

                            </div>


                            <!-- CONTENT -->

                            <div class="card-content">

                                <h3>
                                    <?php
                                    echo htmlspecialchars(
                                        $row['name']
                                    );
                                    ?>
                                </h3>


                                <p>
                                    <?php
                                    echo htmlspecialchars(
                                        $preview
                                    );
                                    ?>
                                </p>


                                <a
                                    href="detail.php?id=<?php
                                        echo (int) $row['id'];
                                    ?>"

                                    class="card-button"
                                >
                                    Lihat Detail
                                </a>

                            </div>

                        </article>


                    <?php

                        $index++;

                    endwhile;

                    ?>


                <?php else: ?>


                    <!-- EMPTY STATE -->

                    <div class="empty-state">

                        <h3>
                            Belum Ada Konten
                        </h3>

                        <p>

                            Maaf, belum ada artikel di
                            kategori
                            <?php
                            echo htmlspecialchars(
                                $judul_custom
                            );
                            ?>
                            saat ini.

                        </p>


                        <a
                            href="index.php"
                            class="back-to-home"
                        >
                            Kembali ke Beranda
                        </a>

                    </div>


                <?php endif; ?>

            </div>

        </section>

    </main>


    <!-- =====================================================
         FOOTER GLOBAL
         Jangan dibuat ulang di halaman ini.
         ===================================================== -->

    <?php include 'footer.php'; ?>


    <!-- =====================================================
         NAVBAR JAVASCRIPT GLOBAL
         ===================================================== -->

    <script src="navbar.js"></script>


    <!-- =====================================================
         GALERI SEARCH
         ===================================================== -->

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {

                const searchInput =
                    document.getElementById(
                        'searchInput'
                    );

                const galleryGrid =
                    document.getElementById(
                        'galleryGrid'
                    );

                const galleryCards =
                    document.querySelectorAll(
                        '.gallery-card'
                    );


                if (
                    !searchInput ||
                    !galleryGrid ||
                    galleryCards.length === 0
                ) {
                    return;
                }


                function performSearch() {

                    const searchTerm =
                        searchInput.value
                            .toLowerCase()
                            .trim();

                    let visibleCount = 0;


                    galleryCards.forEach(
                        card => {

                            const title =
                                card.getAttribute(
                                    'data-title'
                                ) || '';

                            const content =
                                card.getAttribute(
                                    'data-content'
                                ) || '';


                            const matched =
                                searchTerm === '' ||
                                title.includes(
                                    searchTerm
                                ) ||
                                content.includes(
                                    searchTerm
                                );


                            card.style.display =
                                matched
                                    ? 'flex'
                                    : 'none';


                            if (matched) {
                                visibleCount++;
                            }

                        }
                    );


                    const existingNoResults =
                        galleryGrid.querySelector(
                            '.no-results'
                        );


                    if (existingNoResults) {
                        existingNoResults.remove();
                    }


                    if (
                        visibleCount === 0 &&
                        searchTerm !== ''
                    ) {

                        const noResultsDiv =
                            document.createElement(
                                'div'
                            );


                        noResultsDiv.className =
                            'no-results';


                        noResultsDiv.innerHTML = `

                            <h3>
                                Tidak Ada Hasil
                            </h3>

                            <p>
                                Coba gunakan kata kunci
                                yang berbeda atau hapus
                                pencarian Anda.
                            </p>

                        `;


                        galleryGrid.appendChild(
                            noResultsDiv
                        );

                    }

                }


                function clearSearch() {

                    searchInput.value = '';

                    performSearch();

                    searchInput.focus();

                }


                /* Search ketika mengetik */

                searchInput.addEventListener(
                    'input',
                    performSearch
                );


                /* Escape untuk clear search */

                searchInput.addEventListener(
                    'keyup',
                    function (e) {

                        if (e.key === 'Escape') {
                            clearSearch();
                        }

                    }
                );


                /* Ctrl + K / Command + K */

                document.addEventListener(
                    'keydown',
                    function (e) {

                        if (
                            (e.ctrlKey || e.metaKey) &&
                            e.key.toLowerCase() === 'k'
                        ) {

                            e.preventDefault();

                            searchInput.focus();

                        }

                    }
                );


                /* Card dapat diklik */

                galleryCards.forEach(
                    card => {

                        card.addEventListener(
                            'click',
                            function (e) {

                                if (
                                    e.target.closest('a')
                                ) {
                                    return;
                                }


                                const link =
                                    this.querySelector(
                                        '.card-button'
                                    );


                                if (link) {

                                    window.location.href =
                                        link.href;

                                }

                            }
                        );

                    }
                );

            }
        );

    </script>

</body>

</html>