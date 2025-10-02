@props(['type' => 'submit', 'variant' => 'primary', 'size' => 'md', 'label' => null, 'value' => null])

@php
    switch ($variant) {
        case 'primary':
            $classes =
                ' bg-blue-500 border border-transparent text-white hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900';
            break;

        case 'primary-outline':
            $classes =
                ' bg-transparent border border-blue-700 text-blue-500 hover:bg-blue-700 hover:text-white focus:bg-blue-700 active:bg-gray-900';
            break;

        case 'secondary':
            $classes =
                ' bg-gray-600 border border-transparent text-white hover:bg-gray-800 focus:bg-gray-600 active:bg-gray-700';
            break;

        case 'secondary-outline':
            $classes =
                ' bg-transparent border border-gray-500 text-gray-500 hover:bg-gray-600 focus:bg-gray-600 active:bg-gray-700';
            break;

        case 'success':
            $classes =
                ' bg-green-500 border border-transparent text-white hover:bg-green-600 focus:bg-green-600 active:bg-green-700';
            break;

        case 'success-outline':
            $classes =
                ' bg-transparent border border-green-500 text-green-500 hover:bg-green-500 hover:text-white focus:bg-green-600 active:bg-green-700';
            break;

        case 'danger':
            $classes =
                ' bg-red-500 border border-transparent text-white hover:bg-red-600 focus:bg-red-600 active:bg-red-700';
            break;

        case 'danger-outline':
            $classes =
                ' bg-transparent border border-red-500 text-red-500 hover:bg-red-500 hover:text-white focus:bg-red-600 active:bg-red-700';
            break;

        case 'warning':
            $classes =
                ' bg-yellow-400 border border-transparent text-black hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-600';
            break;

        case 'warning-outline':
            $classes =
                ' bg-transparent border border-yellow-400 text-yellow-500 hover:bg-yellow-500 hover:text-white focus:bg-yellow-500 active:bg-yellow-600';
            break;

        case 'info':
            $classes =
                ' bg-blue-500 border border-transparent text-white hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-700';
            break;

        case 'info-outline':
            $classes =
                ' bg-transparent border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white focus:bg-blue-600 active:bg-blue-700';
            break;

        case 'light':
            $classes =
                ' bg-gray-200 border border-gray-50 text-gray-500 hover:bg-gray-200 hover:border-gray-200 focus:bg-gray-200 active:bg-gray-200';
            break;

        case 'light-outline':
            $classes =
                ' bg-transparent border border-gray-300 text-gray-500 hover:bg-gray-300 hover:text-gray-600 focus:bg-gray-300 active:bg-gray-200';
            break;

        case 'dark':
            $classes =
                ' bg-gray-800 border border-transparent text-white hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900';
            break;

        case 'dark-outline':
            $classes =
                ' border border-gray-800 text-gray-900 hover:text-white hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900';
            break;

        default:
            # code...
            break;
    }

    switch ($size) {
        case 'sm':
            $classes .= ' px-2 py-1 text-xs rounded-md font-semibold uppercase tracking-wider ';
            break;
        case 'md':
            $classes .= ' px-4 py-2 text-xs rounded-md font-semibold uppercase tracking-wider ';
            break;
        case 'lg':
            $classes .= ' px-6 py-3 text-base rounded-md font-semibold uppercase tracking-widest ';
            break;
        case 'xl':
            $classes .= ' px-8 py-4 text-xl rounded-md font-semibold uppercase tracking-widest ';
            break;

        default:
            # code...
        break;
    }
@endphp

<button 
    {{ $attributes->merge(['type' => 'submit', 'class' => $classes . ' text-center focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150  cursor-pointer']) }}>
    {{ $slot }}
    {{ $label ?? '' }}
    {{ $value ?? '' }}
</button>
