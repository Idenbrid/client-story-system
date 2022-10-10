<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        .recorder-instructions {
            margin: 30px auto;
            width: 80%;
            padding: 5px 5px 20px 5px;
            background-color: rgb(220, 253, 225);
        }

        .step-1A,
        .step-2A,
        .step-3A,
        .step-4A,
        .step-5A {
            width: 90%;
            margin: auto;
        }

        .recorder-instructions>*>h2 {
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

        #submitButton {
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 18px;
            font-weight: bold;
            background-color: #17a2b8;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin: 0 40px;
            cursor: pointer;
        }

        .playback {
            /* display: flex; */
            /* justify-content: center; */
            margin-bottom: 10px;
        }

        #audio-playback {
            width: 600px;
            height: 50px;
        }

        audio::-webkit-media-controls-panel,
        video::-webkit-media-controls-panel {
            background-color: #fff;
        }

        .marquee-container {
            overflow-x: hidden !important;
            display: flex !important;
            flex-direction: row !important;
            position: relative;
            width: 100%;
            border: red 5px ridge;
            font-weight: bold
        }

        .marquee-container:hover div {
            animation-play-state: running;
        }

        .marquee-container:active div {
            animation-play-state: running;
        }

        .marquee {
            flex: 0 0 auto;
            min-width: 100%;
            z-index: 1;
            display: flex;
            flex-direction: row;
            align-items: center;
            transform: translateX(100%);
            animation: scroll 100s linear infinite;
            animation: scroll 100s linear infinite;
            animation-duration: 130s;
            animation-play-state: running;
            animation-delay: 0s;
            animation-direction: normal;
            color: brown;
            font-size: 14;
            font-weight: arial;
        }

        @keyframes scroll {
            0% {
                transform: translateX(57vw);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card" style="width:100%">
                        <div class="card-body">
                            <h2 class="h2" style="">Title: {{ $story->title }}</h2>
                            <h4 class="card-title">Assigned At: {{ $assigned->created_at }} by
                                {{ $assigned->Manager->username }} <span class="text-muted">({{ $story->views }}
                                    Reads)</span></h4>
                            <br>
                            <span class="h3 text-muted">Story;</span>
                            <!-- Sliding Text & Controls -->
                            <section class="d-flex flex-column">
                                <div id="storyMarqueeWraper" class="marquee-container" style="margin-top: 20px;">
                                    <div id="storyMarquee" class="marquee">
                                        {{ $story->content }}
                                    </div>
                                </div>

                                <div class="my-4">
                                    Story Controls:
                                    <button id="startMarqueBtn" class="btn btn-sm btn-success">
                                        <i class="fa-solid fa-play"></i>
                                    </button>

                                    <button id="stopMarqueBtn" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-circle-stop"></i>
                                    </button>
                                    <input id="speedHandler" type="range" id="vol" name="vol" min="0"
                                        max="300">
                                </div>
                            </section>
                            <!-- Sliding Text & Controls -->

                            <!-- Story Audio/ Request Audio -->

                            <span class="h3 text-muted">Story Audio;</span>
                            <audio controls>
                                <source src="{{ url('/storage/') }}/{{ $story->file }}" type="audio/wav">
                                <source src="{{ url('/storage/') }}/{{ $story->file }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <audio src="" autoplay></audio>
                            {{-- <a href="{{ url('/storage/') }}/{{$story->file}}" class="btn btn-info" download="">Download Audio...</a> --}}
                            <!-- Story Audio/ Request Audio -->
                            <hr>
                            <span class="h3 text-muted">Quiz;</span>
                            @if ($story->q1)
                                <p class="card-text"><b>Q1:</b> {{ $story->q1 }}</p>
                            @endif
                            @if ($story->q2)
                                <p class="card-text"><b>Q2:</b> {{ $story->q2 }}</p>
                            @endif
                            @if ($story->q3)
                                <p class="card-text"><b>Q3:</b> {{ $story->q3 }}</p>
                            @endif
                            @if ($story->q4)
                                <p class="card-text"><b>Q4:</b> {{ $story->q4 }}</p>
                            @endif
                            @if ($story->q5)
                                <p class="card-text"><b>Q5:</b> {{ $story->q5 }}</p>
                            @endif

                            <!-- User Audio -->

                            <form id="readerSingleCreationForm">
                                <div class="mt-5 d-flex flex-column align-items-start">
                                    <span class="h3 text-muted">Sample Collection;</span>
                                    <div class="playback">
                                        Please record your noise-free Sample below;
                                        <audio src="" controls="" id="audio-playback" class="hidden"></audio>
                                    </div>
                                    <section id="audio-record"
                                        class="d-flex align-items-center uppercase font-semibold relative pr-3.5">
                                        <div class="uppercase font-semibold relative pr-3.5">
                                            <span>Sample</span>
                                            <sup class="top-[2px] right-[-12px]"><svg
                                                    class="w-3 fill-rose-500  absolute right-0 top-0"
                                                    xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z">
                                                    </path>
                                                </svg></sup>
                                        </div>
                                        <div class="audio-record">
                                            <button class="btn btn-sm" id="recordButton">Start Recording</button>
                                            <button class="btn btn-sm" id="stopButton" disabled="">Stop</button>
                                        </div>
                                    </section>
                                    <button id="submitBtn" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                            <!-- User Audio -->

                            {{-- <a href="{{ route('reader.read.story',['id'=>$story->id]) }}" class="btn btn-primary">Read more...</a> --}}
                            <!-- Sliding Text & Controls -->
                            <section class="d-flex flex-column">
                                <div style="margin-top: 20px;">
                                    <div>
                                        <span class="h3 text-muted">Previous Samples;</span>
                                        <div class="table-responsive">
                                            @if (count($samples) > 0)
                                            <table class="table table-secondary">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Started</th>
                                                        <th scope="col">Ended</th>
                                                        <th scope="col">File</th>
                                                        <th scope="col">Duration</th>
                                                        {{-- <th scope="col">Updated</th> --}}
                                                        <th scope="col">Teacher</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach ($samples as $sample)
                                                        <tr class="">
                                                            <td scope="row">{{ $sample->id }}</td>
                                                            <td>{{ $sample->started_at }}</td>
                                                            <td>{{ $sample->end_at }}</td>
                                                            <td><audio controls>
                                                                    <source
                                                                        src="{{ url('/storage/samples') }}/{{ $sample->file }}"
                                                                        type="audio/wav">
                                                                    <source
                                                                        src="{{ url('/storage/samples') }}/{{ $sample->file }}"
                                                                        type="audio/mpeg">
                                                                    Your browser does not support the audio element.
                                                                </audio>
                                                                <audio src="" autoplay></audio>
                                                            </td>
                                                            <td>{{ $sample->duration }}s</td>
                                                            {{-- <td>{{ $sample->last_submit }}</td> --}}
                                                            <td>{{ Auth::user()->ReaderData->Manager->username }}</td>
                                                            <td>{{ $sample->status == 1 ? 'Approved' : 'In review' }}
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            @else
                                            <div style="text-muted">No Samples Submitted Yet!</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <hr>
                            <section class="d-flex flex-column">
                                <div style="margin-top: 20px;">
                                    <a href="{{ route('reader.dashboard') }}">
                                        <div class="btn btn-danger">
                                            Exit
                                        </div>
                                    </a>
                                    <a href="{{ route('reader.dashboard') }}">
                                        <div class="btn btn-warning">
                                            Read Other Stories
                                        </div>
                                    </a>

                                    <a onClick="window.location.reload();">
                                        <div class="btn btn-info">
                                            Reload
                                        </div>
                                    </a>

                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        let recorder, audio_stream, started, ended;
        const recordButton = document.getElementById("recordButton");
        const stopButton = document.getElementById("stopButton");
        const preview = document.getElementById("audio-playback");
        const readerSingleCreationForm = document.getElementById("readerSingleCreationForm")
        const storyMarque = document.getElementById("storyMarquee")
        const submitBtn = $("#submitBtn")
        const formData = new FormData(readerSingleCreationForm);
        var storyMarqueeWidth = document.getElementById("storyMarquee").getBoundingClientRect().width;
        var storyMarqueeWrapperWidth = document.getElementById("storyMarqueeWraper").getBoundingClientRect().width;

        recordButton.addEventListener("click", startRecording);
        stopButton.addEventListener("click", stopRecording);
        stopButton.disabled = true;
        submitBtn.addClass("hidden")

        $(document).ready(function() {
            function getTimeStamp() {
                var now = new Date();
                return ((now.getMonth() + 1) + '/' + (now.getDate()) + '/' + now.getFullYear() + " " + now
                    .getHours() + ':' +
                    ((now.getMinutes() < 10) ? ("0" + now.getMinutes()) : (now.getMinutes())) + ':' + ((now
                        .getSeconds() < 10) ? ("0" + now
                        .getSeconds()) : (now.getSeconds())));
            }
            $("#recordButton").click(function(e) {
                let tt = getTimeStamp();
                formData.append('started', tt)
                console.log(tt);
                $("#started").val(`${tt}`);
            });
            $("#stopButton").click(function(e) {
                let tt = getTimeStamp();
                formData.append('ended', tt)
                $("#ended").val(`${tt}`);
            });
        });

        $("#stopMarqueBtn").on("click", () => {
            $('#storyMarquee').css({
                'animation-play-state': 'paused'
            });
        });
        $("#startMarqueBtn").on("click", () => {
            $('#storyMarquee').css({
                'animation-play-state': 'running'
            });
        });
        $("#speedHandler").on("change", (e) => {
            const duration =
                storyMarqueeWidth < storyMarqueeWrapperWidth ?
                storyMarqueeWrapperWidth / $("#speedHandler").val() :
                storyMarqueeWidth / $("#speedHandler").val();
            console.log(duration);
            $('#storyMarquee').css({
                'animation-duration': `${duration}s`
            });
        })

        function startRecording() {
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
            navigator.mediaDevices.getUserMedia({
                audio: true
            }).then(stream => {
                let data = [];
                audio_stream = stream;
                recorder = new MediaRecorder(stream);
                recorder.addEventListener('start', e => {
                    data.length = 0;
                });
                recorder.addEventListener('dataavailable', event => {
                    data.push(event.data);
                });
                recorder.addEventListener('stop', (e) => {
                    const blob = new Blob(data, {
                        'type': 'audio/wav'
                    });
                    const url = URL.createObjectURL(blob)
                    preview.src = url;
                    formData.append('audio_file', blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                    }

                    function blobToBase64(blob) {
                        return new Promise((resolve, _) => {
                            const reader = new FileReader();
                            reader.onloadend = () => resolve(reader.result);
                            reader.readAsDataURL(blob);
                        });
                    }
                });
                recorder.start();
            });
        }

        function stopRecording() {
            recorder.stop();
            audio_stream.getAudioTracks()[0].stop();
            recordButton.disabled = false;
            recordButton.innerText = "Redo"
            $("#recordButton").removeClass("button-animate");
            $("#stopButton").addClass("inactive");
            stopButton.disabled = true;
            $("#audio-playback").removeClass("hidden");
            $("#audio-record").addClass("hidden");
            $("#audio-record").removeClass("d-flex");
            $("#downloadContainer").removeClass("hidden");
            submitBtn.removeClass("hidden")
        }

        function submit(e) {
            e.preventDefault()
            console.log(formData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                // headers: {
                //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                // data: {
                //     "_token": "{{ csrf_token() }}",
                //     "id": formData
                // },
                data: formData,
                enctype: 'multipart/form-data',
                url: "{{ route('reader.sample', ['id' => $story->id]) }}",
                success: function(response) {
                    console.log(response);
                }
            });
        }
        submitBtn.on("click", submit)
    </script>
</x-app-layout>


{{-- <script type="module" src="https://lucas.idenbrid.com/@vite/client"></script><link rel="stylesheet" href="https://lucas.idenbrid.com/resources/css/app.css" /><script type="module" src="https://lucas.idenbrid.com/resources/js/app.js"></script></head>  --}}
