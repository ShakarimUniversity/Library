<div x-data="{ openMenu: null }" class="border-gray-300 border-t border-b">
    <nav @click.outside="openMenu = null" class="mx-auto flex max-w-7xl items-center justify-end lg:justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:hidden">
            <button type="button" @click="toggleBurgerMenu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:block lg:flex gap-x-8">
            @foreach($nav as $item)
            @if(count($item->children)>0)
                    <div class="relative">
                        <button  @click="openMenu === {{ $item->id }} ? openMenu = null : openMenu = {{ $item->id }}" type="button" class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900" aria-expanded="false">
                            {{ $item->{'title_'.app()->getLocale()} }}
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-cloak x-show="openMenu === {{ $item->id }}" class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-52 overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-gray-900/5"
						  x-transition:enter="transition ease-in duration-150"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        aria-label="submenu"
						>
                            <div class="p-4">
                                @foreach($item->children as $child)
                                    <div class="relative text-sm leading-6 border-b pb-2 hover:bg-gray-50">
                                        @if($child->link)
                                            <a href="{{ $child->link }}" class="block font-semibold text-gray-900" target="_blank">
                                                {{ $child->{'title_'.app()->getLocale()} }}
                                            </a>
                                        @else
                                        <a href="{{ $child->page ? route('page',$child->page) : '#' }}" class="block font-semibold text-gray-900">
                                            {{ $child->{'title_'.app()->getLocale()} }}
                                            <span class="absolute inset-0"></span>
                                        </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @else
                    @if($item->link)
                        <a href="{{ $item->link }}" class="text-sm font-semibold leading-6 text-gray-900">{{ $item->{'title_'.app()->getLocale()} }}</a>
                    @else
                        <a href="{{ $item->page ? route('page',$item->page) : '#' }}" class="text-sm font-semibold leading-6 text-gray-900">{{ $item->{'title_'.app()->getLocale()} }}</a>
                    @endif
               @endif
            @endforeach
        </div>

    </nav>
</div>

<!-- Mobile menu, show/hide based on menu open state. -->
<div x-data="{ openMobileMenu: null }" x-show="isBurgerMenuOpen" class="lg:hidden" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-10"></div>
    <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
            <div class="py-6">
                @include('partials/language_switcher')
            </div>
            <button type="button" @click="isBurgerMenuOpen=false" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                    <div class="mx-3">

                        @foreach($nav as $item)
                            @if(count($item->children)>0)
                                <button @click="openMobileMenu === {{ $item->id }} ? openMobileMenu = null : openMobileMenu = {{ $item->id }}" type="button" class="flex w-full justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                                   <span class="text-left">{{ $item->{'title_'.app()->getLocale()} }}</span>
                                    <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- 'Product' sub-menu, show/hide based on menu state. -->
                                <div  x-cloak x-show="openMobileMenu === {{ $item->id }}" class="mt-2 space-y-2 bg-gray-100" id="disclosure-1">
                                    @foreach($item->children as $child)
                                        @if($child->link)
                                            <a href="{{ $child->link }}" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                                {{ $child->{'title_'.app()->getLocale()} }}
                                            </a>
                                        @else
                                        <a href="{{ $child->page ? route('page',$child->page) : '##' }}" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                            {{ $child->{'title_'.app()->getLocale()} }}
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                                @if($item->link)
                                    <a href="{{ $item->link }}" class="block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ $item->{'title_'.app()->getLocale()} }}</a>
                                @else
                                    <a href="{{ $item->page ? route('page',$item->page) : '#' }}" class="block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ $item->{'title_'.app()->getLocale()} }}</a>
                                @endif
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
