<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="data()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $metaTitle ?: 'Кітапхана' }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="{{ asset("css/swiper-bundle.min.css") }}">
    @vite('resources/css/app.css')
    @livewireStyles
    <script src="//code.jivo.ru/widget/6bECXFfHly" async></script>
</head>
<body>
<header class="bg-white">
    <div class="max-w-7xl flex items-center space-x-4 py-4 px-4 mx-auto">
        <a href="/"><img class="w-32 md:w-24" src="/liblogo.png" alt="logo"></a>
        <div class="flex flex-col">
            <h1 class="text-xl md:text-2xl uppercase text-strong-blue font-ptserif">{{ __('interface.library') }}</h1>
            <p class="text-base md:text-lg font-ptserifreg">{{ __('interface.company_namy') }}</p>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @include('partials/language_switcher')
            {{--            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>--}}
        </div>
    </div>
    @include('layouts.nav',['nav'=>$nav])

</header>
<!-- Main Content -->
<div class="bg-main">
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
            <!-- Левая колонка -->
        @include('layouts.sidebar',[
    'sidebarNav'=> $sidebarNav,
    'partners' => $partners])
        <!-- Центральная колонка -->
            <div class="md:col-span-3 mx-2">
                {{ $slot }}
            </div>

            <!-- Правая колонка -->
            @include('layouts.aside',['covers'=>\App\Models\BookCover::orderBy('created_at','desc')->limit(10)->get()])
        </div>
    </div>
</div>
<!-- Footer Content -->
<div>
    <p class="w-full text-center text-base py-4 bg-strong-blue text-white">НАО Университет имени Шакарима города Семей. © 2001-2025. Все права защищены.</p>
</div>

@livewireScripts
@livewire('wire-elements-modal')
<script src="/js/init-alpine.js"></script>
<script src="{{ asset("/js/swiper-bundle.min.js") }}"></script>
@stack('scripts')
<script>

    /*var newsSwiper = new Swiper('.news-swiper', {
        loop: true,
        mousewheel: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });*/

    var swiper = new Swiper('.new-books-slider', {
        direction: 'vertical',
        slidesPerView: 'auto',
        spaceBetween: 30,
        mousewheel: true,
        grabCursor: true,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
    var swiper2 = new Swiper('.partners-slider', {
        direction: 'vertical',
        slidesPerView: 'auto',
        spaceBetween: 30,
        mousewheel: true,
        grabCursor: true,
        shortSwipes: false,
        //  loop: true,
        // autoplay: {
        //      delay: 3000,
        //      disableOnInteraction: false,
        //  },
    });
</script>
</body>
</html>
