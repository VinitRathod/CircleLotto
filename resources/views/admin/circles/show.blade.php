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
                                {{$user->user->first_name}} {{$user->user->last_name}}
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