<?php

namespace App\Http\Controllers;

use App\Models\Datadiri;
use App\Models\Kecamatan;
use App\Models\Kk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DatadiriController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:datadiri-list|datadiri-create|datadiri-edit|datadiri-delete', ['only' => ['index','store']]);
        $this->middleware('permission:datadiri-create', ['only' => ['create']]);
        $this->middleware(['auth','verified']);
    }
    public function create()
    {
        $tittle = 'Datadiri';
        $user_id = Auth::user()->id;
        $datadiri = Datadiri::where('user_id', $user_id)->first();
        $kk = Kk::where('user_id', $user_id)->first();
        $role = Auth::user()->getRoleNames();
        $kecamatan = Kecamatan::all();

        foreach($role as $r){
            if($r === 'Peserta'){
                if ($datadiri && $kk) {
                    return redirect()->route('home');
                }else{
                    return view('peserta.datadiri.create', compact('tittle', 'kecamatan'));
                }
            }
            return redirect()->route('home');
        }
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
            'digits' => ':attribute harus diisi 16 digit!',
            'numeric' => ':attribute harus diisi dengan angka!',
            'date_format' => ':attribute harus diisi dengan format date!',
            'image' => ':attribute harus berupa gambar!',
            'mimes' => ':attribute harus berupa gambar!',
            'unique' => ':attribute sudah terdaftar!',
            'max' => 'foto maksimal berukuran 2mb'
        ];
        $attribute = [
            'jk' => 'jenis kelamin',
            'tempat' => 'tempat lahir',
            'foto_ktp' => 'foto',
            'tgl_lahir' => 'tanggal lahir'
        ];

        $this->validate($request,[
            'nik' => 'required|digits:16|numeric|unique:datadiri',
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required|date_format:Y-m-d',
            'jk' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'foto_ktp' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'foto_akta' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ],$messages, $attribute);

        $nik4digit = substr($request->nik,0,4);
        $data = "2021-09-1";
        $tigapuluh = strtotime("-30 year", strtotime($data));
        $enambelas = strtotime("-16 year", strtotime($data));
        $tanggalint = strtotime($request->tgl_lahir);
        $user_id = Auth::user()->id;
        $datadiri = Datadiri::where('user_id', $user_id)->first();
        $role = Auth::user()->getRoleNames();

        if($nik4digit === '3201'){
            if($tigapuluh <= $tanggalint && $enambelas >= $tanggalint){
                foreach($role as $r){
                    if($r === 'Peserta'){
                        if ($datadiri) {
                            return redirect()->route('datadiri.create')->with('gagal', 'Anda sudah mengisi form Data diri, untuk melanjutkan silahkan isi form yang belum');
                        }else{
                            $path_ktp = "image/ktp/default.jpg";
                            $path_akta = "image/akta/default.jpg";
                            if($request->has("foto_ktp") && $request->has("foto_akta") ){
                                $path_ktp = Storage::putFile("public/image/ktp", $request->file('foto_ktp'));
                                $path_akta = Storage::putFile("public/image/akta", $request->file('foto_akta'));
                            }
                            Datadiri::create([
                                'nik' => $request->nik,
                                'nama' => $request->nama,
                                'tempat' => $request->tempat,
                                'tgl_lahir' => $request->tgl_lahir,
                                'jk' => $request->jk,
                                'alamat' => $request->alamat,
                                'agama' => $request->agama,
                                'status_perkawinan' => $request->status_perkawinan,
                                'pekerjaan' => $request->pekerjaan,
                                'foto_ktp' => $path_ktp,
                                'foto_akta' => $path_akta,
                                'kecamatan_id' => $request->kecamatan,
                                'user_id' => Auth::user()->id,
                            ]);
                            return redirect()->route('datadiri.create')->with('berhasil', 'Berhasil, Lanjut Isi Form Kartu Keluarga');
                        }
                    }
                }
            }else{
                return redirect()->route('datadiri.create')->with('gagal', 'Pendaftar minimal berusia 16tahun dan maksimal 30tahun');
            }
        }else{
            return redirect()->route('datadiri.create')->with('gagal', 'Maaf, Beasiswa ini diperuntukan penduduk Kabupaten Bogor');
        }
    }

    public function storekk(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus diisi dengan angka!',
            'image' => ':attribute harus berupa gambar!',
            'mimes' => ':attribute harus berupa gambar!',
            'max' => 'foto maksimal berukuran 2mb',
            'digits' => ':attribute harus diisi 16 digit!',
        ];
        $this->validate($request,[
            'no_kk' => 'required|numeric|digits:16',
            'foto_kk' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ], $messages);

        $user_id = Auth::user()->id;
        $kk = Kk::where('user_id', $user_id)->first();
        $role = Auth::user()->getRoleNames();

        foreach($role as $r){
            if($r === 'Peserta'){
                if ($kk) {
                    return redirect()->route('datadiri.create')->with('gagal', 'anda sudah mengisi form kartu keluarga, untuk melanjutkan silahkan isi form yang belum');
                }else{
                    $path = 'image/kk/default.jpg';
                    if($request->has('foto_kk')){
                        $path = Storage::putFile('public/image/kk', $request->file('foto_kk'));
                    }
                    Kk::create([
                        'no_kk' => $request->no_kk,
                        'foto_kk' => $path,
                        'user_id' => Auth::user()->id,
                    ]);
                    return redirect()->route('datadiri.create')->with('status', 'Berhasil');
                }
            }
            return redirect()->route('home');
        }
    }

}
