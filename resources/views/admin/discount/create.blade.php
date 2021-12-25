<?php

use App\Models\Seller;

$sellers = Seller::get();
foreach ($sellers as $seller)
?>
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.discount.show') }}"> All Discount </a>
                            </li>
                            <li class="breadcrumb-item active"> Add Discount </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add Discount </h4>
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
                                    <form class="form" action="{{ route('admin.discount.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"> Product </label>
                                                    <select name="product_id" id="product_id" class="js-example-basic-single custom-select">

                                                        <option value="">Choose Product ...</option>
                                                        @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6" style="margin-top: 5px;">
                                                <div class="form-group">
                                                    <label> Start Date </label>
                                                    <input type="date" id="tdate" class="form-control" name="start_date">

                                                </div>
                                            </div>
                                            <div class="col-md-6" style="margin-top: 5px;">
                                                <div class="form-group">
                                                    <label> End Date </label>
                                                    <input type="date" class="form-control" name="end_date">

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-check mt-2">
                                                    <input type="radio" onclick='showDiscount("discount")' class="form-check-input" name="setDiscount">
                                                    <label class="form-check-label"> Discount </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-check mt-2">
                                                    <input onclick='showDiscount("percentage")' type="radio" class="form-check-input" name="setDiscount">
                                                    <label class="form-check-label"> Percentage Discount </label>
                                                </div>
                                            </div>
                                            <div class="row col-md-12 mt-2">
                                                <div class="col-md-6 d-none" style="margin-top: 5px;" id="discount">
                                                    <div class="form-group">
                                                        <label> Discount </label>
                                                        <input type="number" value="" id="newDiscount" class="form-control" placeholder="1000" name="discount">

                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none" style="margin-top: 5px;" id="percentage">
                                                    <div class="form-group">
                                                        <label> Percentage Discount </label>
                                                        <div class="d-flex">
                                                            <input type="number" placeholder="50%" value="" style="width: 95%;  border-radius:0.25rem 0 0 0.25rem!important" id="percent" class="form-control rounded-0 input-field" name="percentage">
                                                            <i class="fas fa-percent icon" style="width: 5%;"></i>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="afterDiscount" class="col-md-12 d-none">
                                            <div  class="btn btn-danger ">
                                                <i class="fas fa-pound-sign"></i> After Discount: <span id="discountPrice"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
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
    var prices;
    $("#product_id").change(function() {
        var id = $("#product_id").val();
        console.log(id);
        $.get("getProduct/" + id, function(data, status) {
            prices = data.price;
            $("#discountPrice").text(data.price);
        });
        $("#afterDiscount").removeClass('d-none')
    })

    function showDiscount(typeDiscount) {
        $('#' + typeDiscount).removeClass('d-none').siblings().addClass('d-none');
        $('#' + typeDiscount).siblings().find("input").val("");
        $("#discountPrice").text(prices);
        console.log(typeDiscount);
    }
    $('#newDiscount').on("keyup", function() {
        $("#discountPrice").text(prices);
        if ($(this).val() > prices) {
            $("#discountPrice").text(0);
        } else {
            $("#discountPrice").text(prices - $(this).val());
        }

    })
    $('#percent').on("keyup", function() {
        $("#discountPrice").text(prices);
        if ($(this).val() > 100) {
            $("#discountPrice").text(0);
        } else {
            var discountPercent = prices * $(this).val() / 100;
            $("#discountPrice").text(prices - discountPercent);
        }

        console.log($(this).val())
    })

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

@endsection

<style>
    .icon {
        background-color: #ddd;
        text-align: center;
        padding-top: 10px;
        color: #000;
        font-size: 20px;
        border: 1px solid #cacfe7;
        border-radius: 0 0.25rem 0.25rem 0 !important;
    }
</style>