@extends('admin.layouts.master')
@section('title') @lang('translation.home') @endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Home @endslot
@endcomponent
@endsection
@section('script')
<script src="{{ URL::asset('admin/js/app.js') }}"></script>
@endsection