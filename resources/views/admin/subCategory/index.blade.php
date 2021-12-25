@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> Sub Categories  </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item active"> Sub Categories </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="font-weight:bold; font-family: 'Cairo'"> All Sub Categories </h3>
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
                                <div class="card-body card-dashboard">
                                    <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Image</th>
                                                <th>Sub Category</th>
                                                <th>Arabic Sub Category</th>
                                                <th>Main Category</th>
                                                <th>Arabic Main Category</th>
                                                <th>Category</th>
                                                <th>Arabic Category</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            @isset($subCategories)    
                                                @foreach ($subCategories as $subCategory)
                                                    <tr class="text-center">
                                                        <td><img src="{{ $subCategory->photo }}" class="w-100" alt="" srcset=""></td>
                                                        <td>{{ $subCategory->sub_category_name }}</td>
                                                        <td>{{ $subCategory->sub_category_name_ar }}</td>
                                                        <td>{{ $subCategory->mainCategory->name }}</td>
                                                        <td>{{ $subCategory->mainCategory->name_ar }}</td>
                                                        <td>{{ $subCategory->category->category_name }}</td>
                                                        <td>{{ $subCategory->category->category_name_ar }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="{{ route('admin.subCategory.edit',$subCategory->id) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                                                <a onclick="return myFunction();" href="{{ route('admin.subCategory.delete',$subCategory->id) }}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
                                                                <a href="{{ route('admin.subCategory.changeStatus',$subCategory->id) }}" class="btn btn-outline-warning box-shadow-3 mr-1 mb-1">
                                                                    @if ($subCategory->active == 1)
                                                                        {{ 'Unactive' }}
                                                                    @else 
                                                                        {{ 'Active' }}   
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection