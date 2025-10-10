<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'school_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function attendanceRecords()
    {
        return $this->hasMany(attendance_record::class);
    }
}

