<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'school_id', 'subject_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'teacher_class');
    }

    public function attendanceRecords()
    {
        return $this->hasMany(attendance_record::class);
    }
}

