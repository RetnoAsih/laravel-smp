@include('header')

isi

@include('footer')

<h1>{{ $berita->judul }}</h1>
<p><strong>Penulis:</strong> {{ $berita->penulis }}</p>
<p><strong>Tanggal:</strong> {{ $berita->tanggal_publish }}</p>
<hr>
<p>{!! nl2br(e($berita->isi)) !!}</p>