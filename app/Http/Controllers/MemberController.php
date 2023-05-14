<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


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

        return view('jadwal_member', ['imageName' => $pengguna->foto]);
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

        // Perbarui data formulir
        $pengguna->name = $request->input('nama_lengkap');
        $pengguna->tgl_lahir = $request->input('tanggal_lahir');
        $pengguna->gender = $request->input('option');
        $pengguna->tlpn = $request->input('no_telepon');
        $pengguna->alamat = $request->input('alamat');
        $pengguna->kidal = $request->input('kidal');
        $pengguna->lama_pnglmn = $request->input('lama_pengalaman');
        $pengguna->goal = $request->input('goal');
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
        return redirect()->route('edit_biodata')->with('success', 'Formulir berhasil diperbarui.');
    }
    
}
