@extends('layouts.login')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.Customer_Locations') }}"> Customers Locations </a>
                            </li>
                            <li class="breadcrumb-item active"> Add Customer Location  </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add Customer Location </h4>
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
                                    <form class="form" action="{{ route('admin.Customer_Locations.store') }}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Customers locations Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label> Customer ID </label>
                                                        <select name="customer_id" id="customer_id" class="custom-select">
                                                            <option value="">Choose Cutomer</option>    
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>    
                                                            @endforeach
                                                        </select>
                                                        @error("customer_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label> Email </label>
                                                        <select name="email" id="email" class="custom-select">
                                                            <option value="">Choose Email</option>    
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->email }}">{{ $customer->email }}</option>    
                                                            @endforeach
                                                        </select>
                                                        @error("email")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Address </label>
                                                        <input type="text" value="" class="form-control" 
                                                                name="address"
                                                               placeholder="El-Haram">
                                                        @error("address")
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Latitude </label>
                                                        <input type="text" value="" class="form-control" 
                                                        name="latitude"
                                                        placeholder="29.123456788">
                                                        @error("latitude")
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Longitude </label>
                                                        <input type="text" value="" class="form-control" 
                                                        name="longitude"
                                                        placeholder="30.123456789">
                                                        @error("longitude")
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
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