/* MagangKu — perilaku bersama: menu mobile, sidebar, tampil/sembunyi password */
(function () {
    'use strict';

    var tombolMenu = document.getElementById('tombolMenu');
    var menuUtama = document.getElementById('menuUtama');
    if (tombolMenu && menuUtama) {
        tombolMenu.addEventListener('click', function () {
            var buka = menuUtama.classList.toggle('terbuka');
            tombolMenu.setAttribute('aria-expanded', String(buka));
        });
    }

    var tombolSidebar = document.getElementById('tombolSidebar');
    var sidebar = document.getElementById('sidebar');
    if (tombolSidebar && sidebar) {
        tombolSidebar.addEventListener('click', function (e) {
            e.stopPropagation();
            sidebar.classList.toggle('terbuka');
        });
        document.addEventListener('click', function (e) {
            if (sidebar.classList.contains('terbuka') && !sidebar.contains(e.target)) {
                sidebar.classList.remove('terbuka');
            }
        });
    }

    document.querySelectorAll('[data-toggle-sandi]').forEach(function (tombol) {
        tombol.addEventListener('click', function () {
            var input = document.querySelector(tombol.getAttribute('data-toggle-sandi'));
            if (!input) { return; }
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    });
})();
