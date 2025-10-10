<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
    // public function show(subject $subject)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(subject $subject)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, subject $subject)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(subject $subject)
    // {
    //     //
    // }




    public function index()
    {
        return response()->json(Subject::with('school')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'school_id' => 'required|exists:schools,id',
        ]);

        $subject = Subject::create($request->all());
        return response()->json($subject, 201);
    }

    public function show(Subject $subject)
    {
        return response()->json($subject->load('school'));
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());
        return response()->json($subject);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json(null, 204);
    }
}
