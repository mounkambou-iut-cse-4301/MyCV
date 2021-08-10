<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CVController extends Controller
{
    function dashboard(){
        return view('/layouts/dashboard');
    }

    function login(){
        return view('/layouts/login');
    }

    function register(){
        return view('/layouts/register');
    }
}
