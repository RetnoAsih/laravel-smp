@include('sidebar')
@include('navbar')


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Jadwal Guru</p>
            <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambahAdminModal">
              Tambah Jadwal
            </button>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table table-bordered text-center align-middle">
              <tbody>
                <tr class="table-secondary fw-bold">
                  <td colspan="3">Senin</td>
                  <td colspan="3">Selasa</td>
                  <td colspan="3">Rabu</td>
                </tr>
                <tr>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>
                </tr>
                
                <tr class="table-secondary fw-bold">
                  <td colspan="3">Kamis</td>
                  <td colspan="3">Jum'at</td>
                  <td colspan="3">Sabtu</td>
                </tr>
                <tr>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
               
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                
                    </textarea>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>





          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Guru</th>
                  <th>Kelas</th>
                  <th>Hari</th>
                  <th>Mata Pelajaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
    @forelse ($datajadwal as $da)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $da->guru->nama_siswa ?? '-' }}</td>
            <td>{{ $da->kelas }}</td>
            <td>{{ $da->hari }}</td>
            <td>{{ $da->mapel }}</td>
            <td>
                <!-- Tombol Edit -->
                <button class="btn btn-warning btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#editAdminModal"
        data-id="{{ $da->id }}"
        data-id_guru="{{ $da->id_guru }}"
        data-nama_guru="{{ $da->guru->nama_siswa }}"
        data-kelas="{{ $da->kelas }}"
        data-hari="{{ $da->hari }}"
        data-mapel="{{ $da->mapel }}">
        Edit
    </button>

                <!-- Tombol Hapus -->
                <form action="{{ route('jadwal.destroy', $da->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Belum ada data pelajaran.</td>
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
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('jadwal.tambahjadwal') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                  <select name="id_guru" class="form-control">
                    <option value="">-- Pilih Guru --</option>
                    @foreach ($guru as $gr)
                        <option value="{{ $gr->id }}">
                            {{ $gr->nama_siswa }}
                        </option>
                    @endforeach
                </select>

              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label d-block">Hari</label>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="hari_senin" value="Senin" required>
                    <label class="form-check-label" for="hari_senin">
                      Senin
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="hari_selasa" value="Selasa">
                    <label class="form-check-label" for="hari_selasa">
                      Selasa
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="hari_rabu" value="Rabu">
                    <label class="form-check-label" for="hari_rabu">
                      Rabu
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="hari_kamis" value="Kamis">
                    <label class="form-check-label" for="hari_kamis">
                      Kamis
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="hari_jumat" value="Jumat">
                    <label class="form-check-label" for="hari_jumat">
                      Jumat
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="hari_sabtu" value="Sabtu">
                    <label class="form-check-label" for="hari_sabtu">
                      Sabtu
                    </label>
                  </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Kelas</label>
                  <select name="kelas" class="form-select" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                  </select>

              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                  <input type="text" name="mapel" class="form-control" rows="6" required>

              </div>
            </div>
            <!--div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Roles</label>
                <select class="form-select" id="roles" name="roles">
                  <option selected disabled>Pilih salah satu</option>
                  <option value="admin">Admin</option>
                  <option value="guru">Guru</option>
                </select>
              </div>
            </div-->
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
        <h5 class="modal-title" id="editAdminModalLabel">Edit Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditAdmin" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                <!--input type="text" id="edit_id_guru" name="hari" class="form-control" required hidden>
                <input type="text" id="edit_nama_guru" name="hari" class="form-control" required readonly-->
                <select name="id_guru" id="edit_id_guru" class="form-select" required>
                  <option value="">-- Pilih Guru --</option>
                  @foreach ($guru as $gr)
                    <option value="{{ $gr->id }}">
                      {{ $gr->nama_siswa }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label d-block">Hari</label>

                @php
                  $listHari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                @endphp

                @foreach ($listHari as $h)
                  <div class="form-check">
                    <input class="form-check-input edit-hari"
                          type="radio"
                          name="hari"
                          id="edit_hari_{{ $h }}"
                          value="{{ $h }}">
                    <label class="form-check-label" for="edit_hari_{{ $h }}">
                      {{ $h }}
                    </label>
                  </div>
                @endforeach

              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="kelas" id="edit_kelas" class="form-select" required>
                  <option value="">-- Pilih Kelas --</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <input type="text" id="edit_mapel" name="mapel" class="form-control" required>
                <!--textarea name="mapel" class="form-control" rows="6" id="edit_mapel" required></textarea-->
              </div>
            </div>
            <!--div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Roles</label>
                <select class="form-select" id="edit_roles" name="roles" required>
                  <option value="admin">Admin</option>
                  <option value="guru">Guru</option>
                </select>
              </div>
            </div-->
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editAdminModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var id_guru = button.getAttribute('data-id_guru');
        var nama_guru = button.getAttribute('data-nama_guru');
        var hari = button.getAttribute('data-hari');
        var kelas = button.getAttribute('data-kelas');
        var mapel = button.getAttribute('data-mapel');

        // Isi form
        document.getElementById('edit_id_guru').value = id_guru;
        document.getElementById('edit_nama_guru').value = nama_guru;
        document.getElementById('edit_hari').value = hari;
        document.getElementById('edit_kelas').value = kelas;
        document.getElementById('edit_mapel').value = mapel;

        // Set action URL untuk update
        document.getElementById('formEditAdmin').action = '/jadwal/' + id;
    });
});
</!--script-->

