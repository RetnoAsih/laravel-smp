@include('header')

<main class="main">

  <!-- Page Title -->
  <div class="page-title">
    <div class="title-wrapper text-center">
      <h1>Login</h1>
    </div>
  </div><!-- End Page Title -->

  <!-- Appointment Section -->
  <section id="appointmnet" class="appointmnet section">

    
      <div class="row w-100 justify-content-center">

        <!-- Appointment Form -->
        <div class="col-lg-4">
          <div class="appointment-form-wrapper" data-aos="fade-up" data-aos-delay="200">
            
          <form method="POST" action="/login" >
              
          @csrf
          <div class="row gy-3">

                <div class="col-md-12">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>

                <div class="col-md-12">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary w-100">
                    Login
                  </button>
                </div>

              </div>
            </form>
          </div>
        </div><!-- End Appointment Form -->

      </div>
    

  </section><!-- /Appointment Section -->

</main>

@include('footer')
