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
                            <li class="breadcrumb-item"><a href="{{ route('admin.sellers') }}"> Sellers </a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{ $seller->seller_name }}
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{ $seller->seller_name }} </h4>
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
                                    <form class="form" action="{{ route('admin.seller.update',$seller->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $seller->id }}">
                                        <div class="form-group">
                                            <div class="text-center mb-3">
                                                <img src="{{ $seller->photo }}" alt="Store Photo">
                                            </div>
                                            <label> Store Image </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Seller Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>  Seller Name </label>
                                                        <input type="text" value="{{ $seller->seller_name }}" id="seller_name"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith  "
                                                               name="seller_name">
                                                        @error("seller_name")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Arabic Seller Name </label>
                                                        <input type="text" value="{{ $seller->seller_ar }}" id="seller_name"
                                                               class="form-control"
                                                               placeholder="Ex: جوان سميث "
                                                               name="seller_ar">
                                                        @error("seller_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Store Name </label>
                                                        <input type="text" value="{{ $seller->store_name }}" id="store_name"
                                                               class="form-control"
                                                               placeholder="Ex: El-Hassan Pharmacy"
                                                               name="store_name">
                                                        @error("store_name")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Arabic Store Name </label>
                                                        <input type="text" value="{{ $seller->store_ar }}" id="store_name"
                                                               class="form-control"
                                                               placeholder="Ex: صيدلية الحسن"
                                                               name="store_ar">
                                                        @error("store_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>  Main Category </label>
                                                        <select name="main_category_id" id="main_category_id" class="custom-select">
                                                            @foreach ($mainCategories as $mainCategory)
                                                                @if($mainCategory->id == $seller->main_category_id)
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
                                                        <label>  Phone </label>
                                                        <input type="text" value="{{ $seller->phone }}" id="phone"
                                                               class="form-control"
                                                               placeholder="Ex: 010 2345 6789  "
                                                               name="phone">
                                                        @error("phone")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" value="{{ $seller->email }}" id="email"
                                                               class="form-control"
                                                               placeholder="Ex: john@example.com  "
                                                               name="email">
                                                        @error("email")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Password </label>
                                                        <input type="password" value="" id="password"
                                                               class="form-control"
                                                               placeholder="Ex: ***********  "
                                                               name="password">
                                                        @error("password")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>  Address </label>
                                                        <input type="text" value="{{ $seller->address }}" id="address"
                                                               class="form-control"
                                                               placeholder="Ex: 2 ×××× street, Cairo, Egypt"
                                                               name="address">
                                                        @error("address")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6" style="margin-top: 15px;">
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