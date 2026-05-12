@props([
    'route',
    'text'
])

<a href="{{ route($route) }}"
    class="btn btn-primary">

    {{ $text }}

</a>