<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // لدعم أدوار متعددة مثل "admin|supervisor"
        $allowed = explode('|', $role);

        if (!in_array(Auth::user()->role, $allowed)) {
            abort(403, 'غير مصرح لك بالدخول إلى هذه الصفحة.');
        }

        return $next($request);
    }
}
