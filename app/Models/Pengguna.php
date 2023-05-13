<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Pengguna extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'pengguna';

    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'nama_user',
        'tgl_lahir',
        'gender',
        'tlpn',
        'alamat',
        'kidal',
        'lama_pnglm',
        'goal',
        'foto',
        'path'
    ];

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

    public function data_fisik(){
        return $this->hasMany(DataFisik::class);
    }

}
