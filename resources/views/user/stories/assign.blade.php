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
                            <div
                                class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
                                <span>{{ __('Story Grade') }}</span>
                                <sup class="top-[2px] right-[-12px]"><svg
                                        class="w-3 fill-rose-500  absolute right-0 top-0"
                                        xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                                        <path
                                            d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" />
                                    </svg></sup>
                            </div>
                            <select name="grade" id="grade" autofocus
                                class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
                                <option  value="" selected disabled>Choose Grade Here</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->grade }}">{{ $grade->grade }}</option>
                                @endforeach
                            </select>

                        </div>
                        @if ($errors->has('grade'))
                                <div class="text-danger text-center" id="gradeAlert">{{ $errors->first('grade') }}</div>
                            @endif
                        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
                            <div
                                class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
                                <span>{{ __('Story') }}</span>
                                <sup class="top-[2px] right-[-12px]"><svg
                                        class="w-3 fill-rose-500  absolute right-0 top-0"
                                        xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                                        <path
                                            d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" />
                                    </svg></sup>
                            </div>
                            <select name="story" id="storyDropDown"
                                class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1" required>
                                <option  value="">Choose Grade First</option>
                                {{-- @foreach ($stories as $story)
                                    <option value="{{ $story->id }}">{{ $story->title }} - Grade {{ $story->grade }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                        @if ($errors->has('story'))
                        <div class="text-danger text-center" id="storyAlert">{{ $errors->first('story') }}</div>
                    @endif
                        @if ($errors->has('assigned'))
                                <div class="text-danger text-center" id="assignedAlert">{{ $errors->first('assigned') }}</div>
                            @endif
                        <div class="max-w-4xl mx-auto my-1 flex items-start  flex-col sm:flex-row sm:items-center">
                            <div
                                class="uppercase flex justify-start sm:justify-end w-full sm:w-48 font-semibold relative pr-3.5">
                                <span>{{ __('Reader') }}</span>
                                <sup class="top-[2px] right-[-12px]"><svg
                                        class="w-3 fill-rose-500  absolute right-0 top-0"
                                        xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                                        <path
                                            d="M18.562,14.63379,14.00031,12,18.562,9.36621a1.00016,1.00016,0,0,0-1-1.73242L13,10.26776V5a1,1,0,0,0-2,0v5.26776l-4.562-2.634a1.00016,1.00016,0,0,0-1,1.73242L9.99969,12,5.438,14.63379a1.00016,1.00016,0,0,0,1,1.73242L11,13.73224V19a1,1,0,0,0,2,0V13.73224l4.562,2.634a1.00016,1.00016,0,0,0,1-1.73242Z" />
                                    </svg></sup>
                            </div>
                            <select name="reader" id="reader"
                                class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full my-2 sm:m-2   sm:w-9/12 px-2 py-1">
                                <option id="readerChoose"> Choose Story First</option>
                                @foreach ($readers as $reader)
                                    <option value="{{ $reader->id }}" @if($reader->id == old('reader'))
                                        selected
                                    @endif>{{ $reader->User->first_name }}
                                        {{ $reader->User->last_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        @if ($errors->has('reader'))
                        <div class="text-danger text-center" id="readerAlert">{{ $errors->first('reader') }}</div>
                    @endif
                        <!-- Submit Button -->
                        <div class="max-w-7xl rounded mx-auto py-3 my-3 px-4 sm:px-6 lg:px-4 bg-neutral-100 ">

                            <div class="max-w-lg flex mx-auto ">
                                <button type="submit"
                                    class="flex items-center btn-primary py-2 px-5 text-white rounded mx-2">Assign <div
                                        class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div></button>
                                <button type="reset"
                                    class="bg-white flex items-center py-2 px-5 text-black rounded mx-2">Cancel</button>
                            </div>

                        </div>
                </form>

            </div>
            {{--  {{ $stories->links() }}  --}}

        </section>
        <!-- Readers Table Data -->
    </section>
</x-app-layout>
<script>
    const storyDropDown = document.getElementById("storyDropDown")


    $(document).ready(function() {
        $("#grade").change(function(e) {
            e.preventDefault();
            let id = $("#grade").val();
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('user.grade.stories') }}",
                data: {
                    "id": id
                },
                success: function(response) {
                    console.log(JSON.parse(response));
                    $('#storyDropDown').html("");
                    JSON.parse(response).forEach(element => {
                        $('#storyDropDown').append($('<option>', {
                            value: element.id,
                            text: element.title
                        }));
                    });
                    // for (let story of response) {
                    //     console.log(story);
                    // }
                    // console.log(JSON.stringify(response));
                    // console.log(response);
                }
            });
        });
        $("#grade").change(function (e) {
            e.preventDefault();
            $("#readerChoose").attr('disabled', true);
            $("#readerChoose").text('Choose Reader');
        });
        $("#assignedAlert, #readerAlert, #storyAlert").fadeOut(5000);
    });
</script>
