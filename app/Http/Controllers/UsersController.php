<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;

class UsersController extends Controller
{

    public function registerForm () {
    	return view('auth.register');
    }

    public function register (RegistrationRequest $request) {

    	$user = new User;
    	$user->first_name = $request->get('first_name');
    	$user->last_name = $request->get('last_name');
    	$user->email = $request->get('email');
    	$user->password = bcrypt($request->get('password'));
    	$user->save();

    	return redirect()->route('login');
    }

    public function loginForm () {
    	return view('auth.login');
    }

    public function login (Request $request) {
    	
    	$email = $request->get('email');
    	$password = $request->get('password');

    	$user = User::where('email', $email)->first();

    	if (!$user) {
    		return redirect()->route('login')->withError('Email or password mismatch.');
    	}

    	if (Hash::check($password, $user->password)) {
    		Auth::login($user);
    		return redirect()->intended('/');
    	}

    	return redirect()->route('login')->withError('Email or password mismatch.');

    }

    public function logout () {
    	Auth::logout();
    	return redirect()->route('login');
    }


}
