@props(['disabled' => false, 'type' => 'text'])

<input @disabled($disabled) {{ $attributes->merge(['type' => $type, 'class' => ' border-gray-100 focus:border-indigo-500 focus:ring-indigo-500 border border-gray-300 rounded p-2 placeholder:text-sm']) }}>
