@include('sidebar')
@include('navbar')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Data Siswa</p>
            <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambahAdminModal">
              Tambah Siswa
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
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>No HP</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
    @forelse ($datasiswa as $ds)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $ds->uid }}</td>
            <td>{{ $ds->nama_siswa }}</td>
            <td>{{ $ds->kelas }}</td>
            <td>{{ $ds->no_hp }}</td>
            <td>
                <!-- Tombol Edit -->
                <button class="btn btn-warning btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#editAdminModal"
        data-id="{{ $ds->id }}"
        data-uid="{{ $ds->uid }}"
        data-nama_siswa="{{ $ds->nama_siswa }}"
        data-kelas="{{ $ds->kelas }}"
        data-no_hp="{{ $ds->no_hp }}">
        Edit
    </button>

                <!-- Tombol Hapus -->
                <form action="{{ route('siswa.destroy', $ds->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Belum ada data siswa.</td>
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
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('siswa.tambahsiswa') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">RFID</label>
                <input type="text" name="uid" class="form-control" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" name="password" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_siswa" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select class="form-select" id="kelas" name="kelas">
                  <option selected disabled>Pilih salah satu</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  
                </select>
              </div>
            </div>

            <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="image" class="form-control" required>
      </div>
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
        <h5 class="modal-title" id="editAdminModalLabel">Edit Siswa</h5>
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
                <input type="text" id="edit_uid" name="uid" class="form-control" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" id="edit_nama_siswa" name="nama_siswa" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Password (Kosongkan jika tidak diubah)</label>
                <input type="text" id="edit_password" name="password" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" id="edit_no_hp" name="no_hp" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select class="form-select" id="edit_kelas" name="kelas" required>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                </select>
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
        var uid = button.getAttribute('data-uid');
        var nama_siswa = button.getAttribute('data-nama_siswa');
        var kelas = button.getAttribute('data-kelas');
        var no_hp = button.getAttribute('data-no_hp');

        // Isi form
        document.getElementById('edit_uid').value = uid;
        document.getElementById('edit_nama_siswa').value = nama_siswa;
        document.getElementById('edit_kelas').value = kelas;
        document.getElementById('edit_no_hp').value = no_hp;

        // Set action URL untuk update
        document.getElementById('formEditAdmin').action = '/siswa/' + id;
    });
});
</script>

