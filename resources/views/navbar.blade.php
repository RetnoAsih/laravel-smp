@php
    $pageTitle = match (true) {
        Request::is('_dashboard') => 'Dashboard',
        Request::is('siswa') => 'Kelola Siswa',
        Request::is('absensi') => 'Kelola Absensi',
        Request::is('admins') => 'Kelola Admin',
        Request::is('berita') => 'Kelola Berita',
        Request::is('modestandby') => 'Mode Standby',
        Request::is('settings/edit') => 'Setting',
        Request::is('pelajaran') => 'Jadwal Pelajaran',
        default => '',
    };
@endphp

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-white" href="/_dashboard">Pages</a>
    </li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">
        {{ $pageTitle }}
    </li>
</ol>

          <h6 class="font-weight-bolder text-white mb-0">{{ $pageTitle }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          
        </div>
      </div>
    </nav>
    <!-- Batas Navbar -->