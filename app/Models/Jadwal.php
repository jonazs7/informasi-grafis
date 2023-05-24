<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'id_pengguna',
        'goal',
        'tgl_mulai',
        'tgl_selesai',
        'sesi_latihan',
        'jenis_latihan',
        'status'
    ];

    protected $primaryKey = 'id_jadwal';

    public function pengguna(){
        return $this->belongsTo(Pengguna::class);
    }
}
