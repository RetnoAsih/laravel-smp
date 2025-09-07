 <nav id="navmenu" class="navmenu">
        <ul>
  <li>
    <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a>
  </li>

  <li class="dropdown">
    <a href="#" class="{{ Request::is('_sejarah') || Request::is('visi-misi') || Request::is('_struktur') || Request::is('_kepalasekolah')  ? 'active' : '' }}">
      <span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
    </a>
    <ul>
      <li><a href="/_sejarah" class="{{ Request::is('_sejarah') ? 'active' : '' }}">Sejarah</a></li>
      <li><a href="/visi-misi" class="{{ Request::is('visi-misi') ? 'active' : '' }}">Visi dan Misi</a></li>
      <li><a href="/_struktur" class="{{ Request::is('_struktur') ? 'active' : '' }}">Struktur Organisasi</a></li>
      <li><a href="/_kepalasekolah" class="{{ Request::is('_kepalasekolah') ? 'active' : '' }}">Kepala Sekolah</a></li>
      <li><a href="/berita/sarana-dan-prasarana" class="{{ Request::is('berita/sarana-dan-prasarana') ? 'active' : '' }}">Sarana dan Prasarana</a></li>
      <li><a href="/berita/prestasi" class="{{ Request::is('berita/prestasi') ? 'active' : '' }}">Prestasi</a></li>
      <li><a href="/berita/osis" class="{{ Request::is('berita/osis') ? 'active' : '' }}">OSIS</a></li>
      <li><a href="/berita/ekstrakurikuler" class="{{ Request::is('berita/ekstrakurikuler') ? 'active' : '' }}">Ekstrakurikuler</a></li>
    </ul>
  </li>

  <li>
    <a href="/_berita" class="{{ Request::is('_berita') ? 'active' : '' }}">Berita</a>
  </li>

  <li class="dropdown">
    <a href="#" class="{{ Request::is('berita/alur-layanan-humas') ? 'active' : '' }}">
      <span>Layanan Publik</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
    </a>
    <ul>
      <li><a href="/berita/alur-layanan-humas" class="{{ Request::is('berita/alur-layanan-humas') ? 'active' : '' }}">Alur Layanan HUMAS</a></li>
      <li><a href="/visi-misi" class="{{ Request::is('visi-misi') ? 'active' : '' }}">Formulir Pengaduan</a></li>
      <li><a href="/_struktur" class="{{ Request::is('_struktur') ? 'active' : '' }}">Alur Layanan Kurikulum</a></li>
      <li><a href="/_kepalasekolah" class="{{ Request::is('_kepalasekolah') ? 'active' : '' }}">Alur Evaluasi Belajar</a></li>
      <li><a href="/berita/sarana-dan-prasarana" class="{{ Request::is('berita/sarana-dan-prasarana') ? 'active' : '' }}">Penelusuran Alumni</a></li>
    </ul>
  </li>

  <li class="dropdown">
    <a href="#" class="{{ Request::is('berita/wali-kelas') || Request::is('berita/kurikulum') || Request::is('berita/jadwal-pelajaran') || Request::is('berita/tata-tertib-smp-maarif-nu-01-wanareja') ? 'active' : '' }}">
      <span>Pendidikan</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
    </a>
    <ul>
      <li><a href="/berita/wali-kelas" class="{{ Request::is('berita/wali-kelas') ? 'active' : '' }}">Wali Kelas</a></li>
      <li><a href="/berita/kurikulum" class="{{ Request::is('berita/kurikulum') ? 'active' : '' }}">Kurikulum</a></li>
      <li><a href="/berita/jadwal-pelajaran" class="{{ Request::is('berita/jadwal-pelajaran') ? 'active' : '' }}">Jadwal Pelajaran</a></li>
      <li><a href="https://pdk.jatengprov.go.id/wp-content/uploads/2025/07/PEDOMAN-PENYUSUNAN-KALDIK-2025-2026-.pdf#page=46" target="_blank">Kalender Pendidikan</a></li>
      <li><a href="/berita/tata-tertib-smp-maarif-nu-01-wanareja" class="{{ Request::is('berita/tata-tertib-smp-maarif-nu-01-wanareja') ? 'active' : '' }}">Tata Tertib</a></li>
      <li><a href="https://classroom.google.com/" target="_blank">E-Learning</a></li>
    </ul>
  </li>

  <li><a href="https://apin.smpmaarifnuwanareja.sch.id" target="_blank" class="{{ Request::is('doctors.html') ? 'active' : '' }}">Aplikasi Infaq</a></li>
  <li><a href="/_galeri" class="{{ Request::is('_galeri') ? 'active' : '' }}">Galeri</a></li>
  <li><a href="/berita/hubungi-kami" class="{{ Request::is('berita/hubungi-kami') ? 'active' : '' }}">Hubungi Kami</a></li>
</ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="/_login">Login</a>

    </div>
  </header>