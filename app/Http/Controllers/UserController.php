<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;
use App\User;

class UserController extends Controller
{
    public function show()
    {   
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $dataUserLogin = ['email' => $request->email, 'password' => $request->password];
        // dd($dataUserLogin);
        if (Auth::attempt($dataUserLogin)) {
            dd('thanh cong');
        } else {
            dd('that bai');
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }
}
