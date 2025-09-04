<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensis extends Model
{
    use  HasFactory;
    protected $table = 'absensis'; // Nama tabel sesuai di database
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       
        'id_siswa',
        //'waktu',
        
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
    public function siswa()
    {
        return $this->belongsTo(Siswas::class, 'id_siswa', 'uid');
    }

}
