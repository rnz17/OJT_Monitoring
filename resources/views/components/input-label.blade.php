@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#5C3C3C] dark:text-[#5C3C3C]']) }}>
    {{ $value ?? $slot }}
</label>
