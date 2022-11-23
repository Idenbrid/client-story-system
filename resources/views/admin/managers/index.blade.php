<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <section>
    <!-- Page Heading -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0 flex justify-between items-center">
      <h2 class="bg-white text-sky-500 text-4xl">
        {{ __('Teachers')}}
      </h2>
        {{-- <a href="{{ route('readers.create')  }}">
            <button class="bg-sky-500 text-white py-1 px-3 rounded outline-none focus:outline-none">Add New</button>
        </a> --}}
    </div>
    <!-- Page Heading -->
    <section class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-0">
      <div class="overflow-x-auto relative ">
        <table id="dataTable" class=" w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width:100%">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <!--<th scope="col" class="p-4">-->
              <!--  <div class="flex items-center">-->
              <!--    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
              <!--    <label for="checkbox-all-search" class="sr-only">checkbox</label>-->
              <!--  </div>-->
              <!--</th>-->
              <th scope="col" class="py-3 px-6">
                Actions
              </th>
              <th scope="col" class="py-3 px-6">
                User ID
              </th>
              <th scope="col" class="py-3 px-6">
                Name
              </th>
              <th scope="col" class="py-3 px-6">
                Source Data
              </th>
              <th scope="col" class="py-3 px-6">
                Gender
              </th>
              <th scope="col" class="py-3 px-6">
                Date of Birth
              </th>
              {{-- <th scope="col" class="py-3 px-6">
                Gender
              </th> --}}
              <th scope="col" class="py-3 px-6">
                Joined At
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($managers as $manager)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <!--<td class="p-4 w-4">-->
              <!--  <div class="flex items-center">-->
              <!--    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
              <!--    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>-->
              <!--  </div>-->
              <!--</td>-->
              <td class="flex items-center py-4 px-6 space-x-3">
                {{-- <a href="{{route('admin.manager.edit',['id'=>$manager->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                    <path fill="none" d="M0 0h24v24H0V0z" />
                    <path d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" /></svg>
                </a> --}}
                <a href="{{route('admin.manager.destroy',['id'=>$manager->id])}}" class="font-medium text-red-600 dark:text-red-500 hover:underline" title="Prohabit From Teaching">
                  <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" /></svg>
                </a>
              </td>

              <td class="py-4 px-6">
                {{ $manager->id }}
              </td>
              <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                {{ $manager->first_name }} {{ $manager->last_name }}
              </th>
              <th scope="row" class="">
                {{-- {{ $manager }} --}}
                @if($manager->manager && $manager->manager->source)
                Source: <a href="{{ route('admin.sources.edit',['id'=>$manager->manager->source->id])}}">{{ $manager->manager->source->source_name?? '' }}</a><br />
                Source ID: {{ $manager->manager->source->source_id?? '' }}<br/>
                Source Admin: <a href="{{ route('admin.source.edit',['id'=>$manager->manager->source->user_id])}}">{{ $manager->manager->source->user->first_name.' '.$manager->manager->source->user->last_name}}</a>
                @else
                <span class="capitalize py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">-</span>
                @endif
              </th>

              {{-- <td class="py-4 px-6">
                <a href="{{route('admin.sources.edit',['id'=>$manager->id])}}">{{ $manager->first_name}}</a>
              </td> --}}
              <th scope="row" class="capitalize py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                @if($manager->manager){{ $manager->manager->gender ? 'Male':'Female'}}@else - @endif
              </th>

              <td class="py-4 px-6">
                @if($manager->manager){{ $manager->manager->dob}} @else - @endif
              </td>
              <td class="py-4 px-6">
                @if($manager->manager){{ $manager->manager->created_at}} @else - @endif
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
      {{ $managers->links() }}

    </section>
  </section>
</x-app-layout>
