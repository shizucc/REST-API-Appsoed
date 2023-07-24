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
</head>
<body>
    @include('layouts.navbar')
    <div style="margin-top: 20px">

        @yield('content')
    </div>

    @yield('extra_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    {{-- <script src="/js/jquery-3.7.0.js"></script> --}}
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>