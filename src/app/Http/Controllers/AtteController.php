<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtteController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    
    public function register(){
        return view('auth/register');
    }
    
    public function date(){
        return view('date');
    }
    
    public function stamp(){
        return view('stamp');
    }
}
