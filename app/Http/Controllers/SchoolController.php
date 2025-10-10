<?php

namespace App\Http\Controllers;

use App\Models\school;
use Illuminate\Http\Request;

class SchoolController extends Controller
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
    // public function show(school $school)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(school $school)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, school $school)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(school $school)
    // {
    //     //
    // }



    public function index()
    {
        return response()->json(School::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $school = School::create($request->all());
        return response()->json($school, 201);
    }

    public function show(School $school)
    {
        return response()->json($school);
    }

    public function update(Request $request, School $school)
    {
        $school->update($request->all());
        return response()->json($school);
    }

    public function destroy(School $school)
    {
        $school->delete();
        return response()->json(null, 204);
    }
}
