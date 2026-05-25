@props([
    'editRoute',
    'deleteRoute'
])

<a href="{{ $editRoute }}"
   class="btn btn-warning btn-sm">

    <i class="fa-solid fa-pen-to-square text-white"></i>

</a>

<form action="{{ $deleteRoute }}"
      method="POST"
      class="delete-form">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger btn-sm">

        <i class="fa-solid fa-trash text-white"></i>

    </button>

</form>