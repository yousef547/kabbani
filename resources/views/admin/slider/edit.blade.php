@extends('layouts.admin2')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.sellers') }}"> Sliders </a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{ $slider->products->product_name }}
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{ $slider->products->product_name }} </h4>
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
                                    <form class="form" action="{{ route('admin.productSlider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $slider->id }}">
                                        <div class="form-group">
                                            <div class="text-center mb-3">
                                                <img src="{{ $slider->photo }}" class="w-50" alt="Store Photo">
                                            </div>
                                            <label> Slider Image </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Slider Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Store Name </label>
                                                        <input type="text" value="{{ $slider->sellers->store_name }}" id="seller_id"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith  "
                                                               name="seller_id">
                                                        @error("seller_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Product Name </label>
                                                        <input type="text" value="{{ $slider->products->product_name }}" id="product_id"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith"
                                                               name="product_id">
                                                        @error("product_id")
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