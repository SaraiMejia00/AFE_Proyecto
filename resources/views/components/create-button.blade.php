@props([
    'route',
    'text'
])

<a href="{{ route($route) }}"
    class="btn btn-primary">
<i class="fa-solid fa-plus text-white me-1"></i>
    {{ $text }}

</a>