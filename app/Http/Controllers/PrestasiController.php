<?php

namespace App\Http\Controllers;

use App\Models\Kk;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:prestasi-create', ['only' => ['create','store']]);
        $this->middleware(['auth','verified']);
    }
    public function create()
    {
        $tittle = 'Prestasi';
        $prestasi = Prestasi::where('user_id', Auth::user()->id)->first();
        $role = Auth::user()->getRoleNames();
        if($role[0] == 'Peserta'){
            if($prestasi){
                return redirect()->route('home');
            }
            return view('prestasi.create', compact('tittle', 'role'));
        }
        return view('prestasi.create', compact('tittle', 'role'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa angka!',
            'image' => ':attribute harus berupa gambar!',
            'mimes' => ':attribute harus berupa gambar!',
        ];
        $this->validate($request, [
            'semester.*' => ['required', 'numeric'],
            'rangking.*' => ['required', 'numeric'],
            'lomba.*' => 'required',
            'tingkat.*' => 'required',
            'lembaga.*' => 'required',
            'foto.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], $messages);

        $user_id = Auth::user()->id;
        $role = Auth::user()->getRoleNames();
        $prestasi = prestasi::where('user_id', $user_id)->orderBy('kode', 'DESC')->first();
        $kk = Kk::where('user_id', $user_id)->orderBy('id', 'DESC')->first();
        $kode = $kk->id;

        if($request->akademik == 'akademik'){
            if($role[0] == 'Peserta'){
                if($prestasi){
                    return redirect()->route('home');
                }
                foreach ($request->semester as $key => $value) {
                    if($request->has('foto')){
                        $path = Storage::putFile('public/image/rapor', $request->file('foto')[$key]);
                    }
                    if ($request->rangking[$key] == '1') {
                        $skor = 30;
                    }elseif($request->rangking[$key] == '2'){
                        $skor = 20;
                    }elseif($request->rangking[$key] == '3'){
                        $skor = 10;
                    }else{
                        $skor = 0;
                    }
                    Prestasi::create([
                        'kode' => $kode,
                        'semester' => $request->semester[$key],
                        'rangking' => $request->rangking[$key],
                        'jenis' => 'akademik',
                        'foto' => $path,
                        'skor' => $skor,
                        'user_id' => $user_id
                    ]);
                }
                return redirect()->route('peserta.create');
            }elseif($role[0] == 'Peserta-kolektif'){
                foreach ($request->semester as $key => $value) {
                    if($request->has('foto')){
                        $path = Storage::putFile('public/image/rapor', $request->file('foto')[$key]);
                    }
                    if ($request->rangking[$key] == '1') {
                        $skor = 30;
                    }elseif($request->rangking[$key] == '2'){
                        $skor = 20;
                    }elseif($request->rangking[$key] == '3'){
                        $skor = 10;
                    }else{
                        $skor = 0;
                    }
                    Prestasi::create([
                        'kode' => $kode,
                        'semester' => $request->semester[$key],
                        'rangking' => $request->rangking[$key],
                        'jenis' => 'akademik',
                        'foto' => $path,
                        'skor' => $skor,
                        'user_id' => $user_id
                    ]);
                }
                return redirect()->route('kolektif.createPendidikan');
            }
        }elseif($request->non_akademik == 'non_akademik'){
            if($role[0] == 'Peserta'){
                if($prestasi){
                    return redirect()->route('home');
                }
                foreach($request->lomba as $key => $value){
                    if($request->has('foto')){
                        $path = Storage::putFile('public/image/olahraga', $request->file('foto')[$key]);
                    }
                    if($request->tingkat[$key] == 'kota'){
                        $skor = 10;
                    }elseif($request->tingkat[$key] == 'provinsi'){
                        $skor = 20;
                    }elseif($request->tingkat[$key] == 'nasional'){
                        $skor = 30;
                    }elseif($request->tingkat[$key] == 'internasional'){
                        $skor = 50;
                    }else{
                        $skor = 0;
                    }
                    Prestasi::create([
                        'kode' => $kode,
                        'lomba' => $request->lomba[$key],
                        'tingkat' => $request->tingkat[$key],
                        'jenis' => 'non_akademik',
                        'skor' => $skor,
                        'foto' => $path,
                        'user_id' => $user_id
                    ]);
                }
                return redirect()->route('peserta.create');
            }elseif($role[0] == 'Peserta-kolektif'){
                foreach($request->lomba as $key => $value){
                    if($request->has('foto')){
                        $path = Storage::putFile('public/image/olahraga', $request->file('foto')[$key]);
                    }
                    if($request->tingkat[$key] == 'kota'){
                        $skor = 10;
                    }elseif($request->tingkat[$key] == 'provinsi'){
                        $skor = 20;
                    }elseif($request->tingkat[$key] == 'nasional'){
                        $skor = 30;
                    }elseif($request->tingkat[$key] == 'internasional'){
                        $skor = 50;
                    }else{
                        $skor = 0;
                    }
                    Prestasi::create([
                        'kode' => $kode,
                        'lomba' => $request->lomba[$key],
                        'tingkat' => $request->tingkat[$key],
                        'jenis' => 'non_akademik',
                        'skor' => $skor,
                        'foto' => $path,
                        'user_id' => $user_id
                    ]);
                }
                return redirect()->route('kolektif.createPendidikan');
            }
        }elseif($request->mahasiswa_aktif == 'mahasiswa_aktif'){
            $this->validate($request, [
                'nim' => 'required|numeric',
                'ipk' => 'required|numeric',
            ], $messages);
            if($role[0] == 'Peserta'){
                if($prestasi){
                    return redirect()->route('home');
                }
                if($request->has('foto')){
                    $path = Storage::putFile('public/image/mahasiswa_aktif', $request->file('foto'));
                }
                if($request->ipk >= 3.50 && $request->ipk <= 3.75){
                    $skor = 100;
                }elseif($request->ipk > 3.75 && $request->ipk <= 4.00){
                    $skor = 150;
                }else{
                    $skor = 0;
                }
                Prestasi::create([
                    'kode' => $kode,
                    'nim' => $request->nim,
                    'ipk' => $request->ipk,
                    'semester' => $request->semester,
                    'jenis' => 'mahasiswa_aktif',
                    'foto' => $path,
                    'skor' => $skor,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('peserta.create');
            }elseif($role[0] == 'Peserta-kolektif'){
                if($request->has('foto')){
                    $path = Storage::putFile('public/image/mahasiswa_aktif', $request->file('foto'));
                }
                if($request->ipk >= 3.50 && $request->ipk <= 3.75){
                    $skor = 100;
                }elseif($request->ipk > 3.75 && $request->ipk <= 4.00){
                    $skor = 150;
                }else{
                    $skor = 0;
                }
                Prestasi::create([
                    'kode' => $kode,
                    'nim' => $request->nim,
                    'ipk' => $request->ipk,
                    'semester' => $request->semester,
                    'jenis' => 'mahasiswa_aktif',
                    'foto' => $path,
                    'skor' => $skor,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('kolektif.createPendidikan');
            }
        }elseif($request->tahfidz == 'tahfidz'){
            $this->validate($request, [
                'hafal' => 'required|numeric',
                'juz1' => 'required|numeric',
                'juz2' => 'required|numeric',
            ], $messages);
            if($role[0] == 'Peserta'){
                if ($prestasi) {
                    return redirect()->route('home');
                }
                if($request->has('foto')){
                    $path = Storage::putFile('public/image/tahfidz', $request->file('foto'));
                }
                if($request->hafal >= 5 && $request->hafal <= 10){
                    $skor = 50;
                }elseif($request->hafal > 10 && $request->hafal <= 20){
                    $skor = 100;
                }elseif($request->hafal > 20 && $request->hafal <= 30){
                    $skor = 150;
                }else{
                    $skor = 0;
                }
                Prestasi::create([
                    'kode' => $kode,
                    'hafal' => $request->hafal,
                    'juz1' => $request->juz1,
                    'juz2' => $request->juz2,
                    'jenis' => 'tahfidz',
                    'foto' => $path,
                    'skor' => $skor,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('peserta.create');
            }elseif($role[0] == 'Peserta-kolektif'){
                if($request->has('foto')){
                    $path = Storage::putFile('public/image/tahfidz', $request->file('foto'));
                }
                if($request->hafal >= 5 && $request->hafal <= 10){
                    $skor = 50;
                }elseif($request->hafal > 10 && $request->hafal <= 20){
                    $skor = 100;
                }elseif($request->hafal > 20 && $request->hafal <= 30){
                    $skor = 150;
                }else{
                    $skor = 0;
                }
                Prestasi::create([
                    'kode' => $kode,
                    'hafal' => $request->hafal,
                    'juz1' => $request->juz1,
                    'juz2' => $request->juz2,
                    'jenis' => 'tahfidz',
                    'foto' => $path,
                    'skor' => $skor,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('kolektif.createPendidikan');
            }
        }elseif($request->kerelawanan == 'kerelawanan'){
            if($role[0] == 'Peserta'){
                if($prestasi){
                    return redirect()->route('home');
                }
                foreach($request->lomba as $key => $value){
                    if($request->has('foto')){
                        $path = Storage::putFile('public/image/kerelawanan', $request->file('foto')[$key]);
                    }
                    if($request->tingkat[$key] == 'kota'){
                        $skor = 10;
                    }elseif($request->tingkat[$key] == 'provinsi'){
                        $skor = 20;
                    }elseif($request->tingkat[$key] == 'nasional'){
                        $skor = 30;
                    }elseif($request->tingkat[$key] == 'internasional'){
                        $skor = 50;
                    }else{
                        $skor = 0;
                    }
                    Prestasi::create([
                        'kode' => $kode,
                        'lomba' => $request->lomba[$key],
                        'lembaga' => $request->lembaga[$key],
                        'tingkat' => $request->tingkat[$key],
                        'jenis' => 'kerelawanan',
                        'skor' => $skor,
                        'foto' => $path,
                        'user_id' => $user_id
                    ]);
                }
                return redirect()->route('peserta.create');
            }elseif($role[0] == 'Peserta-kolektif'){
                foreach($request->lomba as $key => $value){
                    if($request->has('foto')){
                        $path = Storage::putFile('public/image/kerelawanan', $request->file('foto')[$key]);
                    }
                    if($request->tingkat[$key] == 'kota'){
                        $skor = 10;
                    }elseif($request->tingkat[$key] == 'provinsi'){
                        $skor = 20;
                    }elseif($request->tingkat[$key] == 'nasional'){
                        $skor = 30;
                    }elseif($request->tingkat[$key] == 'internasional'){
                        $skor = 50;
                    }else{
                        $skor = 0;
                    }
                    Prestasi::create([
                        'kode' => $kode,
                        'lomba' => $request->lomba[$key],
                        'lembaga' => $request->lembaga[$key],
                        'tingkat' => $request->tingkat[$key],
                        'jenis' => 'kerelawanan',
                        'skor' => $skor,
                        'foto' => $path,
                        'user_id' => $user_id
                    ]);
                }
                return redirect()->route('kolektif.createPendidikan');
            }
        }else{
            return redirect()->route('prestasi.create');
        }
    }
}
