@extends('admin.layouts.master')
@section('title')
{{$user->first_name}} {{$user->last_name}}
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
@slot('li_1') Users @endslot
@slot('title') {{$user->first_name}} {{$user->last_name}} @endslot
@slot('head_title')
{{$user->first_name}} {{$user->last_name}}
@endslot
@endcomponent

<div class="row">
    <!--end col-->
    <!-- <div class="col-xxl-3">
        <div class="card overflow-hidden">
            <div>
                <img src="{{ URL::asset('build/images/small/img-7.jpg') }}" alt="" class="card-img-top profile-wid-img object-fit-cover" style="height: 200px;">
                <div>
                    <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input d-none">
                    <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light btn-sm position-absolute end-0 top-0 m-3">
                        <i class="ri-image-edit-line align-bottom me-1"></i> Edit Cover Images
                    </label>
                </div>
            </div>
            <div class="card-body pt-0 mt-n5">
                <div class="text-center">
                    <div class="profile-user position-relative d-inline-block mx-auto">
                        <img src="{{ URL::asset('build/images/users/avatar-1.jpg') }}" alt="" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                            <input id="profile-img-file-input" type="file" class="profile-img-file-input d-none">
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="bi bi-camera"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5>Richard Marshall <i class="bi bi-patch-check-fill align-baseline text-info ms-1"></i></h5>
                        <p class="text-muted">Web Developer</p>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="d-flex align-items-center mb-4 pb-2">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Complete Your Profile</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="badge bg-light text-secondary"><i class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                    </div>
                </div>
                <div class="progress animated-progress custom-progress progress-label">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                        <div class="label">30%</div>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Portfolio</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="badge bg-info-subtle text-info fs-12"><i class="ri-add-fill align-bottom me-1"></i> Add</a>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle bg-dark-subtle text-dark">
                            <i class="bi bi-github"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" id="gitUsername" placeholder="Username" value="@richardmarshall">
                </div>
                <div class="mb-3 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                            <i class="bi bi-facebook"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="websiteInput" placeholder="www.example.com" value="www.steex.com">
                </div>
                <div class="mb-3 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle bg-success-subtle text-success">
                            <i class="bi bi-dribbble"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="dribbleName" placeholder="Username" value="@richard_marshall">
                </div>
                <div class="d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle bg-danger-subtle text-danger">
                            <i class="bi bi-instagram"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="pinterestName" placeholder="Username" value="Richard Marshall">
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-xxl-12">
        <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
            <ul class="nav nav-pills arrow-navtabs nav-secondary gap-2 flex-grow-1 order-2 order-lg-1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                        Personal Details
                    </a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab" aria-selected="false" tabindex="-1">
                        Changes Password
                    </a>
                </li> -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#circles" role="tab" aria-selected="false" tabindex="-1">
                        Circles
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#winners" role="tab" aria-selected="false" tabindex="-1">
                        Winners
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#notifications" role="tab" aria-selected="false" tabindex="-1">
                        Notifications
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                        Messages
                    </a>
                </li>
            </ul>
            <!-- <div class="flex-shrink-0 ms-auto order-1 order-lg-2">
                <a href="pages-profile-settings" class="btn btn-secondary"><i class="bi bi-pencil-square align-baseline me-1"></i> Edit Profile</a>
            </div> -->
        </div>
        <div class="card">
            <div class="tab-content">

                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Personal Details</h6>
                    </div>
                    <div class="card-body">
                        <form action="javascript:void(0);">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">First Name</label>
                                        <input type="text" class="form-control" disabled id="firstnameInput" placeholder="Enter your firstname" value="{{$user->first_name}}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastnameInput" placeholder="Enter your last name" value="{{$user->last_name}}" disabled>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="usernameInput" placeholder="Enter your last name" value="{{$user->username}}" disabled>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phonenumberInput" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phonenumberInput" placeholder="Enter your phone number" value="{{$user->user_details->phone}}" disabled>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="emailInput" placeholder="Enter your email" value="{{$user->email}}" disabled>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="birthDateInput" class="form-label">Birth of Date</label>
                                        <input type="text" class="form-control" data-provider="flatpickr" id="birthDateInput" data-date-format="d M, Y" data-default-date="24 June, 1998" value="{{date('d/m/Y',strtotime($user->user_details->dob))}}" disabled placeholder="Select date">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="JoiningdatInput" class="form-label">Joining Date</label>
                                        <input type="text" class="form-control" data-provider="flatpickr" id="JoiningdatInput" data-date-format="d M, Y" data-default-date="30 Oct, 2023" disabled value="{{date('d/m/Y',strtotime($user->created_at))}}" placeholder="Select date">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="HouseNumberInput" class="form-label">House Number</label>
                                        <input type="text" class="form-control" id="HouseNumberInput" disabled value="{{$user->user_details->house_number}}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="TownCityInput" class="form-label">Town/City</label>
                                        <input type="text" class="form-control" id="TownCityInput" disabled value="{{$user->user_details->city}}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="addressTextarea" class="form-label">Address</label>
                                        <textarea class="form-control" id="addressTextArea" placeholder="Enter your description" disabled>{{$user->user_details->address}}</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <!-- <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="skillsInput" class="form-label">Skills</label>
                                        <select class="form-control" name="skillsInput" data-choices data-choices-text-unique-true multiple id="skillsInput">
                                            <option value="illustrator">Illustrator</option>
                                            <option value="photoshop">Photoshop</option>
                                            <option value="css">CSS</option>
                                            <option value="html">HTML</option>
                                            <option value="javascript" selected>Javascript</option>
                                            <option value="python">Python</option>
                                            <option value="php">PHP</option>
                                        </select>
                                    </div>
                                </div> -->
                                <!--end col-->
                                <!-- <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="designationInput" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designationInput" placeholder="Designation" value="Web Developer">
                                    </div>
                                </div> -->
                                <!--end col-->
                                <!-- <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="websiteInput1" class="form-label">Website</label>
                                        <input type="text" class="form-control" id="websiteInput1" placeholder="www.example.com" value="www.themesbrand.com">
                                    </div>
                                </div> -->
                                <!--end col-->
                                <!-- <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="cityInput" class="form-label">City</label>
                                        <input type="text" class="form-control" id="cityInput" placeholder="City" value="Phoenix">
                                    </div>
                                </div> -->
                                <!--end col-->
                                <!-- <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="countryInput" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="countryInput" placeholder="Country" value="USA">
                                    </div>
                                </div> -->
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="zipcodeInput" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" minlength="5" maxlength="6" id="zipcodeInput" placeholder="Enter zipcode" value="{{$user->user_details->post_code}}" disabled>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="exampleFormControlTextarea" class="form-label">Security Question</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Enter your description" disabled>{{$user->user_details->security_question}}</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="securityAnswer" class="form-label">Security Answer</label>
                                        <input class="form-control" id="securityAnswer" placeholder="Enter your description" value="{{$user->user_details->security_answer}}" disabled />
                                    </div>
                                </div>
                                <!--end col-->
                                <!-- <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Updates</button>
                                        <button type="button" class="btn btn-subtle-danger">Cancel</button>
                                    </div>
                                </div> -->
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
                <!--end tab-pane-->
                <!-- <div class="tab-pane" id="changePassword" role="tabpanel">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Changes Password</h6>
                    </div>
                    <div class="card-body">
                        <form action="pages-profile-settings">
                            <div class="row g-2 justify-content-lg-between align-items-center">
                                <div class="col-lg-4">
                                    <div class="auth-pass-inputgroup">
                                        <label for="oldpasswordInput" class="form-label">Old Password*</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control password-input" id="oldpasswordInput" placeholder="Enter current password">
                                            <button class="btn btn-link position-absolute top-0 end-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="auth-pass-inputgroup">
                                        <label for="password-input" class="form-label">New Password*</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control password-input" id="password-input" onpaste="return false" placeholder="Enter new password" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="auth-pass-inputgroup">
                                        <label for="confirm-password-input" class="form-label">Confirm Password*</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control password-input" onpaste="return false" id="confirm-password-input" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="link-primary text-decoration-underline"></a>
                                    <div class="">

                                        <button type="submit" class="btn btn-success">Change Password</button>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="card bg-light shadow-none passwd-bg" id="password-contain">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="fs-sm">Password must contain:</h5>
                                            </div>
                                            <div class="">
                                                <p id="pass-length" class="invalid fs-xs mb-2">Minimum <b>8 characters</b></p>
                                                <p id="pass-lower" class="invalid fs-xs mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                <p id="pass-upper" class="invalid fs-xs mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                <p id="pass-number" class="invalid fs-xs mb-0">A least <b>number</b> (0-9)</p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <div class="mt-4 mb-4 pb-3 border-bottom d-flex justify-content-between align-items-center">
                            <h5 class="card-title  mb-0">Login History</h5>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-secondary">All Logout</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">IP Address</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Address</th>
                                                <th scope="col"><i class="ri-logout-box-r-line"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="bi bi-phone align-baseline me-1"></i> iPhone 12 Pro</td>
                                                <td>192.44.234.160</td>
                                                <td>18 Dec, 2023</td>
                                                <td>Los Angeles, United States</td>
                                                <td><a href="#" class="icon-link icon-link-hover">Logout <i class="bi bi-box-arrow-right"></i></a></td>

                                            </tr>

                                            <tr>
                                                <td><i class="bi bi-tablet align-baseline me-1"></i> Apple iPad Pro</td>
                                                <td>192.44.234.162</td>
                                                <td>03 Jan, 2023</td>
                                                <td>Phoenix, United States</td>
                                                <td><a href="#" class="icon-link icon-link-hover">Logout <i class="bi bi-box-arrow-right"></i></a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="bi bi-phone align-baseline me-1"></i> Galaxy S21 Ultra 5G</td>
                                                <td>192.45.234.54</td>
                                                <td>25 Feb, 2023</td>
                                                <td>Washington, United States</td>
                                                <td><a href="#" class="icon-link icon-link-hover">Logout <i class="bi bi-box-arrow-right"></i></a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="bi bi-laptop align-baseline me-1"></i> Dell Inspiron 14</td>
                                                <td>192.40.234.32</td>
                                                <td>16 Oct, 2022</td>
                                                <td>Phoenix, United States</td>
                                                <td><a href="#" class="icon-link icon-link-hover">Logout <i class="bi bi-box-arrow-right"></i></a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="bi bi-phone align-baseline me-1"></i> iPhone 12 Pro</td>
                                                <td>192.44.326.42</td>
                                                <td>22 May, 2022</td>
                                                <td>Conneticut, United States</td>
                                                <td><a href="#" class="icon-link icon-link-hover">Logout <i class="bi bi-box-arrow-right"></i></a></td>

                                            </tr>

                                            <tr>
                                                <td><i class="bi bi-tablet align-baseline me-1"></i> Apple iPad Pro</td>
                                                <td>190.44.182.33</td>
                                                <td>19 Nov, 2023</td>
                                                <td>Los Angeles, United States</td>
                                                <td><a href="#" class="icon-link icon-link-hover">Logout <i class="bi bi-box-arrow-right"></i></a></td>

                                            </tr>

                                            <tr>
                                                <td><i class="bi bi-phone align-baseline me-1"></i> Galaxy S21 Ultra 5G</td>
                                                <td>194.44.235.87</td>
                                                <td>30 Aug, 2022</td>
                                                <td>Conneticut, United States</td>
                                                <td><a href="#" class="icon-link icon-link-hover">Logout <i class="bi bi-box-arrow-right"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--end tab-pane-->
                <div class="tab-pane" id="winners" role="tabpanel">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Winner</h6>
                    </div>
                    <div class="card-body">
                        <table id="winnerTbl" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <!-- <th scope="col" style="width: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input fs-base" type="checkbox" id="checkAll01" value="option">
                                </div>
                            </th> -->
                                    <th>SR No.</th>
                                    <th>Circle Name</th>
                                    <th>Type</th>
                                    <th>Numbers</th>
                                    <!-- <th>Created By</th> -->
                                    <!-- <th>Total Users</th> -->
                                    <th>Created Date (DD/MM/YYYY HH:MM:SS)</th>
                                </tr>
                            </thead>
                            <tbody id="circleBody">
                                @if(!empty($winners))
                                @foreach($winners as $key=>$winner)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><a href="{{url('admin/circles/'.$winner->circle_id)}}">{{$winner->circle_name }}</a></td>
                                    <td>{{ $winner->win_type}}</td>
                                    <td>{{ implode(',',$winner->numbers) }}</td>
                                    <td>{{ date('d/m/Y H:i:s',strtotime($winner->created_at)) }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end tab-pane-->
                <div class="tab-pane" id="circles" role="tabpanel">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Circles</h6>
                    </div>
                    <div class="card-body">
                        <!-- <div class="mb-4 pb-2">
                            <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0">
                                <div class="flex-grow-1">
                                    <h6 class="fs-md mb-1">Two-factor Authentication</h6>
                                    <p class="text-muted">Two-factor authentication is an enhanced security. Once enabled, you'll be required to give two types of identification when you log into Google Authentication and SMS are Supported.</p>
                                </div>
                                <div class="flex-shrink-0 ms-sm-3">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">Enable Two-factor Authentication</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                <div class="flex-grow-1">
                                    <h6 class="fs-md mb-1">Secondary Verification</h6>
                                    <p class="text-muted">The first factor is a password and the second commonly includes a text with a code sent to your smartphone, or biometrics using your fingerprint, face, or retina.</p>
                                </div>
                                <div class="flex-shrink-0 ms-sm-3">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">Set up secondary method</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                <div class="flex-grow-1">
                                    <h6 class="fs-md mb-1">Backup Codes</h6>
                                    <p class="text-muted mb-sm-0">A backup code is automatically generated for you when you turn on two-factor authentication through your iOS or Android Twitter app. You can also generate a backup code on twitter.com.</p>
                                </div>
                                <div class="flex-shrink-0 ms-sm-3">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">Generate backup codes</a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="card-title text-decoration-underline mb-3">Application Notifications:</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex">
                                    <div class="flex-grow-1">
                                        <label for="directMessage" class="form-check-label fs-md">Direct messages</label>
                                        <p class="text-muted">Messages from people you follow</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="directMessage" checked>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mt-2">
                                    <div class="flex-grow-1">
                                        <label class="form-check-label fs-md mb-1" for="desktopNotification">
                                            Show desktop notifications
                                        </label>
                                        <p class="text-muted">Choose the option you want as your default setting. Block a site: Next to "Not allowed to send notifications," click Add.</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="desktopNotification" checked>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mt-2">
                                    <div class="flex-grow-1">
                                        <label class="form-check-label fs-md mb-1" for="emailNotification">
                                            Show email notifications
                                        </label>
                                        <p class="text-muted"> Under Settings, choose Notifications. Under Select an account, choose the account to enable notifications for. </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="emailNotification">
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mt-2">
                                    <div class="flex-grow-1">
                                        <label class="form-check-label fs-md mb-1" for="chatNotification">
                                            Show chat notifications
                                        </label>
                                        <p class="text-muted">To prevent duplicate mobile notifications from the Gmail and Chat apps, in settings, turn off Chat notifications.</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="chatNotification">
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mt-2">
                                    <div class="flex-grow-1">
                                        <label class="form-check-label fs-md mb-1" for="purchaesNotification">
                                            Show purchase notifications
                                        </label>
                                        <p class="text-muted">Get real-time purchase alerts to protect yourself from fraudulent charges.</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="purchaesNotification">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="card-title text-decoration-underline mb-3">Delete This Account:</h5>
                            <p class="text-muted">Go to the Data & Privacy section of your profile Account. Scroll to "Your data & privacy options." Delete your Profile Account. Follow the instructions to delete your account :</p>
                            <div>
                                <input type="password" class="form-control" id="passwordInput" placeholder="Enter your password" value="richard@321654987" style="max-width: 265px;">
                            </div>
                            <div class="hstack gap-2 mt-3">
                                <a href="javascript:void(0);" class="btn btn-subtle-danger">Close & Delete This Account</a>
                                <a href="javascript:void(0);" class="btn btn-light">Cancel</a>
                            </div>
                        </div> -->
                        <table id="circleTbl" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <!-- <th scope="col" style="width: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input fs-base" type="checkbox" id="checkAll01" value="option">
                                </div>
                            </th> -->
                                    <th>SR No.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Created By</th>
                                    <th>Total Users</th>
                                    <th>Created Date (DD/MM/YYYY HH:MM:SS)</th>
                                </tr>
                            </thead>
                            <tbody id="circleBody">
                                @if(!empty($group_members))
                                @foreach($group_members as $key=>$gpm)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><a href="{{url('admin/circles/'.$gpm->circle_id)}}">{{$gpm->circle_name }}</a> {{ $gpm->owner == true ? "( Owner )" : '' }}</td>
                                    <td>{{ $gpm->circle_type}}</td>
                                    <td>{{ $gpm->circle_amount }}</td>
                                    <td>{{ $gpm->created_by}}</td>
                                    <td>{{$gpm->total_number_of_users}}</td>
                                    <td>{{ $gpm->created_at }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end tab-pane-->
                <div class="tab-pane" id="notifications" role="tabpanel">
                    <div class="card-header">
                        <h6 class="card-title mb-0">User Notifications</h6>
                    </div>
                    <div class="card-body">
                        <table id="notificationTbl" class="table align-middle table-nowrap dt-responsive display" style="width:100%">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created At</th>
                            </thead>
                            <tbody>
                                @foreach($user->notifications_to as $key=>$value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->body}}</td>
                                    <td>{{date('d/m/y H:i:s',strtotime($value->created_at))}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end tab-pane-->
                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="card-header">
                        <h6 class="card-title mb-0">User Messages</h6>
                    </div>
                    <div class="card-body">
                        <table id="messageTbl" class="table align-middle table-nowrap dt-responsive display" style="width:100%">
                            <thead>
                                <th>ID</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <!-- <th>Body</th> -->
                            </thead>
                            <tbody>
                                @foreach($user->admin_message_to as $key=>$value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$value->text}}</td>
                                    <td>{{date('d/m/y H:i:s',strtotime($value->created_at))}}</td>
                                    <!-- <td>{{$value->body}}</td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end tab-pane-->
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="{{ URL::asset('admin/js/pages/passowrd-create.init.js') }}"></script>
<script src="{{ URL::asset('admin/js/pages/profile-setting.init.js') }}"></script> -->
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
<!-- <script src="{{ URL::asset('admin/js/app.js') }}"></script> -->

<script>
    $("#notificationTbl").DataTable();
    $("#messageTbl").DataTable();
    $('#circleTbl').DataTable();
    $("#winnerTbl").DataTable();
</script>


@endsection