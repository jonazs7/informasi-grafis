<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengguna;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request\fill;


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

        $show_pengguna = DB::table('pengguna')
            ->leftjoin('jadwal', 'jadwal.id_pengguna', '=', 'pengguna.id')
            ->where('level', 'Member')
            ->select('pengguna.id', 'pengguna.name', 'pengguna.email', 'pengguna.tlpn', 'pengguna.gender') // bisa dihapus biar kebaca idnya ntar, karena kalau pake select harus sama dengan yg diviewnya ketika ditampilin
            ->distinct() // menghilangkan duplikasi data saat penampilan data
            ->get();

        return view('jadwal_trainer', ['imageName' => $pengguna->foto, 'show_pengguna' => $show_pengguna]);
    }

    public function lihat_kegiatan($id){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        //untuk nampilin makek join table, bisa makek ini, bisa nda
        // $show_kegiatan = DB::table('jadwal')
        //     ->join('pengguna', 'pengguna.id', '=', 'jadwal.id_pengguna')
        //     ->where('id_pengguna', $id)
        //     ->get();

        $show_kegiatan = DB::table('jadwal')
            ->where('id_pengguna', $id)
            ->get();

        $nama_pengguna = Pengguna::find($id);

        // untuk querystring berdasarkan email
        // $nama_pengguna =  Pengguna::where('email', $id)->first(); 

        return view('lihat_kegiatan_trainer', ['imageName' => $pengguna->foto, 'show_kegiatan' => $show_kegiatan, 'nama_pengguna' => $nama_pengguna]);
    }

    public function save_kegiatan(Request $request){
        $program_latihan = implode(', ', $request->input('jenis_latihan'));

        Jadwal::create([
            'id_pengguna' => $request->input('kode_pengguna'),
            'tgl_mulai' => $request->input('tanggal_mulai'),
            'tgl_selesai' => $request->input('tanggal_selesai'),
            'sesi_latihan' => $request->input('sesi_latihan'),
            'status' => 'Proses',
            'jenis_latihan' => $program_latihan
        ]);

        // $jadwal = new Jadwal();
        // $jadwal->id_pengguna = $request->kode_pengguna;
        // $jadwal->tgl_mulai = $request->tanggal_mulai;
        // $jadwal->tgl_selesai = $request->tanggal_selesai;
        // $jadwal->sesi_latihan = $request->sesi_latihan;
        // $jadwal->status = 'Proses';
        // $jadwal->save();
        return back();
    }

    public function delete_kegiatan(Request $request){
        $id = $request->input('id');
        $jadwal = Jadwal::find($id);
        $jadwal->delete();;
    }

    public function show_profile_anggota($id){
        $cari_pengguna = Pengguna::findOrFail($id); // Mengambil data pengguna berdasarkan ID
        
        return response()->json($cari_pengguna);
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
