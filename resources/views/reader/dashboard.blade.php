<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 row">

                    @if (count($available) > 0)


                        @foreach ($available as $get)
                        <div class="col-4">
                        <div class="card" style="width:400px;margin:5px">
                            <h2 class="h2" style="text-align: center;">{{ $get->story->title }}</h2>
                            <div class="card-body">
                              <h4 class="card-title">Created At: {{ $get->story->created_at }} <span class="text-muted">({{ $get->story->views }} Reads)</span></h4>
                              <p class="card-text"><h2>{{ Str::limit($get->story->content,400) }}</h2></p>
                              <br>
                              <a href="{{ route('reader.read.story',['id'=>$get->story->id]) }}" class="btn btn-primary">Read more...</a>
                              <br>
                            </div>
                            <div class="p-1">Assigned by: {{ $get->Manager->username }} at {{ $get->created_at }}</div>
                          </div>
                        </div>
                        @endforeach
                        @else
                        No Stories at the moment!
                        @endif



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
