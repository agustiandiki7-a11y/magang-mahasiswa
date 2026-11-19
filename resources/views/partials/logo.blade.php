@php $terang = $terang ?? false; @endphp
<a href="{{ route('home') }}" class="logo {{ $terang ? 'logo--terang' : '' }}">
    <svg class="logo__mark" viewBox="0 0 40 28" aria-hidden="true">
        <path d="M2 26 L9 3 Q10 1 12 1 L15 1 Q17 1 18 3 L20 11 L25 3 Q26 1 28 1 L31 1 Q33 1 34 3 L38 26 L30 26 L28 12 L22 22 Q20.5 24 19 22 L15 14 L10 26 Z" fill="currentColor"/>
    </svg>
    <span class="logo__teks">MagangKu</span>
</a>
