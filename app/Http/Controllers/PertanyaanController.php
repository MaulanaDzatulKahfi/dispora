<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pertanyaan-create', ['only' => ['create']]);
        $this->middleware(['auth','verified']);
    }
    public function create()
    {
        $tittle = 'Pertanyaan';
        $role = Auth::user()->getRoleNames();
        return view('peserta.pertanyaan.create', compact('tittle', 'role'));
    }
    public function store(Request $request)
    {
        // $messages = [
        //     'required' => ':attribute harus diisi!',
        //     'numeric' => ':attribute harus berupa angka!',
        //     'email' => ':attribute harus berupa email!',
        // ];
        // $this->validate($request, [
        //     'pertanyaan1' => 'required',
        //     'pertanyaan2' => 'required',
        //     'pertanyaan3' => 'required',
        //     'no_hp' => 'required|numeric',
        //     'email' => 'required|email',
        // ], $messages);
        $user_id = Auth::user()->id;
        $countpertanyaan = Pertanyaan::where('user_id', Auth::user()->id)->get();
        $total = count($countpertanyaan);
        $role = Auth::user()->getRoleNames();
        $kode = "21" . $total + 1 . $user_id;

        if ($role[0] == 'Peserta') {
            Pertanyaan::create([
                'id' => $kode,
                'pertanyaan1' => $request->pertanyaan1,
                'pertanyaan2' => $request->pertanyaan2,
                'pertanyaan3' => $request->pertanyaan3,
                'email' => Auth::user()->email,
                'no_hp' => $request->no_hp,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'user_id' => $user_id
            ]);
            return redirect()->route('peserta.create');
        }elseif($role[0] == 'Peserta-kolektif'){
            Pertanyaan::create([
                'id' => $kode,
                'pertanyaan1' => $request->pertanyaan1,
                'pertanyaan2' => $request->pertanyaan2,
                'pertanyaan3' => $request->pertanyaan3,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'user_id' => $user_id
            ]);
            return redirect()->route('kolektif.createPendidikan');
        }
    }
}
