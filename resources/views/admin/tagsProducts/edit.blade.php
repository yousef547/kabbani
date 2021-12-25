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
                            <li class="breadcrumb-item"><a href="{{ route('admin.productTags') }}"> Product Tags </a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{$tagsProduct->product->product_name}}</li>
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{$tagsProduct->product->product_name}} </h4>
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
                                    <form class="form" action="{{ route('admin.tagsProducts.update',$tagsProduct->id) }}" method="POST">
                                        @csrf                                        
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Product Tags </h4>
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
                                                        <label style="display:block"> Product Tags </label>
                                                        <select class="js-example-basic-multiple" name="tagsProducts[]" multiple="multiple">
                                                            <option value="">Choose Tags ...</option>    
                                                            @foreach ($tags as $tag)
                                                                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>  
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error("tagsProducts[]")
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
    .color-input {
        font-size: 14px;
        margin: 0 0 2px;
        padding: 16px;
        border: 1px solid #ccc;
    }
    .cp-color1, .cp-color2 {
        vertical-align: middle;
        border-radius: 4px;
        cursor: pointer;
        background-color: #5C6AC4;
    }
    .input-group-addon {
        padding: 6px;
        width: 30px;
    }
    .colorpicker-element .input-group-addon i, .colorpicker-element .add-on i {
        height: 20px;
        width: 20px;
        margin-left: -2px
    }
</style>