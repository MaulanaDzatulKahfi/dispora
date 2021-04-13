<?php

namespace App\Http\Controllers;

use App\Models\Datadiri;
use App\Models\Kk;
use App\Models\Kolektif;
use App\Models\Peserta;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tittle = 'Dashboard';
        $user_id = Auth::user()->id;
        $datadiri = Datadiri::where('user_id', $user_id)->first();
        $kk = Kk::where('user_id', $user_id)->first();
        $petugas = Kolektif::where('user_id', $user_id)->first();
        $role = Auth::user()->getRoleNames();
        $user = User::latest()->role(['Panitia', 'Peserta', 'Mitra', 'Peserta-kolektif'])->get();
        $peserta = Peserta::where('user_id', $user_id)->first();
        $pesertaKolektif = Peserta::where('user_id', $user_id)->get();
        foreach($role as $r){
            if($r === 'Peserta'){
                if ($datadiri && $kk) {
                    return view('home', compact('tittle', 'role', 'user', 'peserta', 'pesertaKolektif'));
                }else{
                    return redirect()->route('datadiri.create');
                }
            }elseif($r === 'Peserta-kolektif'){
                if($petugas){
                    return view('home', compact('tittle', 'role', 'user', 'peserta', 'pesertaKolektif'));
                }else{
                    return redirect()->route('kolektif.createPetugas');
                }
            }else{
                return view('home', compact('tittle', 'role', 'user', 'peserta', 'pesertaKolektif'));
            }
        }
    }
    public function profil()
    {
        $tittle = 'profil';
        $datadiri = Datadiri::where('user_id', Auth::user()->id)->first();
        $kk = Kk::where('user_id', Auth::user()->id)->first();
        $petugas = Kolektif::where('user_id', Auth::user()->id)->first();
        $role = Auth::user()->getRoleNames();
        return view('profil', compact('tittle', 'datadiri', 'kk', 'role', 'petugas'));
    }
    public function update(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
            'max' => ':attribute kepanjangan'
        ];
        $this->validate($request,[
            'name' => 'required|max:50',
        ], $messages);

        User::find(Auth::user()->id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('profil')->with('success', 'Nama Akun Berhasil Diedit!');
    }
}
