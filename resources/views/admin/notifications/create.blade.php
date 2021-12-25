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
                            <li class="breadcrumb-item"><a href="{{ route('admin.notifications') }}"> Notifications </a>
                            </li>
                            <li class="breadcrumb-item active"> Add New Notification </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add New Notification </h4>
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
                                    <form class="form" action="{{ route('admin.notifications.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Notification Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Product name </label>
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
                                                        <label for="projectinput1"> Title </label>
                                                        <input type="text" value="" id="title"
                                                               class="form-control"
                                                               placeholder="Ex: Big Sale"
                                                               name="title">
                                                        @error("title")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Message </label>
                                                        <textarea value="" id="body"
                                                               class="form-control"
                                                               placeholder="Ex: 30% Discount for Hugo Bedroom"
                                                               name="body"></textarea>
                                                        @error("body")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Notification Date </label>
                                                        <input type="date" id="notification_date"
                                                               class="form-control"
                                                               placeholder="Ex: 01/08/2021 "
                                                               name="notification_date">
                                                        @error("notification_date")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Notification Image </label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="file" name="image">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                        @error('image')
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