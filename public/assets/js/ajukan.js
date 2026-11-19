/* MagangKu — stepper form pengajuan magang (4 langkah) */
(function () {
    'use strict';

    var form = document.getElementById('formAjukan');
    if (!form) { return; }

    var panel = form.querySelectorAll('.langkah');
    var stepper = document.querySelectorAll('#stepper li');
    var lanjut = document.getElementById('tombolLanjut');
    var kembali = document.getElementById('tombolKembali');
    var kirim = document.getElementById('tombolKirim');
    var batal = document.getElementById('tombolBatal');
    var ringkasan = document.getElementById('ringkasan');
    var sekarang = 1;
    var total = panel.length;

    function tampilkan(n) {
        sekarang = n;
        panel.forEach(function (p) { p.hidden = Number(p.dataset.langkah) !== n; });
        stepper.forEach(function (s) {
            var i = Number(s.dataset.langkah);
            s.classList.toggle('aktif', i === n);
            s.classList.toggle('selesai', i < n);
        });
        kembali.hidden = n === 1;
        batal.hidden = n !== 1;
        lanjut.hidden = n === total;
        kirim.hidden = n !== total;
        if (n === total) { isiRingkasan(); }
    }

    function valid(n) {
        var ok = true;
        panel[n - 1].querySelectorAll('[required]').forEach(function (el) {
            if (!el.value.trim()) { ok = false; el.style.borderColor = '#c0392b'; }
            else { el.style.borderColor = ''; }
        });
        return ok;
    }

    function nilai(nama) {
        var el = form.elements[nama];
        if (!el) { return '-'; }
        if (el.type === 'file') { return el.files.length ? el.files[0].name : 'Belum diunggah'; }
        if (el.type === 'hidden' && el.dataset.judul) { return el.dataset.judul; }
        if (el.tagName === 'SELECT') { return el.selectedOptions[0] ? el.selectedOptions[0].text : '-'; }
        return el.value.trim() || '-';
    }

    function isiRingkasan() {
        var baris = [
            ['Nama Lengkap', 'nama'], ['NIM', 'nim'], ['Program Studi', 'prodi'], ['Email', 'email'],
            ['Lowongan', 'lowongan_id'], ['Tanggal Mulai', 'mulai'], ['Durasi', 'durasi'],
            ['CV', 'cv'], ['Transkrip', 'transkrip'], ['Surat Pengantar', 'surat']
        ];
        ringkasan.textContent = '';
        baris.forEach(function (b) {
            var dt = document.createElement('dt');
            var dd = document.createElement('dd');
            dt.textContent = b[0];
            dd.textContent = nilai(b[1]);
            ringkasan.appendChild(dt);
            ringkasan.appendChild(dd);
        });
    }

    lanjut.addEventListener('click', function () { if (valid(sekarang) && sekarang < total) { tampilkan(sekarang + 1); } });
    kembali.addEventListener('click', function () { if (sekarang > 1) { tampilkan(sekarang - 1); } });
    form.addEventListener('submit', function (e) {
        if (!valid(1)) { e.preventDefault(); tampilkan(1); }
        else if (!valid(2)) { e.preventDefault(); tampilkan(2); }
    });

    tampilkan(1);
})();
