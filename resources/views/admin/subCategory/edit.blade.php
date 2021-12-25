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
                            <li class="breadcrumb-item"><a href="{{ route('admin.subCategories') }}"> Sub Categories </a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{ $subCategory->sub_category_name }}
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{ $subCategory->sub_category_name }} </h4>
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
                                    <form class="form" action="{{ route('admin.subCategory.update',$subCategory->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="picture_id" value="{{ $subCategory->id }}">
                                        <div class="form-group">
                                            <div class="text-center mb-3">
                                                <img src="{{ $subCategory->photo }}" alt="Sub Category Photo">
                                            </div>
                                            <label> Sub Category Image </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Sub Category Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Sub Category Name </label>
                                                        <input type="text" value="{{ $subCategory->sub_category_name }}" id="sub_category_name"
                                                               class="form-control"
                                                               placeholder="Ex: Fruits"
                                                               name="sub_category_name">
                                                        @error("sub_category_name")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Arabic Sub Category Name </label>
                                                        <input type="text" value="{{ $subCategory->sub_category_name_ar }}" id="sub_category_name"
                                                               class="form-control"
                                                               placeholder="Ex: فواكه"
                                                               name="sub_category_name_ar">
                                                        @error("sub_category_name_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Category </label>
                                                        <select name="category_id" id="category_id" class="custom-select">
                                                            @foreach ($categories as $category)
                                                                @if ($category->id == $subCategory->category_id)
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
                                                        <label> Main Category </label>
                                                        <select name="main_category_id" id="main_category_id" class="custom-select">
                                                            @foreach ($mainCategories as $mainCategory)
                                                                @if ($mainCategory->id == $subCategory->main_category_id)
                                                                    <option value="{{ $mainCategory->id }}">{{ $mainCategory->name }}</option>    
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error("main_category_id")
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