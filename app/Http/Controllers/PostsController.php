<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Silber\Bouncer\BouncerFacade as Bouncer;

class PostsController extends Controller
{
    public function create(): View {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse {
        if(Auth::check()) {
            if(!Auth::user()->isAn('manager')) {
                abort(403, 'Unauthorized action.');
            }
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Bouncer::assign('manager')->to($user);
        Session::flash('success', 'Manager added successfully');
        return redirect()->route('managers.create')->with('success', 'Manager created');
    }
}
