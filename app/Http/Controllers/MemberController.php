<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function beranda(){
        return view('beranda_member');
    }

    public function jadwal(){
        return view('jadwal_member');
    }

    public function biodata(){
        return view('biodata_member');
    }
}
