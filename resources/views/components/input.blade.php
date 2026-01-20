@props([
    'name',
    'type' => 'text',
    'placeholder' => '',
    'value' => null,
])
<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')
    ]) }}
>
