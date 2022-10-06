<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Reader;
use App\Models\Source;
use App\Models\SourceAdmin;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',['users'=>$users]);
    }

    public function role($role)
    {
        $users = User::whereRoleIs($role)->paginate(10);
        return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if($user->delete()){
            $sadministration = SourceAdmin::where('user_id',$id)->delete();
            $manager = Manager::where('user_id',$id)->delete();
            $reader = Reader::where('user_id',$id)->delete();
            $source = Source::where('user_id',$id)->update(['user_id'=>null]);
            return redirect()->back()->with(['status'=>true,'message'=>"The User was deleted successfully!"]);
        }else{
            return redirect()->back()->with(['status'=>false,'message'=>'Something went wrong!']);
        }
    }
}
