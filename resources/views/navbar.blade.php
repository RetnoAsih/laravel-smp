
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-white" href="/_dashboard">Pages</a>
    </li>

    @if (Request::is('_dashboard'))
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
    @elseif (Request::is('siswa'))
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kelola Siswa</li>
    @elseif (Request::is('absensi'))
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kelola Absensi</li>
    @elseif (Request::is('admins'))
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kelola Admin</li>
    @elseif (Request::is('berita'))
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kelola Berita</li>
    @elseif (Request::is('modestandby'))
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mode Standby</li>
    @endif
</ol>

          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          
        </div>
      </div>
    </nav>
    <!-- Batas Navbar -->