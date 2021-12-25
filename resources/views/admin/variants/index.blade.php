@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> Variants </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item active"> Variants </li>
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
                                <h3 class="card-title" style="font-weight:bold; font-family: 'Cairo'" >All Variants </h3>
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
                                        cl  ass="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                            <tr class="text-center">
                                                <th style = "width:15%">Variant Image</th>
                                                <th style = "width:15%">Product Name</th>
                                                <th style = "width:15%">Variant ID</th>
                                                <th style = "width:15%">Variant Type</th>
                                                <th style = "width:15%">Variant</th>
                                                <th style = "width:15%">New Price</th>
                                                <th style = "width:15%">Compare Price</th>
                                                <th style = "width:15%">SKU</th>
                                                <th style = "width:15%">Options</th>
                                            </tr>
                                        </thead>
                                            @isset($variants)     
                                                @foreach ($variants as $variant) 
                                                    <tr class="text-center">
                                                        <td style = "width:15%"><img src="{{ $variant->photo }}" class="w-25"></td>
                                                        <td style = "width:15%">{{ $variant->Product->product_name }}</td>
                                                        <td style = "width:15%">{{ $variant->variant_id }}</td>
                                                        <td style = "width:15%">{{ $variant->variant_type }}</td>
                                                        <td style = "width:15%">{{ $variant->variant }}</td>
                                                        <td style = "width:15%">{{ $variant->newPrice }}</td>
                                                        <td style = "width:15%">{{ $variant->comparePrice }}</td>
                                                        <td style = "width:15%">{{ $variant->sku }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="{{ route('admin.variants.edit',$variant->id) }}" class="btn btn-outline-primary box-shadow-3 mr-1 mb-1">Edit</a>
                                                                <a onclick="return myFunction();" href="{{ route('admin.variants.delete',$variant->id) }}" class="btn btn-outline-danger box-shadow-3 mr-1 mb-1">Delete</a>
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