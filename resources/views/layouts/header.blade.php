<header class="relative md:sticky top-0 z-50 backdrop-blur bg-white/70 border-b">
    <div class="max-w-7xl mx-auto px-4 py-2 md:py-3 flex items-center justify-between">

        <!-- Logo with Home Link -->
        <a href="{{route('home')}}" class="flex items-center gap-2 md:gap-3 shrink-0">
            <img src="{{ asset('images/city-potato.jpg') }}" class="h-8 w-8 md:h-14 md:w-14 rounded-full shadow object-cover" alt="City Potato Logo">
            <span class="hidden sm:inline font-bold text-lg md:text-xl text-orange-600"> {{__('messages.City Potato')}}</span>
        </a>

        <!-- Desktop Menu (Jobs removed - belongs in footer) -->
        <nav class="hidden md:flex items-center gap-6 font-medium">
            <a href="#" class="hover:text-orange-500 transition">{{ __('messages.Home') }}</a>
            <a href="#" class="hover:text-orange-500 transition">{{ __('messages.Menu') }}</a>
            <a href="#" class="hover:text-orange-500 transition">{{ __('messages.Special Offers') }}</a>
            <a href="#" class="hover:text-orange-500 transition">{{ __('messages.Branches') }}</a>
            <a href="#" class="hover:text-orange-500 transition">{{ __('messages.About Us') }}</a>
            <a href="#" class="hover:text-orange-500 transition">{{ __('messages.Contact Us') }}</a>
        </nav>

        <!-- Right Side -->
        <div class="flex items-center gap-3">

            <!-- Active Language Indicator + Switcher -->
            <div class="flex items-center gap-2">
                @foreach($supportedLocales as $localeCode => $properties)
                @if($localeCode === $currentLocale)
                <!-- Current Language (inactive, just showing) -->
                <span class="px-2 py-0.5 md:px-3 md:py-1 rounded-full bg-orange-100 text-orange-700 text-xs md:text-sm font-semibold cursor-default">
                    {{ strtoupper($properties['native']) }}
                </span>
                @else
                <!-- Switch to other language -->
                <a href="{{ $localizedUrls[$localeCode] }}"
                    class="px-2 py-0.5 md:px-3 md:py-1 rounded-full border text-xs md:text-sm font-semibold hover:bg-orange-50 transition">
                    {{ strtoupper($properties['native']) }}
                </a>
                @endif
                @endforeach
            </div>

            <!-- Auth Buttons -->
            @guest
            <a href="{{ route('login') }}" class="hidden md:block px-5 py-2 rounded-full border hover:bg-gray-50 transition text-sm font-medium">
                {{ __('messages.Login') }}
            </a>
            <a href="{{ route('register') }}" class="hidden md:block px-5 py-2 rounded-full bg-orange-500 text-white hover:bg-orange-600 transition text-sm font-medium shadow-sm">
                {{ __('messages.Register') }}
            </a>
            @else
            <!-- User Dropdown -->
            <div class="relative hidden md:block">
                <button id="user-dropdown-button" class="w-10 h-10 rounded-full bg-orange-500 text-white font-bold hover:bg-orange-600 transition flex items-center justify-center">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </button>
                <div id="user-dropdown" class="hidden absolute {{ $currentLocaleDirection === 'rtl' ? 'left-0' : 'right-0' }} mt-2 w-48 bg-white rounded-lg shadow-lg border py-2 z-50">
                    @if(Auth::user()->hasRole(['superadministrator', 'admin']))
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                        {{ __('messages.Dashboard') }}
                    </a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                        {{ __('messages.Profile') }}
                    </a>
                    <hr class="my-2">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full {{ $currentLocaleDirection === 'rtl' ? 'text-right' : 'text-left' }} px-4 py-2 text-red-600 hover:bg-red-50 transition">
                            {{ __('messages.Logout') }}
                        </button>
                    </form>
                </div>
            </div>
            @endguest

            <!-- Mobile Menu Button (SVG instead of emoji) -->
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition" aria-label="Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Now matches desktop items exactly) -->
    <div id="mobile-menu" class="hidden md:hidden px-4 pb-5 pt-2 space-y-2 bg-white border-t shadow-lg overflow-y-auto max-h-[80vh]">
        <a href="#" class="block py-3 px-2 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition">{{ __('messages.Home') }}</a>
        <a href="#" class="block py-3 px-2 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition">{{ __('messages.About Us') }}</a>
        <a href="#" class="block py-3 px-2 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition">{{ __('messages.Menu') }}</a>
        <a href="#" class="block py-3 px-2 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition">{{ __('messages.Special Offers') }}</a>
        <a href="#" class="block py-3 px-2 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition">{{ __('messages.Branches') }}</a>
        <a href="#" class="block py-3 px-2 text-gray-700 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition">{{ __('messages.Contact Us') }}</a>

        <div class="border-t my-3"></div>

        <!-- Language Options in Mobile -->
        <div class="flex gap-2 px-2">
            @foreach($supportedLocales as $localeCode => $properties)
            <a href="{{ $localizedUrls[$localeCode] }}"
                class="flex-1 text-center py-2 rounded-lg border text-sm font-semibold hover:bg-orange-50 transition">
                {{ strtoupper($properties['native']) }}
            </a>
            @endforeach
        </div>

        <!-- Auth Buttons in Mobile -->
        @guest
        <a href="{{ route('login') }}" class="block py-3 text-center border rounded-lg hover:bg-gray-50 transition font-medium">
            {{ __('messages.Login') }}
        </a>
        <a href="{{ route('register') }}" class="block py-3 text-center bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition font-medium">
            {{ __('messages.Register') }}
        </a>
        @else
        <a href="{{ route('dashboard') }}" class="block py-3 text-center bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition font-medium">
            {{ Auth::user()->name }}
        </a>
        <a href="{{ route('logout') }}" class="block py-3 text-center border border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition font-medium"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('messages.Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        @endguest
    </div>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden', !menu.classList.contains('hidden'));
        });

        document.getElementById('user-dropdown-button').addEventListener('click', function() {
            document.getElementById('user-dropdown').classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('user-dropdown');
            const button = document.getElementById('user-dropdown-button');
            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</header>