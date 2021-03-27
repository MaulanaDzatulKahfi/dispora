<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $tittle = 'Permission';
        $permissions = Permission::all();
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
        $tittle = 'role';
        $permission = Permission::find($id);
        return view('permission.edit',compact('permission', 'tittle'));
    }
}
