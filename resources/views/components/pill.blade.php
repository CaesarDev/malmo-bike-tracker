@props([
    'color' => 'green',
])

@php
    /*
     * Print possible colors for the pill in order to help Tailwind
     * bg-green-200 text-green-700
     * bg-red-200 text-red-700
     * bg-blue-200 text-blue-700
    */
    $bgColor = 'bg-' . $color . '-200';
    $textColor = 'text-' . $color . '-700';
@endphp


<span class="inline-block rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2 {{ $bgColor }} {{ $textColor }}">
    {{ $slot }}
</span>
