<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section>
        <!-- Page Heading -->
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        {{-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> --}}
                        <div class="card-body">
                            <h2 class="card-title">Who have full access of the system</h2>
                            <hr><br>
                            <h1 class="card-text h1">{{ $totalAdmin }} Super Admin</h1>
                            <hr><br>
                            <a href="#" class="btn btn-primary">Check Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        {{-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> --}}
                        <div class="card-body">
                            <h2 class="card-title">Sources are like Schools/Companies or any kind of Source</h2>
                            <hr><br>
                            <h1 class="card-text h1">{{ $totalSources }} Total Sources</h1>
                            <hr><br>
                            <a href="#" class="btn btn-primary">See All Sources</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        {{-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> --}}
                        <div class="card-body">
                            <h2 class="card-title">Limited Power Users allocated to each Source</h2>
                            <hr><br>
                            <h1 class="card-text h1">{{ $totalSAdmin }} Source Administrators</h1>
                            <hr><br>
                            <a href="#" class="btn btn-primary">See Source Admins</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-4">
                    <div class="card">
                        {{-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> --}}
                        <div class="card-body">
                            <h2 class="card-title">All the stories you have created so far</h2>
                            <hr><br>
                            <h1 class="card-text h1">{{ $totalStories }} Stories</h1>
                            <hr><br>
                            <a href="#" class="btn btn-primary">See All</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        {{-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> --}}
                        <div class="card-body">
                            <h2 class="card-title">All the system Users</h2>
                            <hr><br>
                            <h1 class="card-text h1">{{ $totalUsers }} Users</h1>
                            <hr><br>
                            <a href="#" class="btn btn-primary">Check Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        {{-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> --}}
                        <div class="card-body">
                            <h2 class="card-title">People who work for the sources on their Admin's behalf</h2>
                            <hr><br>
                            <h1 class="card-text h1">{{ $totalTeachers }} Teachers</h1>
                            <hr><br>
                            <a href="#" class="btn btn-primary">Check Details</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</x-app-layout>
