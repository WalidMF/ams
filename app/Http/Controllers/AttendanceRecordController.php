<?php

namespace App\Http\Controllers;

use App\Models\attendance_record;
use Illuminate\Http\Request;

class AttendanceRecordController extends Controller
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
    // public function show(attendance_record $attendance_record)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(attendance_record $attendance_record)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, attendance_record $attendance_record)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(attendance_record $attendance_record)
    // {
    //     //
    // }





    public function index()
    {
        return response()->json(
            attendance_record::with(['student', 'teacher', 'subject'])->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'nullable|exists:subjects,id',
            'date' => 'required|date',
            'period' => 'required|integer|min:1|max:10',
            'status' => 'required|in:present,absent,late,excused',
            'notes' => 'nullable|string',
        ]);

        $attendance = attendance_record::create($request->all());
        return response()->json($attendance, 201);
    }

    public function show(attendance_record $attendanceRecord)
    {
        return response()->json($attendanceRecord->load(['student', 'teacher', 'subject']));
    }

    public function update(Request $request, attendance_record $attendanceRecord)
    {
        $attendanceRecord->update($request->all());
        return response()->json($attendanceRecord);
    }

    public function destroy(attendance_record $attendanceRecord)
    {
        $attendanceRecord->delete();
        return response()->json(null, 204);
    }
}
