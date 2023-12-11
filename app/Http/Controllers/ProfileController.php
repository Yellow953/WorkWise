<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
        ]);

        $user = User::find(auth()->user()->id);

        $user->update(
            $request->all()
        );

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/cv/', $filename);
            $user->cv = '/uploads/cv/' . $filename;
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully...');
    }

    public function save_password(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with("danger", "Old Password Doesn't match!");
        }

        if ($request->new_password == $request->new_password_confirmation) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Your password has been changed");
        } else {
            return redirect()->back()->with('danger', "Passwords do not match!");
        }
    }

    public function deactivate()
    {
        User::find(auth()->user()->id)->delete();

        return redirect('register')->with('danger', 'User deactivated and deleted from records...');
    }
}
