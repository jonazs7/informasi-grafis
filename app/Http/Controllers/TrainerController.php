<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function beranda(){
        return view('beranda_trainer');
    }
}
