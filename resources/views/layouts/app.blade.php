<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="data()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $metaTitle ?: 'Кітапхана' }}</title>
    <meta name="author" content="TheCodeholic">
    <meta name="description" content="{{ $metaDescription }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("css/swiper-bundle.min.css") }}">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
<header class="bg-white">
    <div class="max-w-7xl flex items-center space-x-8 py-4 px-4 md:px-0 mx-auto">
        <a class="cursor-pointer" href="/"><img class="w-20 md:w-24" src="/logo.png" alt="logo"></a>
        <div class="flex flex-col">
            <h1 class="text-xl md:text-2xl uppercase text-strong-blue font-ptserif">Научная библиотека</h1>
            <p class="text-base md:text-lg font-ptserifreg">НАО 'Университет имени Шакарима города Семей'</p>
        </div>
    </div>
    @include('layouts.nav',[
    'nav' => \App\Models\Menu::with(['category','children','page'])->where(['active'=>true,'category_id'=>1])->where('parent_id','=',NULL)->get(),
    ])

</header>
<!-- Main Content -->
<div class="bg-main">
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
            <!-- Левая колонка -->
        @include('layouts.sidebar',[
                                    'sidebarNav'=>\App\Models\Menu::with(['category','children','page'])->where(['active'=>true,'category_id'=>2])->where('parent_id','=',NULL)->get(),
                                    'partners' => \App\Models\Partner::all()
                                    ])
            <!-- Центральная колонка -->
            <div class="md:col-span-3 mx-2">
                {{ $slot }}
            </div>

            <!-- Правая колонка -->
            @include('layouts.aside')
        </div>
    </div>
</div>
<!-- Footer Content -->
<div>
    <p class="w-full text-center text-base py-4 bg-strong-blue text-white">НАО Университет имени Шакарима города Семей. © 2001-2024. Все права защищены.</p>
</div>

@livewireScripts
<script src="/js/init-alpine.js"></script>
<script src="{{ asset("/js/swiper-bundle.min.js") }}"></script>
@stack('scripts')
<script>
  /*  document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            currentIndex: 1,
            images: [
                '/img/img2.jpg',
                '/img/img3.jpg',
                '/img/img4.jpg',
                '/img/img2.jpg',
                '/img/img3.jpg',
            ],
            back() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            next() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                } else if (this.currentIndex <= this.images.length){
                    this.currentIndex = this.images.length - this.currentIndex + 1
                }
            },
            autoplay(interval) {
                setInterval(() => {
                    this.next(); // Вызовите метод next() для переключения на следующий слайд
                }, interval);
            },
        }))
    })*/

    var newsSwiper = new Swiper('.news-swiper', {
        loop: true,
        mousewheel: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });

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
        loop: true,
        // autoplay: {
        //      delay: 3000,
        //      disableOnInteraction: false,
        //  },
    });
</script>
</body>
</html>
