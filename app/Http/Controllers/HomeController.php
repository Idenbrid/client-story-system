<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
    if(Auth::user()->hasrole('story')){
        return view('story.dashboard');
    }
    elseif(Auth::user()->hasrole('reader')){

        return view('reader.dashboard');
    }
    elseif(Auth::user()->hasrole('admin')){

        return view('admin.dashboard');
    }
    elseif(Auth::user()->hasrole('user')){

        return view('user.dashboard');
    }
}
}
