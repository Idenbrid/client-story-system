<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Storage;
use App\Models\Source;
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
        $sources = Source::all();
        return view('admin.stories.create',['sources'=>$sources]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        $file = Storage::put('/public', $request->file);
        $story = new Story();
        $story->file = substr($file, 7);;
        $story->title = $request->title;
        $story->content = $request->content;
        $story->type = $request->type;
        $story->status = $request->hide;
        $story->source_id = $request->source_id;
        if($story->save()){
            return redirect()->route('admin.stories.index');
        }else{
            return redirect()->route('admin.stories.index');
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
