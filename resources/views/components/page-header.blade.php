@props([
    'title'
])

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>{{ $title }}</h1>

    {{ $slot }}

</div>