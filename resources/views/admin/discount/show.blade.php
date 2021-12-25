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
                            <li class="breadcrumb-item"><a href="{{ route('admin.discount.create') }}"> Create Discount </a>
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
                                    <div class="row">
                                        @foreach($discountProducts as $discountProduct)
                                        <div class="col-md-6">
                                            <div class="card position-relative photo" style="width: 100%;">
                                                <img style="height: 405px;" src='{{asset("$discountProduct->photo")}}' class=" card-img-top" alt="...">
                                                <div class="card-body overlay position-absolute">
                                                    <p class="card-text">{{$discountProduct->product_name}}</p>
                                                    <p class="card-text">{{$discountProduct->price}}</p>
                                                    <p class="card-text">{{$discountProduct->afterDiscount}}</p>
                                                    @if($discountProduct->discount("percentage"))
                                                    <p class="card-text">Discount:{{$discountProduct->discount("percentage")}} %</p>
                                                    @elseif($discountProduct->discount("discount"))
                                                    <p class="card-text">Discount:{{$discountProduct->discount("discount")}}</p>
                                                    @endif
                                                    <p class="card-text">Start Date : {{\Carbon\Carbon::parse((int)$discountProduct->startDate)->format('y/m/d h:i A')}}</p>
                                                    <p class="card-text">Start Date : {{\Carbon\Carbon::parse((int)$discountProduct->endDate)->format('y/m/d h:i A')}}</p>
                                                    @php
                                                    $fdate = \Carbon\Carbon::parse((int)$discountProduct->remaining_time)->format('y-m-d');
                                                    $tdate = \Carbon\Carbon::parse((int)$discountProduct->endDate)->format('y-m-d');;
                                                    $from = \Carbon\Carbon::createFromDate($fdate);
                                                    $to = \Carbon\Carbon::createFromDate($tdate);
                                                    $period = \Carbon\CarbonPeriod::create($from , $to );
                                                    $remaining_day = $period->toArray();

                                                    @endphp
                                                    @if($discountProduct->active("not_active"))
                                                    <p class="card-text">Not Active</p>

                                                    @else
                                                    <div class="d-none"><span id="hours">{{$hours}}</span>:<span id="munits">{{$munits}}</span>:<span id="second">{{$second}}</span></div>
                                                    <p class="card-text">{{count($remaining_day) - 2}}d <span class="timer"></span></p>
                                                    @endif
                                                    <a href="{{route('admin.discount.edit',$discountProduct->id)}}" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> Edit
                                                    </a>
                                                    <a href="{{ route('admin.discount.delete',$discountProduct->id) }}" type="submit" class="btn btn-danger ">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
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
    // document.getElementById("timer").innerText = "kfdgdkgkdkgkdl flkdlf"
    // console.log($('#timer').text())
    var second = $('#second').text();
    var munits = $('#munits').text();
    var hours = $('#hours').text()

    setInterval(function time() {
        second--;
        if (second <= 0) {
            munits--;
            second = 59;
        }
        if (munits <= 0) {
            hours--;
            munits = 59;
        }
        $('.timer').text(hours + "h " +
            munits + "m " + second + "s ");
        // console.log($('#hours').text())

        // console.log(hours+":"+munits+":"+second )   
    }, 1000);
    // document.getElementById('timer').innerHTML = "hours";


    function showDiscount(typeDiscount) {
        $('#' + typeDiscount).removeClass('d-none').siblings().addClass('d-none');
        find
        $('#' + typeDiscount).siblings().find("input").val("");
        console.log(typeDiscount);
    }
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

@endsection

<style>
    .card-text {
        font-size: 19px;
    }

    .icon {
        background-color: #ddd;
        text-align: center;
        padding-top: 10px;
        color: #000;
        font-size: 20px;
        border: 1px solid #cacfe7;
        border-radius: 0 0.25rem 0.25rem 0 !important;
    }

    .overlay {
        background: rgb(0 0 0 / 50%);
        width: 100%;
        top: 0;
        left: 0;
        color: #fff;
        height: 100%;
        display: none;

        /* transition: all .4s ease-in-out; */
    }

    .photo:hover .overlay {
        display: block;

    }
</style>