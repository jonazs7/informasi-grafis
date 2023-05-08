<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function beranda(){
        return view('beranda_trainer');
    }

    public function jadwal(){
        return view('jadwal_trainer');
    }

    public function create_kegiatan(){
        return view('create_kegiatan_trainer');
    }

    public function hasil_capaian(){
        return view('hasil_capaian_trainer');
    }

    public function detail_info(){
        return view('detail_info_trainer');
    }
}
