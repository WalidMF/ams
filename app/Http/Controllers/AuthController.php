<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:admin,supervisor,teacher',
            'school_id' => 'nullable|exists:schools,id',
        ]);

        // إنشاء المستخدم الجديد
        $user = \App\Models\User::create($data);

        // تسجيل الدخول مباشرة بعد الإنشاء
        \Illuminate\Support\Facades\Auth::login($user);

        // إعادة التوجيه حسب الصلاحية
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isSupervisor()) {
            return redirect()->route('supervisor.dashboard');
        } else {
            return redirect()->route('teacher.dashboard');
        }
    }


    // صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->isSupervisor()) {
                return redirect()->route('supervisor.dashboard');
            } else {
                return redirect()->route('teacher.dashboard');
            }
        }

        return back()->withErrors(['username' => 'بيانات الدخول غير صحيحة']);
    }




    // تسجيل الخروج
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
