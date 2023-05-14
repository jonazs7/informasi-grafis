<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengguna;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();
    
        if (Auth::user()->level == 'Trainer') { 
            return view('beranda_trainer', ['imageName' => $pengguna->foto]);
        } elseif (Auth::user()->level == 'Member') { 
            return view('beranda_member', ['imageName' => $pengguna->foto]);
        }
    }
}
