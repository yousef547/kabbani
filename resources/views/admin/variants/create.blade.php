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
                            <li class="breadcrumb-item"><a href="{{ route('admin.variants') }}"> Variants </a>
                            </li>
                            <li class="breadcrumb-item active"> Add Variant </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add Variant </h4>
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
                                    <form class="form" action="{{ route('admin.variants.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        <div class="form-group">
                                            <label> Product Image </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                             <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>  
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>  Variants Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Product Name </label>
                                                        <select name="product_id" id="product_id" class="custom-select">
                                                            <option value="">Choose Product ...</option>    
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>    
                                                                @endforeach
                                                        </select>
                                                        @error("product_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="variantType" for="projectinput1"> Variant Type </label>
                                                        <div class="form-check mr-5">
                                                            <input class="form-check-input" name="variant_type" id="exampleRadios1" type="radio" value="Size">
                                                            <label class="form-check-label"> Size </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="variant_type" id="exampleRadios2" type="radio" value="Color">
                                                            <label class="form-check-label"> Color </label>
                                                        </div>
                                                        @error("variant_type")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Variant Id </label>
                                                        <input type="text" value="" id="variant_id"
                                                               class="form-control"
                                                               placeholder="Ex: red  or  210 cm * 160 cm"
                                                               name="variant_id">
                                                        @error("variant_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div> 

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Variant </label>
                                                        <input type="text" value="" id="variant"
                                                               class="form-control"
                                                               placeholder="Ex: red  or  210 cm * 160 cm"
                                                               name="variant">
                                                        @error("variant")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> SKU (Stock Keeping Unit) </label>
                                                        <input type="text" value="" id="sku"
                                                               class="form-control"
                                                               placeholder="Ex: KB-MTRS-SIMPLE-170*195"
                                                               name="sku">
                                                        @error("sku")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> New Price </label>
                                                        <input type="text" value="" id="newPrice"
                                                               class="form-control"
                                                               placeholder="Ex: 1500"
                                                               name="newPrice">
                                                        @error("newPrice")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Compare Price </label>
                                                        <input type="text" value="" id="comparePrice"
                                                               class="form-control"
                                                               placeholder="Ex: 2000"
                                                               name="comparePrice">
                                                        @error("comparePrice")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
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
<style>
    .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        margin-left: -2px;
        top: -8px;
    }
</style>
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
    .form-check {
        display: inline-block !important;
    }
    .variantType {
        display: block;
    }
</style>