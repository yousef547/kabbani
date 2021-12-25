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
                            <li class="breadcrumb-item"><a href="{{ route('admin.products') }}"> Products </a>
                            </li>
                            <li class="breadcrumb-item active"> Add Product </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add Product </h4>
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
                                    <div class="float-right px-2 mb-3">
                                       
                                        <form method='post' action='{{ route('admin.products.upload_Files') }}' enctype='multipart/form-data' >
                                            {{ csrf_field() }}
                                            <input type='file' name='file' >
                                            <input type='submit' name='submit' value='Import'>
                                        </form>        
                                    </div> 
                                    <form class="form" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <h4 class="form-section"><i class="ft-home"></i>  Products Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Product Name </label>
                                                        <input type="text" value="" id="product_name"
                                                               class="form-control"
                                                               placeholder="Ex: Bed Room"
                                                               name="product_name">
                                                        @error("product_name")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Arabic Name </label>
                                                        <input type="text" value="" id="name_ar"
                                                               class="form-control"
                                                               placeholder="Ex: غرفة نوم"
                                                               name="name_ar">
                                                        @error("name_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Seller </label>
                                                        <select name="seller_id" id="seller_id" class="custom-select">
                                                            <option value="">Choose Seller ...</option>    
                                                                @foreach ($sellers as $seller)
                                                                    @if(Auth::user()->seller_id == $seller->id|| Auth::user()->is_supervisor==1)
                                                                        <option value="{{ $seller->id }}">{{ $seller->seller_name }}</option>    
                                                                    @endif
                                                                @endforeach
                                                        </select>
                                                        @error("seller_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>    

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Main Category </label>
                                                            <select name="main_category_id" id="category_id" class="custom-select">
                                                                    @if(Auth::user()->seller_id == $seller->id || Auth::user()->is_supervisor==1)
                                                                        <option value="{{ $seller->mainCategory->id }}">{{ $seller->mainCategory->name }}</option>    
                                                                    @endif
                                                            </select>
                                                        @error("main_category_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>        

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Category </label>
                                                            <select name="category_id" id="category_id" class="custom-select"> 
                                                                <option value="">Choose Category</option>    
                                                                        @if(Auth::user()->seller_id == $seller->id || Auth::user()->is_supervisor==1)
                                                                            @foreach ($categories as $category)
                                                                                @if($seller->mainCategory->id == $category->main_category_id)
                                                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                            </select>
                                                        @error("category_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Sub_Category </label>
                                                        <select name="sub_category_id" id="sub_category_id" class="custom-select"> 
                                                            <option value="">Choose Sub_Category</option>    
                                                                    @if(Auth::user()->seller_id == $seller->id || Auth::user()->is_supervisor==1)
                                                                        @foreach ($categories as $category)
                                                                            @foreach ($subCategories as $subCategory)
                                                                                @if($seller->mainCategory->id == $category->main_category_id)
                                                                                    @if ($subCategory->category->id == $category->id)
                                                                                        <option value="{{ $subCategory->id }}">{{ $subCategory->sub_category_name }}</option>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endif
                                                        </select>
                                                        @error("sub_category_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Description </label>
                                                        <input type="text" value="" id="description"
                                                               class="form-control"
                                                               placeholder="Ex: Germany Wood"
                                                               name="description">
                                                        @error("description")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Description in Arabic </label>
                                                        <input type="text" value="" id="description_ar"
                                                               class="form-control"
                                                               placeholder="Ex: خشب ألمانى"
                                                               name="description_ar">
                                                        @error("description_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Specification </label>
                                                        <textarea type="text" value="" id="specification"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="specification" rows="10"></textarea>
                                                        @error("specification")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Specification  in Arabic </label>
                                                        <textarea type="text" value="" id="specification_ar"
                                                               class="form-control"
                                                               placeholder="Ex: المواصفات"
                                                               name="specification_ar" rows="10"> </textarea>
                                                        @error("specification_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Quantity </label>
                                                        <input type="text" value="" id="quantity"
                                                               class="form-control"
                                                               placeholder="Ex: 50"
                                                               name="quant">
                                                        @error("quant")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Minimum Quantity </label>
                                                        <input type="text" value="" id="min_quant"
                                                               class="form-control"
                                                               placeholder="Ex: 5"
                                                               name="min_quant">
                                                        @error("min_quant")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Price </label>
                                                        <input type="text" value="" id="price"
                                                               class="form-control"
                                                               placeholder="Ex: 24.00"
                                                               name="price">
                                                        @error("price")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Compare Price </label>
                                                        <input type="text" value="" id="compare_price"
                                                               class="form-control"
                                                               placeholder="Ex: 30.00"
                                                               name="compare_price">
                                                        @error("compare_price")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Delivery Time </label>
                                                            <select name="deliv_time" id="deliv_time" class="custom-select"> 
                                                                <option value="">Choose Delivery Time</option>    
                                                                <option value="60 Minutes">60 Minutes</option>
                                                                <option value="120 Minutes">120 Minutes</option>
                                                                <option value="1 Day">1 Day</option>
                                                                <option value="2 Days">2 Days</option>
                                                            </select>
                                                        @error("deliv_time")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Delivery Free </label>
                                                            <select name="deliv_free" id="deliv_free" class="custom-select"> 
                                                                <option value="">Choose Delivery Free</option>    
                                                                <option value="0">No</option>
                                                                <option value="1">Yes</option>
                                                            </select>
                                                        @error("deliv_free")
                                                         <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6" style="margin-top: 15px;">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name="deals" value="0"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               />
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">Deals</label>
                                                    </div>
                                                    @error('deals')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6" style="margin-top: 15px;">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Deals Price </label>
                                                        <input type="text" value="" id="deals_price"
                                                               class="form-control"
                                                               placeholder="Ex: 24.00"
                                                               name="deals_price">
                                                        @error("deals_price")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6" >
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name="active" value="1"
                                                            id="switcheryColor4"
                                                            class="switchery" data-color="success"
                                                            checked/>
                                                        <label for="switcheryColor4"
                                                            class="card-title ml-1">Status</label>
                                                    </div>
                                                    @error('active')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6" style="margin-top: 15px;">
                                                    <label> Grouped </label>
                                                    <select name="grouped" onchange="groupedType()" id="grouped" class="custom-select">
                                                        <option selected>Choose Grouped Type</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6" >
                                                    <div class="form-group" id="parts">
                                                        <label> Product Parts </label>
                                                        <select class="js-example-basic-multiple" name="product_parts[]" multiple="multiple" style="width: 100%">
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>  
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @error("product_parts[]")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror   
                                                </div>
                                                
                                                <div class="col-md-6" >
                                                    <div class="form-group" id="productTags">
                                                        <label> Product Parts </label>
                                                        <select class="js-example-basic-multiple" name="productTag_id[]" multiple="multiple" style="width: 100%">
                                                            @foreach ($productTags as $productTag)
                                                                <option value="{{ $productTag->id }}">{{ $productTag->tag }}</option>  
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @error("productTag_id[]")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror   
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
    .form-check {
        display: inline-block;
    }
    #parts {
        display: none;
    }
</style>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    </script>

    <script>
        function groupedType() {
        var groupedChoose = document.getElementById("grouped").value;
        var productsParts = document.getElementById("parts");

        switch (groupedChoose) {
            case '1':
                productsParts.style.display = "block";
                break;
            case '0':
                productsParts.style.display = "none";
                break; 
            }
        }
    </script>

@endsection