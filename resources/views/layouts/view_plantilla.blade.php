<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('title')</title>
    <base href="{{url('./')}}" />
    @yield('css')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
</head>

<body>
    <div id="wrapper">
        @yield('menu')
        <div id="page-wrapper" class="gray-bg">
            @yield('header')
            @yield('content')
            @yield('footer')
        </div>
        @yield('opciones')
    </div>
    @yield('js')
</body>

</html>