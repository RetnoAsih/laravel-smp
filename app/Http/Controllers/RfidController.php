<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RfidController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data dari Python
        $data = $request->validate([
            'uid' => 'required|string',
            'waktu' => 'required|string',
        ]);

        // Simpan ke tabel (pastikan tabel rfid_logs sudah ada)
        DB::table('rfid_logs')->insert([
            'uid' => $data['uid'],
            'waktu' => $data['waktu'],
        ]);

        // Kirim respon ke Python
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
