<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request){
        //Proses Login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Kalo mo pake cookie tinggal pake gini
            // if($request->rememberMe){
            //     return redirect('/')->withCookie(Cookie::make('email', $request->email,120))->withCookie('password', $request->password,120);
            // }
            return redirect('/');
        }
        return redirect('login')->with('error-message', 'Wrong Email or Password');
    }

    public function logout(Request $request)
    {
        if (Auth::User()) {
            $request->session()->flush();
        }
        return redirect('/');
    }

    public function register(Request $request)
    {
        $this->_validationRegis($request);
        $this->_createUser($request);
        return redirect('/login');
    }
    
    private function _createUser(Request $request){
        $user = new User;
        $name = $request->first_name;
        if($request->last_name){
            $name = $name . ' ' . $request->last_name;
        }
        $user->name = $name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    private function _validationRegis(Request $request){
        $validation = $request->validate(
            [
                'first_name'  => 'required',
                'email'  => 'required|unique:users',
                'password'  => 'required',
                'confirm_password'  => 'required|required_with:password|same:password',
            ],
            [
                'first_name.required' => 'First Name cannot be empty',
                'email.required' => 'Email cannot be empty',
                'email.unique:posts' => 'Email already taken',
                'password.required' => 'Password cannot be empty',
                'confirm_password.same' => 'Password is not same',
            ]
        );
    }
}
