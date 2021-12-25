@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> The Deals  </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item active"> Deals </li>
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
                                <h3 class="card-title" style="font-weight:bold; font-family: 'Cairo'" >All Deals </h3>
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
                                            <tr class="text-center fixed">
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Name in Arabic</th>
                                                <th>Store Name</th>
                                                <th>Main Category</th>
                                                <th>Sub Category</th>
                                                <th>Sub Category Image</th>
                                                <th>Old Price</th>
                                                <th>Deal Price</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            @isset($products)     
                                                @foreach ($products as $product) 
                                                    @foreach ($sellers as $seller)
                                                        @if (Auth::user()->seller_id == $seller->id || Auth::user()->is_supervisor==1)
                                                            @if ($product->main_category_id == $seller->main_category_id)
                                                                <tr class="text-center">
                                                                        <td><img src="{{ $product->photo }}" class="w-75"></td>
                                                                        <td>{{ $product->product_name }}</td>
                                                                        <td>{{ $product->name_ar }}</td>
                                                                        <td>{{ $product->seller->store_name }}</td>
                                                                        <td>
                                                                            @foreach ($mainCategories as $mainCategory)
                                                                                @if ($mainCategory->id == $product->main_category_id)
                                                                                    {{ $mainCategory->name }}
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td>
                                                                            @foreach ($subCategories as $subCategory)
                                                                                @if ($subCategory->id == $product->sub_category_id)
                                                                                    {{ $subCategory->sub_category_name }}
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td>
                                                                            @foreach ($subCategories as $subCategory)
                                                                                @if ($subCategory->id == $product->sub_category_id)
                                                                                   <img src="{{ $subCategory->photo }}" class="w-50" alt="" srcset=""> 
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td>{{ $product->price }}</td>
                                                                        <td>{{ $product->deals_price }}</td>
                                                                        <td>
                                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                                <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-outline-primary box-shadow-3 mr-1 mb-1">Edit</a>
                                                                                <a href="{{ route('front.rate.create',$product->id) }}" class="btn btn-outline-info box-shadow-3 mr-1 mb-1">Rate Now</a>
                                                                                <a onclick="return myFunction();" href="{{ route('admin.product.delete',$product->id) }}" class="btn btn-outline-danger box-shadow-3 mr-1 mb-1">Delete</a>
                                                                                @if (Auth::user()->is_supervisor == 1)
                                                                                    <a href="{{ route('admin.product.changeStatus',$product->id) }}" class="btn btn-outline-warning box-shadow-3 mr-1 mb-1">
                                                                                        @if ($product->active == 1)
                                                                                            {{ 'Unactive' }}
                                                                                        @else 
                                                                                            {{ 'Active' }}   
                                                                                        @endif
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endforeach
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