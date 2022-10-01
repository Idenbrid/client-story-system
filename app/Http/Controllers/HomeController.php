<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Source;
use App\Models\SourceAdmin;
use App\Models\Story;
use App\Models\User;
use App\Models\Reader;
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
            $totalAdmin = User::whereRoleIs('admin')->count();
            $totalSources = Source::count();
            $totalSAdmin = SourceAdmin::count();
            $totalStories = Story::count();
            $totalTeachers = Manager::count();
            $totalUsers = User::count();
            return view('admin.dashboard',[
                'totalAdmin'=>$totalAdmin,
                'totalSources'=>$totalSources,
                'totalSAdmin'=>$totalSAdmin,
                'totalTeachers'=>$totalTeachers,
                'totalStories'=>$totalStories,
                'totalUsers'=>$totalUsers,
        ]);
        }
        elseif(Auth::user()->hasrole('sadmin')  && Auth::user()->is_active == '1'){

            return view('admin.dashboard');
        }
        elseif(Auth::user()->hasrole('user')  && Auth::user()->is_active == '1'){
            return view('user.dashboard');
        }
        elseif(Auth::user()->hasrole('manager')  && Auth::user()->is_active == '1'){
            return view('user.dashboard');
        }
    }
}
