@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')

        <!DOCTYPE html>
<html lang="tr" dir="ltr">
<head>
    @yield('head')
</head>
<body class="home">
@yield('header')
@yield('content')
</div>
@yield('footer')

</body>
</html>
