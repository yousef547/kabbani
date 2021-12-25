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
                            <li class="breadcrumb-item active">Add quantity {{ $product->product_name }}
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
                                <h4 class="card-title" id="basic-layout-form"> Add quantity{{ $product->product_name }} </h4>
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
                                    <form class="form" action="{{ route('admin.quantity.update',$product->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="picture_id" value="{{ $product->id }}">                                       
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
{{-- 
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
                                                </div> --}}

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
{{-- 
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
 --}}
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
@endsection