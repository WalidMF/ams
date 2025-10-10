<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * App\Models\User
 *
 * @property string $role
 * @method bool isAdmin()
 * @method bool isSupervisor()
 * @method bool isTeacher()
 */



class User extends Authenticatable
{
    // /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var list<string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var list<string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * Get the attributes that should be cast.
    //  *
    //  * @return array<string, string>
    //  */
    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }



    use HasFactory, Notifiable;

    protected $fillable = ['full_name', 'phone', 'username', 'password', 'role', 'school_id'];

    protected $hidden = ['password', 'remember_token'];



    // تشفير كلمة المرور تلقائياً
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isSupervisor()
    {
        return $this->role === 'supervisor';
    }

    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

}
