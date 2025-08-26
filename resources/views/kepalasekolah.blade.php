@include('header')

<main class="main">

    <!-- Page Title -->
    <div class="page-title">
      

      <div class="title-wrapper">
        <h1>Kepala Sekolah</h1>
        
      </div>
    </div><!-- End Page Title -->

    <!-- Featured Testimonials Section -->
    <section id="featured-testimonials" class="featured-testimonials section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "slidesPerView": 1,
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>

          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row">
                  <div class="col-lg-8">
                    <h2>Sed ut perspiciatis unde omnis</h2>
                    <p>
                      Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    </p>
                    <p>
                      Beatae magnam dolore quia ipsum. Voluptatem totam et qui dolore dignissimos. Amet quia sapiente laudantium nihil illo et assumenda sit cupiditate. Nam perspiciatis perferendis minus consequatur. Enim ut eos quo.
                    </p>
                    <div class="profile d-flex align-items-center">
                      <img src="https://smpnu1wanareja.wordpress.com/wp-content/uploads/2024/10/sadun.jpg" class="profile-img" alt="">
                      <div class="profile-info">
                        <h3>Ibnu Sa’dun Isngadi, S.Pd.</h3>
                        <span>Kepala Sekolah</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 d-none d-lg-block">
                    <div class="featured-img-wrapper">
                      <img src="https://smpnu1wanareja.wordpress.com/wp-content/uploads/2024/10/sadun.jpg" class="featured-img" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Item -->

            

        </div>

      </div>

    </section><!-- /Testimonials Section -->

  </main>

@include('footer')