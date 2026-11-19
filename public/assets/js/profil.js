/* MagangKu — tab profil mahasiswa */
(function () {
    'use strict';

    var tombol = document.querySelectorAll('.tab button');
    var isi = document.querySelectorAll('.tab-isi');
    tombol.forEach(function (t) {
        t.addEventListener('click', function () {
            tombol.forEach(function (x) { x.classList.toggle('aktif', x === t); });
            isi.forEach(function (p) { p.hidden = p.dataset.panel !== t.dataset.tab; });
        });
    });
})();
