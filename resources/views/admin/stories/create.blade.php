<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <section>
    <!-- Page Heading -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
      <h2 class="bg-white text-sky-500 text-4xl">
        {{ __('Add New') }}
      </h2>
    </div>
    <!-- Page Heading -->
    <!-- Page Form Section -->
    <section class="bg-white my-8">
      {{--  <!-- Header Button -->
      <div class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-4 bg-neutral-100 ">
        <div class="max-w-lg flex mx-auto ">
          <button class="flex items-center bg-sky-400 py-2 px-5 text-white rounded mx-2">Save <div class="ml-1">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div></button>
          <button class="bg-white flex items-center py-2 px-5 text-black rounded mx-2">Cancel
        </div>
      </div>
      <!-- Header Button -->  --}}
      <!-- Form -->
      <style>
        .recorder-instructions
{
    margin: 30px auto;
    width: 80%;
    padding: 5px 5px 20px 5px;
    background-color: rgb(220, 253, 225);
}

.step-1A,
.step-2A,
.step-3A,
.step-4A,
.step-5A{
    width: 90%;
    margin: auto;
}

.recorder-instructions>*>h2
{
    font-size: 16px;
    color: #1E1014;
    margin-bottom: 3px;
}

.recorder-instructions>*>p {
    margin: 0;
    font-size: 14px;
}

/* recorder buttons start */
.audio-record {
    padding: 10px 10px 20px 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

#recordButton {
    text-transform: uppercase;
    letter-spacing: 4px;
    font-weight: bold;
    font-size: 18px;
    color: #1E1014;
    background: #CAFFD0;
    border: none;
    border-radius: 5px;
    transition: all 0.3s ease-in-out 0s;
    cursor: pointer;
    padding: 10px;
}

.button-animate {
    animation: pulse 1s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0px 0px 3px 1px #7eda88;
    }

    100% {
        box-shadow: 0px 0px 3px 10px #7eda88;

    }
}

#stopButton {
    text-transform: uppercase;
    letter-spacing: 4px;
    font-size: 18px;
    font-weight: bold;
    color: #1E1014;
    background-color: #F8333C;
    border: none;
    border-radius: 5px;
    padding: 10px;
    margin: 0 40px;
    cursor: pointer;
}

.playback{
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

#audio-playback {
    width: 600px;
    height: 50px;
}

