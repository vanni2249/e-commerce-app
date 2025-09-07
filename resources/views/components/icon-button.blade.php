@props(['type' => 'button', 'variant' => 'light', 'icon' => 'edit', 'size' => 'md'])

@php
    $variant = match ($variant) {
        'primary' => 'bg-blue-200 hover:bg-blue-300',
        'primary-outline' => 'bg-white border border-blue-300 text-blue-600 hover:bg-blue-50',
        'secondary' => 'bg-gray-200 hover:bg-gray-300',
        'secondary-outline' => 'bg-white border border-gray-300 text-gray-600 hover:bg-gray-50',
        'warning' => 'bg-yellow-200 hover:bg-yellow-300',
        'warning-outline' => 'bg-white border border-yellow-300 text-yellow-600 hover:bg-yellow-50',
        'success' => 'bg-green-200 hover:bg-green-300',
        'success-outline' => 'bg-white border border-green-300 text-green-600 hover:bg-green-50',
        'danger' => 'bg-red-200 hover:bg-red-300',
        'danger-outline' => 'bg-white border border-red-300 text-red-600 hover:bg-red-50',
        'light' => 'bg-gray-200 hover:bg-gray-300 text-blue-600',
        'light-outline' => 'bg-white border border-gray-300 text-gray-600 hover:bg-gray-50',
        'dark' => 'bg-gray-800 hover:bg-gray-900 text-white',
        'dark-outline' => 'bg-white border border-gray-800 text-gray-800 hover:bg-gray-50',
        'info' => 'bg-blue-50 hover:bg-blue-100',
        'info-outline' => 'bg-white border border-blue-300 text-blue-600 hover:bg-blue-50',
        default => 'bg-gray-200 hover:bg-gray-300',
    };

    $size = match ($size) {
        'sm' => 'p-0.5 text-xs',
        'md' => 'p-1.5 text-base',
        'lg' => 'p-2 text-md',
        default => 'p-1',
    }
@endphp



<button type="{{ $type }}" {{ $attributes->merge(['class' => $variant . ' ' . $size . ' rounded-full cursor-pointer']) }}>

    @switch($icon)
        @case('minus')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-minus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
            </svg>
        @break

        @case('plus')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
        @break

        @case('edit')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                <path d="M13.5 6.5l4 4" />
            </svg>
        @break

        @case('delete')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        @break

        @case('eye')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
            </svg>
        @break
        
        @case('ellipsis-vertical')
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
            </svg>
        @break

        @default
    @endswitch

</button>
