<!DOCTYPE html>
<html lang="{{ $currentLocale }}" dir="{{ $currentLocaleDirection }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','بطاطا المدينة')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/city-potato.jpg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-orange-50 to-white text-gray-800">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>

</html>