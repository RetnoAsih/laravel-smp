<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Siswas; 
use Illuminate\Http\Request;

class SiswaCon extends BaseController
{
   public function index()
    {
        $datasiswa = Siswas::all(); // Ambil semua data dari tabel Siswa
        return view('berandasiswa', compact('datasiswa')); // Kirim data ke view
    }

    public function tambahsiswa(Request $request)
    {
        // Validasi input
        $request->validate([
            //'id'   => 'required',
            'nama_siswa'    => 'required',
            'kelas' => 'required',
            'no_hp'    => 'required',
            'password'    => 'required',
        ]);

        // Simpan ke database
        Siswas::create([
            //'id'     => $request->id,
            'nama_siswa'    => $request->nama_siswa,
            'password' => bcrypt($request->password),
            'no_hp'    => $request->no_hp,
            'kelas'    => $request->kelas,
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit($id)
{
    $siswa = Siswas::findOrFail($id);
    return view('siswa.edit', compact('siswa'));
}

public function destroy($id)
{
    $siswa = Siswas::findOrFail($id);
    $siswa->delete();
    return redirect()->back()->with('success', 'Data siswa berhasil dihapus');
}
public function update(Request $request, $id)
{
    $siswa = Siswas::findOrFail($id);

    $request->validate([
        //'id' => 'required',
        'nama_siswa'     => 'required',
        'kelas'        => 'required',
        'no_hp'        => 'required',
        
    ]);

    //$siswa->id = $request->id;
    $siswa->nama_siswa = $request->nama_siswa;
    $siswa->kelas = $request->kelas;
    $siswa->no_hp = $request->no_hp;

    if (!empty($request->password)) {
        $siswa->password = bcrypt($request->password);
    }

    $siswa->save();

    return redirect()->back()->with('success', 'Siswa berhasil diperbarui!');
}


}
