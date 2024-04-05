<!-- jQuery -->
<script src="{{asset('/assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Bootstrap 4 -->
<!-- DataTables  & Plugins -->
<script src="{{asset('/assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{asset('/assets/admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{asset('/assets/admin/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- Summernote -->
<script src="{{asset('/assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/assets/admin/dist/js/adminlte.min.js') }}"></script>

<!-- Ekko Lightbox -->
<script src="{{asset('assets/admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- Filterizr-->
<script src="{{asset('assets/admin/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('assets/admin/dist/js/demo.js') }}"></script> --}}
<script src="{{ asset('assets/admin/dist/js/custom.js') }}"></script>
<script src="{{ asset('assets/admin/sweetalert/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
  $(function() {
    $('.datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
   // Summernote
   $('.summernote').summernote({
    height:200,
   });
   $(function () {
    // Summernote
    $('#summernote').summernote('color','white')

    // CodeMirror
    // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
    //   mode: "htmlmixed",
    //   theme: "monokai"
    // });
  });

  $("body").on("keyup", "#email_check", function (e) {
        e.preventDefault();
        let email_check = $('#email_check').val();
        $.ajax({
            method: "Post",
            url: 'checkemail',
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
</script>