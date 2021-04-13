<?php

namespace App\Http\Controllers;

use App\Models\Datadiri;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Kk;
use App\Models\Kolektif;
use App\Models\Perting;
use App\Models\Peserta;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:peserta-list', ['only' => ['index']]);
        $this->middleware('permission:peserta-create', ['only' => ['create']]);
        $this->middleware('permission:peserta-store', ['only' => ['store']]);
        $this->middleware('permission:kolektif-createPendidikan', ['only' => ['createPendidikan']]);
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $tittle = 'Peserta';
        $peserta = Peserta::orderBy('id', 'DESC')->get();
        return view('peserta.index', compact('tittle', 'peserta'));
    }
    public function create()
    {
        $tittle = 'Peserta';
        $user_id = Auth::user()->id;
        $countpeserta = Peserta::where('user_id', $user_id)->get();
        $total = count($countpeserta);
        $kode = "21" . $total + 1 . $user_id;
        $datadiri = Datadiri::where('id', $kode)->first();
        $perting = Perting::all();
        if($datadiri){
            return view('peserta.create', compact('tittle', 'datadiri', 'perting'));
        }else{
            return redirect()->route('home');
        }
    }
    public function ajaxPerting(Request $request)
    {
        $perting_id = $request->perting_id;
        $perting = Perting::where('status_pt', 'ptn')->first();
        $perting = Perting::where('id', $perting_id)->first();
        $fakultas = Fakultas::where('perting_id', $perting_id)->get();
        return response()->json([
            'fakultas' => $fakultas,
            'perting' => $perting
        ]);
    }
    public function ajaxFakultas(Request $request)
    {
        $fakultas_id = $request->fakultas_id;
        $jurusan = Jurusan::where('fakultas_id', $fakultas_id)->get();
        return response()->json([
            'jurusan' => $jurusan
        ]);
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
            'nisn' => 'numeric',
            'asal_sekolah' => 'required',
            'foto_ijazah' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'foto_ptn' => 'image|mimes:jpg,jpeg,png|max:2048',
            'lulus_tahun' => 'required',
            'perting_id' => 'required',
            'fakultas_id' => 'required',
            'jurusan_id' => 'required',
        ], $messages);

        $user_id = Auth::user()->id;
        $countpeserta = Peserta::where('user_id', Auth::user()->id)->get();
        $peserta = Peserta::where('user_id', Auth::user()->id)->first();
        $total = count($countpeserta);
        $kode = "21" . $total + 1 . $user_id;
        $total_skor = Prestasi::where('kode', $kode)->sum('skor');
        $role = Auth::user()->getRoleNames();

        if($role[0] == 'Peserta'){
            if($peserta){
                return redirect()->route('home');
            }
            if($request->baru == 'baru'){
                $path_ptn = 'image/ptn/default.jpg';
                $path_ijazah = 'image/ijazah/default.jpg';
                if($request->has('foto_ijazah')){
                    $path_ijazah = Storage::putFile('public/image/ijazah', $request->file('foto_ijazah'));
                }
                if($request->has('foto_ptn')){
                    $path_ptn = Storage::putFile('public/image/ptn', $request->file('foto_ptn'));
                }
                Peserta::create([
                    'nisn' => $request->nisn,
                    'asal_sekolah' => $request->asal_sekolah,
                    'lulus_tahun' => $request->lulus_tahun,
                    'status_mhs' => 'baru',
                    'total_skor' => $total_skor,
                    'foto' => $path_ijazah,
                    'foto_ptn' => $path_ptn,
                    'perting_id' => $request->perting_id,
                    'fakultas_id' => $request->fakultas_id,
                    'jurusan_id' => $request->jurusan_id,
                    'datadiri_id' => $kode,
                    'kk_id' => $kode,
                    'prestasi_kode' => $kode,
                    'pertanyaan_id' => $kode,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('home');
            }elseif($request->aktif == 'aktif'){
                if($request->has('foto_ijazah')){
                    $path_ijazah = Storage::putFile('public/image/ijazah', $request->file('foto_ijazah'));
                }
                Peserta::create([
                    'asal_sekolah' => $request->asal_sekolah,
                    'lulus_tahun' => $request->lulus_tahun,
                    'status_mhs' => 'aktif',
                    'total_skor' => $total_skor,
                    'foto' => $path_ijazah,
                    'perting_id' => $request->perting_id,
                    'fakultas_id' => $request->fakultas_id,
                    'jurusan_id' => $request->jurusan_id,
                    'datadiri_id' => $kode,
                    'kk_id' => $kode,
                    'prestasi_kode' => $kode,
                    'pertanyaan_id' => $kode,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('home');
            }
        }elseif($role[0] == 'Peserta-kolektif'){
            if($request->baru == 'baru'){
                $path_ptn = 'image/ptn/default.jpg';
                $path_ijazah = 'image/ijazah/default.jpg';
                if($request->has('foto_ijazah')){
                    $path_ijazah = Storage::putFile('public/image/ijazah', $request->file('foto_ijazah'));
                }
                if($request->has('foto_ptn')){
                    $path_ptn = Storage::putFile('public/image/ptn', $request->file('foto_ptn'));
                }
                Peserta::create([
                    'nisn' => $request->nisn,
                    'asal_sekolah' => $request->asal_sekolah,
                    'lulus_tahun' => $request->lulus_tahun,
                    'status_mhs' => 'baru',
                    'total_skor' => $total_skor,
                    'foto' => $path_ijazah,
                    'foto_ptn' => $path_ptn,
                    'perting_id' => $request->perting_id,
                    'fakultas_id' => $request->fakultas_id,
                    'jurusan_id' => $request->jurusan_id,
                    'datadiri_id' => $kode,
                    'kk_id' => $kode,
                    'prestasi_kode' => $kode,
                    'pertanyaan_id' => $kode,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('home')->with('success', 'Peserta Berhasil Didaftarkan');
            }elseif($request->aktif == 'aktif'){
                if($request->has('foto_ijazah')){
                    $path_ijazah = Storage::putFile('public/image/ijazah', $request->file('foto_ijazah'));
                }
                Peserta::create([
                    'asal_sekolah' => $request->asal_sekolah,
                    'lulus_tahun' => $request->lulus_tahun,
                    'status_mhs' => 'aktif',
                    'total_skor' => $total_skor,
                    'foto' => $path_ijazah,
                    'perting_id' => $request->perting_id,
                    'fakultas_id' => $request->fakultas_id,
                    'jurusan_id' => $request->jurusan_id,
                    'datadiri_id' => $kode,
                    'kk_id' => $kode,
                    'prestasi_kode' => $kode,
                    'pertanyaan_id' => $kode,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('home')->with('success', 'Peserta Berhasil Didaftarkan');
            }
        }
    }
    public function show(Peserta $peserta)
    {
        $tittle = 'Peserta';
        $role = Auth::user()->getRoleNames();
        $peserta = Peserta::where('datadiri_id', $peserta->datadiri_id)->first();
        $prestasi = Prestasi::where('kode', $peserta->prestasi_kode)->get();

        if ($role[0] == 'Peserta' || $role[0] == 'Peserta-kolektif') {
            $peserta = Peserta::where([
                'datadiri_id' => $peserta->datadiri_id,
                'user_id' => Auth::user()->id
            ])->first();
            if ($peserta == null) {
                return redirect()->route('home');
            }
            return view('peserta.show', compact('tittle', 'peserta', 'prestasi', 'role'));
        }
        return view('peserta.show', compact('tittle', 'peserta', 'prestasi', 'role'));
    }
    public function createPendidikan()
    {
        $user_id = Auth::user()->id;
        $countkk = Kk::where('user_id', $user_id)->get();
        $countdatadiri = Datadiri::where('user_id', $user_id)->get();
        $total = count($countkk);
        $totaldatadiri = count($countdatadiri);
        $kodekk = 2 . 1 . $total . $user_id;
        $kodedatadiri = 2 . 1 . $total . $user_id;
        $kk = Kk::where('id', $kodekk)->first();
        $datadiri = Datadiri::where('id', $kodedatadiri)->first();

        if ($kk == null) {
            return redirect()->route('kolektif.createKk');
        }elseif($datadiri == null){
            return redirect()->route('kolektif.createdatadiri');
        }else{
            $tittle = 'Peserta kolektif';
            $perting = Perting::all();
            return view('peserta.kolektif.create-pendidikan', compact('tittle', 'perting'));
        }
    }
    public function createPetugas()
    {
        $tittle = 'petugas';
        $petugas = Kolektif::where('user_id', Auth::user()->id)->first();
        if ($petugas) {
            return redirect()->route('home');
        }else{
            return view('peserta.kolektif.create-petugas', compact('tittle'));
        }
    }
    public function storePetugas(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa angka!',
        ];
        $this->validate($request, [
            'nip' => 'required|numeric',
            'name' => 'required',
            'jabatan' => 'required',
        ], $messages);

        Kolektif::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('home');
    }

    //pdf
    public function suratPermohonanPerorangan(peserta $peserta)
    {
        $role = Auth::user()->getRoleNames();
        if ($role[0] == 'Peserta' || $role[0] == 'Peserta-kolektif') {
            $peserta = Peserta::where([
                'datadiri_id' => $peserta->datadiri_id,
                'user_id' => Auth::user()->id
            ])->first();
            if ($peserta == null) {
                return redirect()->route('home');
            }
            $pdf = PDF::loadview('peserta.pdf.surat_permohonan_perorangan', compact('peserta'));
            return $pdf->download('surat-permohoan-'. $peserta->datadiri->nama.'.pdf');
        }
        $pdf = PDF::loadview('peserta.pdf.surat_permohonan_perorangan', compact('peserta'));
    	return $pdf->download('surat-permohonan-'. $peserta->datadiri->nama.'.pdf');
        // return $pdf->stream();
    }
    public function suratPermohonanKolektif()
    {
        $peserta = Peserta::where('user_id', Auth::user()->id)->get();
        $petugas =  Kolektif::where('user_id', Auth::user()->id)->first();
        if($petugas){
            $pdf = PDF::loadview('peserta.pdf.surat_permohonan_kolektif', compact('peserta', 'petugas'));
            // return $pdf->download('surat-permohoan-'. $peserta->datadiri->nama.'.pdf');
            return $pdf->stream();
        }else{
            return redirect()->route('home');
        }
    }
}
