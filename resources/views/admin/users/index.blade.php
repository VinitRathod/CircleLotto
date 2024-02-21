@extends('admin.layouts.master')
@section('title')
Users
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
Users
@endslot
@slot('head_title')
Users View
@endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <!-- <div class="card-header d-flex align-items-center">
                <h5 class="card-title mb-0 flex-grow-1">Winners<span class="badge bg-primary ms-1 align-baseline" id="winnerCount">0</span></h5>
                <div>
                    <button data-bs-target="#addNumbers" data-bs-toggle="modal" class="btn btn-secondary"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Winning Number</button>
                </div>
            </div> -->
            <div class="card-body">

                <table id="userTable" class="table align-middle table-nowrap dt-responsive display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            <!-- <th>User Winning Number</th> -->
                            <!-- <th>Status of the win (Partially/Fully)</th> -->
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody id="userBody">

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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- deleteRecordModal -->
<div id="deleteRecordModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-md-5">
                <div class="text-center">
                    <div class="text-danger">
                        <i class="bi bi-trash display-5"></i>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-2">Are you sure ?</h4>
                        <p class="text-muted mx-3 mb-0">Are you sure you want to remove this record ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                    <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete It!</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /deleteRecordModal -->



@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
<script>
    function getUsers() {
        $.ajax({
            url: "{{url('admin/getUsers')}}",
            type: "GET",
            success: function(response) {
                // console.log(response);
                // return;
                let data = response.result;
                let dataCount = data.length;
                let output = "";
                $.each(data, function(index, value) {
                    output += "<tr>";
                    output += "<td>";
                    output += "<a href='{{url('admin/user/')}}/" + value.id + "'>#" + (index + 1) + "</a>";
                    output += "</td>"
                    output += "<td>";
                    output += value.first_name + " " + value.last_name;
                    output += "</td>";
                    output += "<td>";
                    output += value.email;
                    output += "</td>";
                    output += '<td>';
                    output += '<ul class="d-flex gap-2 list-unstyled mb-0">';
                    output += '<li>'
                    output += '<a href="{{url("admin/user/")}}/' + value.id + '" class="btn btn-subtle-primary btn-icon btn-sm"><i class="ph-eye"></i></a>';
                    output += '</li>'
                    output += '<li>';
                    output += '<a href="#addInstructor" data-bs-toggle="modal" class="btn btn-subtle-secondary btn-icon btn-sm edit-item-btn"><i class="ph-pencil"></i></a>';
                    output += '</li>';
                    output += '<li>';
                    output += '<a href="#deleteRecordModal" data-bs-toggle="modal" data-user-id="' + value.id + '" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn" onclick="deleteUser(' + value.id + ')"><i class="ph-trash"></i></a>';
                    output += '</li>';
                    output += '</ul>';
                    output += '</td>';
                    output += "</tr>";
                });
                $("#userBody").html(output);
                // $("#userCount").html(dataCount);
                $("#userTable").DataTable();
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
    }


    // var removeBtns = document.getElementsByClassName("remove-item-btn");
    // if (removeBtns) {
    //     Array.from(removeBtns).forEach(function(btn) {
    //         btn.addEventListener("click", function(e) {
    //             e.target.closest("tr").children[0].innerText;
    //             itemId = e.target.closest("tr").children[0].innerText;
    //             var itemValues = [itemId];
    //             // console.log(itemValues);
    //             // console.log(Array.from(itemValues));
    //             // Array.from(itemValues).forEach(function(x) {
    //             itemValues.forEach(function(x) {
    //                 // console.log(x._values + "x");
    //                 var deleteid = new DOMParser().parseFromString(x._values, "text/html");
    //                 // console.log(deleteid);
    //                 var isElem = deleteid.body.firstElementChild;
    //                 var isdeleteid = deleteid.body.firstElementChild.innerHTML;
    //                 // console.log(isdeleteid);

    //                 if (isdeleteid == itemId) {
    //                     document.getElementById("delete-record").addEventListener("click", function() {
    //                         // instructorList.remove("instructor_id", isElem.outerHTML);
    //                         document.getElementById("deleteRecord-close").click();
    //                     });
    //                 }
    //             });
    //         });
    //     });
    // }
    function deleteUser(id) {
        let user_id = id;
        $("#delete-record").click(function() {
            console.log("Delete Record Btn Clicked");
            $.ajax({
                url: "{{url('admin/delete/user')}}",
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    user_id: user_id
                },
                success: function(response) {
                    $("#deleteRecord-close").click();
                    getUsers();
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
    }

    $(document).ready(function() {
        // $("#userTable").DataTable();
        getUsers();
    });
</script>
@endsection