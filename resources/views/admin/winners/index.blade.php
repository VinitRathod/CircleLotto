@extends('admin.layouts.master')
@section('title')
Winners
@endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1')
Winners
@endslot
@slot('head_title')
Winners View
@endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title mb-0 flex-grow-1">Winners<span class="badge bg-primary ms-1 align-baseline" id="winnerCount">0</span></h5>
                <div>
                    <button data-bs-target="#addNumbers" data-bs-toggle="modal" class="btn btn-secondary"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Winning Number</button>
                    <!-- <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#myModal">Standard Modal</button> -->
                </div>
            </div>
            <div class="card-body">

                <table id="winnerTable" class="table align-middle table-nowrap dt-responsive display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Circle Name</th>
                            <th>User Winning Number</th>
                            <th>Status of the win (Partially/Fully)</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody id="winnerBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end col-->
</div>

<!-- Default Modals -->
<div id="addNumbers" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNumbersModalLabel">Add Numbers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-addNumbersModal"></button>
            </div>
            <form class="numbers-form needs-validation" id="winnerForm" novalidate autocomplete="off" method="POST">
                <div class="modal-body">
                    <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                    <input type="hidden" id="id-field">
                    <input type="hidden" id="rating-field">

                    <div class="row">


                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="instructor-name-input" class="form-label">Winning Numbers<span class="text-danger">*</span></label>
                                <!-- <input type="text" pattern="/^(\d+((,\d+){1,6})+)/" name="numbers" id="number-input" class="form-control" placeholder="Enter Winning Numbers, separated by ','. Ex:- 23,45,12,34,1,2,12" required> -->
                                <input type="text" name="numbers" id="number-input" class="form-control" placeholder="Enter Winning Numbers, separated by ','. Ex:- 23,45,12,34,1,2,12" required>
                                <div class="valid-feedback">
                                    Looks Good!
                                </div>
                                <div class="invalid-feedback">
                                    Please Enter Winning Numbers
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                        <button type="submit" class="btn btn-primary" id="add-numbers">Add Numbers</button>
                    </div>
                </div>
            </form>
            <!-- <div class="modal-body">
                <h5 class="fs-base">
                    Overflowing text to show scroll behavior
                </h5>
                <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                <p class="text-muted">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought.</p>
                <p class="text-muted">It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary ">Save Changes</button>
            </div> -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // var element = document.getElementById('number-input');
            // console.log(element);

            // return;
            // Loop over them and prevent submission
            if (forms)
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        // console.log(element.validity);
                        // element.setCustomValidity("Please Enter Numbers properly");
                        // element.setCustomValidity("Please Enter Numbers properly");
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            // element.reportValidity();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
        }, false);
    })();
</script>

<script>
    function getWinners() {
        $.ajax({
            url: "{{url('admin/getWinners')}}",
            type: "GET",
            success: function(response) {
                let data = response.result;
                let dataCount = data.length;
                let output = "";
                $.each(data, function(index, value) {
                    output += "<tr>";
                    output += "<td>";
                    output += index + 1;
                    output += "</td>"
                    output += "<td>";
                    output += "<a href='{{url('admin/user/')}}/" + value.user.id + "'>" + value.user.first_name + " " + value.user.last_name + "</a>";
                    output += "</td>";
                    output += "<td>";
                    output += "<a href='{{url('admin/circles/')}}/" + value.circle.id + "'>" + value.circle.circle_name;
                    output += "</td>";
                    output += "<td>";
                    output += value.user_number;
                    output += "</td>";
                    output += "<td>";
                    output += value.status;
                    output += "</td>";
                    output += "</tr>"
                });
                $("#winnerBody").html(output);
                $("#winnerCount").html(dataCount);
                $("#winnerTable").DataTable();
            },
            error: function(err) {
                console.log(err);
                let body = err.responseJSON;
                Swal.fire({
                    // title: 'Error',
                    text: body.message,
                    icon: 'error',
                    confirmButtonClass: 'btn btn-danger w-xs mt-2',
                    buttonsStyling: false
                });
            }
        })
    }
    $(document).ready(function() {
        getWinners();
        $("#winnerForm").submit(function(e) {
            e.preventDefault();
            var numbers = $("#number-input").val().split(",");
            $.ajax({
                url: "{{url('api/v1/winner')}}",
                type: "POST",
                data: {
                    // _token: "{{csrf_token()}}",
                    drawNumber: numbers,
                },
                success: function(response) {
                    let data = response.result;
                    let dataCount = data.length;
                    let output = "";
                    $.each(data, function(index, value) {
                        output += "<tr>";
                        output += "<td>";
                        output += index + 1;
                        output += "</td>"
                        output += "<td>";
                        output += value.user.first_name + " " + value.user.last_name;
                        output += "</td>";
                        output += "<td>";
                        output += value.circle.circle_name;
                        output += "</td>";
                        output += "<td>";
                        output += value.user_number;
                        output += "</td>";
                        output += "<td>";
                        output += value.status;
                        output += "</td>";
                        output += "</tr>"
                    });
                    $("#winnerBody").html(output);
                    $("#winnerCount").html(dataCount);
                    $("#winnerTable").DataTable();

                },
                error: function(err) {
                    console.log(err);
                    let body = err.responseJSON;
                    Swal.fire({
                        // title: 'Error',
                        text: body.message,
                        icon: 'error',
                        confirmButtonClass: 'btn btn-danger w-xs mt-2',
                        buttonsStyling: false
                    });
                }
            });
        });
    });
</script>
<script src="{{ URL::asset('admin/libs/prismjs/prism.js') }}"></script>
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<script src="{{ URL::asset('admin/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('admin/js/pages/modal.init.js') }}"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('admin/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('admin/js/app.js') }}"></script>
@endsection