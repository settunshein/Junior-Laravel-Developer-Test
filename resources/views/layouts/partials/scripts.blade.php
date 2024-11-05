<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Sweetalert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        })/* AJAX Setup */
    });

    @if(session('success'))
        Swal.fire({
            title: 'SUCCESS',
            text : "{!! session('success') !!}",
            icon : 'success',
        });
    @endif

    @if(session('error'))
        Swal.fire({
            title: 'ERROR',
            text : "{{ session('error') }}",
            icon : 'error',
        });
    @endif
</script>

@yield('js')
