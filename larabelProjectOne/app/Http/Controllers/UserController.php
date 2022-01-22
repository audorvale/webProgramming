<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view with all clients of database 
        $clients = User::all();
        //return $clients;
        return view('client.index',['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // redirect to view 
        return view('client.insert');

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
            'email' => 'required',
            'password' => 'required'
        ]);
        $client = new User();
        // asignation values 
        $client -> name = $request -> name;
        $client -> email = $request -> email;
        $client -> password = $request -> password;
        $client -> save();

        return redirect()->route('client.index');
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
        $client = User::find($id);
        return view('client.update',['client' => $client]);
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
            'id' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);

        $client = User::find($id);
        $client -> id = $request -> id;
        $client -> name = $request -> name;
        $client -> email = $request -> email;
        $client -> save();

        return redirect()->route('client.index');
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
        $client = User::find($id);
        $client->delete();
        //return $clients;
        return redirect()->route('client.index');
    }
}