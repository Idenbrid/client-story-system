<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card" style="width:100%">
                        <h2 class="h2" style="">Title: {{ $story->title }}</h2>
                        <h4 class="card-title">Created At: {{ $story->created_at }} <span class="text-muted">({{ $story->views }} Reads)</span></h4>
                        <br>
                        <div class="card-body"><span class="h3 text-muted">Story;</span>

                          <p class="card-text"><h2>{{ Str::limit($story->content,400) }}</h2></p>
                          <br>
                          <audio controls>
                            <source src="{{ public_path($story->file) }}" type="audio/wav">
                            <source src="{{ public_path($story->file) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                          </audio>
                          <audio src="" autoplay></audio>
                          <a href="{{ public_path('/storage/') }}" class="btn btn-info" download="">Download Audio...</a>
                          {{--  <a href="{{ route('reader.read.story',['id'=>$story->id]) }}" class="btn btn-primary">Read more...</a>  --}}
                          <br>
                          <hr>
                          @if ($story->q1)
                            <b>Q1:</b> <p class="card-text">{{ $story->q1 }}</p>
                            @endif

                            @if ($story->q2)
                            <b>Q2:</b> <p class="card-text">{{ $story->q2 }}</p>
                            @endif

                            @if ($story->q3)
                            <b>Q3:</b> <p class="card-text">{{ $story->q3 }}</p>
                            @endif

                            @if ($story->q4)
                            <b>Q4:</b> <p class="card-text">{{ $story->q4 }}</p>
                            @endif

                            @if ($story->q5)
                            <b>Q5:</b> <p class="card-text">{{ $story->q5 }}</p>
                            @endif
                        </div>



                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{--  <script type="module" src="https://lucas.idenbrid.com/@vite/client"></script><link rel="stylesheet" href="https://lucas.idenbrid.com/resources/css/app.css" /><script type="module" src="https://lucas.idenbrid.com/resources/js/app.js"></script></head>  --}}
