<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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

        $show_pengguna = DB::table('pengguna')->where('level', 'Member')->get();
        
        return view('anggota_gym_trainer', ['imageName' => $pengguna->foto, 'show_pengguna' => $show_pengguna]);
    }

    public function save_anggota_gym(Request $request){
        $validatedData = $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users',
            // 'password' => 'required|string|min:6',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        Pengguna::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'level' => 'Member',
        ]);

        return redirect()->route('anggotaGym')->with('success', 'Data telah ditambahkan');
    }

    public function delete_anggota_gym($kode){
        //$pengguna = Pengguna::find($id);
        $pengguna = Pengguna::where('id', $kode)->first();
        $pengguna->delete();
       
        return redirect()->route('anggotaGym')->with('berhasil', 'Data telah dihapus');
    }
}
