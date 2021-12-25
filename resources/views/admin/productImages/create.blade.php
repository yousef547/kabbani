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
                            <li class="breadcrumb-item"><a href="{{ route('admin.products') }}"> Product Images </a>
                            </li>
                            <li class="breadcrumb-item active"> Add Product Images </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add Product Images</h4>
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
                                    <form class="form" action="{{ route('admin.productImages.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>  Products Images </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Product Name </label>
                                                        <select name="product_id" id="product_id" class="custom-select">
                                                            @foreach ($sellers as $seller)
                                                                @foreach ($products as $product)
                                                                    @if(Auth::user()->seller_id == $seller->id|| Auth::user()->is_supervisor==1)
                                                                        @if ($product->seller_id == $seller->id)
                                                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>                                                                                
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                     </div>
                                                </div>

                                                <div class="col-md-6" style="margin-top: 30px;">
                                                    <label> Choose More Image </label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" name="images[]" multiple accept="image/*">
                                                        <span class="file-custom" ></span>
                                                    </label>
                                                    @error('images[]')
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