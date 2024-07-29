<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Auth::user()->clients;
        return view('pages.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'mobile_no' => 'required|string|max:15',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
        ]);

        // Create a new client with the validated data
        $client = new Client();
        $client->first_name = $validatedData['first_name'];
        $client->last_name = $validatedData['last_name'];
        $client->email = $validatedData['email'];
        $client->mobile_no = $validatedData['mobile_no'];
        $client->street_address = $validatedData['street_address'];
        $client->city = $validatedData['city'];
        $client->region = $validatedData['region'];
        $client->postal_code = $validatedData['postal_code'];
        $client->save();

        // Return a response, you can customize this based on your needs
        return response()->json(['message' => 'Client created successfully', 'client' => $client], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
