<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class LoginController extends Controller
{

    public function login() {

        if (Auth::check()) {
            return redirect('/landing');
        }
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt([
			'email' => $request->input('email'),
			'password' => $request->input('password')
		])) {
            return redirect('/landing');
        }

		/*
		if (!empty($errors)) {
			Log::info('authenticate: errors='.$errors);
		}

		if (!empty($error_msg)) {
			Log::info('authenticate: error_msg='.$error_msg);
		}
		*/

        return back()->withErrors('Invalid password. Please re-renter.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
