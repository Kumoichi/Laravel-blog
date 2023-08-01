<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        //register forlder and create file.
        return view('register.create');
    }

    public function store()
    {
        //this gets all input from useres
        
        // this -> validate() is used when you are using form submit.
        //adding username as a default value
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

    
    User::create($attributes);

    return redirect('/');
    }
}