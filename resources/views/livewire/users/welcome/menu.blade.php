<div>
    <div class="flex items-center space-x-2">
        <button class="bg-white hidden lg:block hover:bg-blue-100 text-blue-500 flex-auto p-2 rounded-full text-sm mr-2 whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <ul class="flex flex-row justify-evenly flex-nowrap overflow-x-auto no-scrollbar">
            @foreach ($categories as $category)
            <li class="py-2">
                <a href="#"
                    class="bg-white hover:bg-blue-100 text-blue-800 flex-auto px-4 py-2 rounded-lg text-sm mr-2 whitespace-nowrap">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>
        <button class="bg-white hidden lg:block hover:bg-blue-100 text-blue-500 flex-auto p-2 rounded-full text-sm whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </button>

    </div>
</div>
