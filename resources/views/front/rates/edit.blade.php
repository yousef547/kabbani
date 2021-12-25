@extends('layouts.login')
@section('title')
    Edit Profile
@endsection
@section('content')
<h2 class="text-center text-warning my-4">Edit Customer Profile</h2>
<div class="container">
    <form action="{{ route('customer.update',$customer->id) }}" method="post">
        @csrf
        <div class="form-body">
            <div class="row">    
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> Name </label>
                        <input type="text" value="{{ $customer->name }}" class="form-control" name="name">
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> Email </label>
                        <input type="text" value="{{ $customer->email }}" class="form-control" name="email">
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> Phone </label>
                        <input type="text" value="{{ $customer->phone }}" class="form-control" name="phone">
                        @error("phone")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> New Password </label>
                        <input type="password" value="" class="form-control" name="password">
                        @error("password")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="projectinput1"> Address </label>
                        <input type="text" value="{{ $customer->address }}" class="form-control" name="address[]">
                        @error("address")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="projectinput1"> Latitude </label>
                        <input type="text" value="{{ $customer->latitude }}" class="form-control" name="latitude[]">
                        @error("latitude")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="projectinput1"> Longitude </label>
                        <input type="text" value="{{ $customer->longitude }}" class="form-control" name="longitude[]">
                        @error("longitude")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
