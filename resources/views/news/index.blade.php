<x-app-layout :meta-title="__('interface.library').' | '.__('interface.news')" meta-description="">

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
                    <a href="#" class="text-strong-blue">
                        {{ __('interface.news') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-white mx-2 p-4 rounded-md shadow-lg">
        @forelse($posts as $post)
        <div class="flex space-x-4 border-b mb-4 pb-4">
            <img src="{{ $post->getThumbnail() }}" class="w-60 object-cover" alt="{{ $post->title }}">
            <div>
                <h1 class="font-semibold text-strong-blue text-lg pb-2">{{ $post->title }}</h1>
                <p>{!! $post->shortBody() !!}</p>
                <div>
                    <a class="inline-block w-full text-right text-gray-600 underline my-4" href="{{ route('news.show',$post) }}">{{ __('interface.more') }}</a>
                </div>
            </div>
        </div>
        @empty
           <p>Жаңалықтар табылмады ...</p>
        @endforelse
    </div>
<div>
{{$posts->links()}}
</div>

</x-app-layout>
