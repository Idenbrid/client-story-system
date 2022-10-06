<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Manager;
use App\Models\Source;
use App\Models\SourceAdmin;
use App\Models\User;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function adminManager()
    {
        //
        // $managers = User::whereRoleIs('manager')->with('Manager')->paginate(10);
        $managers = User::whereRoleIs('manager')->with('Manager')->paginate(10);
        return view('admin.managers.index',['managers'=>$managers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $source = Source::where('id', Auth::user()->source->id)->latest()->first();
        return view("sadmin.manager.create", ['source' => $source]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:managers,username',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
        ]);

        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            // Adding new manager for source from existing user
            $manager = new Manager();
            $manager->username = $request->username;
            $manager->user_id = $existingUser->id;
            $manager->source_id = Auth::user()->source->source_id;
            $manager->dob = $request->dob;
            $manager->gender = $request->gender;
            if ($manager->save()) {
                if (!$existingUser->hasRole('manager')) {
                    // $manager->attachRole('manager');
                    $existingUser->attachRole('manager');
                }
                return redirect(route('sadmin.managers'))->with(['status' => true, 'message' => 'New Manager was added successfully!']);
            }
        } else {
            // Create a new User
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make("$request->password");
            $user->is_active = true;

            // Storing new User and New Manager of this Source
            if ($user->save()) {
                $user->attachRole('manager');
                $manager = new Manager;
                $manager->username = $request->username;
                $manager->user_id = $user->id;
                $manager->source_id = Auth::user()->source->source_id;
                $manager->dob = $request->dob;
                $manager->gender = $request->gender;
                $manager->save();
                // $manager->attachRole('manager');
                return redirect(route('sadmin.managers'))->with(['status' => true, 'message' => 'New Manager was added successfully!']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
        $managers = Manager::whereNotNull('source_id')->where('source_id', Auth::user()->source->source_id)->with('Source')->paginate(10);
        // return $managers;
        return view('sadmin.manager.index', ['managers' => $managers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager,$id)
    {
        //
        $manager = Manager::where('id',$id)->with('User')->first();
        return view("sadmin.manager.edit", ['manager' => $manager]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager,$id)
    {
        //

                $manager = Manager::find($id);
                $manager->username = $request->username;
                $manager->dob = $request->dob;
                $manager->gender = $request->gender;
                $user = User::find($manager->user_id);
                if($user){
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                }
                $user->update();

                $manager->update();
                // $manager->attachRole('manager');
                return redirect(route('sadmin.managers'))->with(['status' => true, 'message' => 'New Manager was updated successfully!']);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager,$id)
    {
        //
        $manager = Manager::where('user_id',$id)->first();
        $user = User::find($id);
        if($manager->delete()){
            $user->delete();
            return redirect()->back();
            // return redirect()->route('sadmin.managers');
        }else{
            return redirect()->back();
        }
    }
}
