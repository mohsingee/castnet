<!-- Script to Load Modal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
    myModal.show();
});
</script>

<!-- Footer End -->
<script src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/web/js/swiper-bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/web/js/main.js') }}"></script>
<script src="{{ asset('assets/admin/sweetalert/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("body").on("keyup", "#email_check", function (e) {
        e.preventDefault();
        let email_check = $('#email_check').val();
        $.ajax({
            method: "Post",
            url: 'check-email',
            dataType: 'html',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'email_check': email_check,
            },
            success: function (response) {
                if (response == "false") {
                    $("#email_valid").val('not valid');
                    $("#email_message").html(
                        "<font color=red>The email has already been taken.</font>");
                } else if (response == "true") {
                    $("#email_message").html('');
                    $("#email_valid").val('valid');
                }
            }
        });
    });

    $("body").on("submit", "#newsletter", function (e) {
        e.preventDefault();
        let email = $('#email').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "{{ route('subscribe.newsletter') }}",
            data: {
                'email': email,
            },
            dataType: "json",
            beforeSend: function () {
                $('#overlay').show();
            },
            success: function (response) {
                $('#newsletter')[0].reset();
                $('#overlay').hide();
                if(response.status==true){
                    Swal.fire({
                        title: "Congratulations!",
                        text: response.message,
                        icon: "success"
                    });
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                    });
                }
            },
        });
    });
</script>


