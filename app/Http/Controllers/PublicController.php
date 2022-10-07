<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Reader;
use App\Models\Source;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function grades()
    {
        // To return all Source grades for this manager
        // $grades = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        $grades = Story::where('status',0)->select('grade')->distinct()->get();
        return view('user.grades.index',['grades'=>$grades]);
    }
    public function gradeStory(Request $request)
    {
        // return $request->all();
        // To return all Source grades for this manager
        // $grades = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        $stories = Story::where('status',0)->where('grade',$request->id)->orderBy('views','DESC')->get(['id','title','views']);
        return json_encode($stories);
        // return view('user.grades.index',['grades'=>$grades]);
    }
    public function stories()
    {
        // To return all Source Stories for this manager
        // $stories = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        $stories = Story::where('status',0)->get();
        return view('user.stories.index',['stories'=>$stories]);
    }
    public function assignments()
    {
        // To return all Source Stories for this manager
        // $stories = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        $assigned  =Assign::where('manager_id',Auth::user()->Manager->id)->latest()->with(['Reader','Story'])->get();
        return view('user.stories.assigned',['assigned'=>$assigned]);
    }
    public function questions(Request $request)
    {
        // To return all Source Stories for this manager
        // $stories = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        return $request->all();
        $assigned  =Assign::where('manager_id',Auth::user()->Manager->id)->latest()->with(['Reader','Story'])->get();
        return view('user.stories.assigned',['assigned'=>$assigned]);
    }
    public function assignStories()
    {
        // To return all Source Stories for this manager
        // $stories = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        $stories = Story::where('status',0)->get();
        $grades = Story::where('status',0)->select('grade')->distinct()->orderBy('grade')->get();
        $readers = Reader::where('source_id',Auth::user()->Manager->source_id)->get();
        return view('user.stories.assign',['stories'=>$stories,'readers'=>$readers,'grades'=>$grades]);
    }
    public function storiesAssigned(Request $request)
    {
        // Assigning Story to Reader
        $request->validate([
            'reader'=>'required',
            'story'=>'required',
        ]);
        $already = Assign::where('reader_id',$request->reader)->where('story_id',$request->story)->first();
        if ($already) {
            return redirect()->back()->withErrors(['assigned' => 'The Selected Story has already been assigned to this Reader']);
        }else{
        $assign = new Assign();
        $assign->reader_id = $request->reader;
        $assign->story_id = $request->story;
        $assign->manager_id = Auth::user()->Manager->id;
        $assign->source_id = Auth::user()->Manager->source_id;
        $assign->save();
        $assigned  =Assign::where('manager_id',Auth::user()->Manager->id)->with(['Reader','Story'])->get();
        return redirect()->route('user.stories.assignments');
        }
    }
    public function story($id)
    {
        // To return all Source Stories for this manager
        // $stories = Story::where(['source_id'=>Auth::user()->manager->source_id,'status'=>0])->paginate(10);
        $story = Story::find($id);
        $readers = Assign::where('story_id',$story->id)->count();
        return view('user.stories.view',['story'=>$story,'readers'=>$readers]);
    }
    public function readers()
    {
        // To return all Source Readers for this manager
        // $readers = Reader::where('source_id',Auth::user()->manager->source_id)->paginate(10);
        $readers = Reader::where('source_id',Auth::user()->Manager->source->source_id)->latest()->paginate(10);
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
        // return $request->all();
        $request->validate([
            'username' => 'required|unique:readers,username',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'gender' => 'required',
        ]);

        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            // return $existingUser;
            // Adding new manager for source from existing user
            $reader = new Reader();
            $reader->username = $request->username;
            $reader->first_name = $request->first_name;
            $reader->last_name = $request->last_name;
            $reader->manager_id =  Auth::user()->Manager->id;
            $reader->user_id = $existingUser->id;
            $reader->source_id = Auth::user()->Manager->source_id;
            $reader->dob = $request->dob;
            $reader->gender = $request->gender;
            if ($reader->save()) {
                if (!$existingUser->hasRole('manager')) {
                    // $reader->attachRole('manager');
                    $existingUser->attachRole('manager');
                }
                return redirect(route('user.readers'))->with(['status' => true, 'message' => 'New Reader was added successfully!']);
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
                $user->attachRole('reader');
                $reader = new Reader();
                $reader->username = $request->username;
                $reader->first_name = $request->first_name;
                $reader->last_name = $request->last_name;
                $reader->manager_id =  Auth::user()->Manager->id;
                $reader->user_id = $user->id;
                $reader->source_id = Auth::user()->Manager->source_id;
                $reader->dob = $request->dob;
                $reader->gender = $request->gender;
                $reader->save();
                return redirect(route('user.readers'))->with(['status' => true, 'message' => 'New Reader was added successfully!']);
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
        // Editing a Reader
        $reader = Reader::find($id);
        return view("user.readers.edit", ['reader' => $reader]);
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
        // Updating User
            $reader = Reader::find($id);
            $user = User::find($reader->user_id);
            $reader->username = $request->username;
            $reader->first_name = $request->first_name;
            $reader->last_name = $request->last_name;
            $reader->dob = $request->dob;
            $reader->gender = $request->gender;
            if ($reader->update()) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->update();
                return redirect(route('user.readers'))->with(['status' => true, 'message' => 'Reader was Updated successfully!']);
            }else{
                return redirect(route('user.readers'))->with(['status' => true, 'message' => 'Something went wrong!']);
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Deleting Reader/student from System
        $reader = Reader::find($id);
        $user = User::find($reader->user_id);
        $assignedStories = Assign::where('reader_id',$id);
        if ($reader->delete()) {
            $assignedStories->delete();
            $user->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
