<?php

namespace App\Http\Controllers;

use App\Models\Perting;
use Illuminate\Http\Request;

class PertingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:perting-list|perting-create|perting-edit|perting-delete', ['only' => ['index','show']]);
         $this->middleware('permission:perting-create', ['only' => ['create','store']]);
         $this->middleware('permission:perting-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:perting-delete', ['only' => ['destroy']]);
         $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tittle = 'Perguruan Tinggi';
        $perting = Perting::all();
        return view('perting.index', compact('perting', 'tittle'));
    }
    public function create()
    {
        $tittle = 'tambah perguruan tinggi';
        return view('perting.create', compact('tittle'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus diisi dengan angka!',
            'unique' => ':attribute sudah ada!',
        ];
        $this->validate($request,[
            'npsn' => 'required|numeric|unique:perting',
            'name' => 'required',
        ], $messages);
        Perting::create($request->all());
        return redirect()->route('perting.index')->with('success', 'Perguruan Tinggi Berhasil Ditambahkan!');
    }
    public function edit(Perting $perting)
    {
        $tittle = 'Perguruan Tinggi';
        return view('perting.edit',compact('perting', 'tittle'));
    }
    public function update(Request $request, Perting $perting)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus diisi dengan angka!',
            'unique' => ':attribute sudah ada!',
        ];
        $this->validate($request,[
            'npsn' => 'required|numeric|unique:perting',
            'name' => 'required',
        ], $messages);

        $perting->update($request->all());

        return redirect()->route('perting.index')
                        ->with('success', $perting->name. ' Berhasil Diupdate!');
    }
    public function destroy(Perting $perting)
    {
        $perting->delete();
        return redirect()->route('perting.index')
                        ->with('success', $perting->name. ' Berhasil Dihapus!');
    }
    // 4. Soft Delete Permanent
    public function permanent($id)
    {
        $products = Perting::onlyTrashed()->where('id',$id);
        $products->forceDelete();

        return redirect()->route('products.archive')
                        ->with('success','Product deleted Permanently successfully');
    }


    // 5. Soft Delete Archive
    public function archive()
    {
        $products = Perting::onlyTrashed()->get();
        //return view('products.archive', ['products' => $products]);
        return view('products.archive',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


     // 6. Soft Delete Restore
    public function restore($id)
    {
            $products = Perting::onlyTrashed()->where('id',$id);
            $products->restore();

            return redirect()->route('products.archive')
                        ->with('success','Product Restore successfully');
    }


    // 7. Soft Delete Restore All
    public function restoreall()
    {
            $perting = Perting::onlyTrashed();
            $perting->restore();

            return redirect()->route('products.archive')
                        ->with('success','Product Restore successfully');
    }







}
