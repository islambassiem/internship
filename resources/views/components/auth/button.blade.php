@props(['title'])
<button
    {{ $attributes->merge(['class' => "bg-green-700 py-2 px-4 rounded-3xl w-80 text-white hover:bg-green-600"]) }}
    type="submit">{{ $title }}</button>
