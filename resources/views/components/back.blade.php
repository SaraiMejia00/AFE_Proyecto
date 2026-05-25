@props([
    'route'
])

<a href="{{ $route ? route($route) : url()->previous() }}">
 <i class="bi bi-arrow-left-circle-fill fs-1"
   style="line-height: 1;"></i>
</a>