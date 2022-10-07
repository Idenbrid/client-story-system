<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Reader;
use App\Models\Sample;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reader = Reader::where('user_id',Auth::user()->id)->first();
        $available = Assign::where('reader_id',$reader->id)->with(['Manager','Story'])->get();

        return view('reader.dashboard',['available'=>$available]);
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

    public function sample(Request $request)
    {
        // Collecting Sample from reader
        return $request->all();
        $aample = Sample::where('reader_id',Auth::user()->id)->first();
        if($request->audio_file){
            $file = Storage::put('/public', $request->audio_file);
            $story->audio_file = substr($file, 7);;
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
        $story = Story::find($id);
        $story->increment('views');
        $story->save();
        return view('reader.story',['story'=>$story]);
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
