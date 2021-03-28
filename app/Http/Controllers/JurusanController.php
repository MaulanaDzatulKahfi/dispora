<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Perting;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:jurusan-list|jurusan-create|jurusan-edit|jurusan-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:jurusan-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:jurusan-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:jurusan-delete', ['only' => ['destroy']]);
         $this->middleware(['auth','verified']);
    }
    public function index($id)
    {
        $tittle = 'Jurusan';
        $perting = Perting::find($id);
        $jurusan = Jurusan::where('perting_id', $id)->get();
        return view('perting.jurusan.index', compact('tittle', 'perting', 'jurusan'));
    }
}
