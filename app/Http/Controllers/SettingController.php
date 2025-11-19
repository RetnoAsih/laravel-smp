<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Menampilkan form edit pengaturan jam batas
     */
    public function edit()
    {
        // Ambil nilai batas jam dari database
        $batas_jam = Setting::getValue('batas_jam', '10:00');

        return view('settings.edit', compact('batas_jam'));
    }

    /**
     * Memperbarui pengaturan jam batas
     */
    public function update(Request $request)
    {
        // Validasi format input jam (HH:MM)
        $request->validate([
            'batas_jam' => 'required|date_format:H:i',
        ]);

        // Simpan perubahan ke database
        Setting::setValue('batas_jam', $request->batas_jam);

        return redirect()->back()->with('success', 'Jam batas berhasil diperbarui!');
    }
}
