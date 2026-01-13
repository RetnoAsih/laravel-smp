<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Jadwal; 
use App\Models\Siswas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class JadwalController extends BaseController
{


   public function index()
    {
        $datajadwal = Jadwal::with('guru')->get();
        
        $guru = Siswas::where('kelas', 'guru')
                    ->select('id', 'nama_siswa')
                    ->orderBy('nama_siswa', 'asc')
                    ->get();
        return view('jadwal_guru', compact('datajadwal', 'guru')); 
    }

    public function tambahjadwal(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_guru'   => 'required',
            'hari'   => 'required',
            'kelas'    => 'required',
            'mapel' => 'required',
          
        ]);

        // Simpan ke database
        Jadwal::create([
            'id_guru'     => $request->id_guru,
            'hari'     => $request->hari,
            'kelas'    => $request->kelas,
            'mapel'    => $request->mapel,
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
{
    $jadwal = Jadwal::findOrFail($id);
    return view('jadwal.edit', compact('jadwal'));
}

public function destroy($id)
{
    $jadwal = Jadwal::findOrFail($id);
    $jadwal->delete();
    return redirect()->back()->with('success', 'Data jadwal berhasil dihapus');
}
public function update(Request $request, $id)
{
    $jadwal = Jadwal::findOrFail($id);

    $request->validate([
        'id_guru' => 'required',
        'hari' => 'required',
        'kelas'     => 'required',
        'mapel'        => 'required',
    ]);

    $jadwal->id_guru = $request->id_guru;
    $jadwal->hari = $request->hari;
    $jadwal->kelas = $request->kelas;
    $jadwal->mapel = $request->mapel;

   

    $jadwal->save();

    return redirect()->back()->with('success', 'Jadwal berhasil diperbarui!');
}
/*
public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->intended('/_dashboard')->with('success', 'Login berhasil!');
    }

    return back()->withErrors([
        'username' => 'Username atau password salah',
    ]);
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Anda telah logout.');
}*/

}
