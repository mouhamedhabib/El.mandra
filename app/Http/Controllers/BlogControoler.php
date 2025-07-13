<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogControoler extends Controller
{
    public function index(){
        return view('frontend.blog');
    }
}
