@extends('admin.layouts.master')
@section('title') @lang('translation.circles') @endsection
@section('css')
<link href="{{ URL::asset('admin/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Circles @endslot
@slot('title') {{ $circle_name }} @endslot
@slot('head_title') {{$circle_name}} @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <!-- <div class="card-header">
                <h5 class="card-title mb-0">Scroll - Horizontal</h5>
            </div> -->
            <div class="card-body">
                <!-- <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%"> -->
                <table id="circleTbl" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <!-- <th scope="col" style="width: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input fs-base" type="checkbox" id="checkAll01" value="option">
                                </div>
                            </th> -->
                            <th>SR No.</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <!-- <th># of Draw Numbers</th> -->
                            <!-- <th>Amount</th>
                            <th>Created By</th>
                            <th>Create Date (YYYY-MM-DD)</th>
                            <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody id="circleBody">
                        @foreach($users as $key=>$user)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="show-numbers" onclick="openModal('{{$user->user->id}}')">
                                    {{$user->user->first_name}} {{$user->user->last_name}}
                                </a>
                            </td>
                            <td>
                                @if($user->verified)
                                <span class="badge bg-success">Verified</span>
                                @else
                                <span class="badge bg-danger">Not Verified</span>
                                @endif
                            </td>
                            <!-- <td>

                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end col-->
</div>

<!-- Default Modals -->
<!-- <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#myModal">Standard Modal</button> -->
<div id="drawNumberModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Draw Numbers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <table class="table table-nowrap">
                    <thead>
                        <th>
                            Sr. No.
                        </th>
                        <th>
                            Draw Number
                        </th>
                    </thead>
                    <tbody id="drawNumberBody"></tbody>
                </table>
                <!-- <h5 class="fs-base">
                    Overflowing text to show scroll behavior
                </h5>
                <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                <p class="text-muted">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought.</p>
                <p class="text-muted">It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary ">Save Changes</button> -->
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

<!-- <script src="{{ URL::asset('admin/js/pages/datatables.init.js') }}"></script> -->

<script src="{{ URL::asset('admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/pages/sweetalerts.init.js') }}"></script>

<script src="{{ URL::asset('admin/js/app.js') }}"></script>
<script>
    // $(document).ready(function() {
    //     // document.addEventListener('DOMContentLoaded', function() {});
    //     let table = new DataTable('#scroll-horizontal', {
    //         "scrollX": true
    //     });
    // });
    // $(document).ready(function() {
    let table = $('#circleTbl').DataTable();
    // });

    function openModal(id) {
        const href = window.location.href;
        const segments = new URL(href).pathname.split('/');
        const last = segments.pop() || segments.pop(); // Handle potential trailing slash
        console.log(last);
        let user_id = id;
        let circle_id = last;

        $.ajax({
            url: "{{url('admin/getDrawNumbers')}}",
            type: "POST",
            data: {
                _token: "{{csrf_token()}}",
                user_id: user_id,
                circle_id: circle_id
            },
            success: function(response) {
                // console.log(response);
                let result = response.result;
                let dataCount = result.length;
                if (dataCount >= 1) {
                    var output = "";
                    $.each(result, function(index, value) {
                        output += "<tr>";
                        output += "<td>";
                        output += index + 1;
                        output += "</td>";
                        output += "<td>"
                        output += value.numbers.join();
                        output += "</td>";
                        output += "</tr>";
                    });
                    $("#drawNumberBody").html(output);
                    // console.log(output);
                    $("#drawNumberModal").modal('show');
                } else {
                    Swal.fire({
                        // title: 'Error',
                        text: "User Didn't Added Any Numbers",
                        icon: 'error',
                        confirmButtonClass: 'btn btn-danger w-xs mt-2',
                        buttonsStyling: false
                    });
                }
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

        // console.log(this.href.substring(this.href.lastIndexOf('/') + 1));
        // let circle_id = 
    }
    //Warning Message
    // if ($(".deleteCircle"))
    //     $(".deleteCircle").click(function() {
    //         // console.log($(this).data('id'));
    //         var circleID = $(this).data('id');
    //         Swal.fire({
    //             title: "Are you sure?",
    //             text: "You won't be able to revert this!",
    //             icon: "warning",
    //             showCancelButton: true,
    //             confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
    //             cancelButtonClass: 'btn btn-danger w-xs mt-2',
    //             confirmButtonText: "Yes, delete it!",
    //             buttonsStyling: false,
    //             showCloseButton: true
    //         }).then(function(result) {
    //             if (result.value) {
    //                 $.ajax({
    //                     url: "{{url('/admin/circles/delete')}}" + "/" + circleID,
    //                     type: "POST",
    //                     data: {
    //                         _token: "{{csrf_token()}}"
    //                     },
    //                     success: function(response) {
    //                         if (response.status == "200") {
    //                             Swal.fire({
    //                                 title: 'Deleted!',
    //                                 text: 'Circle has been deleted.',
    //                                 icon: 'success',
    //                                 confirmButtonClass: 'btn btn-primary w-xs mt-2',
    //                                 buttonsStyling: false
    //                             }).then(function() {
    //                                 window.location.reload();
    //                             });
    //                             // getCircles();
    //                         }
    //                         // if (result.value) {
    //                         // }
    //                     },
    //                     error: function(err) {
    //                         console.log(err);
    //                         let body = err.responseJSON;
    //                         Swal.fire({
    //                             // title: 'Error',
    //                             text: body.message,
    //                             icon: 'error',
    //                             confirmButtonClass: 'btn btn-danger w-xs mt-2',
    //                             buttonsStyling: false
    //                         });
    //                     }

    //                 });
    //             }
    //         });
    //     });
</script>

@endsection