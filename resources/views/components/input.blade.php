@props([
    'name',
    'type' => 'text',
    'placeholder' => ''
])
<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ old($name) }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')
    ]) }}
>
