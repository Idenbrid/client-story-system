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
            {{ __('Samples') }}
          </h2>
            {{-- <a href="{{ route('admin.sources.create')  }}">
                <button class="bg-sky-500 text-white py-1 px-3 rounded outline-none focus:outline-none">{{ __('Add New') }}</button>
            </a> --}}
        </div>
        <!-- Page Heading -->
        <!-- Readers Table Data -->
        <section class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-0">
          <div class="overflow-x-auto relative ">
            <table id="dataTable" class=" w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width:100%">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    {{-- <th scope="col" class="p-4">
                      <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                      </div>
                    </th> --}}
                    <th scope="col" class="py-3 px-6">
                      ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                      Reader
                    </th>
                    <th scope="col" class="py-3 px-6">
                      Story
                    </th>
                    <th scope="col" class="py-3 px-6">
                      Teacher
                    </th>
                    <th scope="col" class="py-3 px-6">
                      Sample
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Source
                      </th>
                    <th scope="col" class="py-3 px-6">
                      Start At
                    </th>
                    <th scope="col" class="py-3 px-6">
                      End At
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Submitted At
                      </th>
                    <th scope="col" class="py-3 px-6">
                      Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($samples as $sample)

                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6">
                      {{ $sample->id }}
                    </td>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                      {{$sample->Reader->username}}
                    </th>
                    <td class="py-4 px-6">
                      <a href="{{route('admin.stories.edit',['id'=>$sample->Story->id])}}">{{$sample->Story->title}}</a>
                    </td>
                    <td class="py-4 px-6">
                      {{\App\Models\Manager::find($sample->manager_id)->username}}
                    </td>
                    <th scope="row" class="capitalize py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                      <audio controls>
                          <source src="{{ url('/storage/samples') }}/{{$sample->file}}" type="audio/ogg">
                          <source src="{{ url('/storage/samples') }}/{{$sample->file}}" type="audio/mpeg">
                        </audio>
                        <span class="text-center center"><b>Duration:</b> {{ $sample->duration }}s</span>
                    </th>
                    <td class="py-4 px-6">
                        @php

                        @endphp
                        <a href="{{ route('admin.sources.edit',['id'=>$sample->Source->id]) }}">{{ $sample->Source->source_name}} <b>({{ $sample->Source->source_id}})</b></a>
                    </td>
                    <td class="py-4 px-6">
                      {{ $sample->started_at }}
                    </td>
                    <td class="py-4 px-6">
                      {{ $sample->end_at }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $sample->created_at }}
                      </td>
                    <td class="py-4 px-6">
                      {{ $sample->status == 1 ? 'Active':'In review' }}
                    </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>
          </div>
          {{-- {{ $samples->links() }} --}}

        </section>
        <!-- Readers Table Data -->
    </section>
</x-app-layout>
