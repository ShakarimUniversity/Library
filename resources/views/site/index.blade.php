<x-layout metaTitle="Кітапхана" metaDescription="Test description">
    <div class="swiper-container news-swiper h-96 relative rounded-md overflow-hidden drop-shadow-lg">

        <!-- swiper slides -->
        <div class="swiper-wrapper">
            @foreach($news as $item)
            <div class="swiper-slide h-96">
                <img class="absolute object-cover w-full h-full" src="/storage/{{ $item->thumbnail }}" alt="news img"/>
                <div class="absolute z-10 bg-gradient-to-b from-20% from-transparent via-transparent to-strong-blue h-full w-full"></div>
                <div class="absolute z-20 bottom-5 p-4 text-left w-full">
                    <div class="text-base 3xl:text-xl 3xl:mb-2 underline text-orange-300">{{ __('interface.news') }}</div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-lg 3xl:text-xl text-white font-ptserifreg">{{ $item->title }}</h1>
                            <div class="text-sm 3xl:text-xl text-gray-300">{{ $item->published_at }}</div>
                        </div>
                        <a href="{{ route('news.show',$item) }}" class="text-white underline text-sm">{{ __('interface.more') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- !swiper slides -->

        <!-- next / prev arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- !next / prev arrows -->

        <!-- pagination dots -->
        <div class="swiper-pagination"></div>
        <!-- !pagination dots -->
    </div>
    <section class="rounded-md overflow-hidden text-gray-400 my-4 bg-white drop-shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex flex-col">
                <div class="flex flex-wrap sm:flex-row justify-between py-6 mb-2">
                    <h1 class="sm:w-2/5 font-medium text-strong-blue text-ptserifreg title-font text-2xl border-b pb-4 sm:mb-0">{{ __('interface.announcements') }}</h1>
                    <a href="{{ route('announcements') }}">
                        <svg class="w-10 text-strong-blue" stroke-linejoin="round" stroke-miterlimit="2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="m14.523 18.787s4.501-4.505 6.255-6.26c.146-.146.219-.338.219-.53s-.073-.383-.219-.53c-1.753-1.754-6.255-6.258-6.255-6.258-.144-.145-.334-.217-.524-.217-.193 0-.385.074-.532.221-.293.292-.295.766-.004 1.056l4.978 4.978h-14.692c-.414 0-.75.336-.75.75s.336.75.75.75h14.692l-4.979 4.979c-.289.289-.286.762.006 1.054.148.148.341.222.533.222.19 0 .378-.072.522-.215z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 sm:-m-4 -mx-4 -mb-10 pb-8">
                @foreach($announcements as $item)
                <div class="p-4 sm:mb-0 mb-6">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="{{ $item->getThumbnail() }}">
                    </div>
                    <h2 class="text-xl font-medium title-font text-strong-blue mt-5">{{ $item->title }}</h2>
                    <p class="text-base leading-relaxed mt-2">{{ $item->shortBody() }}</p>
                    <a class="text-indigo-400 inline-flex items-center mt-3" href="{{ route('announcement.show', $item) }}">{{ __('interface.more') }}
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
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
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        </script>
    @endpush
</x-layout>



