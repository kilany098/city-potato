<!DOCTYPE html>
<html lang="{{ $currentLocale }}" dir="{{ $currentLocaleDirection }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.Login') }} - City Potato</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/city-potato.jpg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-orange-50 to-white text-gray-800 min-h-screen">

    <header class="sticky top-0 z-50 backdrop-blur bg-white/70 border-b">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

            <div class="flex items-center gap-3">
                <a href="{{route('home')}}">
                    <img src="{{ asset('images/city-potato.jpg') }}" class="h-16 w-16 rounded-full shadow">
                </a>
            </div>

            <div class="flex items-center gap-3">

                <!-- Language -->
                @foreach($supportedLocales as $localeCode => $properties)
                @if($localeCode !== app()->getLocale())
                <a href="{{  $localizedUrls[$localeCode] }}" class="px-3 py-1 rounded-full border text-sm font-semibold hover:bg-orange-100">
                    {{ strtoupper($properties['native']) }}
                </a>
                @endif
                @endforeach


            </div>
        </div>
    </header>

    <section class="flex items-center justify-center py-8 px-6">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-orange-500 mb-2">{{ __('messages.Login to your account') }}</h1>
                </div>

                @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('messages.Email') }}
                        </label>
                        <input id="email" type="email" name="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition"
                            value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('messages.Password') }}
                        </label>
                        <input id="password" type="password" name="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition"
                            required autocomplete="current-password">
                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-gray-300 text-orange-500 shadow-sm focus:ring-orange-500">
                            <span class="ms-2 text-sm text-gray-600">{{ __('messages.Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-orange-500 hover:text-orange-600">
                            {{ __('messages.Forgot your password?') }}
                        </a>
                        @endif

                        <button type="submit" class="bg-orange-500 text-white px-6 py-3 rounded-full font-bold shadow hover:bg-orange-600 transition">
                            {{ __('messages.Log in') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white text-center py-6 mt-auto">
        <p>{{ __('messages.© All rights reserved') }}</p>
    </footer>

</body>

</html>