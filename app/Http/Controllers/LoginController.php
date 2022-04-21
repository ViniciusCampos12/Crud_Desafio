<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class LoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function Index()
    {
        return view('logins.login');
    }

    public function Login(LoginRequest $request)
    {
        $credentials = ['email' => $request->email,'password' => $request->password];

        Auth::attempt($credentials);
        if(Auth::check()){
            echo "success";
            return redirect()->route('contato.index');
        }
        else{
            $errors = new MessageBag(['password' => ['Email e/ou Senha inválidos!']]);
            return redirect()->back()->withErrors($errors);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }

    public function create()
    {
        return view('logins.register');
    }

    public function register(RegisterRequest $request)
    {

        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = Hash::make($request->password);
        $this->user->save();


        return redirect()->route('login.index');
    }
}
