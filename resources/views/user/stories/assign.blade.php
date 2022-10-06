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
            {{ __('Assign Stories') }}
          </h2>
            {{-- <a href="{{ route('sadmin.manager.create')  }}">
                <button class="bg-sky-500 text-white py-1 px-3 rounded outline-none focus:outline-none">{{ __('Add New') }}</button>
            </a> --}}
        </div>
        <!-- Page Heading -->
        <!-- Readers Table Data -->
        <section class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-0">
          <div class="overflow-x-auto relative ">
              <form action="{{ route('user.stories.assigned') }}" method="post">
                  @csrf
                  <div class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-4 bg-white">

                    <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
                      <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
                        <span>{{ __('Story')}}</span>
                        <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                            <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
                      </div>
                      <select name="story" id="story" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
                        @foreach ($stories as $story)
                            <option value="{{ $story->id }}">{{ $story->title }} - Grade {{ $story->grade }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('story'))
                            <div class="text-danger">{{ $errors->first('story') }}</div>
                    @endif
                    </div>
                    <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
                      <div class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
                        <span>{{ __('Reader')}}</span>
                        <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                            <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
                      </div>
                      <select name="reader" id="reader" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
                        @foreach ($readers as $reader)
                            <option value="{{ $reader->id }}">{{ $reader->User->first_name }} {{ $reader->User->last_name }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('reader'))
                            <div class="text-danger">{{ $errors->first('reader') }}</div>
                    @endif
                    </div>

                  <!-- Submit Button -->
                  <div class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-4 bg-neutral-100 ">
                    <div class="max-w-lg flex mx-auto ">
                      <button type="submit" class="flex items-center bg-sky-400 py-2 px-5 text-white rounded mx-2">Assign <div class="ml-1">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </div></button>
                      <button type="reset" class="bg-white flex items-center py-2 px-5 text-black rounded mx-2">Cancel</button>
                    </div>
                  </div>
              </form>
            {{--  <table id="dataTable" class=" w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width:100%">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
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
                  <th scope="col" class="py-3 px-6">
                    Story Title
                  </th>
                  <th scope="col" class="py-3 px-6">
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
                  </th>
                </tr>
              </thead>
              <tbody>
                  {{ $readers }}
                  {{ $stories }}
                @foreach ($stories as $story)

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

                @endforeach
              </tbody>
            </table>  --}}
          </div>
          {{--  {{ $stories->links() }}  --}}

        </section>
        <!-- Readers Table Data -->
    </section>
  </x-app-layout>
