<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Beritas; 
use Illuminate\Http\Request;

use Intervention\Image\Laravel\Facades\Image;

use Illuminate\Support\Str;


class BeritaCon extends BaseController
{
   public function index()
    {
        $databerita = Beritas::all(); // Ambil semua data dari tabel Siswa
        return view('berandaberita', compact('databerita')); // Kirim data ke view
    }

    public function katalog()
    {
        $databerita = Beritas::orderBy('tanggal_publish', 'desc')->get(); // Ambil semua data dari tabel Siswa
        return view('berita', compact('databerita')); // Kirim data ke view
    }

    public function show($slug)
{
    $berita = Beritas::where('slug', $slug)->firstOrFail();
    return view('show', compact('berita'));
}

public function tambahberita(Request $request)
    {
        $request->validate([
            'judul'   => 'required',
            'isi'     => 'required',
            'penulis' => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $file = $request->file('image');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('uploads/berita/' . $filename);

        // Resize + compress
        $img = Image::read($file)
        ->scale(width: 1200);
        

        $quality = 90;
        do {
            $img->save($path, quality: $quality);
            $filesize = filesize($path);
            $quality -= 5;
        } while ($filesize > 1024 * 1024 && $quality > 10);

        Beritas::create([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'penulis' => $request->penulis,
            'gambar'  => 'uploads/berita/' . $filename,
        ]);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan!');
    }
    public function old_tambahberita(Request $request)
    {
        // Validasi input
        $request->validate([
            //'id'   => 'required',
            'judul'    => 'required',
            'isi' => 'required',
            'penulis'    => 'required',
            //'password'    => 'required',
        ]);

        // Simpan ke database
        Beritas::create([
            //'id'     => $request->id,
            'judul'    => $request->judul,
            'isi'    => $request->isi,
            //'isi' => bcrypt($request->isi),
            'penulis'    => $request->penulis,
            //'kelas'    => $request->kelas,
        ]);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
{
    $berita = Beritas::findOrFail($id);
    return view('berita.edit', compact('berita'));
}

public function destroy($id)
{
    $berita = Beritas::findOrFail($id);
    $berita->delete();
    return redirect()->back()->with('success', 'Data berita berhasil dihapus');
}
public function update(Request $request, $id)
{
    $berita = Beritas::findOrFail($id);

    $request->validate([
        'judul'    => 'required',
            'isi' => 'required',
            'penulis'    => 'required',
        
    ]);

    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->penulis = $request->penulis;
    

    

    $berita->save();

    return redirect()->back()->with('success', 'Berita berhasil diperbarui!');
}

public function galeri()
{
    $beritas = Beritas::all();
    return view('galeri', compact('beritas'));
}


}
