<x-app-layout :meta-title="$announcement->title" meta-description="">

    <div class="bg-white mx-2 p-4 rounded-md shadow-lg mb-2 ">
        <div class="flex items-center flex-wrap">
            <ul class="flex items-center">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-600 hover:text-blue-500">
                        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                    </a>

                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('announcements') }}" class="text-gray-600 hover:text-blue-500">
                        {{ __('interface.announcements') }}
                    </a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="#" class="text-strong-blue">
                        {{ $announcement->title }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-white mx-2 p-4 rounded-md shadow-lg">
        <img class="w-full" src="{{ $announcement->getThumbnail() }}" alt="image">
        <h1 class="text-xl text-strong-blue font-semibold border-b my-4 pb-2">{{ $announcement->title }}</h1>
        <div class="tiptap-content">
            {!! $announcement->content !!}
        </div>
    </div>

</x-app-layout>
