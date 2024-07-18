@props(['type', 'placeholder', 'value' => '', 'name'])
<div {{ $attributes->merge(['class' => "flex flex-col pt-5 px-5"]) }}>
    <label class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            {{ $slot }}
        </span>
        <input type="{{ $type }}"
            value="{{ $value }}"
            name="{{ $name }}"
            class="border border-slate-300 w-full py-2 pl-9 focus:outline-none focus:border-sky-500 rounded-lg"
            placeholder="{{ $placeholder }}">
    </label>
</div>
