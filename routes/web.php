<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\AuthController;


// تسجيل مستخدم جديد
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// صفحات تسجيل الدخول والخروج
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// لوحات التحكم
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->name('admin.dashboard')->middleware('role:admin');

    Route::get('/supervisor/dashboard', function () {
        return view('dashboard.supervisor');
    })->name('supervisor.dashboard')->middleware('role:supervisor');

    Route::get('/teacher/dashboard', function () {
        return view('dashboard.teacher');
    })->name('teacher.dashboard')->middleware('role:teacher');
});
