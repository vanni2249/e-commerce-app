@props(['name', 'title', 'show' => false, 'size' => '2xl'])

@php
    $maxWidthClass = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$size];
@endphp

<div x-data="{ show: @entangle($attributes->wire('model')).defer }" x-init="show = {{ $show ? 'true' : 'false' }}"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null" x-show="show" x-cloak
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50">
    <!-- Fondo oscuro con opacidad (detrás del modal) -->
    <div x-show="show" class="fixed inset-0 bg-gray-500 opacity-75 -z-10" x-on:click="show = false"></div>

    <!-- Modal principal (en frente del fondo) -->
    <div x-show="show"
        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidthClass }} sm:mx-auto z-50"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        <header class="flex justify-between items-center p-4 border-b border-gray-200">
            <h2 class="text-md font-medium text-gray-900">{{ $title }}</h2>
            <button x-on:click="$dispatch('close-modal', '{{ $name }}')" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg p-1 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path
                        d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                </svg>
            </button>
        </header>

        <div class="p-4">
            {{ $slot }}
        </div>
    </div>
</div>
