@props(['page'])
@if($page->parent)
    <x-breadcrumbs-item :page="$page->parent"/>
@endif
<li class="inline-flex items-center">
    <a href="{{ route('page',$page->slug) }}" class="text-gray-600 hover:text-blue-500">
        {{ $page->title_kz }}
    </a>
    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
</li>

