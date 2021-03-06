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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dealsBanners') }}"> The Deals </a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{ $deal->dealName }}
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{ $deal->dealName }} </h4>
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
                                    <form class="form" action="{{ route('admin.dealsBanners.update',$deal->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="picture_id" value="{{ $deal->id }}">
                                            <div class="form-group">
                                                <div class="text-center mb-3">
                                                    <img src="{{ $deal->photo1 }}" alt="Deal Name">
                                                </div>
                                                <label> Deal First Image </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo1">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo1')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="text-center mb-3">
                                                    <img src="{{ $deal->photo2 }}" alt="Deal Name">
                                                </div>
                                                <label> Deal Second Image (optional) </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo2">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo2')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Deals Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Deal Name </label>
                                                        <input type="text" value="{{ $deal->dealName }}" id="dealName"
                                                               class="form-control"
                                                               placeholder="Ex: Pharmacy"
                                                               name="dealName">
                                                        @error("dealName")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Arabic Deal Name </label>
                                                        <input type="text" value="{{ $deal->dealName_ar }}" id="dealName_ar"
                                                               class="form-control"
                                                               placeholder="Ex: ????????????"
                                                               name="dealName_ar">
                                                        @error("dealName_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Category </label>
                                                        <select name="category_id" id="category_id" class="custom-select">
                                                            <option value="{{$deal->category_id}}">{{ $deal->category->category_name }}</option>    
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>    
                                                                @endforeach
                                                        </select>
                                                        @error("category_id")
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Product </label>
                                                        <select name="product_id" id="product_id" class="custom-select">
                                                            <option value="{{$deal->product_id}}">{{ $deal->product->product_name }}</option>    
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>    
                                                            @endforeach
                                                        </select>
                                                        @error("product_id")
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-check mx-3">
                                                    <input class="form-check-input" name="dealType" id="exampleRadios1" type="radio" value="Single" @if ($deal->dealType == 'Single') checked @endif>
                                                    <label class="form-check-label"> Single </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="dealType" id="exampleRadios2" type="radio" value="Double" @if ($deal->dealType == 'Double') checked @endif>
                                                    <label class="form-check-label"> Double</label>
                                                    @error("dealType")
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