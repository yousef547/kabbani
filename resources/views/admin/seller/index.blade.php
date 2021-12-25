@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> Sellers </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item active"> Sellers </li>
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
                                <h3 class="card-title" style="font-weight:bold; font-family: 'Cairo'" >All Sellers </h3>
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
                                                <th>Seller Name</th>
                                                <th>Arabic Seller Name</th>
                                                <th>Store Name</th>
                                                <th>Arabic Store Name</th>
                                                <th>Main_Category</th>
                                                <th>Store Image</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($sellers)    
                                                @foreach ($sellers as $seller)
                                                    @if ($seller->seller_name != "Mohamed Anani")
                                                        <tr class="text-center">
                                                            <td>{{ $seller->seller_name }}</td>
                                                            <td>{{ $seller->seller_ar }}</td>
                                                            <td>{{ $seller->store_name }}</td>
                                                            <td>{{ $seller->store_ar }}</td>
                                                            <td> @foreach($categories as $category)
                                                                @if($category->id == $seller->main_category_id) 
                                                                {{ $category->name }} 
                                                                @endif 
                                                                @endforeach
                                                            </td>
                                                            <td><img src="{{ $seller->photo }}" class="w-100"> </td>
                                                            <td>{{ $seller->getActive() }}</td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <a href="{{ route('admin.seller.edit',$seller->id) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                                                    <a onclick="return myFunction();" href="{{ route('admin.seller.delete',$seller->id) }}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
                                                                    <a href="{{ route('admin.seller.changeStatus',$seller->id) }}" class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                        @if ($seller->active == 1)
                                                                            {{ 'Unactive' }}
                                                                        @else 
                                                                            {{ 'Active' }}   
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
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