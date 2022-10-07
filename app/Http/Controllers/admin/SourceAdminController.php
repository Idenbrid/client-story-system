<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Model;
use App\Models\Source;
use App\Models\SourceAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SourceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = User::whereRoleIs('sadmin')->with('Source')->paginate(10);
        // return $admins;
        return view("admin.admin-source.index", ['admins' => $admins]);
    }
    public function userDashboard()
    {
        //
        $sadmin = User::find(Auth::user()->id);
        return view("sadmin.dashboard", ['sadmin' => $sadmin]);
    }
    public function mySource()
    {
        //

        $sadmin = User::where('id', Auth::user()->id)->with('Source')->latest()->first();
        // return $sadmin;
        // return $sadmin->Source;

        return view("sadmin.mysource", ['source' => $sadmin->Source]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        // $readers = Reader::where('source_id', Auth::user()->Source->id)->with('Source')->paginate(10);
        // $readers = Reader::where('source_id', Auth::user()->Source->id)->with('Source')->paginate(10);
        // return $readers;
        // return view("sadmin.readers", ['readers' => $readers]);
        return view("admin.admin-source.create");
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
        // return $request;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $source_admin = new User();
        $source_admin->first_name = $request->first_name;
        $source_admin->last_name = $request->last_name;
        $source_admin->email = $request->email;
        $source_admin->password = Hash::make($request->password);
        if ($source_admin->save()) {
            $source_admin->attachRole('sadmin');
            return redirect()->route('admin.source.index')->with(['status' => true, 'message' => 'Source Administrator Created Successfully!']);
        } else {
            return redirect()->route('admin.source.index')->with(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SourceAdmin  $sourceAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(SourceAdmin $sourceAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SourceAdmin  $sourceAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(SourceAdmin $sourceAdmin, $id)
    {
        //
        $sadmin = User::whereRoleIs('sadmin')->where('id',$id)->first();
        return view("admin.admin-source.edit", ['sadmin' => $sadmin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SourceAdmin  $sourceAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourceAdmin $sourceAdmin, $id)
    {
        //
        $sadmin = User::find($id);
        $sadmin->first_name = $request->first_name;
        $sadmin->last_name = $request->last_name;
        $sadmin->email = $request->email;
        if ($request->pass != '') {
            $sadmin->password = Hash::make($request->password);
        }
        if ($sadmin->update()) {
            return redirect(route('admin.source.index'))->with(['status' => true, 'message' => "{$sadmin->name} was updated successfully!"]);
        } else {
            return redirect(route('admin.source.index'))->with(['status' => false, 'message' => 'Something went wrong!']);
        }
    }
    public function updateSource(Request $request, SourceAdmin $sourceAdmin, $id)
    {
        //
        $source = Source::find($id);
        $source->source_name = $request->source_name;
        $source->address = $request->address;
        $source->email = $request->email;
        $source->phone = $request->phone;
        if ($source->update()) {
            return redirect(route('admin.source.index'))->with(['status' => true, 'message' => "{$source->source_name} was updated successfully!"]);
        } else {
            return redirect(route('admin.source.index'))->with(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SourceAdmin  $sourceAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourceAdmin $sourceAdmin, $id)
    {
        //
        $sadmin = User::find($id);
        $source = Source::where('user_id',$id)->first();
        if ($sadmin->delete()) {
            $sadministration = SourceAdmin::where('user_id',$id)->delete();
            $source->update(['user_id'=>null]);
            return redirect(route('admin.source.index'))->with(['status' => true, 'message' => "The Source Admin was deleted successfully!"]);
        } else {
            return redirect(route('admin.source.index'))->with(['status' => false, 'message' => 'Something went wrong!']);
        }
    }
}
