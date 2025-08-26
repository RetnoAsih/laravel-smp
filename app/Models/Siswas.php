<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
class Siswas extends Model
{
    use  HasFactory;
//protected $table = 'siswa'; // Nama tabel sesuai di database
protected $primaryKey = 'id'; // Kolom primary key
    public $incrementing = false; // Karena id diisi manual dari RFID
    protected $keyType = 'string'; // Kalau id RFID berbentuk string
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nama_siswa',
        'kelas',
        'no_hp',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public $timestamps = false;

}
