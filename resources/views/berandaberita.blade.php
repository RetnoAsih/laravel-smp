@include('sidebar')
@include('navbar')

<!-- Pell CSS -->
<link rel="stylesheet" href="https://unpkg.com/pell/dist/pell.min.css">

<!-- Pell JS -->
<script src="https://unpkg.com/pell"></script>


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Daftar Berita</p>
            <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambahAdminModal">
              Tambah Berita
            </button>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Tanggal Publish</th>
              
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
    @forelse ($databerita as $db)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $db->judul }}</td>
            <td>{{ $db->penulis }}</td>
            <td>{{ $db->tanggal_publish }}</td>
            
            <td>
                <!-- Tombol Edit -->
                <button class="btn btn-warning btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#editAdminModal"
        data-id="{{ $db->id_berita }}"
        data-judul="{{ $db->judul }}"
        data-isi="{{ $db->isi }}"
        data-penulis="{{ $db->penulis }}">
        Edit
    </button>

                <!-- Tombol Hapus -->
                <form action="{{ route('berita.destroy', $db->id_berita) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Belum ada Berita.</td>
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

<!-- MODAL TAMBAH BERITA -->
<div class="modal fade" id="tambahAdminModal" tabindex="-1" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <script src="https://cdn.jsdelivr.net/npm/tinymce@7.2.1/tinymce.min.js"></script>
        <form action="{{ route('berita.tambahberita') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control">
      </div>
    </div>
    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label">Isi Berita</label>
        <textarea id="isi" name="isi" class="form-control"></textarea>
      </div>
    </div>
    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label">Gambar</label>
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
        <h5 class="modal-title" id="editAdminModalLabel">Edit Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditAdmin" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" id="edit_judul" name="judul" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" id="edit_penulis" name="penulis" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Isi Berita</label>
                <input type="text" id="edit_isi" name="isi" class="form-control">
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
        var judul = button.getAttribute('data-judul');
        var isi = button.getAttribute('data-isi');
        var penulis = button.getAttribute('data-penulis');

        // Isi form
        //document.getElementById('edit_id').value = id;
        document.getElementById('edit_judul').value = judul;
        document.getElementById('edit_isi').value = isi;
        document.getElementById('edit_penulis').value = penulis;

        // Set action URL untuk update
        document.getElementById('formEditAdmin').action = '/berita/' + id;
    });
});
</script>
<script>
    tinymce.init({
        selector: '#isi',
        plugins: 'image link media code lists table',
  toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist | link image media | code',
  menubar: 'insert',
  image_caption: true,
  automatic_uploads: true,
  relative_urls: false,
    });
</script>
