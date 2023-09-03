<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all();
        return response()->json([
            'status' => true,
            'persona' => $personas
            ]);
    }
    public function get($id)
    {
        $personas = Persona::findOrFail($id);
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
    public function store(StorePersonaRequest $request)
    {
        $persona = new persona();
        $persona->nombre = $request->input('nombre');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');

        $res = $persona->save();

        if ($res) {
            return response()->json(['message' => 'Post create succesfully'], 201);
        }
        return response()->json(['message' => 'Error to create post'], 500);
    }

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
    public function edit($id)
    {
        $persona = Persona::find($id);
        return view('persona.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);
        /*$persona->nombre = $request->input('nombre');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');*/
        $persona->update($request->all());
        $persona->save();
        return redirect()->route('persona.index')
            ->with('success', 'Post updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
    
        return redirect()->route('persona.index')
             ->withSuccess(__('Post delete successfully.'));
    }
}