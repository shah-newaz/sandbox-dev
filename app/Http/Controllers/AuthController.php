<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;

class AuthController extends Controller
{
    public function loginForm () {
    	return view('auth.login');
    }

    public function registrationForm () {
    	return view('auth.register');
    }

    public function postRegistration (RegistrationRequest $request) {
    	$user = new User;
    	$user->name = $request->get('name');
    	$user->email = $request->get('email');
    	$user->password = bcrypt($request->get('password'));
    	$user->save();
    	return redirect()->route('login');
    }

    public function postLogin (LoginRequest $request) {

    	$password = $request->get('password');
    	$email = $request->get('email');

/*    	$user = User::where('email', $email)->first();
    	
    	if (!$user) {
    		return redirect()->route('login')->withError('Email or password mismatch');
    	}

    	$passwordCheck = Hash::check($password, $user->password);

    	if (!$passwordCheck) {
    		return redirect()->route('login')->withError('Email or password mismatch');
    	}

    	Auth::login($user);*/

    	Auth::attempt(['email' => $email, 'password' => $password]);

    	return redirect()->route('home');
    }

    public function logout () {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
