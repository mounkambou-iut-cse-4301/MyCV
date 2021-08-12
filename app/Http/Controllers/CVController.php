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

    function info_personelle(){
        return view('/layouts/info_personelle');
    }
    function experience_pro(){
        return view('/layouts/experience_pro');
    }
    function education_formation(){
        return view('/layouts/education_formation');
    }
}
