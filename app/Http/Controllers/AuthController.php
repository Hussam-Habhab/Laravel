<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        $remember = $request->filled('remember');

        if(Auth::attempt($credentials,$remember)){
            return redirect()->intended('tasks');
        }
        else{
            return redirect()->back()->with('error','Invalid credential');
        }

    }

  
    public function destroy(string $id)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
