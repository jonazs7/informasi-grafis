<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;


class TrainerController extends Controller
{
    public function beranda(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        return view('beranda_trainer', ['imageName' => $pengguna->foto]);
    }

    public function jadwal(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        return view('jadwal_trainer', ['imageName' => $pengguna->foto]);
    }

    public function create_kegiatan(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        return view('create_kegiatan_trainer', ['imageName' => $pengguna->foto]);
    }

    public function hasil_capaian(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        return view('hasil_capaian_trainer', ['imageName' => $pengguna->foto]);
    }

    public function detail_info(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        return view('detail_info_trainer', ['imageName' => $pengguna->foto]);
    }

    public function anggota_gym(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();
        
        return view('anggota_gym_trainer', ['imageName' => $pengguna->foto]);
    }
}
