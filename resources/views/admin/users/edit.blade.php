@extends('layouts.admin2')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.users') }}"> Users </a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{ $user->name }}
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
                                <h4 class="card-title" id="basic-layout-form"> Edit {{ $user->name }} </h4>
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
                                    <form class="form" action="{{ route('admin.user.update',$user->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> User Data </h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group"> 
                                                        <label>  User Name </label>
                                                        <input type="text" value="{{ $user->name }}" id="name"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith"
                                                               name="name">
                                                        @error("name")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"> 
                                                        <label>  User Email </label> 
                                                        <input type="text" value="{{ $user->email }}" id="name"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith@example.com"
                                                               name="email">
                                                        @error("email")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Role Type </label>
                                                        <select name="role_id" id="role_id" class="custom-select">
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}">{{ $role->name }}</option>    
                                                            @endforeach
                                                        </select>
                                                        @error("role_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror  
                                                     </div>
                                                </div>        
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> Seller Name </label>
                                                        <select name="seller_id" id="seller_id" class="custom-select">
                                                            <option value="{{ $user->seller->id }}">{{ $user->seller->seller_name }}</option>                                                                
                                                        </select>
                                                        @error("seller_id")
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