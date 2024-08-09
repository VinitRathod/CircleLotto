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
                <!-- <div>
                    <button data-bs-target="#addNumbers" data-bs-toggle="modal" class="btn btn-secondary"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Winning Number</button>
                </div> -->
            </div>
            <div class="card-body">

                <table id="winnerTable" class="table align-middle table-nowrap dt-responsive display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <!-- <th>User Name</th> -->
                            <th>Winner</th>
                            <th>Jackpot</th>
                            <th>Created By</th>
                            <th>Reward</th>
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
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    function loadingHTML() {
        $("#confirm-numbers").html('<span class="d-flex align-items-center"> <span class = "spinner-border flex-shrink-0" role = "status" ><span class = "visually-hidden" > Loading... </span> </span> <span class = "flex-grow-1 ms-2" >Loading...</span> </span>')
        $("#confirm-numbers").attr('disabled', 'disabled');
    }

    function getWinners() {
        let lastItem = window.location.href;
        lastItem = lastItem.substring(lastItem.lastIndexOf('/') + 1);
        $.ajax({
            url: "{{url('admin/getWinnersById')}}",
            type: "POST",
            data: {
                _token: "{{csrf_token()}}",
                id: lastItem
            },
            success: function(response) {
                let data = response.result;
                let dataCount = data.length;
                let output = "";
                $.each(data, function(index, value) {
                    total_value = value.circle.draw_numbers.length * value.circle.circle_amount;
                    percentage_value = value.circle.draw_numbers.length * value.circle.circle_amount * 0.1;
                    output += "<tr>";
                    output += "<td>";
                    output += index + 1;
                    output += "</td>"
                    output += "<td>";
                    output += "<a href='{{url('admin/user/')}}/" + value.user.id + "'>" + value.user.first_name + " " + value.user.last_name + "</a>";
                    output += "</td>";
                    output += "<td>";
                    output += (total_value - percentage_value).toFixed(1);
                    output += "</td>";
                    output += "<td>";
                    output += value.circle.user.first_name + " " + value.circle.user.last_name;
                    output += "</td>";
                    output += "<td>";
                    output += percentage_value.toFixed(1);
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
        var numberStr = "";
        $(".checkInput").keyup(function() {
            let number = $(this).val();
            if (isNaN(number)) {
                alert("Please Input Numbers Only");
                $(this).val("");
                // return false;
            }
        });
        getWinners();
        $("#winnerForm").submit(function(e) {
            e.preventDefault();
            var numbers = [];
            // var numbers = $("#number-input").val().split(",");
            for (let i = 1; i <= 7; i++) {
                let digit = $('#digit' + i + '-input').val();
                if (digit == "") {
                    alert("Please Input all the Numbers");
                    return;
                }
                numbers.push(digit);

            }
            // console.log(numbers);
            // return;
            numbersStr = numbers.join();
            $("#addNumbers").modal("hide");
            $("#confirmNumbers").modal("show");
            // return;
            // console.log(numbersStr);
            // return;
        });

        $("#confirmWinnerForm").submit(function(e) {
            e.preventDefault();
            var numbers = [];
            loadingHTML();
            // $("#confirm-numbers").attr('disabled', 'disabled');
            // var numbers = $("#number-input").val().split(",");
            for (let i = 1; i <= 7; i++) {
                let digit = $('#digit1' + i + '-input').val();
                numbers.push(digit);
            }
            console.log(numbersStr);
            console.log(numbers.join());
            if (numbersStr == numbers.join()) {
                $.ajax({
                    url: "{{url('api/v1/winner')}}",
                    type: "POST",
                    data: {
                        // _token: "{{csrf_token()}}",
                        drawNumber: numbers,
                    },
                    success: function(response) {
                        let data = response.result;
                        if (data == undefined) {
                            Swal.fire({
                                // title: 'Error',
                                text: response.message,
                                icon: 'warning',
                                confirmButtonClass: 'btn btn-danger w-xs mt-2',
                                buttonsStyling: false
                            });
                            $("#confirmNumbers").modal("hide");
                            $("#confirm-numbers").html('Confirm Numbers');
                            $("#confirm-numbers").removeAttr('disabled');
                            return false;
                        }
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
                        $("#confirmNumbers").modal("hide");
                        Swal.fire({
                            icon: 'success',
                            title: 'Winners are announced! Please see the table',
                            confirmButtonClass: 'btn btn-primary w-xs',
                            buttonsStyling: false,
                            // html: 'Submitted email: ' + text
                        });
                        $("#confirm-numbers").html('Confirm Numbers');
                        $("#confirm-numbers").removeAttr('disabled');
                        document.getElementById("winnerForm").reset();
                        // $("#winnerForm").reset();
                        document.getElementById("confirmWinnerForm").reset();
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
                        $("#confirm-numbers").html('Confirm Numbers');
                        $("#confirm-numbers").removeAttr('disabled');
                    }
                });
            } else {
                $("#confirmNumbers").modal("hide");
                $("#confirm-numbers").html('Confirm Numbers');
                $("#confirm-numbers").removeAttr('disabled');
                document.getElementById("winnerForm").reset();
                // $("#winnerForm").reset();
                document.getElementById("confirmWinnerForm").reset();
                // $("#confirmWinnerForm").reset();
                Swal.fire({
                    // title: 'Error',
                    text: "Numbers Do not Match! Please Enter the numbers Again",
                    icon: 'error',
                    confirmButtonClass: 'btn btn-danger w-xs mt-2',
                    buttonsStyling: false
                });
            }
        });
    });
</script>
<script src="{{ URL::asset('admin/libs/prismjs/prism.js') }}"></script>
<!-- <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script> -->
<!-- <script src="{{ URL::asset('admin/js/pages/form-validation.init.js') }}"></script> -->
<script src="{{ URL::asset('admin/js/pages/modal.init.js') }}"></script>
<script src="{{ URL::asset('admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/pages/sweetalerts.init.js') }}"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->

<script src="{{ URL::asset('admin/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('admin/js/pages/two-step-verification.init.js') }}"></script>

<script src="{{ URL::asset('admin/js/app.js') }}"></script>
@endsection