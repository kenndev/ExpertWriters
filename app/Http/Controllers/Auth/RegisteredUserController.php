<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use App\Models\Role;
use App\Models\Writer;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Display the writer registration view.
     *
     * @return \Inertia\Response
     */
    public function createWriter()
    {
        return Inertia::render('Auth/WriterRegister');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $role = Role::where('role_name', $request->role)->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id
        ]);

        event(new Registered($user));

        Auth::login($user);

        if (Auth::user()->role->role_name == 'Admin') {
            return redirect(RouteServiceProvider::ADMIN);
        } else if (Auth::user()->role->role_name == 'Writer') {
            $writer = new Writer();
            $writer->user_id = Auth::user()->id;
            $writer->save();
            return redirect(RouteServiceProvider::WRITER);
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
    }
}