<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings'; // Nama tabel
    protected $fillable = ['key', 'value']; // Kolom yang bisa diisi

    /**
     * Ambil value berdasarkan key.
     * Contoh penggunaan: Setting::getValue('batas_jam');
     */
    public static function getValue($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Ubah atau buat value berdasarkan key.
     * Contoh penggunaan: Setting::setValue('batas_jam', '09:30');
     */
    public static function setValue($key, $value)
    {
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
