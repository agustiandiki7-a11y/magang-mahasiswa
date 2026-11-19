/* MagangKu — pencarian & filter daftar lowongan (sisi klien) */
(function () {
    'use strict';

    var kata = document.getElementById('kataKunci');
    var fKategori = document.getElementById('fKategori');
    var fLokasi = document.getElementById('fLokasi');
    var fJenis = document.getElementById('fJenis');
    var tombol = document.getElementById('tombolFilter');
    var kosong = document.getElementById('kosong');
    var kartu = document.querySelectorAll('.kartu-lowongan');
    if (!kata || !kartu.length) { return; }

    function terapkan() {
        var q = kata.value.trim().toLowerCase();
        var tampil = 0;
        kartu.forEach(function (k) {
            var cocok =
                (!q || k.dataset.judul.indexOf(q) !== -1) &&
                (!fKategori.value || k.dataset.kategori === fKategori.value) &&
                (!fLokasi.value || k.dataset.lokasi === fLokasi.value) &&
                (!fJenis.value || k.dataset.jenis === fJenis.value);
            k.hidden = !cocok;
            if (cocok) { tampil++; }
        });
        kosong.hidden = tampil !== 0;
    }

    [kata, fKategori, fLokasi, fJenis].forEach(function (el) {
        el.addEventListener(el === kata ? 'input' : 'change', terapkan);
    });
    tombol.addEventListener('click', terapkan);
})();
