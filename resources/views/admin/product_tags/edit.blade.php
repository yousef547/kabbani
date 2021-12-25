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
                            <li class="breadcrumb-item active">Edit {{ $productTag->tag }}
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{ $productTag->tag }} </h4>
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
                                    <form class="form" action="{{ route('admin.productTags.update',$productTag->id) }}" method="POST">
                                        @csrf                                        
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Product Tag </h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Product Tag </label>
                                                        <input type="text" value="{{ $productTag->tag }}" id="tag"
                                                        class="form-control"
                                                        placeholder="Ex: Zero Interset"
                                                        name="tag">
                                                        @error("tag")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Product Tag in Arabic </label>
                                                        <input type="text" value="{{ $productTag->tag_ar }}" id="tag_ar"
                                                        class="form-control"
                                                        placeholder="Ex: Zero Interset"
                                                        name="tag_ar">
                                                        @error("tag_ar")
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> 

                                                <div class="col-md-4">
                                                    <div class="field-input-cont color-picker form-group">
                                                        <label for="projectinput1"> Tag Color </label>
                                                        <div class="example-content">
                                                            <div id="color-picker-component" class="input-group colorpicker-component">
                                                                <input type="color" name="color" value="{{ $productTag->color }}" class="form-control"/>
                                                                <span class="input-group-addon"><i style="background-color: {{ $productTag->color }}"></i></span>
                                                                    @error("color")
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror                                                                
                                                            </div>
                                                       </div>                                                          
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