<header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('images/city-potato.jpg') }}"
                class="h-14 w-14 rounded-full object-cover">

            <span class="font-bold text-xl text-gray-800">
                {{ __('messages.City Potato') }}
            </span>
        </a>


        <nav class="hidden lg:flex items-center gap-10 font-medium">
            <a href="{{ route('home') }}"
                class="hover:text-orange-500 transition
   {{ request()->routeIs('home') ? 'text-orange-500 font-semibold' : '' }}">
                {{ __('messages.Home') }}
            </a>
            <a href="#" class="hover:text-orange-500">{{ __('messages.Menu') }}</a>
            <a href="#" class="hover:text-orange-500">{{ __('messages.Special Offers') }}</a>
            <a href="#" class="hover:text-orange-500">{{ __('messages.About Us') }}</a>
            <a href="#" class="hover:text-orange-500">{{ __('messages.Branches') }}</a>
            <a href="#" class="hover:text-orange-500">{{ __('messages.Contact Us') }}</a>
        </nav>

        <!-- Language Switch -->
        <div class="flex items-center gap-2">
            @foreach($supportedLocales as $localeCode => $properties)
            <a href="{{ $localizedUrls[$localeCode] }}"
                class="
                    px-4 py-2 rounded-full text-sm font-semibold
                    {{ $localeCode == $currentLocale
                        ? 'bg-orange-500 text-white'
                        : 'border hover:bg-orange-50'
                    }}">
                {{ strtoupper($localeCode) }}
            </a>
            @endforeach
        </div>

    </div>
</header>