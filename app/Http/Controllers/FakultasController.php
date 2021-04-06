<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Perting;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:fakultas-list|fakultas-create|fakultas-edit|fakultas-delete', ['only' => ['index','show']]);
         $this->middleware('permission:fakultas-create', ['only' => ['create','store']]);
         $this->middleware('permission:fakultas-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:fakultas-delete', ['only' => ['destroy']]);
         $this->middleware(['auth','verified']);
    }
    public function index($id)
    {
        $tittle = 'Fakultas';
        $perting = Perting::find($id);
        $fakultas = Fakultas::where('perting_id', $id)->get();
        return view('perting.fakultas.index', compact('tittle', 'perting', 'fakultas'));
    }
    public function create(Perting $perting)
    {
        $tittle = 'Fakultas';
        return view('perting.fakultas.create', compact('perting', 'tittle'));
    }
    public function store(Request $request, Perting $perting)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
        ];
        $this->validate($request,[
            'name' => 'required',
            'status' => 'required',
        ], $messages);
        Fakultas::create([
            'name' => $request->name,
            'status' => $request->status,
            'perting_id' => $perting->id
        ]);
        return redirect()->route('fakultas.index', $perting->id)->with('success', 'Fakultas Berhasil Ditambahkan!');
    }
    public function edit(Fakultas $fakultas)
    {
        $tittle = 'Fakultas';
        return view('perting.fakultas.edit',compact('fakultas', 'tittle'));
    }
    public function update(Request $request, Fakultas $fakultas)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
        ];
        $this->validate($request,[
            'name' => 'required',
            'status' => 'required',
        ], $messages);
        Fakultas::where('id', $fakultas->id)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('fakultas.index', $fakultas->perting->id)->with('success', 'Fakultas Berhasil DiUpdate!');
    }
    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->route('fakultas.index', $fakultas->perting->id)
                        ->with('success', $fakultas->name. ' Berhasil Dihapus!');
    }
}
