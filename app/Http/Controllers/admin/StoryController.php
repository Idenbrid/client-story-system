<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
class StoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stories = Story::paginate(10);
        return view("admin.stories.index",['stories'=>$stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.stories.create');
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
            'source_name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required|integer',
        ]);
        $story = new Story();
        $story->source_name = $request->source_name;
        $story->email = $request->email;
        $story->phone = $request->phone;
        $story->address = $request->address;
        $story->status = $request->status;
        if($story->save()){
            return redirect(route('admin.stories.index'))->with(['status'=>true,'message'=>'Story Created Successfully!']);
        }else{
            return redirect(route('admin.stories.index'))->with(['status'=>false,'message'=>'Something went wrong!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story,$id)
    {
        //
        $story = Story::find($id);
        return view("admin.stories.edit",['story'=>$story]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story,$id)
    {
        //
        $story = Story::find($id);
        $story->source_name = $request->source_name;
        $story->email = $request->email;
        $story->phone = $request->phone;
        $story->address = $request->address;
        $story->status = $request->status;
        if($story->update()){
            return redirect(route('admin.stories.index'))->with(['status'=>true,'message'=>"{$story->source_name} was updated successfully!"]);
        }else{
            return redirect(route('admin.stories.index'))->with(['status'=>false,'message'=>'Something went wrong!']);
        }

        // return view("admin.stories.edit",['story'=>$story]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story,$id)
    {
        //
        $story = Story::find($id);
        if($story->delete()){
            return redirect(route('admin.stories.index'))->with(['status'=>true,'message'=>"The Story was deleted successfully!"]);
        }else{
            return redirect(route('admin.stories.index'))->with(['status'=>false,'message'=>'Something went wrong!']);
        }
    }
}
