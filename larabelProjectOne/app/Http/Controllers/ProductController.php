<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import model
use App\Models\products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view with all products of database 
        $products = products::all();
        //return $products;
        return view('product.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // redirect to view 
        return view('product.insert');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request -> validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $product = new products();
        // asignation values 
        $product -> name = $request -> name;
        $product -> description = $request -> description;
        $product -> image = 'test image';
        $product -> price = $request -> price;
        $product -> save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = products::find($id);
        return view('product.update',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request -> validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product = products::find($id);
        $product -> name = $request -> name;
        $product -> description = $request -> description;
        $product -> image = 'test image';
        $product -> price = $request -> price;
        $product -> save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = products::find($id);
        $product->delete();
        //return $products;
        return redirect()->route('product.index');
    }
}
