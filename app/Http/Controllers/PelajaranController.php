<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pelajaran; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PelajaranController extends BaseController
{


   public function index()
    {
        $datapelajaran = Pelajaran::all(); // Ambil semua data dari tabel admins
        return view('pelajaran', compact('datapelajaran')); // Kirim data ke view
    }

    public function tambahpelajaran(Request $request)
    {
        // Validasi input
        $request->validate([
            'hari'   => 'required',
            'kelas'    => 'required',
            'mapel' => 'required',
          
        ]);

        // Simpan ke database
        Pelajaran::create([
            'hari'     => $request->hari,
            'kelas'    => $request->kelas,
            'mapel'    => $request->mapel,
        ]);

        return redirect()->back()->with('success', 'Pelajaran berhasil ditambahkan!');
    }

    public function edit($id)
{
    $pelajaran = Pelajaran::findOrFail($id);
    return view('pelajaran.edit', compact('pelajaran'));
}

public function destroy($id)
{
    $pelajaran = Pelajaran::findOrFail($id);
    $pelajaran->delete();
    return redirect()->back()->with('success', 'Data pelajaran berhasil dihapus');
}
public function update(Request $request, $id)
{
    $pelajaran = Pelajaran::findOrFail($id);

    $request->validate([
        'hari' => 'required',
        'kelas'     => 'required',
        'mapel'        => 'required',
    ]);

    $pelajaran->hari = $request->hari;
    $pelajaran->kelas = $request->kelas;
    $pelajaran->mapel = $request->mapel;

   

    $pelajaran->save();

    return redirect()->back()->with('success', 'Pelajaran berhasil diperbarui!');
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
