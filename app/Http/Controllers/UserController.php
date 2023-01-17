<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'address' => ['required', 'string', 'min:15'],
            'phone' => ['required', 'numeric', 'min:11'],
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/courses')->with('message', 'Account successfully created');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
        $emailCookie = cookie('email', null, -1);
        if ($request->remember) {
            $emailCookie = cookie('email', $request->email, 5 * 365 * 24 * 60); // create email cookie that expires in 5 years
        }

        if (auth()->attempt($formFields)) {
            return redirect('/courses')->with('message', 'You are now logged in')->withCookie($emailCookie);
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->withInput(request()->only('email'));
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Successfully logged out!');
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8'],
            'address' => ['required', 'string', 'min:15'],
            'phone' => ['required', 'numeric', 'min:11'],
        ]);

        $formFields['email'] = $user->email;

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        $user->update($formFields);

        return redirect('/users/' . $user->id)->with('message', 'Profile updated successfully');
    }
}
