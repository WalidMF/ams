<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_class extends Model
{
    //

    use HasFactory;

    protected $table = 'teacher_class';
    protected $fillable = ['teacher_id', 'class_id'];

    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function class()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }
}
