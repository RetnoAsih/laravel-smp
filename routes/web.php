<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\AdminsCon;
use App\Http\Controllers\SiswaCon;
use App\Http\Controllers\AbsensiCon;
use App\Http\Controllers\BeritaCon;
use App\Models\Absensis;
use Illuminate\Http\Request;   

//routes Admin
Route::get('/admins', [AdminsCon::class, 'index']);
Route::post('/admin/tambahadmin', [AdminsCon::class, 'tambahadmin'])->name('admin.tambahadmin'); 
Route::get('/admin/{id}/edit', [AdminsCon::class, 'edit'])->name('admin.edit');
Route::delete('/admin/{id}', [AdminsCon::class, 'destroy'])->name('admin.destroy'); 
Route::put('/admin/{id}', [AdminsCon::class, 'update'])->name('admin.update');

//routes Siswa
Route::get('/siswa', [SiswaCon::class, 'index']);
Route::post('/siswa/tambahsiswa', [SiswaCon::class, 'tambahsiswa'])->name('siswa.tambahsiswa'); 
Route::get('/siswa/{id}/edit', [SiswaCon::class, 'edit'])->name('siswa.edit');
Route::delete('/siswa/{id}', [SiswaCon::class, 'destroy'])->name('siswa.destroy'); 
Route::put('/siswa/{id}', [SiswaCon::class, 'update'])->name('siswa.update');

//routes Absensi
Route::get('/absensi', [AbsensiCon::class, 'index']);
Route::get('/modestandby', [AbsensiCon::class, 'standby']);
Route::post('/absensi/tambahabsensi', [AbsensiCon::class, 'tambahabsensi'])->name('absensi.tambahabsensi'); 
Route::get('/absensi/{id}/edit', [AbsensiCon::class, 'edit'])->name('absensi.edit');
Route::delete('/absensi/{id}', [AbsensiCon::class, 'destroy'])->name('absensi.destroy'); 
Route::put('/absensi/{id}', [AbsensiCon::class, 'update'])->name('absensi.update');
Route::post('/api/tambah-absensi', function (Request $request) {
    $idSiswa = $request->input('id_siswa');   // atau $request->get('id_siswa')
    Absensis::create([
        'id_siswa' => $idSiswa,
        'waktu'    => now(),
    ]);

    return response()->json(['status' => 'success']);
});

// routes berita
Route::get('/berita', [BeritaCon::class, 'index']);
Route::get('/_galeri', [BeritaCon::class, 'galeri']);
Route::get('/_berita', [BeritaCon::class, 'katalog']);
Route::post('/berita/tambahberita', [BeritaCon::class, 'tambahberita'])->name('berita.tambahberita'); 
Route::get('/berita/{id}/edit', [BeritaCon::class, 'edit'])->name('berita.edit');
Route::delete('/berita/{id}', [BeritaCon::class, 'destroy'])->name('berita.destroy'); 
Route::put('/berita/{id}', [BeritaCon::class, 'update'])->name('berita.update');

Route::get('/berita/{slug}', [BeritaCon::class, 'show'])->name('show');


Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/profil', function () {
    return view('about');
});
Route::get('/dbtest', function () {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        return view('dbtest', ['status' => "Terkoneksi ke database: $dbName"]);
    } catch (\Exception $e) {
        return view('dbtest', ['status' => "Gagal terkoneksi: " . $e->getMessage()]);
    }
});
Route::get('/visi-misi', function () {
    return view('visimisi');
});
Route::get('/_sejarah', function () {
    return view('sejarah');
});
Route::get('/_struktur', function () {
    return view('strukturorg');
});
Route::get('/_kepalasekolah', function () {
    return view('kepalasekolah');
});

Route::get('/hai', function () {
    return view('show');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

use App\Http\Controllers\ImageController;

Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload.image');
