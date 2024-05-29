<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Silber\Bouncer\Bouncer as Bouncer;
use Silber\Bouncer\Database\Role;

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
        if($request->has('name')) {
            $validator = Validator::make($request->only('name'), [
                'name' => ['required', 'string', 'max:255'],
            ]);
            if($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user->update($request->only('name'));
        }
        if($request->has('email')) {
            $validator = Validator::make($request->only('email'), [
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            ]);
            if($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user->update($request->only('email'));
        }
        if($request->has('role')) {
            $validator = Validator::make($request->only('role'), [
                'role' => ['required', Rule::in(['manager', 'user'])],
            ]);

            if($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $roleId = Role::whereIn('name', $request->only('role'))->pluck('id')->first();
            $user->roles()->sync($roleId);
        }

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



        return redirect('/users');
    }

    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index');
    }


}
