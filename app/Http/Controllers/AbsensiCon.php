<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Absensis; 
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiCon extends BaseController
{
   public function index()
    {
        //$dataabsensi = Absensis::all(); // Ambil semua data dari tabel absensi
        $dataabsensi = Absensis::with('siswa')->get();
        $hariTanggal = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY');
        $absensiTerbaru = Absensis::with('siswa') // jika ada relasi ke siswa
        ->orderBy('waktu', 'desc') // urutkan dari yang terbaru
        ->first(); // ambil satu data saja
        //return view('berandaabsensi', compact('absensiTerbaru','dataabsensi','hariTanggal')); // Kirim data ke view
        return view('berandaabsensi', compact('absensiTerbaru','dataabsensi','hariTanggal')); // Kirim data ke view
    }
   public function standby()
    {
        //$dataabsensi = Absensis::all(); // Ambil semua data dari tabel absensi
        $dataabsensi = Absensis::with('siswa')->get();
        $hariTanggal = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY');
        $absensiTerbaru = Absensis::with('siswa') // jika ada relasi ke siswa
        ->orderBy('waktu', 'desc') // urutkan dari yang terbaru
        ->first(); // ambil satu data saja
        //return view('berandaabsensi', compact('absensiTerbaru','dataabsensi','hariTanggal')); // Kirim data ke view
        return view('standby', compact('absensiTerbaru','dataabsensi','hariTanggal')); // Kirim data ke view
    }

    public function tambahabsensi(Request $request)
    {
        // Validasi input
        $request->validate([
            //'id'   => 'required',
            'id_siswa'    => 'required',
            //'waktu' => 'required',
            
        ]);

        // Simpan ke database
        Absensis::create([
            //'id'     => $request->id,
            'id_siswa'    => $request->id_siswa,
            
            //'waktu'    => $request->waktu,
            
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil ditambahkan!');
    }

    public function edit($id)
{
    $absensi = Absensis::findOrFail($id);
    return view('absensi.edit', compact('absensi'));
}

public function destroy($id)
{
    $absensi = Absensis::findOrFail($id);
    $absensi->delete();
    return redirect()->back()->with('success', 'Data absensi berhasil dihapus');
}
public function update(Request $request, $id)
{
    $absensi = Absensis::findOrFail($id);

    $request->validate([
        //'id' => 'required',
        'id_siswa'     => 'required',
        //'waktu'        => 'required',
        
        
    ]);

    //$absensi->id = $request->id;
    $absensi->id_siswa = $request->id_siswa;
    //$absensi->waktu = $request->waktu;
    
/*
    if (!empty($request->password)) {
        $siswa->password = bcrypt($request->password);
    }    */

    $absensi->save();

    return redirect()->back()->with('success', 'Absensi berhasil diperbarui!');
}
public function getTerbaru()
{
    $absensiTerbaru = Absensis::with('siswa')
        ->orderBy('waktu', 'desc')
        ->first();

    return response()->json($absensiTerbaru);
}


}
