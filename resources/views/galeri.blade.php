@include('header')
<style>
#gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 15px;
}

#gallery img {
    width: 100%;
    height: 150px;       /* tinggi seragam */
    object-fit: cover;   /* biar proporsional */
    border-radius: 10px; /* sudut melengkung */
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    cursor: pointer;
    transition: transform 0.3s ease;
}

#gallery img:hover {
    transform: scale(1.05); /* efek zoom pas hover */
}
</style>

<main class="main">

    <!-- Page Title -->
    <div class="page-title">
      

      <div class="title-wrapper">
        <h1>Galeri SMP Ma'arif NU 01 Wanareja</h1>
        

      </div>
    </div><!-- End Page Title -->

    <!-- Service Details 2 Section -->
    <section id="service-details-2" class="service-details-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          

          <div class="col-lg-12" data-aos="fade-left" data-aos-delay="300">
            <div class="service-content">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css">

<div class="container my-4">

    <div id="gallery">
        @foreach($beritas as $berita)
            @if($berita->gambar)
                <a href="{{ asset($berita->gambar) }}">
                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}">
                </a>
            @endif
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.min.js"></script>
<script>
    lightGallery(document.getElementById('gallery'), {
        plugins: [lgZoom],
        speed: 400
    });
</script>


</div>
</div>
</div>
</div>

  </main>

@include('footer')