<div>
    <div class="divide-y divide-slate-200 bg-strong-blue p-4 rounded-md mb-4 drop-shadow-lg">
        <ul  class="py-2">
        @foreach($sidebarNav as $item)
            @if(count($item->children)>0)
            <li x-data="{ expanded: false }" class="py-2">
                <button
                    id="faqs-title-{{$item->id}}"
                    type="button"
                    class="flex items-center justify-between w-full text-left text-white font-semibold"
                    @click="expanded = !expanded"
                    :aria-expanded="expanded"
                    aria-controls="faqs-text-{{$item->id}}"
                >
                    <span>{{ $item->title_kz }}</span>
                    <svg class="fill-white shrink-0 ml-8" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                        <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                        <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                    </svg>
                </button>
                <div
                    id="faqs-text-{{$item->id}}"
                    role="region"
                    aria-labelledby="faqs-title-01"
                    class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                    :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                >
                    <div class="overflow-hidden">
                        <ul class="mt-2">
                            @foreach($item->children as $child)
                                <li class="text-gray-200 font-semibold ml-2 py-2">
                                    <a href="{{ $child->page ? route('page',$child->page) : '#' }}">{{ $child->title_kz }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </li>
            @else
                <li class="text-white font-semibold py-2">
                    <a href="{{ $item->page ? route('page',$item->page) : '#' }}">{{ $item->title_kz }}</a>
                </li>
            @endif
        @endforeach
        </ul>
    </div>
    <div class="hidden md:block swiper-container partners-slider h-[1200px] overflow-hidden">
        <div class="swiper-wrapper">
            @foreach($partners as $partner)
                <div class="swiper-slide">
                    <a href="{{ $partner->link }}" class="block w-full" target="_blank">
                        <img class="w-full h-auto cover" src="{{ $partner->getLogo() }}" alt="{{ $partner->title }}">
                    </a>
                </div>
            @endforeach
{{--            <div class="swiper-slide">--}}
{{--                <img class="w-full h-auto cover" src="/img/logo/ashyqUniversitet.jpg" alt="">--}}
{{--            </div>--}}
{{--            <div class="swiper-slide">--}}
{{--                <img class="w-full h-auto cover" src="/img/logo/cochranelibrary.jpg" alt="">--}}
{{--            </div>--}}
{{--            <div class="swiper-slide">--}}
{{--                <img class="w-full h-auto cover" src="/img/logo/kazneb.jpg" alt="">--}}
{{--            </div>--}}
{{--            <div class="swiper-slide">--}}
{{--                <img class="w-full h-auto cover" src="/img/logo/newsBank.jpg" alt="">--}}
{{--            </div>--}}
        </div>
    </div>
</div>
