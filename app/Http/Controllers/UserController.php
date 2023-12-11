<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::select('id', 'name', 'email', 'phone', 'role', 'created_at')->filter()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function new()
    {
        return view('users.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => ['required', 'min:0'],
            'password' => 'required|min:6|confirmed|max:255',
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        $user->save();
        return redirect('/users')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'min:0'],
        ]);

        $user->update($request->all());

        return redirect('/users')->with('warning', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users')->with('danger', "User deleted successfully");
    }

    public function download_cv(User $user)
    {
        $publicPath = public_path();
        $filePath = $publicPath . $user->cv;

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
