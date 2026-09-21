<?php
$current_page = basename($_SERVER['PHP_SELF'] ?? '');

$is_home = $current_page === 'index.php';
$is_gallery = $current_page === 'galeri.php';
$is_game = in_array($current_page, ['mini-game.php', 'quiz.php'], true);
?>

<header class="header" id="siteHeader">

    <div class="nav-container">

        <a
            class="logo"
            href="index.php"
            aria-label="Swara Jatim - Beranda"
        >
            <span class="logo-main">Swara</span>
            <span class="logo-accent">Jatim</span>
        </a>


        <div class="search-container">

            <div class="search-box-wrapper">

                <svg
                    class="search-icon"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <circle cx="11" cy="11" r="6.5"></circle>
                    <path d="M16 16L21 21"></path>
                </svg>


                <input
                    type="search"
                    id="searchInput"
                    class="search-box"
                    placeholder="Cari budaya, wisata, tradisi..."
                    autocomplete="off"
                    aria-label="Cari budaya, wisata, tradisi"
                >


                <button
                    type="button"
                    class="search-clear"
                    id="searchClear"
                    aria-label="Hapus pencarian"
                    hidden
                >
                    <span></span>
                    <span></span>
                </button>

            </div>

        </div>


        <button
            class="burger-menu"
            id="burgerMenu"
            type="button"
            aria-label="Buka menu"
            aria-controls="navMenuWrapper"
            aria-expanded="false"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>


        <nav
            class="nav-menu-wrapper"
            id="navMenuWrapper"
            aria-label="Navigasi utama"
        >

            <ul class="nav-menu" id="navMenu">

                <li>
                    <a
                        href="index.php"
                        class="<?php echo $is_home ? 'active' : ''; ?>"
                    >
                        Beranda
                    </a>
                </li>


                <li>
                    <a
                        href="galeri.php?id=1"
                        class="<?php echo $is_gallery ? 'active' : ''; ?>"
                    >
                        Galeri
                    </a>
                </li>


                <li>
                    <a href="index.php#ai-assistant">
                        Swara AI
                    </a>
                </li>


                <li>
                    <a
                        href="mini-game.php"
                        class="<?php echo $is_game ? 'active' : ''; ?>"
                    >
                        Mini Game
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</header>