<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/admin.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .sortable-list {
          list-style: none;
          padding: 0;
          margin: 0;
        }
        .sortable-item {
          padding: 10px;
          margin: 5px 0;
          background-color: #f0f0f0;
          border: 1px solid #ccc;
          border-radius: 5px;
          cursor: grab;
        }
        .sortable-item:active {
          cursor: grabbing;
        }
      </style>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
    
        <!-- Content -->
        <div class="flex-1 bg-[#f4f6f2] px-6 py-10 transition-all duration-700">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/adminjs.js')}}"></script>
    @stack('script')
</body>
</html>