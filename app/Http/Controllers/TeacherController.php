<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
    // public function show(teacher $teacher)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(teacher $teacher)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, teacher $teacher)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(teacher $teacher)
    // {
    //     //
    // }



     public function index()
    {
        return response()->json(Teacher::with(['user', 'school', 'subject'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'school_id' => 'required|exists:schools,id',
            'subject_id' => 'nullable|exists:subjects,id',
        ]);

        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);
    }

    public function show(Teacher $teacher)
    {
        return response()->json($teacher->load(['user', 'school', 'subject']));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return response()->json($teacher);
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json(null, 204);
    }
}
