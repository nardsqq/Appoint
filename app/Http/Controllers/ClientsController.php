<?php

namespace Appoint\Http\Controllers;

use Illuminate\Http\Request;

use Appoint\Models\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('created_at', 'DESC')->paginate(5);

        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create(
            $request->validate([
                'name' => 'required|min:3|max:255',
                'company' => 'required|min:3|max:255',
                'address' => 'required|min:8|max:255',
                'email' => 'required|min:3|max:255',
                'contact' => 'required|min:7|max:11',
            ])
        );

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.view', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {   
        $client->delete();

        return redirect()->route('clients.index');
    }
}
