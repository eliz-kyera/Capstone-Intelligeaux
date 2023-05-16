@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#9b0000] focus:ring-[#9b0000] rounded-md shadow-sm']) !!}>
