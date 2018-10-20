<?php

namespace App\Http\Controllers\MyAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function showLogin() {
        return view('auth/form_login');
    }

    public function doLogin(Request $request) {
        $userdata = array(
            'admin_email' => $request->admin_email,
            'password' => $request->admin_password
        );

        // dd(\Auth::attempt($userdata));
        // dd($request->all());

        // Without Validation
        try {
            if(\Auth::attempt($userdata)) {
                // dd(\Auth::user());
                // return response()->json(\Auth::user());
                // return response()->json('Login SUCCESS!');
                return redirect()->route('dashboard.index');
            } else {
                // return response()->json('Login FAILED!');
                return redirect()->route('show_login')->with('invalid_message', 'invalid email or password');
            }
        }catch(\Exception $exception) {
            return $exception;
        }
    }

    public function doLogout() {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
