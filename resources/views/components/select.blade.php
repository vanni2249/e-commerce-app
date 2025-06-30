<select {{ $attributes->merge(['class' => ' border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 border border-gray-300 rounded p-2 placeholder:text-sm']) }}>
    {{ $slot }}
</select>