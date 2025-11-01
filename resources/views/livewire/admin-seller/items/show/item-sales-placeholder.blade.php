<div class="bg-white rounded-lg shadow p-6">
    <div class="animate-pulse">
        <!-- Header skeleton -->
        <div class="flex items-center justify-between mb-4">
            <div class="h-6 bg-gray-200 rounded w-32"></div>
            <div class="h-4 bg-gray-200 rounded w-20"></div>
        </div>
        
        <!-- Table skeleton -->
        <div class="space-y-3">
            <!-- Table header -->
            <div class="grid grid-cols-5 gap-4 pb-2 border-b border-gray-100">
                <div class="h-4 bg-gray-200 rounded w-16"></div>
                <div class="h-4 bg-gray-200 rounded w-20"></div>
                <div class="h-4 bg-gray-200 rounded w-18"></div>
                <div class="h-4 bg-gray-200 rounded w-16"></div>
                <div class="h-4 bg-gray-200 rounded w-14"></div>
            </div>
            
            <!-- Table rows -->
            @for ($i = 0; $i < 5; $i++)
                <div class="grid grid-cols-5 gap-4 py-3 border-b border-gray-100">
                    <div class="h-4 bg-gray-200 rounded w-24"></div>
                    <div class="h-4 bg-gray-200 rounded w-32"></div>
                    <div class="h-4 bg-gray-200 rounded w-12"></div>
                    <div class="h-4 bg-gray-200 rounded w-20"></div>
                    <div class="h-4 bg-gray-200 rounded w-16"></div>
                </div>
            @endfor
        </div>
        
        <!-- Loading message -->
        {{-- <div class="text-center mt-6">
            <div class="inline-flex items-center text-gray-500">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Loading sales data...
            </div>
        </div> --}}
    </div>
</div>