<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'status'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
