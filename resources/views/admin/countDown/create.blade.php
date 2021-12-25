<?php use Carbon\Carbon;?>

@extends('layouts.admin2')
@section('content')

 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.countDowns') }}"> New Count Down </a>
                            </li>
                            <li class="breadcrumb-item active"> Add New Count Down </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> Add New Count Down </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{ route('admin.countDowns.store') }}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> New Count Down </h4>
                                            <div class="row">
                                                <div class="col-md-6" style="margin-top: 5px;">
                                                    <div class="form-group">
                                                        <label> title </label>
                                                        <input type="text" value="" id="title"
                                                               class="form-control"
                                                               placeholder="Ex: Start Big Sale"
                                                               name="title">
                                                    </div>
                                                    @error("title")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6" style="margin-top: 5px;">
                                                    <div class="form-group">
                                                        <label> title </label>
                                                        <input type="text" value="" id="title_ar"
                                                               class="form-control"
                                                               placeholder="Ex: بداية عروض التخفيضات"
                                                               name="title_ar">
                                                    </div>
                                                    @error("title_ar")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6" style="margin-top: 5px;">
                                                    <div class="form-group">
                                                        <label> Today </label>
                                                        <input type="text" value="{{ Carbon::now()->toDateString()}}" id="fdate"
                                                               class="form-control"
                                                               name="fdate" readonly>
                                                    </div>
                                                    @error("fdate")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6" style="margin-top: 5px;">
                                                    <div class="form-group">
                                                        <label> Sale Day </label>
                                                        <input type="date" value="" id="tdate"
                                                               class="form-control"
                                                               name="tdate">
                                                    </div>
                                                    @error("tdate")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    </script>
@endsection
<style>
    .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        margin-left: -2px !important;
        margin-top: -8px;
        color : #fff000 !important
    }
</style>