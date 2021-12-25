@extends('layouts.login')
@section('content')
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> Create Rate for {{ $product->product_name }} </h4>
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
                                    <form class="form" action="{{ route('front.rate.store') }}" method="POST">
                                        @csrf
                                        @isset($customers)     
                                            @foreach ($customers as $customer)
                                                @if ($customer->email == Auth::guard('customer')->user()->email) 
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label> Product Name </label>
                                                            <select name="product_id" id="product_id" class="custom-select"> 
                                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>    
                                                            </select>
                                                        @error("product_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label> Email </label>
                                                        <input type="text" value="{{ $customer->email }}" id="email"
                                                               class="form-control"
                                                               placeholder="Ex: John@Smith.com"
                                                               name="email">
                                                        @error("email")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label>  Rate </label>
                                                        <input type="text" value="" id="rate"
                                                               class="form-control"
                                                               placeholder="Ex: 1 , 3.5 , 5"
                                                               name="rate">
                                                        @error("rate")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label> Message </label>
                                                        <input type="text" value="" id="message"
                                                               class="form-control"
                                                               placeholder="Ex: Your Openion"
                                                               name="message">
                                                        @error("message")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                                @endif
                                            @endforeach
                                        @endisset
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