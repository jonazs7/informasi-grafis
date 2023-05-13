<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class MemberController extends Controller
{
    public function beranda(){
        return view('beranda_member');
    }

    public function jadwal(){
        return view('jadwal_member');
    }

    public function edit_biodata(){
        $pengguna = Auth::user();
        return view('biodata_member', compact('pengguna'));
    }
}
