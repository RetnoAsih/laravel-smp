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
use App\Http\Controllers\DashboardController;
use App\Models\Absensis;
use Illuminate\Http\Request;   
use App\Models\Siswas;
use App\Models\Admins;
use App\Models\Beritas;
//use App\Models\Absensis;

Route::middleware('auth')->group(function () {
/* dashboard 
Route::get('/_dashboard', function () {
    return view('dashhome');
}); */

/*Route::get('/_dashboard', function () {
    $totalSiswa    = Siswas::count();
    $totalBerita   = Beritas::count();
    $totalPengguna = Admins::count();
    $totalAbsensi  = Absensis::count();

    return view('dashhome', compact(
        'totalSiswa',
        'totalBerita',
        'totalPengguna',
        'totalAbsensi'
    ));
});*/


Route::get('/_dashboard', [DashboardController::class, 'index'])->name('dashboard');


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
// routes/web.php
Route::get('/absensi/terbaru', [AbsensiCon::class, 'getTerbaru']);


// routes berita

Route::get('/berita', [BeritaCon::class, 'index']);
Route::post('/berita/tambahberita', [BeritaCon::class, 'tambahberita'])->name('berita.tambahberita'); 
Route::get('/berita/{id}/edit', [BeritaCon::class, 'edit'])->name('berita.edit');
Route::delete('/berita/{id}', [BeritaCon::class, 'destroy'])->name('berita.destroy'); 
Route::put('/berita/{id}', [BeritaCon::class, 'update'])->name('berita.update');

});

//frontpage
Route::get('/_galeri', [BeritaCon::class, 'galeri']);
Route::get('/_berita', [BeritaCon::class, 'katalog']);
Route::get('/berita/{slug}', [BeritaCon::class, 'show'])->name('show');

Route::get('/', function () {
    //return view('home');
    return view('login');
});
Route::get('/home', function () {
    return view('home');
    
});

Route::get('/profil', function () {
    return view('about');
});

Route::get('/_login', function () {
    return view('login');
})->name('_login');

Route::post('/login', [AdminsCon::class, 'login']);
Route::get('/logout', [AdminsCon::class, 'logout']);


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
Route::get('/sample', function () {
    return view('dashboard');
});
Route::get('/_sejarah', function () {
    return view('sejarah');
});
Route::get('/_jadwal', function () {
    return view('jadwal');
});
Route::get('/_struktur', function () {
    return view('strukturorg');
});
Route::get('/_kepalasekolah', function () {
    return view('kepalasekolah');
});
 Route::get('/ekstra-kurikuler', function () {
    return view('ekstrakurikuler');
});
Route::get('/hai', function () {
    return view('show');
});

use App\Http\Controllers\AuthController;

//Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//Route::post('/login', [AuthController::class, 'login']);
//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
*/

use App\Http\Controllers\ImageController;

Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload.image');

// di routes/web.php
use App\Http\Controllers\RfidController;

Route::post('/rfid', [RfidController::class, 'store'])
     ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

use App\Http\Controllers\SettingController;

Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');

Route::get('/cek-saungwa', function () {
    try {
        $response = Http::withHeaders([
            'appkey'  => env('SAUNGWA_APPKEY'),
            'authkey' => env('SAUNGWA_AUTHKEY'),
        ])
        ->timeout(5)
        ->get('https://app.saungwa.com/api/create-message');

        // Jika respons masih dapat dijangkau (status code 200/400/401/…)
        if ($response->status()) {
            return ['connected' => true];
        }

        return ['connected' => false];

    } catch (\Exception $e) {
        return ['connected' => false];
    }
});

Route::get('/cek-internet', function () {

    try {
        // ping cepat + tidak download konten besar
        $response = Http::timeout(5)
        ->get("https://www.google.com/generate_204"); // Ini khusus untuk ping internet

        // Status 204 = tanda internet OK
        if ($response->status() === 204) {
            return ['connected' => true];
        }

        return ['connected' => false];

    } catch (\Exception $e) {
        return ['connected' => false];
    }
});

use App\Http\Controllers\PelajaranController;




//routes Pelajaran
//Route::get('/admins', [AdminsCon::class, 'index']);
Route::get('/pelajaran', [PelajaranController::class, 'index']);
Route::post('/pelajaran/tambahpelajaran', [PelajaranController::class, 'tambahpelajaran'])->name('pelajaran.tambahpelajaran'); 
Route::get('/pelajaran/{id}/edit', [PelajaranController::class, 'edit'])->name('pelajaran.edit');
Route::delete('/pelajaran/{id}', [PelajaranController::class, 'destroy'])->name('pelajaran.destroy'); 
Route::put('/pelajaran/{id}', [PelajaranController::class, 'update'])->name('pelajaran.update');

//routes Jadwal
use App\Http\Controllers\JadwalController;
//Route::get('/admins', [AdminsCon::class, 'index']);
Route::get('/jadwal_guru', [JadwalController::class, 'index']);
Route::post('/jadwal/tambahjadwal', [JadwalController::class, 'tambahjadwal'])->name('jadwal.tambahjadwal'); 
Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy'); 
Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
