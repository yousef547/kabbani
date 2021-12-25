@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
     
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
    
                    <form action="{{ route('send.notification') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> Product name </label>
                                    <select name="product_id" id="product_id" class="custom-select">
                                        <option value="">Choose Product ...</option>    
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>    
                                            @endforeach
                                    </select>
                                    @error("product_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div> 
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" name="body"></textarea>
                         </div>
                        <!--<div class="col-md-6">-->
                        <!--    <div class="form-group">-->
                        <!--        <label for="projectinput1"> Notification Image </label>-->
                        <!--        <label id="projectinput7" class="file center-block">-->
                        <!--            <input type="file" id="file" name="photo">-->
                        <!--            <span class="file-custom"></span>-->
                        <!--        </label>-->
                        <!--        @error('photo')-->
                        <!--            <span class="text-danger">{{ $message }}</span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>-->
                                                                         
                        <button type="submit" class="btn btn-primary">Send Notification</button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
