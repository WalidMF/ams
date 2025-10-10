<?php

namespace App\Http\Controllers;

use App\Models\classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(classe $classe)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(classe $classe)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, classe $classe)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(classe $classe)
    // {
    //     //
    // }




    public function index()
    {
        return response()->json(Classe::with('school')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'grade_level' => 'nullable|string',
            'school_id' => 'required|exists:schools,id',
        ]);

        $class = Classe::create($request->all());
        return response()->json($class, 201);
    }

    public function show(Classe $class)
    {
        return response()->json($class->load('school'));
    }

    public function update(Request $request, Classe $class)
    {
        $class->update($request->all());
        return response()->json($class);
    }

    public function destroy(Classe $class)
    {
        $class->delete();
        return response()->json(null, 204);
    }
}
