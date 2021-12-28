<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $client = Client::all();
        return view('index',compact('client'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //to create client using form

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //to store client data to database
        $storedata = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|numeric',
            'password'=>'required|max:255'
            // for validation 
            // of the form
        ]);
        $client = Client::create($storedata);
        return redirect('/clients')->with('completed','Client has been saved');
    
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
        // Client is the model i created using the php artisan
        // make:Model in terminal
        $client = Client::findOrFail($id);// will retrieve the first
        // result of the query the $id is the variable
        return view('edit',compact('client'));


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
        $updatedata = $request->validate(
        [
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|numeric',
            // 'password'=>'required|max:255' no need
        ]);
        // $client = 
        Client::whereId($id)->update($updatedata);
        return redirect('/clients')->with('success','Client has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/clients')->with('success','Client has been deleted');
    }
}
