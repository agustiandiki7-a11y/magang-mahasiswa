<footer class="footer">
    <div class="wadah footer__grid">
        <div class="footer__merek">
            @include('partials.logo', ['terang' => true])
            <p>Platform magang mahasiswa untuk masa depan yang lebih baik.</p>
            <div class="footer__sosial">
                <a href="#" aria-label="YouTube">@include('partials.ikon', ['nama' => 'youtube', 'ukuran' => 16])</a>
                <a href="#" aria-label="Instagram">@include('partials.ikon', ['nama' => 'instagram', 'ukuran' => 16])</a>
                <a href="#" aria-label="X">@include('partials.ikon', ['nama' => 'x', 'ukuran' => 16])</a>
                <a href="#" aria-label="LinkedIn">@include('partials.ikon', ['nama' => 'linkedin', 'ukuran' => 16])</a>
            </div>
        </div>
        <div>
            <h4>Navigasi</h4>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('informasi') }}">Informasi</a>
            <a href="{{ route('lowongan') }}">Lowongan</a>
            <a href="{{ route('tentang') }}">Tentang</a>
        </div>
        <div>
            <h4>Bantuan</h4>
            <a href="{{ route('informasi') }}#faq">FAQ</a>
            <a href="mailto:halo@magangku.test">Kontak</a>
            <a href="{{ route('informasi') }}#tentang-program">Panduan</a>
        </div>
        <div class="footer__langganan">
            <h4>Berlangganan Update</h4>
            <p>Dapatkan informasi lowongan terbaru</p>
            <form class="langganan" action="#" onsubmit="return false;">
                <input type="email" placeholder="Masukkan email" aria-label="Email langganan">
                <button type="submit" aria-label="Kirim">@include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 16])</button>
            </form>
        </div>
    </div>
    <div class="wadah footer__bawah">
        <span>© {{ date('Y') }} MagangKu. All rights reserved.</span>
        <span><a href="#">Kebijakan Privasi</a> | <a href="#">Syarat &amp; Ketentuan</a></span>
    </div>
</footer>
