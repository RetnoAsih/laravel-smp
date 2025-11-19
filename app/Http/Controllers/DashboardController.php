<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Siswas;
use App\Models\Beritas;
use App\Models\Admins;
use App\Models\Absensis;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil bulan dari dropdown, default = bulan sekarang
        $bulan = $request->input('bulan', now()->month);

        // Data dashboard
        $totalSiswa    = Siswas::count();
        $totalBerita   = Beritas::count();
        $totalPengguna = Admins::count();
        $totalAbsensi  = Absensis::count();

        // Data siswa
        $datasiswa = Siswas::all();

        // Ambil absensi hanya pada bulan yang dipilih
        $dataabsensi = Absensis::with('siswa')
            ->whereMonth('waktu', $bulan)
            ->get();

        // Ambil jumlah hari dalam bulan
        $lastDay = \Carbon\Carbon::create(null, $bulan)->daysInMonth;

        return view('dashhome', compact(
            'totalSiswa',
            'totalBerita',
            'totalPengguna',
            'totalAbsensi',
            'datasiswa',
            'dataabsensi',
            'bulan',
            'lastDay'
        ));
    }
}

