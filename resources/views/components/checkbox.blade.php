@props(['name' => null, 'value' => null, 'checked' => false])
<input type="checkbox" 
{{ $attributes->merge(['class' => 'rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500']) }} 
{{ $attributes->except('class') }} 
{{ $attributes->get('checked') ? 'checked' : '' }}
>