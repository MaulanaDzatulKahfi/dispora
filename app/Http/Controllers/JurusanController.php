<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Perting;
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
        $perting = Perting::find($id);
        $jurusan = Jurusan::where('perting_id', $id)->get();
        return view('perting.jurusan.index', compact('tittle', 'perting', 'jurusan'));
    }
    public function create(Perting $perting)
    {
        $tittle = 'perting';
        return view('perting.jurusan.create', compact('perting', 'tittle'));
    }
    public function store(Request $request, Perting $perting)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
        ];
        $this->validate($request,[
            'name' => 'required',
        ], $messages);
        Jurusan::create([
            'name' => $request->name,
            'perting_id' => $perting->id
        ]);
        return redirect()->route('jurusan.index', $perting->id)->with('success', 'Jurusan Berhasil Ditambahkan!');
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

        return redirect()->route('jurusan.index', $jurusan->perting->id)
                        ->with('success', 'Jurusan Berhasil Diupdate!');
    }
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index', $jurusan->perting->id)
                        ->with('success', 'Jurusan Berhasil Dihapus!');
    }
}
