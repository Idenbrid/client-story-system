<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Reader;
use App\Models\Sample;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $reader = Reader::where('user_id', Auth::user()->id)->first();
        $available = Assign::where('reader_id', $reader->id)->with(['Manager', 'Story'])->get();

        return view('reader.dashboard', ['available' => $available]);
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

    public function sample(Request $request,$id)
    {
        // Collecting Sample from reader
        // str_replace('.webm','.wav',$request->audio_file);
        $sample = Sample::where(['story_id'=>$id,'reader_id'=> Auth::user()->ReaderData->id])->first();
        if ($sample) {

            $file = $request->file('audio_file');
            $extension = '.wav';
            $fileName = Auth::user()->first_name.rand(111222, 999000) .$extension;
            $location = 'storage/samples/';
            $file->move($location,$fileName);

            // $newFile =  str_replace('.webm','.wav',substr($file, 7));
            // $file = Storage::put('/public/samples', $request->audio_file);
            $sample->reader_id = Auth::user()->ReaderData->id;
            $sample->story_id = $id;
            $sample->manager_id = Auth::user()->ReaderData->manager_id;
            $sample->source_id = Auth::user()->ReaderData->source_id;
            $sample->file = $fileName;
            $sample->last_submit = $sample->updated_at;
            if ($sample->update()) {
                return redirect()->back()->with(['status' => true, 'message' => "Your Sample was updated successfully!"]);
            } else {
                return redirect()->back()->with(['status' => false, 'message' => 'Something went wrong!']);
            }
        }else{
            $file = $request->file('audio_file');
            $extension = '.wav';
            $fileName = Auth::user()->first_name.rand(111222, 999000) .$extension;
            $location = 'storage/samples/';
            $file->move($location,$fileName);

            // $newFile =  str_replace('.webm','.wav',substr($file, 7));
            // $file = Storage::put('/public/samples', $request->audio_file);
            $sample->reader_id = Auth::user()->ReaderData->id;
            $sample->story_id = $id;
            $sample->manager_id = Auth::user()->ReaderData->manager_id;
            $sample->source_id = Auth::user()->ReaderData->source_id;
            $sample->file = $fileName;
            $sample->last_submit = $sample->updated_at;
            if ($sample->save()) {
                return redirect()->back()->with(['status' => true, 'message' => "Your Sample was successfully submitted!"]);
            } else {
                return redirect()->back()->with(['status' => false, 'message' => 'Something went wrong!']);
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

        // Returning One Story of $id to Reader
        $assigned = Assign::where(['reader_id' => auth()->user()->ReaderData->id, 'story_id' => $id])->latest()->with(['Story', 'Manager'])->first();
        if ($assigned) {
            $samples = Sample::where(['story_id' => $assigned->story->id, 'reader_id'=> auth()->user()->ReaderData->id])->latest()->get();
            $story = Story::find($assigned->story->id);
            $story->increment('views');
            $story->save();
            return view('reader.story', ['story' => $story, 'assigned' => $assigned,'samples'=>$samples]);
        } else {
            return redirect()->back();
        }
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
