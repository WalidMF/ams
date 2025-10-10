<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,supervisor,teacher',
            'school_id' => 'nullable|exists:schools,id',
        ]);

        $user = User::create([
            'full_name' => $request->name,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'school_id' => $request->school_id,
        ]);

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->except('password'));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
