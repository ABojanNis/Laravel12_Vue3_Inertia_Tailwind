<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class UserAccountController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('UserAccount/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]));
        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('home')
            ->with('success', 'Account created!');
    }
}
