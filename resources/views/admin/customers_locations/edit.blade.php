@extends('layouts.login')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.Customer_Locations') }}"> Customers Locations </a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{ $customer_location->customer->name }}
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{ $customer_location->customer->name }} </h4>
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
                                    <form class="form" action="{{ route('admin.Customer_Location.update',$customer_location->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $customer_location->id }}">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> customer_location Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label> Customer ID </label>
                                                        <select name="customer_id" id="customer_id" class="custom-select">
                                                                <option value="{{ $customer_location->customer->id }}">{{ $customer_location->customer->name }}</option>    
                                                        </select>
                                                        @error("customer_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label> Customer Email </label> 
                                                        <select name="email" id="email" class="custom-select">
                                                            <option value="{{ $customer_location->customer->email }}">{{ $customer_location->customer->email }}</option>    
                                                        </select>
                                                        @error("email")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Address </label>
                                                        <input type="text" value="{{ $customer_location->address }}" id="address"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith@example.com"
                                                               name="address">
                                                        @error("address")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror  
                                                     </div>
                                                </div>        
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Latitude </label>
                                                        <input type="text" value="{{ $customer_location->latitude }}" id="latitude"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith@example.com"
                                                               name="latitude">
                                                        @error("latitude")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror  
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Longitude </label>
                                                        <input type="text" value="{{ $customer_location->longitude }}" id="longitude"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith@example.com"
                                                               name="longitude">
                                                        @error("longitude")
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