@props(['disabled' => false , 'cols' => 5, 'rows' => 2])
<textarea @disabled($disabled) cols="{{ $cols }}" rows="{{ $rows }}"
{{ $attributes->merge(['class' => ' border-gray-100 focus:border-indigo-500 focus:ring-indigo-500 border border-gray-300 rounded p-1 placeholder:text-sm']) }}></textarea>