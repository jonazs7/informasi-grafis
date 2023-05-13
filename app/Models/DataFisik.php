<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFisik extends Model
{
    protected $table = 'data_fisik';

    protected $fillable = [
        'id_pengguna',
        'tgl',
        'tinggi',
        'berat',
        'neck',
        'waist',
        'hip',
        'bisep',
        'dada',
        'pantat',
        'paha_bwh',
        'betis',
        'body_mass',
        'body_fat'
    ];
    
    public function pengguna(){
        return $this->belongsTo(Pengguna::class);
    }
}
