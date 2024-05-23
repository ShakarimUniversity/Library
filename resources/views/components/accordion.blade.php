<div x-data="{ openedIndex: 1 }" class="flex flex-col p-4">
        @foreach($files as $key => $value)
            <div @click="openedIndex == {{$key}} ? openedIndex = -1 : openedIndex = {{$key}}" class="flex items-center justify-between bg-gray-200 border p-4">
                <p>{{ $key.' '.__('site.year') }}</p>
                <span :class="openedIndex == {{$key}} ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
            </div>
            <div x-show.transition.in.duration.800ms="openedIndex == {{$key}}" class="border p-4">
                <ul>
                    @foreach($value as $item)
                        <li class="flex flex-col border-b pb-2">
                            @if(isset($item->url))
                                <a class="underline" href="{{ $item->url }}" target="_blank">{{ $item->name }}</a>
                            @else
                                {{ $item->name }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
</div>
