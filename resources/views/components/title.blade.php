@props(['href' => '', 'title' => null])

{{-- @php
    $href = $href ?? '#';
@endphp --}}
<div class="flex items-center">
    @if (!empty($href))
        
    <div class=" flex items-center">
        <a href="{{ $href }}" class="bg-gray-300 hover:bg-gray-400 rounded-full p-2 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                d="M17 10a.75.75 0 0 1-.75.75H5.612l4.158 3.96a.75.75 0 1 1-1.04 1.08l-5.5-5.25a.75.75 0 0 1 0-1.08l5.5-5.25a.75.75 0 1 1 1.04 1.08L5.612 9.25H16.25A.75.75 0 0 1 17 10Z"
                clip-rule="evenodd" />
            </svg>
            
        </a>
    </div>
    @endif
    <h1 class="text-2xl font-bold">
        {{ $title }}
    </h1>
</div>