<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengguna;
use App\Models\Jadwal;
use App\Models\DataFisik;
use Illuminate\Support\Facades\DB;


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
            // SUMBU Y - Jumlah Anggota Gym Bulanan
            $total_member = Pengguna::select(DB::raw("CAST(COUNT(email) as int) as total_member"))
            ->where('level', 'Member')
            ->groupBy(DB::raw("Month(created_at)"))
            ->orderBy(DB::raw("MONTH(created_at)"))
            ->pluck('total_member');
    
            // SUMBU X - Jumlah Anggota Gym Bulanan
            $bulan = Pengguna::select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->where('level', 'Member')
            ->groupBy(DB::raw("MONTHNAME(created_at)"))
            ->orderBy(DB::raw("MONTH(created_at)"))
            ->pluck('bulan');
    
            // SUMBU Y - STATUS TRAINING
            $total_status = Jadwal::select(DB::raw("CAST(COUNT(status) as int) as total_status"))
            ->groupBy(DB::raw("status"))
            ->pluck('total_status');
            
            // SUMBU X - STATUS TRAINING
            $status = Jadwal::select(DB::raw("status"))
            ->groupBy(DB::raw("status"))
            ->pluck('status');
    
            // SUMBU Y - Goal Anggota Gym 
            $total_goal = Jadwal::select(DB::raw("CAST(COUNT(goal) as int) as total_goal"))
            ->groupBy(DB::raw("goal"))
            ->pluck('total_goal');
            
            // SUMBU X - Goal Anggota Gym 
            $goal = Jadwal::select(DB::raw("goal"))
            ->groupBy(DB::raw("goal"))
            ->pluck('goal');

            return view('beranda_trainer', ['imageName' => $pengguna->foto, 'total_member' => $total_member, 'bulan' => $bulan,
                        'total_status' => $total_status, 'status' => $status, 'total_goal' => $total_goal, 
                        'goal' => $goal]);
        } 
        
        elseif (Auth::user()->level == 'Member') { 
            $show_data_fisik = DB::table('data_fisik')
            ->where('id_pengguna', $user->id)
            ->get();

            // SUMBU Y - BMI
            $y_bmi = DataFisik::select(DB::raw("body_mass"))
            ->where('id_pengguna', $user->id)
            ->orderBy('tgl')
            ->pluck('body_mass');

            // SUMBU X - BMI
            $x_bmi = DataFisik::select(DB::raw("tgl"))
            ->where('id_pengguna', $user->id)
            ->orderBy('tgl')
            ->pluck('tgl');

            // SUMBU Y - BFP
            $y_bfp = DataFisik::select(DB::raw("body_fat"))
            ->where('id_pengguna', $user->id)
            ->orderBy('tgl')
            ->pluck('body_fat');

            // SUMBU X - BFP
            $x_bfp = DataFisik::select(DB::raw("tgl"))
            ->where('id_pengguna', $user->id)
            ->orderBy('tgl')
            ->pluck('tgl');

            return view('beranda_member', ['imageName' => $pengguna->foto, 'show_data_fisik' => $show_data_fisik,
                        'y_bmi' => $y_bmi, 'x_bmi' => $x_bmi, 'y_bfp' => $y_bfp, 'x_bfp' => $x_bfp]);
        }
    }
}
