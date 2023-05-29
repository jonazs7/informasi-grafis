<?php

namespace App\Http\Controllers;

use App\Models\DataFisik;
use Illuminate\Http\Request;

use App\Models\Pengguna;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request\fill;
use Carbon\Carbon; // Import Carbon untuk manipulasi tanggal


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

    public function show_kegiatan($id){
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

    public function delete_kegiatan($kode_jadwal){
        // $idJadwal = $request->query('id_jadwal');

        // $jadwal = Jadwal::find($idJadwal);

        // if (!$jadwal) {
        //     return redirect()->route('tampil.jadwal')->with('error', 'Data tidak ditemukan');
        // }

        // $jadwal->delete();

        // return redirect()->route('tampil.jadwal')->with('success', 'Data berhasil dihapus');

        DB::table('jadwal')
        ->where('id_jadwal', $kode_jadwal)
        ->delete();

        return back();
    }

    public function edit_kegiatan($kode_jadwal){
        // Mengambil data kegiatan berdasarkan id_jadwal
        $cari_kegiatan = Jadwal::where('id_jadwal', $kode_jadwal)->first(); 
       
        return response()->json($cari_kegiatan);
    }

    public function update_kegiatan(Request $request, $jadwalId){
        // Ambil data dari permintaan
        $goal = $request->input('goal');
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        // try {
        //     // Mengubah format inputan tanggal menjadi objek Carbon
        //     $tanggalSelesai = Carbon::createFromFormat('Y-m-d', $tanggalSelesai, 'Asia/Jakarta');
        // } catch (\Exception $e) {
        //     // Tangani kesalahan format tanggal yang tidak valid
        //     // Misalnya, kembalikan respon error atau lakukan tindakan lainnya
        // }
        // // Membandingkan tanggal hari ini dengan tanggal selesai
        // if(Carbon::now('Asia/Jakarta')->isSameDay($tanggalSelesai)) {
        //     $status = "Selesai";
        // } elseif(Carbon::now('Asia/Jakarta')->greaterThan($tanggalSelesai)) {
        //     $status = "Selesai";
        // } else {
        //     $status = "Proses";
        // }
        $sesiLatihan = $request->input('sesi_latihan');

        $jenisLatihan = $request->input('jenis_latihan');
        if (is_array($jenisLatihan) && count($jenisLatihan) > 0) {
            $jenisLatihan = implode(', ', $jenisLatihan);
        } else {
            $jenisLatihan = NULL;
        }
        $status = $request->input('status');

        // Lakukan pemrosesan update kegiatan sesuai dengan data yang diterima
        $jadwal = Jadwal::where('id_jadwal', $jadwalId)->first();
        $jadwal->goal = $goal;
        $jadwal->tgl_mulai = $tanggalMulai;
        $jadwal->tgl_selesai = $tanggalSelesai;
        $jadwal->sesi_latihan = $sesiLatihan;
        $jadwal->jenis_latihan = $jenisLatihan;
        $jadwal->status = $status;
        $jadwal->update();

        return back();
    }

    public function show_profile_anggota($id){
        // Mengambil data pengguna berdasarkan ID
        $cari_pengguna = Pengguna::findOrFail($id); 
        
        return response()->json($cari_pengguna);
    }

    public function hasil_capaian(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        $show_capaian = DB::table('pengguna')
        ->leftjoin('data_fisik', 'data_fisik.id_pengguna', '=', 'pengguna.id')
        ->select('pengguna.id', 'data_fisik.id_pengguna', 'pengguna.foto', 'pengguna.name', 'pengguna.level', 'pengguna.email',
        'pengguna.tlpn', 'pengguna.gender', DB::raw('AVG(body_mass) as rerata_bmi'), DB::raw('AVG(body_fat) as rerata_bfp'))
        ->where('level', '=', 'Member')
        ->groupBy('pengguna.id', 'data_fisik.id_pengguna', 'pengguna.foto', 'pengguna.name', 'pengguna.level', 'pengguna.email', 
        'pengguna.tlpn', 'pengguna.gender')
        ->get();

        return view('hasil_capaian_trainer', ['imageName' => $pengguna->foto, 'show_capaian' => $show_capaian]);
    }

    public function create_data_fisik($kode_pengguna){
        $show_capaian_js = DB::table('pengguna')
        ->leftjoin('data_fisik', 'data_fisik.id_pengguna', '=', 'pengguna.id')
        ->select('pengguna.id', 'data_fisik.id_pengguna', 'pengguna.foto', 'pengguna.name', 'pengguna.level', 'pengguna.email',
        'pengguna.tlpn', 'pengguna.gender', DB::raw('AVG(body_mass) as rerata_bmi'), DB::raw('AVG(body_fat) as rerata_bfp'))
        ->where('level', '=', 'Member')
        ->groupBy('pengguna.id', 'data_fisik.id_pengguna', 'pengguna.foto', 'pengguna.name', 'pengguna.level', 'pengguna.email', 
        'pengguna.tlpn', 'pengguna.gender')
        ->where('id', $kode_pengguna)
        ->first();

        return response()->json($show_capaian_js);
    }

    public function save_data_fisik(Request $request){
        $gender = $request->input('jekel');

        // Memeriksa jenis kelamin dan mengatur rumus yang sesuai
        if ($gender == 'Pria') {
            // Rumus untuk Pria
            $body_mass = $request->input('berat') / (($request->input('tinggi') / 100) * ($request->input('tinggi') / 100));
            $body_fat = 495 / (1.0324 - 0.19077 * log10($request->input('lingkar_pinggang')-$request->input('lingkar_leher'))
                        + 0.15456 * log10($request->input('tinggi')) ) - 450;

        } elseif ($gender == 'Wanita') {
            // Rumus untuk Wanita
            $body_mass = $request->input('berat') / (($request->input('tinggi') / 100) * ($request->input('tinggi') / 100));
            $body_fat =  495 / (1.29579 - 0.35004 * log10($request->input('lingkar_pinggang')+
            $request->input('lingkar_paha_atas')-$request->input('lingkar_leher'))
                        + 0.22100 * log10($request->input('tinggi')) ) - 450;

        } else {
            // Menangani kasus jika jenis kelamin tidak ada
            return back()->with('error', 'Jenis kelamin belum ada, harap isi terlebih dahulu');
        }
            
            // Menyimpan data fisik berdasarkan jenis kelamin
            DataFisik::create([
                'id_pengguna' => $request->input('kode_pengguna'),
                'tgl' => $request->input('tanggal'),
                'tinggi' => $request->input('tinggi'),
                'bisep' => $request->input('lingkar_bisep'),
                'berat' => $request->input('berat'),
                'dada' => $request->input('lingkar_dada'),
                'neck' => $request->input('lingkar_leher'),
                'pantat' => $request->input('lingkar_pantat'),
                'hip' =>  $request->input('lingkar_paha_atas'),
                'paha_bwh' => $request->input('lingkar_paha_bawah'),
                'waist' => $request->input('lingkar_pinggang'),
                'betis' => $request->input('lingkar_betis'),
                'body_mass' => $body_mass,
                'body_fat' => $body_fat
            ]);

        return back()->with('success', 'Data berhasil ditambahkan');
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
