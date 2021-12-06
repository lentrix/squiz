<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        if(auth()->guest()) {
            return view('login');
        }else {
            $quizzes = Quiz::orderBy('created_at','DESC')->get();
            return view('home',[
                'quizzes' => $quizzes
            ]);
        }
    }

    public function registrationForm() {
        return view('register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $request->password
        ]);

        return redirect('/')->with('Info','Registration success! You may login now.');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|required',
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user = User::where('email', $request->email)->first();

        return redirect('/')->with('Info','Welcome back ' . $user ? $user->name : '' . "!");
    }

    public function logout() {
        auth()->logout();
        return view('login');
    }
}
