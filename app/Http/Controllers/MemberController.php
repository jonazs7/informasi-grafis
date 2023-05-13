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

    public function update_biodata(Request $request){
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengambil data formulir yang akan diperbarui
        $pengguna = Pengguna::where('id', $user->id)->first();

        // Perbarui data formulir
        $pengguna->name = $request->input('nama');
        $pengguna->tgl_lahir = $request->input('tanggal_lahir');
        $pengguna->gender = $request->input('option');
        $pengguna->tlpn = $request->input('no_telepon');
        $pengguna->alamat = $request->input('alamat');
        $pengguna->kidal = $request->input('kidal');
        $pengguna->lama_pnglmn = $request->input('lama_pengalaman');
        $pengguna->goal = $request->input('goal');

        // Simpan perubahan
        $pengguna->save();

        // Redirect ke halaman yang diinginkan setelah berhasil diperbarui
        return redirect()->route('edit_biodata')->with('success', 'Formulir berhasil diperbarui.');
    }
}
