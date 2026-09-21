(function () {

    'use strict';


    function initNavbar() {

        const burger =
            document.getElementById('burgerMenu');

        const menu =
            document.getElementById('navMenuWrapper');

        const navLinks =
            document.querySelectorAll('#navMenu a');

        const searchInput =
            document.getElementById('searchInput');

        const searchClear =
            document.getElementById('searchClear');


        /* =====================================================
           MOBILE MENU
        ===================================================== */

        function closeMenu() {

            if (!burger || !menu) {
                return;
            }

            burger.classList.remove('active');

            menu.classList.remove('active');

            burger.setAttribute(
                'aria-expanded',
                'false'
            );
        }


        if (burger && menu) {

            burger.addEventListener(
                'click',
                function (event) {

                    event.stopPropagation();

                    const isOpen =
                        menu.classList.toggle(
                            'active'
                        );

                    burger.classList.toggle(
                        'active',
                        isOpen
                    );

                    burger.setAttribute(
                        'aria-expanded',
                        isOpen
                            ? 'true'
                            : 'false'
                    );

                }
            );

        }


        navLinks.forEach(function (link) {

            link.addEventListener(
                'click',
                function () {
                    closeMenu();
                }
            );

        });


        document.addEventListener(
            'click',
            function (event) {

                if (
                    !menu ||
                    !menu.classList.contains(
                        'active'
                    )
                ) {
                    return;
                }


                if (
                    !event.target.closest(
                        '.nav-container'
                    )
                ) {

                    closeMenu();

                }

            }
        );


        document.addEventListener(
            'keydown',
            function (event) {

                if (event.key === 'Escape') {
                    closeMenu();
                }

            }
        );


        window.addEventListener(
            'resize',
            function () {

                if (window.innerWidth > 850) {
                    closeMenu();
                }

            }
        );


        /* =====================================================
           SEARCH
        ===================================================== */

        if (!searchInput) {
            return;
        }


        const page =
            (
                window.location.pathname
                    .split('/')
                    .pop() ||
                'index.php'
            ).toLowerCase();


        const isHome =
            page === 'index.php' ||
            page === '';


        const isGallery =
            page === 'galeri.php';


        const searchableItems =
            document.querySelectorAll(
                '.searchable-item'
            );


        const galleryCards =
            document.querySelectorAll(
                '.gallery-card'
            );


        const galleryEmpty =
            document.getElementById(
                'galleryEmpty'
            );


        function updateClearButton() {

            if (!searchClear) {
                return;
            }

            searchClear.hidden =
                searchInput.value.trim() === '';

        }


        function filterHome(keyword) {

            if (!searchableItems.length) {
                return;
            }


            let visible = 0;


            searchableItems.forEach(
                function (item) {

                    const text = (
                        item.dataset.search ||
                        item.textContent ||
                        ''
                    ).toLowerCase();


                    const match =
                        keyword === '' ||
                        text.includes(keyword);


                    item.style.display =
                        match
                            ? ''
                            : 'none';


                    if (match) {
                        visible++;
                    }

                }
            );


            if (galleryEmpty) {

                galleryEmpty.style.display =
                    keyword !== '' &&
                    visible === 0
                        ? 'block'
                        : 'none';

            }

        }


        function filterGallery(keyword) {

            if (!galleryCards.length) {
                return;
            }


            let visible = 0;


            galleryCards.forEach(
                function (card) {

                    const title =
                        (
                            card.dataset.title ||
                            ''
                        ).toLowerCase();


                    const content =
                        (
                            card.dataset.content ||
                            ''
                        ).toLowerCase();


                    const match =
                        keyword === '' ||
                        title.includes(keyword) ||
                        content.includes(keyword);


                    card.style.display =
                        match
                            ? 'flex'
                            : 'none';


                    if (match) {
                        visible++;
                    }

                }
            );


            const old =
                document.getElementById(
                    'navbarNoResults'
                );


            if (old) {
                old.remove();
            }


            if (
                keyword !== '' &&
                visible === 0
            ) {

                const grid =
                    document.getElementById(
                        'galleryGrid'
                    );


                if (!grid) {
                    return;
                }


                const box =
                    document.createElement(
                        'div'
                    );


                box.id =
                    'navbarNoResults';


                box.className =
                    'no-results';


                box.innerHTML = `
                    <h3>Tidak Ada Hasil</h3>
                    <p>
                        Coba gunakan kata kunci
                        yang berbeda.
                    </p>
                `;


                grid.appendChild(box);

            }

        }


        function performSearch() {

            const keyword =
                searchInput.value
                    .toLowerCase()
                    .trim();


            updateClearButton();


            if (isHome) {

                filterHome(keyword);

                return;

            }


            if (isGallery) {

                filterGallery(keyword);

            }

        }


        searchInput.addEventListener(
            'input',
            performSearch
        );


        searchInput.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key !== 'Enter'
                ) {
                    return;
                }


                const keyword =
                    searchInput.value.trim();


                if (!keyword) {
                    return;
                }


                /*
                 * Dari halaman selain Home/Galeri,
                 * pencarian dibawa ke Home.
                 */

                if (
                    !isHome &&
                    !isGallery
                ) {

                    window.location.href =
                        'index.php?search=' +
                        encodeURIComponent(
                            keyword
                        ) +
                        '#galeri';

                }

            }
        );


        if (searchClear) {

            searchClear.addEventListener(
                'click',
                function () {

                    searchInput.value = '';

                    performSearch();

                    searchInput.focus();

                }
            );

        }


        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    (event.ctrlKey ||
                     event.metaKey) &&
                    event.key.toLowerCase() === 'k'
                ) {

                    event.preventDefault();

                    searchInput.focus();

                }


                if (
                    event.key === 'Escape' &&
                    document.activeElement ===
                        searchInput
                ) {

                    searchInput.value = '';

                    performSearch();

                }

            }
        );


        /*
         * Ambil search dari URL.
         * Contoh:
         * index.php?search=bromo#galeri
         */

        if (isHome) {

            const params =
                new URLSearchParams(
                    window.location.search
                );


            const initialSearch =
                params.get('search');


            if (initialSearch) {

                searchInput.value =
                    initialSearch;


                performSearch();


                const gallerySection =
                    document.getElementById(
                        'galeri'
                    );


                if (gallerySection) {

                    setTimeout(
                        function () {

                            gallerySection.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });

                        },
                        100
                    );

                }

            }

        }

    }


    if (
        document.readyState ===
        'loading'
    ) {

        document.addEventListener(
            'DOMContentLoaded',
            initNavbar
        );

    } else {

        initNavbar();

    }

})();