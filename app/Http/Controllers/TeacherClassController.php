<?php

namespace App\Http\Controllers;

use App\Models\teacher_class;
use Illuminate\Http\Request;

class TeacherClassController extends Controller
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
    // public function show(teacher_class $teacher_class)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(teacher_class $teacher_class)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, teacher_class $teacher_class)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(teacher_class $teacher_class)
    // {
    //     //
    // }



    public function index()
    {
        return response()->json(teacher_class::with(['teacher', 'class'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'class_id' => 'required|exists:classes,id',
        ]);

        $relation = teacher_class::create($request->all());
        return response()->json($relation, 201);
    }

    public function destroy(teacher_class $teacherClass)
    {
        $teacherClass->delete();
        return response()->json(null, 204);
    }
}
