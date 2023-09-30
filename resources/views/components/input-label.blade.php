@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-ugreen-800 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
