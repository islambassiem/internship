@props(['href', 'text'])
<div class="text-gray-500  px-5 text-sm mt-3">
    {{ $slot }}
    <a href="{{ $href }}" class="text-blue-700 underline">{{ $text }}</a>
</div>
