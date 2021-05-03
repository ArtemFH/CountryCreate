<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function CreateUser(Request $request)
    {
        $fields = $request->validate([
            'username' => 'required',
            'gender_id' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'age' => 'required|numeric'
        ]);

        if (User::where('username', $fields['username'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'username' => 'Such username already exists'
            ]);
        }

        if ($request->password != $request->confirm_password) {
            return redirect(route('user.registration'))->withErrors([
                'password' => 'Password does not match'
            ]);
        }

        $user = User::create($fields);

        if ($user) {
            Auth::login($user);
            return redirect(route('home.head'));
        }

        return redirect(route('home.head'))->withErrors([
            'formError' => 'Error'
        ]);
    }

    public function login(Request $request)
    {
        $formfields = $request->only(['username', 'password']);

        if (Auth::attempt($formfields)) {
            return redirect()->intended(route('home.head'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Error username or password'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home.head'));
    }

    public function registrationAvailability()
    {
        if (Auth::check()) {
            return redirect(route('home.head'));
        }

        $data = array(
            'title' => 'Registration'
        );

        $genders = Gender::query()->get();

        return view('user.registration', compact('genders'))->with($data);
    }

    public function loginAvailability()
    {
        $data = array(
            'title' => 'Login'
        );

        if (Auth::check()) {
            return redirect(route('home.head'));
        }
        return view('user.login')->with($data);
    }
}
