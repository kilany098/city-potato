<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $currentLocaleDirection }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Dashboard')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('asset/admin/images/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/city-potato.jpg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href="{{ asset('asset/admin/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('asset/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <link href="{{ asset('asset/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
    <link href="https://cdn.datatables.net/v/dt/dt-2.2.2/datatables.rtl.min.css" rel="stylesheet" integrity="sha384-2vMryTPZxTZDZ3GnMBDVQV8OtmoutdrfJxnDTg0bVam9mZhi7Zr3J1+lkVFRr71f" crossorigin="anonymous">
    @endif

    <link href=" {{ asset('asset/admin/vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    @if (app()->getLocale() == 'ar')
    <style>
        .page-content {
            margin-left: 0 !important;
            margin-right: 240px !important;
        }

        .side-nav {
            padding-right: 0 !important;
            padding-left: 40px !important;
        }
    </style>
    @endif


    <style>
        .menu-icon i[class*="ri-"] {
            font-family: 'remixicon', 'RemixIcon' !important;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: inline-block !important;
            width: 1em !important;
            height: 1em !important;
            font-size: 1.125rem !important;
            color: inherit !important;
            visibility: visible !important;
            opacity: 1 !important;
        }


        .side-nav .menu-icon i {
            display: inline-block !important;
            width: auto !important;
            height: auto !important;
            font-size: 1.125rem !important;
            color: inherit !important;
            visibility: visible !important;
            opacity: 1 !important;
        }


        .menu-icon {
            display: inline-block !important;
            min-width: 1.125rem !important;
            min-height: 1.125rem !important;
        }
    </style>
</head>

<body class="{{ app()->getLocale() == 'ar' ? 'rtl-mode' : 'ltr-mode' }}">


    <div class="wrapper">

        @include('dashboard.layouts.sidebar')

        @include('dashboard.layouts.topbar')


        <div class="page-content">
            @yield('content')

            @include('dashboard.layouts.footer')

        </div>



    </div>

    @include('dashboard.layouts.theme-setting')
    @include('dashboard.layouts.script')

</body>

</html>