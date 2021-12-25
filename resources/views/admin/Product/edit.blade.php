@extends('layouts.admin3')
@section('content')

 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.products') }}"> Products </a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{ $product->product_name }}
                            </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{ $product->product_name }} </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
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
                                    <form class="form" action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="picture_id" value="{{ $product->id }}">
                                        <div class="form-group">
                                            <div class="text-center mb-3">
                                                <img src="{{ $product->photo }}" class="w-25" alt="Product Photo">
                                            </div>
                                            <label> Product Image </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo" value = "{{$product->photo}}">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Product Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Product Name </label>
                                                        <input type="text" value="{{ $product->product_name }}" id="product_name"
                                                               class="form-control"
                                                               placeholder="Ex: Fresh Milk"
                                                               name="product_name">
                                                        @error("product_name")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Name in Arabic </label>
                                                        <input type="text" value="{{ $product->name_ar }}" id="product_name"
                                                               class="form-control"
                                                               placeholder="مثال: لبن طازج"
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
                                                            @foreach ($sellers as $seller)
                                                                @if ($seller->id == $product->seller_id)
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
                                                        <label>  Main Category </label>
                                                        <select name="main_category_id" id="main_category_id" class="custom-select">
                                                            @foreach ($mainCategories as $mainCategory)
                                                                @if ($mainCategory->id == $product->main_category_id)
                                                                    <option value="{{ $mainCategory->id }}">{{ $mainCategory->name }}</option>    
                                                                @endif
                                                            @endforeach
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
                                                            @foreach ($categories as $category)
                                                                @if ($category->id == $product->category_id)
                                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>    
                                                                @endif
                                                            @endforeach
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
                                                            @foreach ($subCategories as $subCategory)
                                                                @if ($subCategory->id == $product->sub_category_id)
                                                                    <option value="{{ $subCategory->id }}">{{ $subCategory->sub_category_name }}</option>                                                                        
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error("sub_category_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Description </label>
                                                        <input type="text" value="{{ $product->description }}" id="description"
                                                               class="form-control"
                                                               placeholder="Ex: 450 gram"
                                                               name="description">
                                                        @error("description")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Description in Arabic </label>
                                                        <input type="text" value="{{ $product->description_ar }}" id="description"
                                                               class="form-control"
                                                               placeholder="Ex: 450 جرام"
                                                               name="description_ar">
                                                        @error("description_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Specification </label>
                                                        <input type="text" value="{{ $product->specification }}" id="description"
                                                               class="form-control"
                                                               placeholder="Ex: specification"
                                                               name="specification">
                                                        @error("specification")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Specification in Arabic </label>
                                                        <input type="text" value="{{ $product->specification_ar }}" id="description"
                                                               class="form-control"
                                                               placeholder="Ex: مواصفات"
                                                               name="specification_ar">
                                                        @error("specification_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Quantity </label>
                                                        <input type="text" value="{{ $product->quant }}" id="quantity"
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
                                                        <input type="text" value="{{ $product->min_quant }}" id="min_quant"
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
                                                        <input type="text" value="{{ $product->price }}" id="price"
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
                                                        <input type="text" value="{{ $product->compare_price }}" id="compare_price"
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
                                                                <option value="{{ $product->deliv_time }}">{{ $product->deliv_time }}</option>                                                                
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
                                                                <option value="{{ $product->deliv_free }}">{{ $product->getDelivery() }}</option>    
                                                            </select>
                                                        @error("deliv_free")
                                                         <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4" style="margin-top: 15px;">
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
                                                  
                                                <div class="col-md-4" style="margin-top: 15px;">
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

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Deals Price </label>
                                                        <input type="text" value="{{ $product->deals_price }}" id="deals_price"
                                                               class="form-control"
                                                               placeholder="Ex: 24.00"
                                                               name="deals_price">
                                                        @error("deals_price")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6" style="margin-top: 15px;">
                                                    <label> Grouped </label>
                                                    <select name="grouped" onchange="groupedType()" id="grouped" class="custom-select">
                                                        <option selected>Choose Grouped Type</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6" style="margin-top: 15px;>
                                                    <div class="form-group" id="product_parts">
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
                                               
                                                
                                                 <div class="col-md-6" style="margin-top: 15px;>
                                                    <div class="form-group" id="productTags">
                                                        <label> Product Tags </label>
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
                                        </div>
                                           
                                       <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Update
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