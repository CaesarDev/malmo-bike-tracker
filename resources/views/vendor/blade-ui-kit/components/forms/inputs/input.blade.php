<input
    name="{{ $name }}"
    type="{{ $type }}"
    id="{{ $id }}"
    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
    @if($value)value="{{ $value }}"@endif
    {{ $attributes }}
/>
