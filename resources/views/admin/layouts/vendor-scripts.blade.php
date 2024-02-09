<!-- JAVASCRIPT -->
<script src="{{ URL::asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins.js') }}"></script>
<!-- <script src="{{ URL::asset('admin/libs/prismjs/prism.js') }}"></script>
<script src="{{ URL::asset('admin/js/pages/notifications.init.js') }}"></script> -->


@yield('script')

<!-- <script src="{{ URL::asset('admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/pages/sweetalerts.init.js') }}"></script> -->
<!-- <script src="{{ URL::asset('admin/js/app.js') }}"></script> -->
@error('pageError')
<script>
    // var timerInterval;
    // Swal.fire({
    //     position: 'top-end',
    //     // title: 'Auto close alert!',
    //     html: '{{$message}}',
    //     timer: 2000,
    //     timerProgressBar: true,
    //     // showCloseButton: true,
    //     didOpen: function() {
    //         Swal.showLoading()
    //         // timerInterval = setInterval(function() {
    //         //     var content = Swal.getHtmlContainer()
    //         //     if (content) {
    //         //         var b = content.querySelector('b')
    //         //         if (b) {
    //         //             b.textContent = Swal.getTimerLeft()
    //         //         }
    //         //     }
    //         // }, 100)
    //     },
    // });
    // Swal.fire({
    //     position: 'top-end',
    //     // icon: 'success',
    //     title: '{{$message}}',
    //     showConfirmButton: false,
    //     timer: 1500,
    //     showCloseButton: true
    // })
    document.getElementById("pageErrorBtn").click();
    // $(document).ready(function() {
    //     $("#pageErrorBtn").click();
    // });
</script>
@enderror