<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        // $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $tittle = 'Permission';
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('permission.index', compact('tittle', 'permissions'));
    }
    public function create()
    {
        $tittle = 'Tambah Permission';
        return view('permission.create', compact('tittle'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
        ];
        $this->validate($request,[
            'name' => 'required'
        ], $messages);
        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        return redirect()->route('permission.index')->with('success', 'Permission Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $tittle = 'permission';
        $permission = Permission::find($id);
        return view('permission.edit',compact('permission', 'tittle'));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
        ];
        $this->validate($request,[
            'name' => 'required'
        ], $messages);

        Permission::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('permission.index')->with('success','Permission Berhasil Diedit');
    }
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permission.index')->with('success','Permission Berhasil Dihapus!');
    }
}
