<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.display', compact('users'));
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->back()->with('success', 'Podaci o korisniku su promenjeni!');
    }

    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index');
    }


}
