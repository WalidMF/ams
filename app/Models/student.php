<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'class_id', 'school_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function class()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function attendanceRecords()
    {
        return $this->hasMany(attendance_record::class);
    }
}

