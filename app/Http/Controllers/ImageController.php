<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10000' // max 5MB upload mentah
        ]);

        $file = $request->file('image');

        // Nama unik
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Baca gambar dengan Intervention
        $img = Image::make($file);

        // Kompresi gambar sampai <= 1MB
        $quality = 90;
        do {
            $tempPath = storage_path('app/public/' . $filename);
            $img->save($tempPath, $quality); 
            $filesize = filesize($tempPath);
            $quality -= 5; // turunkan kualitas bertahap
        } while ($filesize > 1024 * 1024 && $quality > 10); // stop kalau <= 1MB atau kualitas < 10

        return response()->json([
            'success' => true,
            'filename' => $filename,
            'size' => round($filesize / 1024, 2) . ' KB'
        ]);
    }
}
