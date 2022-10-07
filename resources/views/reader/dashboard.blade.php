<x-app-layout>

  <style>
    .dreamit-single-blog-box {
      padding: 15px;
      margin-bottom: 30px;
      box-shadow: 0 0 35px rgb(0 0 0 / 10%);
      background: #fff;
      border-radius: 15px;
      padding-bottom: 30px;
      transition: .5s;
    }

    .dreamit-blog-thumb {
      position: relative;
    }

    .dreamit-meta-box {
      box-shadow: 0 0 35px rgb(0 0 0 / 10%);
      padding: 12px 19px;
      text-align: center;
      border-radius: 3px;
      position: relative;
      top: -24px;
      background: #fff;
      margin: 0 20px;
    }
    .dreamit-meta-box-footer{
      bottom: -44px;
      box-shadow: 0 0 35px rgb(0 0 0 / 10%);
      padding: 12px 19px;
      text-align: center;
      border-radius: 3px;
      position: relative;
      background: #fff;
      margin: 0 20px;
    }

    .dreamit-blog-content {
      padding: 0px 24px 0px;
      text-align: center;
    }

    .dreamit-meta-box a, .dreamit-meta-box-footer a {
      color: #6c757d;
      margin-right: 28px;
      position: relative;
    }

    .dreamit-meta-box a:before, .dreamit-meta-box-footer a:before {
      position: absolute;
      content: "";
      top: 6px;
      right: -15px;
      height: 15px;
      width: 1px;
      background: #6c757d;
    }

    .dreamit-meta-box h3, .dreamit-meta-box-footer h3 {
      font-size: 13px;
      display: inline-block;
      color: #6c757d;
    }

    dreamit-blog-button {
      margin-top: 20px;
    }

    .dreamit-blog-title h2 a {
      font-size: 20px;
      font-weight: 700;
      display: block;
      color: #232323;
      transition: .3s;
      margin-top: -8px;
      text-align: center;
    }

    .dreamit-blog-content p {
      margin-top: 15px;
      font-size: 17px;
    }

    .dreamit-blog-button a {
      display: block;
      text-transform: capitalize;
      padding: 9px 10px;
      border: 1px solid #eee;
      color: #616161;
      font-weight: 400;
      margin-top: 5px;
      transition: .3s;
      border-radius: 3px;
      background:#38BDF8;
      color:white
    }
  </style>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <div class="py-12 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-neutral-100">
      <div class="overflow-hidden sm:rounded-lg">
        <div class="p-6 row">
          @if (count($available) > 0)
          @foreach ($available as $get)
          <div class="col-lg-4 col-md-6 col-sm-6 my-4">
            <div class="dreamit-single-blog-box">
              <div class="dreamit-meta-box">
                <a >Created At: </a>
                <h3>{{ $get->story->created_at }}</h3>
              </div>
              <div class="dreamit-blog-content">
                <div class="dreamit-blog-title">
                  <h2>
                    <a href="{{ route('reader.read.story',['id'=>$get->story->id]) }}">{{ $get->story->title }}</a>
                  </h2>
                </div>
                <div class="dreamit-blog-text">
                  <p class="text-start">{{ Str::limit($get->story->content,200) }}.</p>
                </div>
                <div class="dreamit-blog-button">
                  <a href="{{ route('reader.read.story',['id'=>$get->story->id]) }}">read more <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
              <div class="dreamit-meta-box-footer">
                <a >Assigned by: </a>
                <h3> {{ $get->Manager->username }}</h3>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg-4 col-md-6 col-sm-6 my-3">
                        <div class="card" >
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
                        </div> -->
          @endforeach
          @else
          No Stories at the moment!
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>