@extends('layouts.master')

@section('title', __('messages.City Potato Home'))

@section('content')

<!-- 🎠 SLIDER -->
<section class="relative max-w-6xl mx-auto w-full h-64 md:h-96 overflow-hidden rounded-2xl shadow-lg my-6">
    <div id="slider" class="flex transition-transform duration-500 ease-in-out h-full">
        <div class="min-w-full h-full relative">
            <img src="{{ asset('images/city-potato.jpg') }}" class="w-full h-full object-cover" alt="Slide 1">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <h2 class="text-white text-3xl md:text-5xl font-bold">{{ __('messages.City Potato 🔥') }}</h2>
            </div>
        </div>
        <div class="min-w-full h-full relative">
            <img src="{{ asset('images/city-potato.jpg') }}" class="w-full h-full object-cover" alt="Slide 2">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <h2 class="text-white text-3xl md:text-5xl font-bold">{{ __('messages.Fries - Sauces - Chicken Sticks') }}</h2>
            </div>
        </div>
        <div class="min-w-full h-full relative">
            <img src="{{ asset('images/city-potato.jpg') }}" class="w-full h-full object-cover" alt="Slide 3">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <h2 class="text-white text-3xl md:text-5xl font-bold">{{ __('messages.Order Now') }}</h2>
            </div>
        </div>
    </div>

    <!-- Slider Controls -->
    <button id="prev-slide" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-orange-600 w-10 h-10 rounded-full flex items-center justify-center shadow transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>
    <button id="next-slide" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-orange-600 w-10 h-10 rounded-full flex items-center justify-center shadow transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <!-- Dots -->
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
        <button class="slider-dot w-3 h-3 rounded-full bg-white/60 hover:bg-white transition" data-slide="0"></button>
        <button class="slider-dot w-3 h-3 rounded-full bg-white/60 hover:bg-white transition" data-slide="1"></button>
        <button class="slider-dot w-3 h-3 rounded-full bg-white/60 hover:bg-white transition" data-slide="2"></button>
    </div>
</section>

<script>
    const slider = document.getElementById('slider');
    const slides = slider.children;
    const prevBtn = document.getElementById('prev-slide');
    const nextBtn = document.getElementById('next-slide');
    const dots = document.querySelectorAll('.slider-dot');
    let currentSlide = 0;
    const totalSlides = slides.length;
    const isRTL = document.dir === 'rtl';

    function goToSlide(index) {
        if (index < 0) index = totalSlides - 1;
        if (index >= totalSlides) index = 0;
        currentSlide = index;
        const direction = isRTL ? 1 : -1;
        slider.style.transform = `translateX(${currentSlide * direction * 100}%)`;
        updateDots();
    }

    function updateDots() {
        dots.forEach((dot, index) => {
            dot.classList.toggle('bg-white', index === currentSlide);
            dot.classList.toggle('bg-white/60', index !== currentSlide);
        });
    }

    prevBtn.addEventListener('click', () => goToSlide(currentSlide - 1));
    nextBtn.addEventListener('click', () => goToSlide(currentSlide + 1));

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            goToSlide(parseInt(dot.dataset.slide));
        });
    });

    // Auto-slide every 5 seconds
    setInterval(() => goToSlide(currentSlide + 1), 5000);

    updateDots();
</script>

<!-- �� HERO -->
<section class="text-center py-12 md:py-20 px-4 md:px-6 relative">

    <div class="absolute inset-0 bg-orange-100 blur-3xl opacity-30"></div>

    <div class="relative z-10">
        <img src="{{ asset('images/logo.png') }}" class="mx-auto w-24 md:w-32 mb-4 md:mb-6 drop-shadow-lg">

        <h1 class="text-3xl md:text-5xl font-extrabold text-orange-500 mb-4">
            {{ __('messages.City Potato 🔥') }}
        </h1>

        <p class="text-base md:text-lg text-gray-600 mb-6">
            {{ __('messages.Fries - Sauces - Chicken Sticks') }}
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <button class="bg-orange-500 text-white px-6 py-3 rounded-full font-bold shadow hover:bg-orange-600">
                {{ __('messages.Order Now') }}
            </button>

            <button class="border px-6 py-3 rounded-full hover:bg-gray-100">
                {{ __('messages.View Menu') }}
            </button>
        </div>
    </div>
</section>

<!-- 🍔 MENU PREVIEW -->
<section class="max-w-6xl mx-auto px-4 md:px-6 py-12 md:py-16">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-orange-500 mb-8 md:mb-10">
        {{ __('messages.Popular Items') }}
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">

        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <div class="h-40 bg-orange-100 rounded-xl mb-4"></div>
            <h3 class="font-bold text-lg">Loaded Fries</h3>
            <p class="text-sm text-gray-500">Cheese + Sauce</p>
        </div>

        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <div class="h-40 bg-orange-100 rounded-xl mb-4"></div>
            <h3 class="font-bold text-lg">Chicken Sticks</h3>
            <p class="text-sm text-gray-500">Crispy & Delicious</p>
        </div>

        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <div class="h-40 bg-orange-100 rounded-xl mb-4"></div>
            <h3 class="font-bold text-lg">Special Sauce</h3>
            <p class="text-sm text-gray-500">Signature Taste</p>
        </div>

    </div>
</section>

<!-- 🎯 CTA -->
<section class="bg-orange-500 text-white text-center py-8 md:py-12 px-4">
    <h2 class="text-2xl md:text-3xl font-bold mb-4">
        {{ __('messages.Ready to order?') }}
    </h2>

    <button class="bg-white text-orange-500 px-6 py-3 rounded-full font-bold">
        {{ __('messages.Start Now') }}
    </button>
</section>



@endsection