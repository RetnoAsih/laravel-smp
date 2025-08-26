@include('header')

<main class="main">

    <!-- Page Title -->
    <div class="page-title"></div>
    
    <!-- Departments Section -->
    <section id="departments" class="departments section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          

          <!-- Looping Data Berita -->
          @foreach ($databerita as $db)
          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="department-card">
              <div class="department-image-wrapper">
                <!-- Tetap gambar default -->
                <img 
    src="{{ $db->gambar ? asset($db->gambar) : asset('assets/img/health/cardiology-2.webp') }}" 
    alt="Default Image" 
    class="img-fluid" 
    loading="lazy">
              </div>
              <div class="department-header">
                <h3>{{ $db->judul }}</h3>
                <p class="department-subtitle">Penulis: {{ $db->penulis }}</p>
              </div>
              <div class="department-content">
                <p>{{ Str::limit(strip_tags($db->isi), 100) }}</p>
                <!-- Tetap link default -->
                <a href="{{ route('show', $db->slug) }}" class="department-link">Selengkapnya</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section><!-- /Departments Section -->

    

</main>

@include('footer')
