<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function show(){
        return view('landingpage');
        dd('test');
    }
}
