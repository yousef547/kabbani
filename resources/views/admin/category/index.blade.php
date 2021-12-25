@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> Categories  </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item active"> Categories </li>
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
                                <h3 class="card-title" style="font-weight:bold; font-family: 'Cairo'" >All Categories </h3>
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
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>ِArabic Category Name</th>
                                                <th>Main Category</th>
                                                <th>Arabic Main Category</th>
                                                <th>Category Image</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($categories)    
                                                @foreach ($categories as $category)
                                                    @foreach ($sellers as $seller)
                                                        @if ($seller->mainCategory->id == $category->main_category_id)
                                                            @if (Auth::user()->seller_id == $seller->id || Auth::user()->is_supervisor==1)
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                                <tr class="text-center">
                                                                    <td>{{ $category->id }}</td>
                                                                    <td>{{ $category->category_name }}</td>
                                                                    <td>{{ $category->category_name_ar }}</td>
                                                                    <td>
                                                                        @foreach ($main_categories as $main)
                                                                            @if ($main->id == $category->main_category_id)
                                                                                {{ $main->name }}
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        @foreach ($main_categories as $main)
                                                                            @if ($main->id == $category->main_category_id)
                                                                                {{ $main->name_ar }}
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td><img src="{{ $category->photo }}" class="w-50"></td>
                                                                    <td>
                                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                                            <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                                                            <a href="{{ route('admin.category.delete',$category->id) }}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
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