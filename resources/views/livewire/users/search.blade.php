<div>
    <form wire:submit.prevent="send">

        <div class="flex items-center space-x-1">
            <div class="relative grow">
                <input type="text" wire:model='search' @class([
                    'w-full p-1 border border-gray-300 rounded-lg',
                    'border-red-400' => $errors->has('search'),
                ]) placeholder="Search..." />
                <div @class([
                    'absolute bg-white p-4 font-bold rounded-xl w-full shadow',
                    'hidden' => $hiddenBoxMore,
                    'block' => $showBoxMore,
                ])>ssss</div>
            </div>
            <button type="submit" class="bg-blue-50 hover:bg-blue-100 cursor-pointer text-white p-1 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 text-blue-800">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </div>
    </form>
</div>
