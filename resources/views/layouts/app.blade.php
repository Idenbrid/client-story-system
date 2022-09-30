<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2">
  <style>
    #dataTable_wrapper {
      -ms-overflow-style: none;
      /* IE and Edge */
      scrollbar-width: none;
    }

    #dataTable_wrapper::-webkit-scrollbar {
      display: none;
      /* Safari and Chrome */
    }

    #dataTable_wrapper>.row:nth-child(3)>.col-sm-12:nth-child(1) {
      display: none !important;
    }

    div.dataTables_wrapper div.dataTables_paginate {
      float: left;
      margin: 50px 0 0 0;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      margin: 0;
      padding: 0;
    }

    .page-item.active .page-link {
      z-index: 3;
      color: #fff;
      background-color: #0ea5e9;
      border-color: #0ea5e9;
    }
    div.dataTables_wrapper div.dataTables_length select{
      width:70px;
    }
  </style>
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-white">
    @include('layouts.navigation')
    <!-- Page Heading -->
    <header class="bg-white">
      <div class="max-w-7xl rounded mx-auto py-2 my-3 px-4 sm:px-6 lg:px-4 bg-neutral-100 ">
        <!-- Breadcrumb -->
        <ol class="inline-flex items-center">
          <li class="inline-flex items-center">
            <a href ="{{ route('dashboard') }}">
            <svg class="w-4 h-4 mr-2 fill-sky-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
            </svg>
            </a>
          </li>
          <?php $segments = ''; ?>
          @foreach(Request::segments() as $segment)
          <?php $segments .= '/'.$segment; ?>
          <li class="m-0">
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
              </svg>
              <a href="{{ $segments }}">{{$segment}}</a>
            </div>
          </li>
          @endforeach

        </ol>
      </div>
    </header>
    <!-- Page Content -->
    <main>
        


      {{ $slot }}

      
      
    </main>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
    
  });
</script>

</html>
