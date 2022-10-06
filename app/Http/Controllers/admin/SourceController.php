<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reader;
use App\Models\Source;
use App\Models\SourceAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sources = Source::with('SourceAdmin')->with('User')->paginate(10);
        // return $sources;

            return view("admin.sources.index", ['sources' => $sources]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->hasRole('admin')) {
            $sadmins = User::whereRoleIs('sadmin')->get();
            $sadmins->random = trim(Str::upper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)));
            return view('admin.sources.create', ['sadmins' => $sadmins]);
        }
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
        $request->validate([
            'source_name' => 'required|unique:sources,source_name',
            'user_id' => 'unique:source_admins,user_id',
            'email' => 'required|email',
            'source_id' => 'required',
            'address' => 'required',
            'status' => 'required|integer',
        ]);
        $source = new Source();
        $source->source_name = $request->source_name;
        $source->source_id = $request->source_id;
        $source->email = $request->email;
        $source->phone = $request->phone;
        $source->address = $request->address;
        if ($request->user_id) {
            $source->user_id = $request->user_id;
        }
        $source->status = $request->status;
        if ($source->save()) {
            if ($source->user_id) {
                $sadmin = new SourceAdmin;
                $sadmin->user_id = $request->user_id;
                $sadmin->source_id = $source->source_id;
                $sadmin->status = 1;
                $sadmin->save();
            }
            return redirect(route('admin.sources.index'))->with(['status' => true, 'message' => 'Source Created Successfully!']);
        } else {
            return redirect(route('admin.sources.index'))->with(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source, $id)
    {
        //
        $source = Source::findOrfail($id);
        $sadmin = User::where('id', $source->user_id)->get();
        $sadmins = User::whereRoleIs('sadmin')->get();
        return view("admin.sources.edit", ['source' => $source, 'sadmins' => $sadmins]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source, $id)
    {
        //

        $source = Source::find($id);
        $source->source_name = $request->source_name;
        $source->email = $request->email;
        $source->phone = $request->phone;
        $source->address = $request->address;
        if ($request->user_id) {
            if($request->user_id != $source->user_id){
                $request->validate([
                    'user_id' => 'unique:source_admins,user_id',
                ]);
            }
            $source->user_id = $request->user_id;
        }
        $source->status = $request->status;
        if ($source->update()) {
                if ($request->user_id) {
                    $sourceAdminFound = SourceAdmin::where('source_id', $source->source_id)->first();
                    if ($sourceAdminFound) {
                        if($request->user_id != $sourceAdminFound->user_id){
                            $request->validate([
                                'user_id' => 'unique:source_admins,user_id',
                            ]);
                        }
                        $sourceAdminFound->user_id = $request->user_id;
                        $sourceAdminFound->status = $request->status;
                        $sourceAdminFound->update();
                    } else {
                        $request->validate([
                            'user_id' => 'unique:source_admins,user_id',
                        ]);
                        $source_admin = new SourceAdmin;
                        $source_admin->user_id = $request->user_id;
                        $source_admin->source_id = $source->source_id;
                        $source_admin->status = $request->status;
                        $source_admin->save();
                        }
                    }else{
                    $sourceAdminFound = SourceAdmin::where('source_id', $source->source_id)->first();
                    if($sourceAdminFound){
                        $sourceAdminFound->destroy($sourceAdminFound->id);
                        Source::where('id',$source->id)->update(['user_id'=>null]);
                    }
                }

            return redirect(route('admin.sources.index'))->with(['status' => true, 'message' => "{$source->source_name} was updated successfully!"]);
        } else {
            return redirect(route('admin.sources.index'))->with(['status' => false, 'message' => 'Something went wrong!']);
        }

        // return view("admin.sources.edit",['source'=>$source]);
    }
    public function readers()
    {
        //
        $readers = User::whereRoleIs('reader')->paginate(10);
        // return $readers;
        return view("sadmin.readers", ['readers' => $readers]);
    }
    public function createNewReader()
    {
        //
        return view("sadmin.reader.create");
    }
    public function createReader(Request $request)
    {
        //
        // $request->validate([
        //     'first_name'=>'required',
        //     'last_name'=>'required',
        //     'dob'=>'required',
        //     'email'=>'required',
        //     'password'=>'required',
        //     'gender'=>'required',
        // ]);
        // return $request->all();
        if (User::where('email', $request->email)->first()) {
            $user = User::where('email', $request->email)->first();
            $reader = new Reader();
            $reader->first_name = $request->first_name;
            $reader->last_name = $request->last_name;
            $reader->dob = $request->dob;
            $reader->gender = $request->gender;
            $reader->source_id = Auth::user()->Source->id;
            $reader->source_assignee_id = Auth::user()->id;
            $reader->user_id = $user->id;
            if ($reader->save()) {
                return redirect(route('sadmin.readers'))->with(['status' => true, 'message' => "{$user->name} was created successfully!"]);
            } else {
                return redirect(route('sadmin.readers'))->with(['status' => false, 'message' => 'Something went wrong!']);
            }
        } else {
            $user = new User;
            $user->first_name = $request->first_name . ' ' . $request->last_name;
            $user->last_name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->is_active = 1;
            $user->password = Hash::make("{$request->password}");
            if ($user->save()) {
                $user->attachRole('reader');
                $reader = new Reader();
                $reader->first_name = $request->first_name;
                $reader->last_name = $request->last_name;
                $reader->dob = $request->dob;
                $reader->gender = $request->gender;
                $reader->source_id = Auth::user()->Source->id;
                $reader->source_assignee_id = Auth::user()->id;
                $reader->user_id = $user->id;
                if ($reader->save()) {
                    return redirect(route('sadmin.mysource'))->with(['status' => true, 'message' => "{$user->name} was created successfully!"]);
                } else {
                    return redirect(route('sadmin.mysource'))->with(['status' => false, 'message' => 'Something went wrong!']);
                }
            }
        }
    }
    public function updateSource(Request $request, $id)
    {
        //
        $source = Source::find($id);
        $source->source_name = $request->source_name;
        $source->email = $request->email;
        $source->phone = $request->phone;
        $source->address = $request->address;
        $source->status = $request->status;
        if ($source->update()) {
            return redirect(route('sadmin.mysource'))->with(['status' => true, 'message' => "{$source->source_name} was updated successfully!"]);
        } else {
            return redirect(route('sadmin.mysource'))->with(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source, $id)
    {
        //
        $source = Source::find($id);
        if ($source->delete()) {
            return redirect(route('admin.sources.index'))->with(['status' => true, 'message' => "The Source was deleted successfully!"]);
        } else {
            return redirect(route('admin.sources.index'))->with(['status' => false, 'message' => 'Something went wrong!']);
        }
    }
    public function destroyReader($id)
    {
        //
        $reader = Reader::find($id);
        if ($reader->delete()) {
            return redirect(route('sadmin.readers'))->with(['status' => true, 'message' => "The Reader was deleted successfully!"]);
        } else {
            return redirect(route('sadmin.readers'))->with(['status' => false, 'message' => 'Something went wrong!']);
        }
    }
}
