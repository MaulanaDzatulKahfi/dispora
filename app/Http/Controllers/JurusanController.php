<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:jurusan-list|jurusan-create|jurusan-edit|jurusan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:jurusan-create', ['only' => ['create','store']]);
         $this->middleware('permission:jurusan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:jurusan-delete', ['only' => ['destroy']]);
         $this->middleware(['auth','verified']);
    }
    public function index($id)
    {
        $tittle = 'Jurusan';
        $fakultas = Fakultas::find($id);
        $jurusan = Jurusan::where('fakultas_id', $id)->get();
        return view('perting.jurusan.index', compact('tittle', 'fakultas', 'jurusan'));
    }
    public function create(Fakultas $fakultas)
    {
        $tittle = 'jurusan';
        return view('perting.jurusan.create', compact('fakultas', 'tittle'));
    }
    public function store(Request $request, Fakultas $fakultas)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
        ];
        $this->validate($request,[
            'name' => 'required',
        ], $messages);
        Jurusan::create([
            'name' => $request->name,
            'fakultas_id' => $fakultas->id,
            'perting_id' => $fakultas->perting->id
        ]);
        return redirect()->route('jurusan.index', $fakultas->id)->with('success', 'Jurusan Berhasil Ditambahkan!');
    }
    public function edit(Jurusan $jurusan)
    {
        $tittle = 'jurusan';
        return view('perting.jurusan.edit',compact('jurusan', 'tittle'));
    }
    public function update(Request $request, Jurusan $jurusan)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
        ];
        $this->validate($request,[
            'name' => 'required',
        ], $messages);

        $jurusan->update($request->all());

        return redirect()->route('jurusan.index', $jurusan->fakultas->id)
                        ->with('success', 'Jurusan Berhasil Diupdate!');
    }
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index', $jurusan->fakultas->id)
                        ->with('success', 'Jurusan Berhasil Dihapus!');
    }
}