audio::-webkit-media-controls-panel,
video::-webkit-media-controls-panel {
    background-color: #fff;
}
        </style>
        
      <form method="POST" action="{{route('admin.stories.store')}}">
        @csrf
      <div class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-4 bg-white">
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Title')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <input type="text" name="title" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="Islamia High School" />
        @if($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Description')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <textarea type="text" name="description" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="Story Description" ></textarea>
        @if($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Hide')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <select name="hide" id="hide" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
          </select>
          @if($errors->has('hide'))
                <div class="text-danger">{{ $errors->first('hide') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Type')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <select name="type" id="type" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
            <option value="A" selected>A</option>
            <option value="B">B</option>
          </select>
          @if($errors->has('type'))
                <div class="text-danger">{{ $errors->first('type') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Source')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <select name="type" id="type" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
            <option selected>Select Source</option>
            @foreach($sources as $source)
            <option value="{{$source->source_id}}">{{$source->source_name}}</option>
            @endforeach
          </select>
          @if($errors->has('type'))
                <div class="text-danger">{{ $errors->first('type') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('File')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <div class="audio-record">
            <button class="btn btn-sm" id="recordButton">Start Recording</button>
            <button class="btn btn-sm" id="stopButton" class="inactive">Stop</button>
          </div>
      
          <div class="playback">
              <audio src="" controls id="audio-playback" class="hidden"></audio>
          </div>
          @if($errors->has('file'))
                <div class="text-danger">{{ $errors->first('file') }}</div>
        @endif
        </div>
        
  
        {{-- <div class="max-w-4xl mx-auto my-1 flex  items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Phone')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <input type="tel" name="phone" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="+923033535111" />
          @if($errors->has('phone'))
                <div class="text-danger">{{ $errors->first('phone') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Address')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <textarea name="address" class="border  border-gray-300 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="Patli Gali, Purani Sabzi Mandi,New City, Lahore."></textarea>
          @if($errors->has('address'))
                <div class="text-danger">{{ $errors->first('address') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Status')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <select name="status" id="status" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
            <option value="1" selected>Active</option>
            <option value="0">Inactive</option>
          </select>
          @if($errors->has('status'))
                <div class="text-danger">{{ $errors->first('status') }}</div>
        @endif
        </div>
         <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>SOURCE NAME</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <select id="status" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
            <option>saus</option>
            <option>saqas</option>
          </select>
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
          </div>
          <div class="my-2 sm:m-2 ">
            <sup class="pl-3"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
            &nbsp;Is Required Field
          </div>
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
          </div>
          <div class="my-2">
            <button class="text-sky-500 py-1 px-2 flex justify-center items-center">
              <svg class="w-4 fill-sky-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" /></svg>
              Add another record</button>
          </div>
        </div> 
     </div> --}}
      
     
    

      <!-- Submit Button -->
      <div class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-4 bg-neutral-100 ">
        <div class="max-w-lg flex mx-auto ">
          <button type="submit" class="flex items-center bg-sky-400 py-2 px-5 text-white rounded mx-2">Save <div class="ml-1">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div></button>
          <button type="reset" class="bg-white flex items-center py-2 px-5 text-black rounded mx-2">Cancel</button>
        </div>
      </div>
      <!-- Submit Button -->
    </form>

		<div class="download">
			<button class="hidden" id="downloadContainer">
				<a href="" download="" id="downloadButton">Download Audio</a>
			</button>
		</div>
    <!-- Form -->
    </section>
    <script>
// audio recorder
          let recorder, audio_stream;
          const recordButton = document.getElementById("recordButton");
          recordButton.addEventListener("click", startRecording);

          // stop recording
          const stopButton = document.getElementById("stopButton");
          stopButton.addEventListener("click", stopRecording);
          stopButton.disabled = true;

          // set preview
          const preview = document.getElementById("audio-playback");

          // set download button event
          const downloadAudio = document.getElementById("downloadButton");
          downloadAudio.addEventListener("click", downloadRecording);

          function startRecording() {
              // button settings
              recordButton.disabled = true;
              recordButton.innerText = "Recording..."
              $("#recordButton").addClass("button-animate");

              $("#stopButton").removeClass("inactive");
              stopButton.disabled = false;


              if (!$("#audio-playback").hasClass("hidden")) {
                  $("#audio-playback").addClass("hidden")
              };

              if (!$("#downloadContainer").hasClass("hidden")) {
                  $("#downloadContainer").addClass("hidden")
              };

              navigator.mediaDevices.getUserMedia({ audio: true })
                  .then(function (stream) {
                      audio_stream = stream;
                      recorder = new MediaRecorder(stream);

                      // when there is data, compile into object for preview src
                      recorder.ondataavailable = function (e) {
                          const url = URL.createObjectURL(e.data);
                          preview.src = url;

                          // set link href as blob url, replaced instantly if re-recorded
                          downloadAudio.href = url;
                      };
                      recorder.start();

                      timeout_status = setTimeout(function () {
                          console.log("5 min timeout");
                          stopRecording();
                      }, 300000);
                  });
          }

          function stopRecording() {
              recorder.stop();
              audio_stream.getAudioTracks()[0].stop();

              // buttons reset
              recordButton.disabled = false;
              recordButton.innerText = "Redo"
              $("#recordButton").removeClass("button-animate");

              $("#stopButton").addClass("inactive");
              stopButton.disabled = true;

              $("#audio-playback").removeClass("hidden");

              $("#downloadContainer").removeClass("hidden");
          }

          function downloadRecording(){
              var name = new Date();
              var res = name.toISOString().slice(0,10)
              downloadAudio.download = res + '.wav';
          }
        </script>
    <!-- Page Form Section -->
  </section>
</x-app-layout>