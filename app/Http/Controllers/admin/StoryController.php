<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
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
        $stories = Story::latest()->paginate(10);
        return view("admin.stories.index",['stories'=>$stories]);
    }

    public function sadminStories()
    {
        // Visible Stories List for Relevant Source's Admin
        $stories = Story::where(['source_id'=>Auth::user()->SourceAdmin->source_id,'status'=>0])->paginate(10);
        return view("sadmin.stories",['stories'=>$stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = Source::where('status',1)->get();
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
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'grade'=>'required',
        ]);
        $file = rand(12121,45645454524).'.wav';
        if($request->base64){
            $data = str_replace('data:audio/wave;base64,', '', $request->base64);
            Storage::put("/public/$file",base64_decode($data));
        }
        $story = new Story();
        $story->grade = $request->grade;
        $story->title = $request->title;
        $story->content = $request->content;
        $story->file = $file;
        $story->q1 = $request->question1 ?? null;
        $story->q2 = $request->question2 ?? null;
        $story->q3 = $request->question3 ?? null;
        $story->q4 = $request->question4 ?? null;
        $story->q5 = $request->question5 ?? null;
        $story->type = $request->type;
        $story->status = $request->hide;
        $story->source_id = $request->source_id;
        if($story->save()){
            // return "done";
            return redirect(route('admin.stories.index'));
        }else{
            return "error";
            return redirect(route('admin.stories.index'));
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
        $sources = Source::where('status',1)->get();
        return view("admin.stories.edit",['story'=>$story,'sources'=>$sources]);
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
        if($request->file){
            $file = Storage::put('/public', $request->file);
            $story->file = substr($file, 7);;
            return $request->all();
        }
        $story->grade = $request->grade;
        $story->title = $request->title;
        $story->content = $request->content;
        $story->q1 = $request->question1 ?? null;
        $story->q2 = $request->question2 ?? null;
        $story->q3 = $request->question3 ?? null;
        $story->q4 = $request->question4 ?? null;
        $story->q5 = $request->question5 ?? null;
        $story->type = $request->type;
        $story->status = $request->hide;
        $story->source_id = $request->source_id;
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
