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
        {{ __('Edit Source Administrator') }}
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
      <form method="POST" action="{{route('admin.source.update',['id'=>$sadmin->id])}}">
        @csrf
      <div class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-4 bg-white">
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('First Name')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <input type="text" name="first_name" value="{{$sadmin->first_name}}" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="Islamia High School" />
        @if($errors->has('first_name'))
                <div class="text-danger">{{ $errors->first('first_name') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
            <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
              <span>{{ __('Last Name')}}</span>
              <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                  <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
            </div>
            <input type="text" name="last_name" value="{{$sadmin->last_name}}" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="Islamia High School" />
          @if($errors->has('last_name'))
                  <div class="text-danger">{{ $errors->first('last_name') }}</div>
          @endif
          </div>
        <div class="max-w-4xl mx-auto my-1 flex  items-start  flex-col sm:flex-row sm:items-center">
          <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Email')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <input type="email" name="email" value="{{$sadmin->email}}" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="contact@story.test" />
          @if($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
        @endif
        </div>
        <div class="max-w-4xl mx-auto my-1 flex  items-start  flex-col sm:flex-row sm:items-center">
          <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Password')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <input type="password" name="pass" class="border border-gray-300 w-full my-2 sm:m-2  sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="**********"/>
          @if($errors->has('password'))
                <div class="text-danger">{{ $errors->first('password') }}</div>
        @endif
        </div>
        {{-- <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Address')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <textarea name="address" class="border  border-gray-300 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1 rounded outline-offset-0 outline-none focus:outline-blue-400" placeholder="Patli Gali, Purani Sabzi Mandi,New City, Lahore.">{{$sadmin->address}}</textarea>
          @if($errors->has('address'))
                <div class="text-danger">{{ $errors->first('address') }}</div>
        @endif
        </div> --}}
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
            <span>{{ __('Role')}}</span>
            <sup class="top-[2px] right-[-12px]"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
          </div>
          <select name="role" id="role" class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
            <option value="admin-source" {{$sadmin->role == 'admin-source' ? 'Selected':'' }}>Source Admin</option>
            {{-- <option value="user" {{$sadmin->role == 'admin-source' ? 'disabled':'' }}>User</option> --}}
          </select>
          @if($errors->has('role'))
                <div class="text-danger">{{ $errors->first('role') }}</div>
        @endif
        </div>
        {{-- <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
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
          <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
          </div>
          <div class="my-2 sm:m-2 ">
            <sup class="pl-3"><svg class="w-3 fill-rose-500  absolute right-0 top-0" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                <path d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" /></svg></sup>
            &nbsp;Is Required Field
          </div>
        </div>
        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
          <div class="capitalize flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
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
          <button type="submit" class="flex items-center btn-primary py-2 px-5 text-white rounded mx-2">Save <div class="ml-1">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div></button>
          <a href="{{route('admin.source.index')}}" class="bg-white flex items-center py-2 px-5 text-black rounded mx-2">Cancel</a>
        </div>
      </div>
      <!-- Submit Button -->
    </form>
    <!-- Form -->
    </section>
    <script>


        </script>
    <!-- Page Form Section -->
  </section>
</x-app-layout>
