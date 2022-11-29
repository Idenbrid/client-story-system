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
            {{ __('Assigned Stories') }}
          </h2>
            <a href="{{ route('user.stories.assign')  }}">
                <button class="bg-sky-500 text-white py-1 px-3 rounded outline-none focus:outline-none">{{ __('Assign New') }}</button>
            </a>
        </div>
        <!-- Page Heading -->
        <!-- Readers Table Data -->
        <section class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-0">
          <div class="overflow-x-auto relative ">
             <table id="dataTable" class=" w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width:100%">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="py-3 px-6">
                    ID
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Reader
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Story Title
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Story Grade
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Assigned At
                  </th>
                  {{-- <th scope="col" class="py-3 px-6">
                    Status
                  </th> --}}
                  <th scope="col" class="py-3 px-6">
                    Samples
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Completed
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($assigned as $assign)
                @php
                    $samples = \App\Models\Sample::where('reader_id',$assign->Reader->id)->get('id');
                @endphp


                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">


                  <td class="py-4 px-6 whitespace-nowrap">
                      {{ $assign->id }}
                  </td>
                  <td class="py-4 px-6 whitespace-nowrap">
                      <a href={{ route('user.reader.edit',['id'=>$assign->reader->id]) }}> {{ $assign->Reader->username }}</a>
                  </td>
                  <td class="py-4 px-6 whitespace-nowrap">
                    <a href={{ route('user.story',['id'=>$assign->story->id]) }}> {{ $assign->Story->title }}</a>
                  </td>
                  <td class="py-4 px-6">
                    {{ $assign->Story->grade }}
                  </td>
                  <th scope="row" class="capitalize py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                    {{ $assign->created_at }}
                  </th>
                  {{-- <td class="py-4 px-6">
                    {{ $assign->status ? 'Hidden':'Visible' }}
                  </td> --}}
                  <td class="py-4 px-6">
                        @foreach ($samples as $sample)
                            <a href="{{ route('user.sample',['id'=>$sample->id]) }}">{{ $sample->id }}</a>,
                        @endforeach
                    </td>
                    <td class="py-4 px-6">
                    {{ ($assign->is_read) == 0 ? 'No':'yes' }}
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </div>

        </section>
        <!-- Readers Table Data -->
    </section>
  </x-app-layout>
