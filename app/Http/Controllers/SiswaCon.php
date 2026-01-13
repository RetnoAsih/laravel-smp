<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Siswas; 
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

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
            'image'   => 'required|image|mimes:jpeg,png,jpg|max:51200',
        ]);

        $file = $request->file('image');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('uploads/foto/' . $filename);

        // Resize + compress
        $img = Image::read($file)
        ->scale(width: 1200);
        

        $quality = 90;
        do {
            $img->save($path, quality: $quality);
            $filesize = filesize($path);
            $quality -= 5;
        } while ($filesize > 1024 * 1024 && $quality > 10);

        // Simpan ke database
        Siswas::create([
            //'id'     => $request->id,
            'nama_siswa'    => $request->nama_siswa,
            'password' => bcrypt($request->password),
            'no_hp'    => $request->no_hp,
            'kelas'    => $request->kelas,
            'foto'  => 'uploads/foto/' . $filename,
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
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
    return redirect()->back()->with('success', 'Data user berhasil dihapus');
}
public function oldupdate(Request $request, $id)
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

    return redirect()->back()->with('success', 'User berhasil diperbarui!');
}

public function update(Request $request, $id)
{
    $siswa = Siswas::findOrFail($id);

    $request->validate([
        'nama_siswa' => 'required',
        'kelas'      => 'required',
        'no_hp'      => 'required',
        'foto'       => 'nullable|image|mimes:jpeg,png,jpg|max:51200', // max 50MB
    ]);

    $siswa->nama_siswa = $request->nama_siswa;
    $siswa->kelas = $request->kelas;
    $siswa->no_hp = $request->no_hp;

    if (!empty($request->password)) {
        $siswa->password = bcrypt($request->password);
    }

    // === Jika ada foto baru diupload ===
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($siswa->foto && File::exists(public_path($siswa->foto))) {
            File::delete(public_path($siswa->foto));
        }

        // Proses foto baru
        $file = $request->file('foto');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('uploads/foto/' . $filename);

        // Resize dan compress (sama seperti di fungsi tambah)
        $img = Image::read($file)->scale(width: 1200);
        $quality = 90;
        do {
            $img->save($path, quality: $quality);
            $filesize = filesize($path);
            $quality -= 5;
        } while ($filesize > 1024 * 1024 && $quality > 10);

        // Simpan path baru ke database
        $siswa->foto = 'uploads/foto/' . $filename;
    }

    $siswa->save();

    return redirect()->back()->with('success', 'User berhasil diperbarui!');
}

}
