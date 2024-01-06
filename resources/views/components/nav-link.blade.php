@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center border-b-2 dark:border-indigo-600'
            : 'inline-flex items-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
