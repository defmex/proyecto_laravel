<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(StorePersonaRequest $request)
    {
        $persona = Persona::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Persona creada",
            'persona' => $persona
        ], 200);
    }



    public function index()
    {
        $personas = Persona::all();
        return response()->json([
            'status' => true,
            'persona' => $personas
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
