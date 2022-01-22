<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\User;
use App\Models\order;

use Illuminate\Http\Request;

class OrderController extends Controller
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
        $users = User::all();
        //return $products;
        return view('order.index',['products' => $products, 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // redirect to view 
        $validated = $request -> validate([
            'user' => 'required',
            'product' => 'required'
        ]);
        $order = new order();
        $order -> user = $request -> user;
        $order -> product = $request -> product;
        $order -> save();

        return redirect()->route('order.index');
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
    public function show()
    {
        //
        $orders = order::all();
        //return $orders;
        return view('order.sell',['orders' => $orders]);
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

