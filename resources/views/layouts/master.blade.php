<!DOCTYPE html>
<html lang="{{ $currentLocale }}" dir="{{ $currentLocaleDirection }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','بطاطا المدينة')</title>
    <meta name="description"
        content="@yield('meta_description', 'City Fries serves fresh fries, chicken sticks, sauces and delicious meals.')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:image" content="{{ asset('images/city-potato.jpg') }}">
    <meta property="og:type" content="website">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate"
        hreflang="en"
        href="{{ $localizedUrls['en'] }}">

    <link rel="alternate"
        hreflang="ar"
        href="{{ $localizedUrls['ar'] }}">
    <link rel="icon" type="image/png" href="{{ asset('images/city-potato.jpg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-orange-50 to-white text-gray-800">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>

</html>