<!--script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editAdminModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id          = button.getAttribute('data-id');
        var id_guru     = button.getAttribute('data-id_guru');
        var hari        = button.getAttribute('data-hari');
        var kelas       = button.getAttribute('data-kelas');
        var mapel       = button.getAttribute('data-mapel');

        // Set nilai input
        document.getElementById('edit_hari').value  = hari;
        document.getElementById('edit_kelas').value = kelas;
        document.getElementById('edit_mapel').value = mapel;

        // Set dropdown guru (PRESELECT)
        var selectGuru = document.getElementById('edit_id_guru');
        selectGuru.value = id_guru;

        // Action form
        document.getElementById('formEditAdmin').action = '/jadwal/' + id;
    });
});
</!script-->

<!--script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editAdminModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id      = button.getAttribute('data-id');
        var idGuru  = button.getAttribute('data-id_guru');
        var hari    = button.getAttribute('data-hari');
        var kelas   = button.getAttribute('data-kelas');
        var mapel   = button.getAttribute('data-mapel');

        // Set dropdown guru
        document.getElementById('edit_id_guru').value = idGuru;

        // Set kelas & mapel
        document.getElementById('edit_kelas').value = kelas;
        document.getElementById('edit_mapel').value = mapel;

        // RESET radio hari
        document.querySelectorAll('.edit-hari').forEach(radio => {
            radio.checked = false;
            if (radio.value === hari) {
                radio.checked = true;
            }
        });

        // Action form
        document.getElementById('formEditAdmin').action = '/jadwal/' + id;
    });
});
</!--script-->

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editAdminModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id      = button.getAttribute('data-id');
        var idGuru  = button.getAttribute('data-id_guru');
        var hari    = button.getAttribute('data-hari');
        var kelas   = button.getAttribute('data-kelas');
        var mapel   = button.getAttribute('data-mapel');

        // Set guru
        document.getElementById('edit_id_guru').value = idGuru;

        // Set kelas (DROPDOWN)
        document.getElementById('edit_kelas').value = kelas;

        // Set mapel
        document.getElementById('edit_mapel').value = mapel;

        // Set radio hari
        document.querySelectorAll('.edit-hari').forEach(radio => {
            radio.checked = (radio.value === hari);
        });

        // Action form
        document.getElementById('formEditAdmin').action = '/jadwal/' + id;
    });
});
</script>




