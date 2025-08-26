@include('header')

<main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="title-wrapper">
        <h1>{{ $berita->judul }}</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Isi Berita -->
    <section class="section">
  <div class="container">
    <div class="content">
      
      <img 
        src="{{ $berita->gambar ? asset($berita->gambar) : asset('assets/img/health/cardiology-2.webp') }}" 
        alt="Default Image"  
        loading="lazy" 
        style="height:auto;width: 35%; float:left; margin:0 15px 10px 0; border-radius:8px;"
      >

      <p style="text-align: justify;">
        {!! $berita->isi !!}
      </p>

    </div>
  </div>
</section>

</main>

@include('footer')
