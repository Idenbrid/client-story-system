<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Reader;
use App\Models\Sample;
use App\Models\Story;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
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
        if(Auth::check())
        {
            $reader = Reader::where('user_id', Auth::user()->id)->first();
            $available = Assign::where('reader_id', $reader->id)->with(['Manager', 'Story'])->get();
            return view('reader.dashboard',compact('available'));
        }
        else{
            redirect('/login');
        }

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

    public function sample(Request $request, $id)
    {

        // $start = date_create(str_replace("/", "-", $request->started));
        $started_at =  Carbon::parse($request->started);
        // $end = date_create(str_replace("/", "-", $request->ended));
        $ended_at =  Carbon::parse($request->ended);
        $emitted = Carbon::parse($started_at);
        $tz = Carbon::parse($ended_at);
        $gap = $tz->diffInSeconds($emitted);
        function format_time($t, $f = ':') // t = seconds, f = separator
        {
            return sprintf("%02d%s%02d%s%02d", floor($t / 3600), $f, ($t / 60) % 60, $f, $t % 60);
        }

        $duration =  format_time($gap-1);
        $file = $request->file('audio_file');
        $extension = '.wav';
        $fileName = Auth::user()->first_name . rand(111222, 999000) . $extension;
        $location = 'storage/samples/';
        $file->move($location, $fileName);
        $sample = new Sample();
        $sample->reader_id = Auth::user()->ReaderData->id;
        $sample->story_id = $id;
        $sample->manager_id = Auth::user()->ReaderData->manager_id;
        $sample->source_id = Auth::user()->ReaderData->source_id;
        $sample->file = $fileName;
        $sample->duration = $duration;
        $sample->started_at = $started_at;
        $sample->end_at = $ended_at;
        $sample->last_submit = $sample->updated_at;
        if($sample->save())
        {
            $reader = Reader::where('user_id', Auth::user()->id)->first();
            $available = Assign::where(['reader_id'=> $reader->id,'story_id'=>$id])->latest()->first();
            $available->is_read=1;
            $available->update();
            return redirect()->route('reader.dashboard')->with(['success' => true, 'message' => "was updated successfully!"]);
        }
        // return redirect()->route('');

        // else {
        //     return redirect()->back()->with(['status' => false, 'message' => 'Something went wrong!']);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        // Returning One Story of $id to Reader
        $assigned = Assign::where(['reader_id' => auth()->user()->ReaderData->id, 'story_id' => $id])->latest()->with(['Story', 'Manager'])->first();
        if ($assigned) {
            $samples = Sample::where(['story_id' => $assigned->story->id, 'reader_id' => auth()->user()->ReaderData->id])->latest()->get();

            $story = Story::find($assigned->story->id);
            $story->increment('views');
            $story->save();
            // $request->session()->flash('story_id',$assigned->story->id);
            // $Key = 'key_' . $assigned->story->id;
            // session()->put($Key, 1);
            return view('reader.story', ['story' => $story, 'assigned' => $assigned, 'samples' => $samples]);
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
