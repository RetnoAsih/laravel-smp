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
            'saungwa_appkey' => 'required',
            'saungwa_authkey' => 'required',
        ]);

        // Simpan perubahan ke database
        Setting::setValue('batas_jam', $request->batas_jam);
        $this->updateEnv('SAUNGWA_APPKEY', $request->saungwa_appkey);
        $this->updateEnv('SAUNGWA_AUTHKEY', $request->saungwa_authkey);

        return redirect()->back()->with('success', 'Jam batas berhasil diperbarui!');
    }

    private function updateEnv($key, $value)
{
    $path = base_path('.env');
    if (file_exists($path)) {
        $old = env($key);
        $content = file_get_contents($path);
        $newContent = str_replace("$key=".$old, "$key=".$value, $content);
        file_put_contents($path, $newContent);
    }
}
}
