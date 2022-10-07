<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
      </h2>
    </x-slot>
    <section class="bg-white my-8">
        <!-- Page Heading -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0 flex justify-between items-center">
          <h2 class="bg-white text-sky-500 text-4xl">
            {{ $story->title }}
          </h2>
            {{-- <a href="{{ route('sadmin.manager.create')  }}">
                <button class="bg-sky-500 text-white py-1 px-3 rounded outline-none focus:outline-none">{{ __('Add New') }}</button>
            </a> --}}
        </div>
        <!-- Page Heading -->
        <!-- Readers Table Data -->
        <section class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-0">
          <div class="overflow-x-auto relative ">
            {{ $story->content }}
          </div>
        <br><hr>

          @if ($story->q1)
          <form action="{{ route('user.story.questions',['q'=>'q1']) }}" method="post">
          <div class="max-w-7xl rounded mx-auto py-2 my-1 px-2 sm:px-2 lg:px-0">
            <b>Q1</b>:<input type="text" value="{{ $story->q1 }}" class="form-control border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400">
          </div>
        </form>
          @endif

          @if ($story->q2)
          <div class="max-w-7xl rounded mx-auto py-2 my-1 px-2 sm:px-2 lg:px-0">
            <b>Q2</b>:<input type="text" value="{{ $story->q2 }}" class="form-control border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400">
          </div>
          @endif

          @if ($story->q3)
          <div class="max-w-7xl rounded mx-auto py-2 my-1 px-2 sm:px-2 lg:px-0">
            <b>Q3</b>:<input type="text" value="{{ $story->q3 }}" class="form-control border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400">
          </div>
          @endif

          @if ($story->q4)
          <div class="max-w-7xl rounded mx-auto py-2 my-1 px-2 sm:px-2 lg:px-0">
            <b>Q4</b>:<input type="text" value="{{ $story->q4 }}" class="form-control border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400">
          </div>
          @endif

          @if ($story->q5)
          <div class="max-w-7xl rounded mx-auto py-2 my-1 px-2 sm:px-2 lg:px-0">
            <b>Q5</b>:<input type="text" value="{{ $story->q5 }}" class="form-control border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400">
          </div>
          @endif

          <hr>
          <br>
            <span class="h4">Wav:
                <audio controls>
                    <source src="{{ url('/storage/') }}/{{$story->file}}" type="audio/ogg">
                    <source src="{{ url('/storage/') }}/{{$story->file}}" type="audio/mpeg">
                  </audio></span><br>

            <span class="h4">Grade: {{ $story->grade }}</span><br>
            <span class="h4">Type: {{ $story->type }}</span><br>
            <span class="h4">Reads/Views: {{ $story->views }}</span><br>
            <span class="h4">Total Readers: {{ $readers }}</span><br>

            {{--  <table id="dataTable" class=" w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width:100%">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                  {{-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                      <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                  </th> --}}
                  {{-- <th scope="col" class="py-3 px-6">
                    Source ID
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Source Name
                  </th>

                <tr>
                  <th scope="col" class="py-3 px-6">
                    Story Title
                  </th>
                  <td class="py-4 px-6 whitespace-nowrap">
                    <a href="{{ route('user.story',['id'=>$story->id]) }}"> {{ $story->title }}</a>
                    </td>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6">
                    Story
                  </th>
                  <td class="py-4 px-6 whitespace-nowrap">
                    {{ $story->content }}
                </td>
                </tr>
                  {{--  <th scope="col" class="py-3 px-6">
                    Grade
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Story
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Created At
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Last Update
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Status
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Readers
                  </th>  --}}
                {{--  </tr>
              </thead>
              <tbody>
                {{--  @foreach ($stories as $story)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  {{-- <td class="p-4 w-4">
                    <div class="flex items-center">
                      <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class="flex items-center py-4 px-6 space-x-3">
                    <a href="{{route('sadmin.manager.edit',['id'=>$story->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" /></svg>
                    </a>
                    <a href="{{route('sadmin.manager.delete',['id'=>$story->id])}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                      <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" /></svg>
                    </a>
                  </td>

                  <td class="py-4 px-6 whitespace-nowrap">
                      <a href="{{ route('user.story',['id'=>$story->id]) }}"> {{ $story->title }}</a>
                  </td>
                  <td class="py-4 px-6 whitespace-nowrap">
                      {{ $story->grade }}
                  </td>
                  <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-wrap dark:text-black">
                      {{ $story->title }}
                  </th>
                  <td class="py-4 px-6">
                      {{ $story->created_at }}
                  </td>
                  <th scope="row" class="capitalize py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                    {{ $story->updated_at }}
                  </th>
                  <td class="py-4 px-6">
                    {{ $story->status ? 'Hidden':'Visible' }}
                  </td>
                  <td class="py-4 px-6">
                      {{ $story->readers ?? '-' }}
                    </td>

                </tr>

                {{--  @endforeach
              </tbody>
            </table>
          {{--  {{ $stories->links() }}  --}}

        </section>
        <!-- Readers Table Data -->
    </section>
  </x-app-layout>
