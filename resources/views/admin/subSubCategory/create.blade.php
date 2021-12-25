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
                            <li class="breadcrumb-item"><a href="{{ route('admin.subSubCategories') }}"> Sub Sub Categories </a>
                            </li>
                            <li class="breadcrumb-item active"> Add Sub Sub Category </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add Sub Sub Category </h4>
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
                                    <form class="form" action="{{ route('admin.subSubCategory.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label> Sub Sub Category Image </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Sub Sub Categories Data </h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Sub Sub Category Name </label>
                                                        <input type="text" value="" id="sub_sub_category_name"
                                                               class="form-control"
                                                               placeholder="Ex: Children Bedrooms"
                                                               name="sub_sub_category_name">
                                                        @error("sub_sub_category_name")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Arabic Sub Sub Category Name </label>
                                                        <input type="text" value="" id="sub_sub_category_name_ar"
                                                               class="form-control"
                                                               placeholder="Ex: غرفة نوم أطفال"
                                                               name="sub_sub_category_name_ar">
                                                        @error("sub_sub_category_name_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Sub Category </label>
                                                            <select name="sub_category_id" id="sub_category_id" class="custom-select"> --}}
                                                                <option value="">Choose Sub Category</option>    
                                                                    @if(Auth::user()->seller_id == $seller->id || Auth::user()->is_supervisor==1)
                                                                        @foreach ($sub_categories as $subCategory)
                                                                            @if($seller->mainCategory->id == $subCategory->main_category_id)
                                                                                <option value="{{ $subCategory->id }}">{{ $subCategory->sub_category_name }}</option>     --}}
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                            </select>
                                                        @error("sub_category_id")
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Category </label>
                                                            <select name="category_id" id="category_id" class="custom-select"> --}}
                                                                <option value="">Choose Category</option>    
                                                                    @if(Auth::user()->seller_id == $seller->id || Auth::user()->is_supervisor==1)
                                                                        @foreach ($categories as $category)
                                                                            @if($seller->mainCategory->id == $category->main_category_id)
                                                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>     --}}
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                            </select>
                                                        @error("category_id")
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Main Category </label>
                                                            <select name="main_category_id" id="main_category_id" class="custom-select"> --}}
                                                                    @if(Auth::user()->seller_id == $seller->id || Auth::user()->is_supervisor==1)
                                                                        @foreach ($mainCategories as $mainCategory)
                                                                            @if($seller->main_category_id == $mainCategory->id)
                                                                                <option value="{{ $mainCategory->id }}">{{ $mainCategory->name }}</option>     --}}
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                            </select>
                                                        @error("main_category_id")
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