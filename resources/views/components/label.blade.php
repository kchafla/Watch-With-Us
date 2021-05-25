@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-light']) }}>
    {{ $value ?? $slot }}
</label>
