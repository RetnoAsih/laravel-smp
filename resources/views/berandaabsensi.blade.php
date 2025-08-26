@include('sidebar')
@include('navbar')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="">
            <div id="jam-digital" style="font-size: 24px; font-weight: bold;"></div>
            <div id="" style="font-size: 24px; font-weight: bold;">{{ $hariTanggal }}</div>
            <p></p>

          </div>
          <form action="{{ route('absensi.tambahabsensi') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-0">
              <div class="mb-3">
                <input type="text" name="id_siswa" class="form-control" placeholder="Masukkan Kode RFID" required>
              </div>
            </div>
            
          
        </form>
        </div>

        <div class="card-body px-0 pt-0 pb-2">
          @if($absensiTerbaru)
          <p>Nama: {{ $absensiTerbaru->siswa->nama_siswa }}</p>
          <p>Kelas: {{ $absensiTerbaru->siswa->kelas}}</p>
          <p>Waktu: {{ $absensiTerbaru->waktu }}</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Data Absensi</p>
            <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambahAdminModal">
              Tambah Absensi
            </button>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>RFID</th>
                  <th>Waktu</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
    @forelse ($dataabsensi as $da)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $da->id_siswa }}</td>
            <td>{{ $da->waktu }}</td>
            <td>{{ $da->siswa->nama_siswa }}</td>
            <td>{{ $da->Siswa->kelas }}</td>
            
            <td>
                <!-- Tombol Edit 
                <button class="btn btn-warning btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#editAdminModal"
        data-id="{{ $da->id }}"
        data-id_siswa="{{ $da->id_siswa }}">
        Edit
    </button> -->

                <!-- Tombol Hapus -->
                <form action="{{ route('absensi.destroy', $da->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus absensi ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Belum ada data absensi.</td>
        </tr>
    @endforelse
</tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('footerbar')

<!-- MODAL TAMBAH ADMIN -->
<div class="modal fade" id="tambahAdminModal" tabindex="-1" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Absensi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('absensi.tambahabsensi') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">RFID</label>
                <input type="text" name="id_siswa" class="form-control" required>
              </div>
            </div>
            
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL EDIT ADMIN -->
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAdminModalLabel">Edit Absensi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditAdmin" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">RFID</label>
                <input type="text" id="edit_id_siswa" name="id_siswa" class="form-control" required>
              </div>
            </div>
            </div>
            
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editAdminModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var id_siswa = button.getAttribute('data-id_siswa');
        //var waktu = button.getAttribute('data-waktu');
        
        // Isi form
        //document.getElementById('edit_id').value = id;
        document.getElementById('edit_id_siswa').value = id_siswa;
        

        // Set action URL untuk update
        document.getElementById('formEditAdmin').action = '/absensi/' + id;
    });
});
</script>

<!-- jam digital -->
<script>
function updateJam() {
    let now = new Date();
    let jam = String(now.getHours()).padStart(2, '0');
    let menit = String(now.getMinutes()).padStart(2, '0');
    let detik = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('jam-digital').innerText = `${jam}:${menit}:${detik}`;
}

// Jalankan setiap 1 detik
setInterval(updateJam, 1000);
updateJam(); // panggil sekali biar langsung muncul
</script>

