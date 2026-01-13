@include('sidebar')
@include('navbar')

<!--div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            hai


          </div>
        </div>
      </div>
    </div>
  </div>
</div-->

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Siswa</p>
                    <h5 class="font-weight-bolder">
                     {{ $totalSiswa }}
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Berita</p>
                    <h5 class="font-weight-bolder">
                     {{ $totalBerita }}
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengguna</p>
                    <h5 class="font-weight-bolder">
                     6
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Absensi</p>
                    <h5 class="font-weight-bolder">
                      {{ $totalAbsensi }}
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Kotak empat-->

      


      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
              <h6 class="mb-2">
                  Rekap Absensi Bulan {{ now()->translatedFormat('F') }}
              </h6>
              <form method="GET" action="{{ route('dashboard') }}">
    <select name="bulan" onchange="this.form.submit()">
        @for ($m = 1; $m <= 12; $m++)
            <option value="{{ $m }}" {{ $bulan == $m ? 'selected' : '' }}>
                {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
            </option>
        @endfor
    </select>
</form>




              </div>
            </div>
             @php
    $today = now()->day;  @endphp
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <tr>
                    <td rowspan="2">
                      Nama
                    </td>
                    <td colspan="31">Tanggal</td>
                  </tr>
                  <tr>
                  @for ($i = 1; $i <= $lastDay; $i++)

    @php
        // Tanggal hari ini (format angka, misalnya 5, 12, 27)
        $todayDate = now()->day;

        // Jika bulan yang dipilih adalah bulan ini dan tanggal sama → beri border biru
        $isToday = ($bulan == now()->month && $i == $todayDate);

        $style = $isToday ? 'background-color: #E8F0FE; border-radius: 6px;border: 2px solid blue; font-weight:bold; color:blue;' : '';
    @endphp

    <td style="{{ $style }}">{{ $i }}</td>

@endfor

                  </tr>

                  @forelse ($datasiswa as $s)
    <tr>
        <td>{{ $s->nama_siswa }}</td>

        @for ($i = 1; $i <= $lastDay; $i++)

            @php
                // Bentuk tanggal sesuai bulan & tahun yang dipilih
                $tanggalLoop = \Carbon\Carbon::create(null, $bulan, $i)->format('Y-m-d');

                // Cari absensi berdasarkan tanggal & siswa
                $absen = $dataabsensi
                    ->where('id_siswa', $s->uid)
                    ->filter(function ($item) use ($tanggalLoop) {
                        return \Carbon\Carbon::parse($item->waktu)->format('Y-m-d') === $tanggalLoop;
                    })
                    ->first();

                // Warna jika hadir
                $color = $absen ? 'green' : 'white';
            @endphp

            <td style="background-color: {{ $color }}; text-align:center;">
                {{ $absen ? 'H' : '-' }}
            </td>

        @endfor

    </tr>
@empty
    <tr>
        <td colspan="{{ $lastDay + 1 }}">Tidak ada data siswa.</td>
    </tr>
@endforelse



                  
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Status</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
    <h6 class="mb-1 text-dark text-sm">Koneksi Internet</h6>
    <span id="internet-status" class="text-xs">Memeriksa...</span>
</div>

                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
    <h6 class="mb-1 text-dark text-sm">WhatsApp Gateway</h6>
    <span id="wa-gateway-status" class="text-xs">Memeriksa...</span>
</div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
        
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>

@include('footerbar')

                  -->
<script>
function cekInternet() {
    const statusElement = document.getElementById('internet-status');

    fetch('/cek-internet')
        .then(res => res.json())
        .then(data => {
            if (data.connected) {
                statusElement.innerText = "Terhubung";
                statusElement.style.color = "green";
            } else {
                statusElement.innerText = "Tidak Terhubung";
                statusElement.style.color = "red";
            }
        })
        .catch(() => {
            statusElement.innerText = "Tidak Terhubung";
            statusElement.style.color = "red";
        });
}

cekInternet();
setInterval(cekInternet, 5000);
</script>

<script>
function cekWaGateway() {
    const statusElement = document.getElementById('wa-gateway-status');

    fetch('/cek-saungwa')
        .then(response => response.json())
        .then(data => {
            if (data.connected) {
                statusElement.innerText = "Terhubung";
                statusElement.style.color = "green";
            } else {
                statusElement.innerText = "Tidak Terhubung";
                statusElement.style.color = "red";
            }
        })
        .catch(() => {
            statusElement.innerText = "Tidak Terhubung";
            statusElement.style.color = "red";
        });
}

cekWaGateway();
setInterval(cekWaGateway, 5000);
</script>
