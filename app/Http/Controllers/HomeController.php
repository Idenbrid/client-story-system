<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
    if(Auth::user()->hasrole('story') && Auth::user()->is_active == '1'){
        return view('story.dashboard');
    }
    elseif(Auth::user()->hasrole('reader')  && Auth::user()->is_active == '1'){

        return view('reader.dashboard');
    }
    elseif(Auth::user()->hasrole('admin')  && Auth::user()->is_active == '1'){

        return view('admin.dashboard');
    }
    elseif(Auth::user()->hasrole('user')  && Auth::user()->is_active == '1'){

        return view('user.dashboard');
    }
}
}
