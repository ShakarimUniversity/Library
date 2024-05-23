<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="data()">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
            <img class="w-20 md:w-28" src="logo.png" alt="logo">
            <div class="flex flex-col">
                <h1 class="text-xl md:text-2xl uppercase text-strong-blue font-ptserif">Научная библиотека</h1>
                <p class="text-base md:text-lg font-ptserifreg">НАО 'Университет имени Шакарима города Семей'</p>
            </div>
        </div>
        <div class="border-gray-300 border-t border-b">
            <nav class="mx-auto flex max-w-7xl items-center justify-end lg:justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:hidden">
                    <button type="button" @click="toggleSideMenu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <div class="relative">
                        <button type="button" class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900" aria-expanded="false">
                            Электронная библиотека
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!--
                          'Product' flyout menu, show/hide based on flyout menu state.

                          Entering: "transition ease-out duration-200"
                            From: "opacity-0 translate-y-1"
                            To: "opacity-100 translate-y-0"
                          Leaving: "transition ease-in duration-150"
                            From: "opacity-100 translate-y-0"
                            To: "opacity-0 translate-y-1"
                        -->
                        <div class="absolute hidden -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
                            <div class="p-4">
                                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                        </svg>
                                    </div>
                                    <div class="flex-auto">
                                        <a href="#" class="block font-semibold text-gray-900">
                                            Analytics
                                            <span class="absolute inset-0"></span>
                                        </a>
                                        <p class="mt-1 text-gray-600">Get a better understanding of your traffic</p>
                                    </div>
                                </div>
                                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                                        </svg>
                                    </div>
                                    <div class="flex-auto">
                                        <a href="#" class="block font-semibold text-gray-900">
                                            Engagement
                                            <span class="absolute inset-0"></span>
                                        </a>
                                        <p class="mt-1 text-gray-600">Speak directly to your customers</p>
                                    </div>
                                </div>
                                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                        </svg>
                                    </div>
                                    <div class="flex-auto">
                                        <a href="#" class="block font-semibold text-gray-900">
                                            Security
                                            <span class="absolute inset-0"></span>
                                        </a>
                                        <p class="mt-1 text-gray-600">Your customers’ data will be safe and secure</p>
                                    </div>
                                </div>
                                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                                        </svg>
                                    </div>
                                    <div class="flex-auto">
                                        <a href="#" class="block font-semibold text-gray-900">
                                            Integrations
                                            <span class="absolute inset-0"></span>
                                        </a>
                                        <p class="mt-1 text-gray-600">Connect with third-party tools</p>
                                    </div>
                                </div>
                                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </div>
                                    <div class="flex-auto">
                                        <a href="#" class="block font-semibold text-gray-900">
                                            Automations
                                            <span class="absolute inset-0"></span>
                                        </a>
                                        <p class="mt-1 text-gray-600">Build strategic funnels that will convert</p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                                <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                    <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm6.39-2.908a.75.75 0 01.766.027l3.5 2.25a.75.75 0 010 1.262l-3.5 2.25A.75.75 0 018 12.25v-4.5a.75.75 0 01.39-.658z" clip-rule="evenodd" />
                                    </svg>
                                    Watch demo
                                </a>
                                <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                    <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                                    </svg>
                                    Contact sales
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Каталог</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Контакты</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Прайс-листы</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Информаций о подписке</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">О библиотеке</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
        </div>

        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-show="isSideMenuOpen" class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                    <button type="button" @click="isSideMenuOpen=false" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <div class="-mx-3">
                                <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                                    Электронная библиотека
                                    <!--
                                      Expand/collapse icon, toggle classes based on menu open state.

                                      Open: "rotate-180", Closed: ""
                                    -->
                                    <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- 'Product' sub-menu, show/hide based on menu state. -->
{{--                                <div class="mt-2 space-y-2" id="disclosure-1">--}}
{{--                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Analytics</a>--}}
{{--                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Engagement</a>--}}
{{--                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Security</a>--}}
{{--                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Integrations</a>--}}
{{--                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Automations</a>--}}
{{--                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Watch demo</a>--}}
{{--                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact sales</a>--}}
{{--                                </div>--}}
                            </div>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Каталог</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Контакты</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Прайс-листы</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Информаций о подписке</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">О библиотеке</a>
                        </div>
                        <div class="py-6">
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="bg-main">
        <div class="container mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                <!-- Левая колонка -->
                <div>
                    <div class="bg-strong-blue p-4 rounded-md mb-4 drop-shadow-lg">
                        <ul class="text-white">
                            <li class="py-2">Главная</li>
                            <li class="py-2">О библиотеке</li>
                            <li class="py-2">Портфолио</li>
                            <li class="py-2">Веблиография</li>
                            <li class="py-2">Виртуальная выставка</li>
                            <li class="py-2">Библиографические  указатели</li>
                            <li class="py-2">Бюллетень новых книг</li>
                        </ul>
                    </div>
                    <div class="hidden md:block swiper-container partners-slider h-[1200px] overflow-hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/logo/adilet.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/logo/ashyqUniversitet.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/logo/cochranelibrary.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/logo/kazneb.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/logo/newsBank.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Центральная колонка -->
                <div class="md:col-span-3 mx-2">
                    <div class="swiper-container news-swiper h-96 relative rounded-md overflow-hidden drop-shadow-lg">

                        <!-- swiper slides -->
                        <div class="swiper-wrapper">
                            <div class="swiper-slide h-96">
                                <img class="absolute object-cover w-full h-full" src="https://source.unsplash.com/random?sig=24" alt="news img"/>
                                <div class="absolute z-10 bg-gradient-to-b from-20% from-transparent via-transparent to-strong-blue h-full w-full"></div>
                                <div class="absolute z-20 bottom-0 p-4 text-left w-full">
                                    <div class="text-base 3xl:text-xl 3xl:mb-2 underline text-orange-300">Жаңалықтар</div>
                                    <h1 class="text-lg 3xl:text-xl text-white font-ptserifreg">Lorem Ipsum</h1>
                                    <div class="text-sm 3xl:text-xl text-gray-300">10.10.2029</div>
                                </div>
                            </div>

                            <div class="swiper-slide h-96">
                                <img class="absolute object-cover w-full h-full" src="https://source.unsplash.com/random?sig=51" alt="news img"/>
                                <div class="absolute z-10 bg-gradient-to-b from-20% from-transparent via-transparent to-strong-blue h-full w-full"></div>
                                <div class="absolute z-20 bottom-0 p-4 text-left w-full">
                                    <div class="text-base 3xl:text-xl 3xl:mb-2 underline text-orange-300">Жаңалықтар</div>
                                    <h1 class="text-lg 3xl:text-xl text-white font-ptserifreg">Lorem Ipsum</h1>
                                    <div class="text-sm 3xl:text-xl text-gray-300">10.10.2029</div>
                                </div>
                            </div>

                            <div class="swiper-slide h-96">
                                <img class="absolute object-cover w-full h-full" src="https://source.unsplash.com/random?sig=22" alt="news img"/>
                                <div class="absolute z-10 bg-gradient-to-b from-20% from-transparent via-transparent to-strong-blue h-full w-full"></div>
                                <div class="absolute z-20 bottom-0 p-4 text-left w-full">
                                    <div class="text-base 3xl:text-xl 3xl:mb-2 underline text-orange-300">Жаңалықтар</div>
                                    <h1 class="text-lg 3xl:text-xl text-white font-ptserifreg">Lorem Ipsum</h1>
                                    <div class="text-sm 3xl:text-xl text-gray-300">10.10.2029</div>
                                </div>
                            </div>

                            <div class="swiper-slide h-96">
                                <img class="absolute object-cover w-full h-full" src="https://source.unsplash.com/random?sig=241" alt="news img"/>
                                <div class="absolute z-10 bg-gradient-to-b from-20% from-transparent via-transparent to-strong-blue h-full w-full"></div>
                                <div class="absolute z-20 bottom-0 p-4 text-left w-full">
                                    <div class="text-base 3xl:text-xl 3xl:mb-2 underline text-orange-300">Жаңалықтар</div>
                                    <h1 class="text-lg 3xl:text-xl text-white font-ptserifreg">Lorem Ipsum</h1>
                                    <div class="text-sm 3xl:text-xl text-gray-300">10.10.2029</div>
                                </div>
                            </div>
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
                                    <h1 class="sm:w-2/5 font-medium text-strong-blue text-ptserifreg title-font text-2xl border-b pb-4 sm:mb-0">Хабарландырулар</h1>
                                    <svg class="w-10 text-strong-blue" stroke-linejoin="round" stroke-miterlimit="2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="m14.523 18.787s4.501-4.505 6.255-6.26c.146-.146.219-.338.219-.53s-.073-.383-.219-.53c-1.753-1.754-6.255-6.258-6.255-6.258-.144-.145-.334-.217-.524-.217-.193 0-.385.074-.532.221-.293.292-.295.766-.004 1.056l4.978 4.978h-14.692c-.414 0-.75.336-.75.75s.336.75.75.75h14.692l-4.979 4.979c-.289.289-.286.762.006 1.054.148.148.341.222.533.222.19 0 .378-.072.522-.215z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 sm:-m-4 -mx-4 -mb-10 pb-8">
                                <div class="p-4 sm:mb-0 mb-6">
                                    <div class="rounded-lg h-64 overflow-hidden">
                                        <img alt="content" class="object-cover object-center h-full w-full" src="/img/img2.jpg">
                                    </div>
                                    <h2 class="text-xl font-medium title-font text-strong-blue mt-5">Lorem Ipsum Title</h2>
                                    <p class="text-base leading-relaxed mt-2">Swag shoindxgoitch literalmeditation subway tile tumblr cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
                                    <a class="text-indigo-400 inline-flex items-center mt-3">Толығырақ
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="p-4 sm:mb-0 mb-6">
                                    <div class="rounded-lg h-64 overflow-hidden">
                                        <img alt="content" class="object-cover object-center h-full w-full" src="/img/img3.jpg">
                                    </div>
                                    <h2 class="text-xl font-medium title-font text-strong-blue mt-5">Lorem Ipsum Title</h2>
                                    <p class="text-base leading-relaxed mt-2">Swag shoindxigoitch literally meditation subway tile tumblr cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
                                    <a class="text-indigo-400 inline-flex items-center mt-3">Толығырақ
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="p-4 sm:mb-0 mb-6">
                                    <div class="rounded-lg h-64 overflow-hidden">
                                        <img alt="content" class="object-cover object-center h-full w-full" src="/img/img3.jpg">
                                    </div>
                                    <h2 class="text-xl font-medium title-font text-strong-blue mt-5">Lorem Ipsum Title</h2>
                                    <p class="text-base leading-relaxed mt-2">Swag shoindxigoitch literally meditation subway tile tumblr cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
                                    <a class="text-indigo-400 inline-flex items-center mt-3">Толығырақ
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="p-4 sm:mb-0 mb-6">
                                    <div class="rounded-lg h-64 overflow-hidden">
                                        <img alt="content" class="object-cover object-center h-full w-full" src="/img/img3.jpg">
                                    </div>
                                    <h2 class="text-xl font-medium title-font text-strong-blue mt-5">Lorem Ipsum Title</h2>
                                    <p class="text-base leading-relaxed mt-2">Swag shoindxigoitch literally meditation subway tile tumblr cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
                                    <a class="text-indigo-400 inline-flex items-center mt-3">Толығырақ
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Правая колонка -->
                <div class="bg-white rounded-md overflow-hidden shadow-lg p-4 mx-2 md:mx-0">
                    <p class="mb-2 py-2 border-b">НОВЫЕ ПОСТУПЛЕНИЯ</p>
                    <div class="swiper-container new-books-slider h-[1200px] overflow-hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/1.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/2.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/3.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/4.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-auto cover" src="/img/5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="/js/init-alpine.js"></script>
   <script src="{{ asset("/js/swiper-bundle.min.js") }}"></script>
    @stack('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
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
        })

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
