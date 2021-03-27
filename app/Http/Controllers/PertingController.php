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
        //  $this->middleware('permission:perting-list|perting-create|perting-edit|perting-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:perting-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:perting-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:perting-delete', ['only' => ['destroy']]);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate([
        //    'name' => 'required',
        //    'detail' => 'required',
        //    'user_id' => 'required',
        //    'slug'    => 'required|min:3|max:255|unique:product',

        //]);
        $validatedData = $this->validate($request, [
            'name'      => 'required',
            'detail'    => 'required',

        ]);
        Product::create($validatedData);
        //Product::create($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // 3. Soft Delete Move To Achive
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }


    // 4. Soft Delete Permanent
    public function permanent($id)
    {
        $products = Product::onlyTrashed()->where('id',$id);
        $products->forceDelete();

        return redirect()->route('products.archive')
                        ->with('success','Product deleted Permanently successfully');
    }


    // 5. Soft Delete Archive
    public function archive()
    {
        $products = Product::onlyTrashed()->get();
        //return view('products.archive', ['products' => $products]);
        return view('products.archive',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


     // 6. Soft Delete Restore
    public function restore($id)
    {
            $products = Product::onlyTrashed()->where('id',$id);
            $products->restore();

            return redirect()->route('products.archive')
                        ->with('success','Product Restore successfully');
    }


    // 7. Soft Delete Restore All
    public function restoreall()
    {
            $guru = Guru::onlyTrashed();
            $guru->restore();

            return redirect()->route('products.archive')
                        ->with('success','Product Restore successfully');
    }







}
