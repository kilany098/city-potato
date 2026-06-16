@extends('layouts.master')

@section('title', __('messages.City Potato Home'))

@section('content')

<section class="max-w-7xl mx-auto px-6 py-5">

    <div class="grid lg:grid-cols-2 gap-8 items-center">

        <!-- Left -->
        <div>

            <h1 class="text-5xl lg:text-7xl font-extrabold">
                {{ __('messages.hero_title_line_1') }}

                <span class="block text-orange-500">
                    {{ __('messages.hero_title_line_2') }}
                </span>
            </h1>

            <p class="mt-6 text-gray-600 text-lg">
                {{ __('messages.hero_description') }}
            </p>

            <div class="flex gap-4 mt-8">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-full">
                    {{ __('messages.Order Now') }}
                </button>

                <button class="border px-8 py-4 rounded-full hover:bg-gray-50">
                    {{ __('messages.View Menu') }}
                </button>
            </div>

            <div class="flex flex-wrap gap-8 mt-10 text-sm text-gray-600">

                <div>{{ __('messages.Fresh Ingredients') }}</div>
                <div>{{ __('messages.Fast Delivery') }}</div>
                <div>{{ __('messages.Great Taste') }}</div>

            </div>

        </div>

        <!-- Right -->
        <div class="relative">

            <div class="overflow-hidden rounded-3xl">

                <div
                    id="hero-slider"
                    dir="ltr"
                    class="flex transition-transform duration-700 ease-in-out">

                    @foreach ($banners as $banner)
                    <div class="min-w-full flex justify-center">

                        <img
                            src="{{ asset('storage/' . $banner->image->path) }}"
                            class="w-full max-h-[500px] max-md:max-h-[250px] object-contain"
                            alt="{{ $banner->title ?? 'Banner' }}">

                    </div>
                    @endforeach

                </div>

            </div>

            <!-- Dots -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">

                @foreach ($banners as $banner)
                <button
                    type="button"
                    class="hero-dot w-3 h-3 rounded-full bg-orange-300">
                </button>
                @endforeach

            </div>

        </div>

    </div>

</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const slider = document.getElementById('hero-slider');

        if (!slider) return;

        const dots = document.querySelectorAll('.hero-dot');

        const total = slider.children.length;

        let current = 0;
        let interval;

        function updateSlider() {

            slider.style.transform =
                `translateX(-${current * 100}%)`;

            dots.forEach((dot, index) => {

                dot.classList.toggle(
                    'bg-orange-500',
                    index === current
                );

                dot.classList.toggle(
                    'bg-orange-300',
                    index !== current
                );

            });
        }

        function nextSlide() {

            current++;

            if (current >= total) {
                current = 0;
            }

            updateSlider();
        }

        function startAutoPlay() {

            interval = setInterval(nextSlide, 4000);

        }

        function resetAutoPlay() {

            clearInterval(interval);

            startAutoPlay();

        }

        dots.forEach((dot, index) => {

            dot.addEventListener('click', () => {

                current = index;

                updateSlider();

                resetAutoPlay();

            });

        });

        updateSlider();

        startAutoPlay();

    });
</script>

<section class="max-w-7xl mx-auto px-6 py-16">

    <h2 class="text-4xl font-bold text-center mb-12">
        Our Menu
    </h2>

    <div class="grid md:grid-cols-4 gap-6">

        <div class="bg-white rounded-3xl shadow p-6 text-center">
            <img src="{{ asset('images/hero.png') }}" class="h-36 mx-auto">
            <h3 class="font-bold mt-4">Fries</h3>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 text-center">
            <img src="{{ asset('images/hero.png') }}" class="h-36 mx-auto">
            <h3 class="font-bold mt-4">Sauces</h3>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 text-center">
            <img src="{{ asset('images/hero.png') }}" class="h-36 mx-auto">
            <h3 class="font-bold mt-4">Chicken</h3>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 text-center">
            <img src="{{ asset('images/hero.png') }}" class="h-36 mx-auto">
            <h3 class="font-bold mt-4">Sticks</h3>
        </div>

    </div>

</section>

<section class="max-w-7xl mx-auto px-6 pb-16">

    <div class="bg-orange-500 rounded-3xl p-10 text-white">

        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <div>

                <span class="uppercase">
                    Special Combo
                </span>

                <h2 class="text-5xl font-bold mt-2">
                    City Fries Box
                </h2>

                <p class="mt-4 text-lg">
                    Large Fries + Chicken Pieces + Sticks + Sauces
                </p>

                <div class="text-4xl font-bold mt-6">
                    6.50 JOD
                </div>

                <button class="bg-white text-orange-500 mt-6 px-8 py-3 rounded-full">
                    Order Now
                </button>

            </div>

            <img src="{{ asset('images/combo.png') }}">

        </div>

    </div>

</section>

<section class="max-w-7xl mx-auto px-6 pb-16">

    <div class="grid md:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow p-6 text-center">
            🚚
            <h3 class="font-bold mt-3">Fast Delivery</h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 text-center">
            ⭐
            <h3 class="font-bold mt-3">Top Quality</h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 text-center">
            🌿
            <h3 class="font-bold mt-3">Freshly Made</h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 text-center">
            💰
            <h3 class="font-bold mt-3">Great Prices</h3>
        </div>

    </div>

</section>



@endsection