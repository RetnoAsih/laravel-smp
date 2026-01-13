@include('sidebar')
@include('navbar')
@php
function getMapel($data, $hari, $kelas) {
    foreach ($data as $item) {
        if ($item->hari == $hari && $item->kelas == $kelas) {
            return $item->mapel;
        }
    }
    return '';
}
@endphp

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Jadwal Pelajaran</p>
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
                {{ getMapel($datapelajaran, 'Senin', 7) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Senin', 8) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Senin', 9) }}
                    </textarea>
                  </td>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Selasa', 7) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Selasa', 8) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Selasa', 9) }}
                    </textarea>
                  </td>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Rabu', 7) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Rabu', 8) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Rabu', 9) }}
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
                {{ getMapel($datapelajaran, 'Kamis', 7) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Kamis', 8) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Kamis', 9) }}
                    </textarea>
                  </td>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Jumat', 7) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Jumat', 8) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Jumat', 9) }}
                    </textarea>
                  </td>
                  <td>
                    <strong>7</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Sabtu', 7) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>8</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Sabtu', 8) }}
                    </textarea>
                  </td>

                  <td>
                    <strong>9</strong>
                    <textarea class="form-control mt-1" rows="5" readonly>
                {{ getMapel($datapelajaran, 'Sabtu', 9) }}
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
                  <th>Kelas</th>
                  <th>Hari</th>
                  <th>Mata Pelajaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
    @forelse ($datapelajaran as $da)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $da->kelas }}</td>
            <td>{{ $da->hari }}</td>
            <td>{{ $da->mapel }}</td>
            <td>
                <!-- Tombol Edit -->
                <button class="btn btn-warning btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#editAdminModal"
        data-id="{{ $da->id }}"
        data-kelas="{{ $da->kelas }}"
        data-hari="{{ $da->hari }}"
        data-mapel="{{ $da->mapel }}">
        Edit
    </button>

                <!-- Tombol Hapus -->
                <form action="{{ route('pelajaran.destroy', $da->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pelajaran ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Belum ada data pelajaran.</td>
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
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Pelajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pelajaran.tambahpelajaran') }}" method="POST">
          @csrf
          <div class="row">
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
                  <textarea name="mapel" class="form-control" rows="6" required></textarea>

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
        <h5 class="modal-title" id="editAdminModalLabel">Edit Pelajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditAdmin" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Hari</label>
                <input type="text" id="edit_hari" name="hari" class="form-control" required readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Kelas </label>
                <input type="text" id="edit_kelas" name="kelas" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <!--input type="text" id="edit_mapel" name="mapel" class="form-control" required-->
                <textarea name="mapel" class="form-control" rows="6" id="edit_mapel" required></textarea>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editAdminModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var hari = button.getAttribute('data-hari');
        var kelas = button.getAttribute('data-kelas');
        var mapel = button.getAttribute('data-mapel');

        // Isi form
        document.getElementById('edit_hari').value = hari;
        document.getElementById('edit_kelas').value = kelas;
        document.getElementById('edit_mapel').value = mapel;

        // Set action URL untuk update
        document.getElementById('formEditAdmin').action = '/pelajaran/' + id;
    });
});
</script>

