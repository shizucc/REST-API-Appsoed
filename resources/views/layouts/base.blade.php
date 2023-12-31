<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
    @yield('extra_styles')
</head>
<body>
    <div style="margin-top: 20px">

        @yield('content')
    </div>

    <script src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    {{-- <script src="/js/jquery-3.7.0.js"></script> --}}
    <script src="/js/bootstrap.min.js"></script>
    @yield('extra_scripts')
</body>
</html>