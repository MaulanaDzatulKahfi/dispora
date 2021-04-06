<?php

namespace App\Http\Controllers;

use App\Models\Datadiri;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Perting;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:peserta-list', ['only' => ['index']]);
        $this->middleware('permission:peserta-create', ['only' => ['create','store']]);
        // $this->middleware('permission:peserta-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:peserta-delete', ['only' => ['destroy']]);
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $tittle = 'Peserta';
        $peserta = Peserta::all();
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
        $fakultas = Fakultas::where('perting_id', $perting_id)->get();
        return response()->json([
            'fakultas' => $fakultas
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
            'required' => ':attribute harus diisi!'
        ];
        $this->validate($request, [
            'asal_sekolah' => 'required',
            'lulus_tahun' => 'required',
            'perting_id' => 'required',
            'fakultas_id' => 'required',
            'jurusan_id' => 'required',
        ], $messages);

        $user_id = Auth::user()->id;
        $countpeserta = Peserta::where('user_id', Auth::user()->id)->get();
        $total = count($countpeserta);
        $kode = "21" . $total + 1 . $user_id;

        Peserta::create([
            'asal_sekolah' => $request->asal_sekolah,
            'lulus_tahun' => $request->lulus_tahun,
            'perting_id' => $request->perting_id,
            'fakultas_id' => $request->fakultas_id,
            'jurusan_id' => $request->jurusan_id,
            'datadiri_id' => $kode,
            'user_id' => $user_id,
        ]);
        return redirect()->route('home');
    }
    public function show(Peserta $peserta)
    {
        $tittle = 'Peserta';
        $peserta = Peserta::find($peserta->id)->first();
        return view('peserta.show', compact('tittle', 'peserta'));
    }
}
