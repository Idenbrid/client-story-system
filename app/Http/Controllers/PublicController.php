<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Reader;
use App\Models\Source;
use App\Models\User;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function createReader(Request $request)
    {
        // Creating new Reader/Student
        $source = Auth::user()->Manager->source;
        return view("user.readers.create", ['source' => $source]);
    }
    public function stories()
    {
        // To return all Source Stories for this manager
        // $stories = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        $stories = Story::where('status',0)->paginate(10);
        return view('user.stories.index',['stories'=>$stories]);
    }
    public function story($id)
    {
        // To return all Source Stories for this manager
        // $stories = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        $story = Story::find($id);
        return view('user.stories.view',['story'=>$story]);
    }
    public function readers()
    {
        // To return all Source Readers for this manager
        // $readers = Reader::where('source_id',Auth::user()->manager->source_id)->paginate(10);
        $readers = Reader::paginate(10);
        return view('user.readers.index',['readers'=>$readers]);
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
    public function storeReader(Request $request)
    {
        //
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
            $manager = new Reader();
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
    }
}
