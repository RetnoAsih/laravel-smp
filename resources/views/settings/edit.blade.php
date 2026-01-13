@include('sidebar')
@include('navbar')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Pengaturan</p>
            
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="batas_jam" class="form-label">Jam Batas Pulang</label>
                        <input type="time" id="batas_jam" name="batas_jam" class="form-control" value="{{ $batas_jam }}" required>
                    </div>
<div class="form-group mb-3">
                  <label>APP Key Saung WA</label>
                  <input type="text" name="saungwa_appkey" value="{{ env('SAUNGWA_APPKEY') }}" class="form-control">
              </div>

              <div class="form-group mb-3">
                  <label>AUTH Key Saung WA</label>
                  <input type="text" name="saungwa_authkey" value="{{ env('SAUNGWA_AUTHKEY') }}" class="form-control">
              </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
              </form>

              
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
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.tambahadmin') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
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
                <input type="text" name="nama_lengkap" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Roles</label>
                <select class="form-select" id="roles" name="roles">
    <option selected disabled>Pilih salah satu</option>
    <option value="admin">Admin</option>
    <option value="guru">Guru</option>
    
  </select>
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
        <h5 class="modal-title" id="editAdminModalLabel">Edit Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditAdmin" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" id="edit_username" name="username" class="form-control" required>
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
                <label class="form-label">Nama Lengkap</label>
                <input type="text" id="edit_nama_lengkap" name="nama_lengkap" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Roles</label>
                <select class="form-select" id="edit_roles" name="roles" required>
                  <option value="admin">Admin</option>
                  <option value="guru">Guru</option>
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
        var username = button.getAttribute('data-username');
        var nama = button.getAttribute('data-nama');
        var roles = button.getAttribute('data-roles');

        // Isi form
        document.getElementById('edit_username').value = username;
        document.getElementById('edit_nama_lengkap').value = nama;
        document.getElementById('edit_roles').value = roles;

        // Set action URL untuk update
        document.getElementById('formEditAdmin').action = '/admin/' + id;
    });
});
</script>

