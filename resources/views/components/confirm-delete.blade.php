@props([
    'message' => '¿Deseas continuar?'
])

<script>

    document.addEventListener('DOMContentLoaded', function () {

        // Buscar formularios delete
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {

            form.addEventListener('submit', function (e) {

                e.preventDefault();

                Swal.fire({
                    title: 'Confirmación',
                    text: '{{ $message }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, continuar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {

                    if (result.isConfirmed) {

                        form.submit();
                    }
                });
            });
        });
    });

</script>