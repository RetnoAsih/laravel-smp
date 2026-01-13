<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">


        <div class="col-lg-4 footer-about d-flex align-items-end">
  <a href="index.html" class="logo d-flex align-items-center">
    <span class="sitename">
      <img src="{{ asset('assets/img/logosmp.png')}}" alt="">
    </span>
  </a>
</div>


<div class="col-lg-4 footer-about text-center">
  <div class="footer-contact pt-3">
    <p>Jl KH Hasyim Asyari No.09, RT.03/RW.XII </p>
    <p>Bantar, Wanareja, Cilacap</p>
  </div>
</div>


<div class="col-lg-4 footer-about">
  <div class="social-links d-flex justify-content-end mt-4">
    
    <a href=""><i class="bi bi-facebook"></i></a>
    <a href=""><i class="bi bi-instagram"></i></a>
    <a href=""><i class="bi bi-linkedin"></i></a>
  </div>
</div>


  
        

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">RK2025</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] 
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader 
  <div id="preloader"></div>
  -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>
   @if(session('success'))
<script>
Toastify({
    text: @json(session('success')),
    duration: 4000,
    gravity: "top",   // "top" or "bottom"
    position: "right", // "left", "center" or "right"
    close: true,
    stopOnFocus: true,
    style: {
        background: "linear-gradient(to right, #00c853, #00e676)",
    }
}).showToast();
</script>
@endif

@if(session('error'))
<script>
Toastify({
    text: @json(session('error')),
    duration: 4000,
    gravity: "top",
    position: "right",
    close: true,
    stopOnFocus: true,
    style: {
        background: "linear-gradient(to right, #c62828, #ff5252)",
    }
}).showToast();
</script>
@endif

</body>

</html>