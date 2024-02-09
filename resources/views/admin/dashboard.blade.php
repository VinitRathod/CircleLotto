@extends('admin.layouts.master')
@section('title') @lang('translation.home') @endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('head_title') Dashboard @endslot
@endcomponent
@endsection
@section('script')
@endsection