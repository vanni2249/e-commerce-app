<button  {{ $attributes->merge(['class' => 'block w-full text-left cursor-pointer px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</button>