<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pengguna;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MemberController extends Controller
{
    public function beranda(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        return view('beranda_member', ['imageName' => $pengguna->foto]);
    }

    public function jadwal(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        $show_jadwal = DB::table('jadwal')
        ->where('id_pengguna', $user->id)
        ->get();

        return view('jadwal_member', ['imageName' => $pengguna->foto, 'show_jadwal' => $show_jadwal,  'pengguna' => $pengguna]);
    }

    public function save_goal(Request $request){
        Jadwal::create([
            'id_pengguna' => $request->input('kode_pengguna'),
            'goal' => $request->input('goal'),
            'status' => 'Proses'
        ]);

        return back();
    }

    public function edit_biodata(){
        $user = Auth::user();
        $pengguna = Pengguna::where('id', $user->id)->first();

        return view('biodata_member', ['pengguna' => $pengguna, 'imageName' => $pengguna->foto]);
    }

    public function update_biodata(Request $request){
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengambil data formulir yang akan diperbarui
        $pengguna = Pengguna::where('id', $user->id)->first();

        // Validasi resolusi gambar
        // $this->validate($request, [
        //     'gambar' => 'dimensions:max_width=128, max_height=128',
        // ]);

        // Perbarui data formulir
        $pengguna->name = $request->input('nama_lengkap');
        $pengguna->tgl_lahir = $request->input('tanggal_lahir');
        $pengguna->gender = $request->input('option_gender');
        $pengguna->tlpn = $request->input('no_telepon');
        $pengguna->alamat = $request->input('alamat');
        $pengguna->kidal = $request->input('option_kidal');
        $pengguna->lama_pnglmn = $request->input('lama_pengalaman');
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = uniqid().'_'.$image->getClientOriginalName();

            // Simpan gambar yang diperbarui ke direktori penyimpanan yang sesuai
            $image->move(public_path('images/'), $imageName);

            // Update atribut 'image' pada model
            $pengguna->foto = $imageName;
        }
        // Simpan perubahan
        $pengguna->save();
        
        // Redirect ke halaman yang diinginkan setelah berhasil diperbarui
        return redirect()->route('edit_biodata')->with('success', 'Data telah diperbarui');
    }
    
}
