@extends('layouts.admin2')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.chat') }}"> Chats </a>
                            </li>
                            <li class="breadcrumb-item active"> Add New Chat </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add New Chat </h4>
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
                                    <form class="form" action="{{ route('admin.chat.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Chat Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> User name </label>
                                                        <select name="user_id" id="user_id" class="custom-select">
                                                            <option value="">Choose User ...</option>    
                                                                @foreach ($customers as $customer)
                                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>    
                                                                @endforeach
                                                        </select>
                                                        @error("user_id")
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="userType" for="projectinput1"> User Type </label>
                                                        <div class="form-check mr-5">
                                                            <input class="form-check-input" name="user_type" id="exampleRadios1" type="radio" value="sender">
                                                            <label class="form-check-label"> Sender </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="user_type" id="exampleRadios2" type="radio" value="receiver">
                                                            <label class="form-check-label"> Receiver </label>
                                                            @error("user_type")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Message </label>
                                                        <input type="text" value="" id="message"
                                                               class="form-control"
                                                               placeholder="Ex: Germany Wood"
                                                               name="message">
                                                        @error("message")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="userType" for="projectinput1"> Chat Image </label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="file" name="photo">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                        @error('photo')
                                                         <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                      
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Chat Date </label>
                                                        <input type="date" id="chat_date"
                                                               class="form-control"
                                                               placeholder="Ex: 01/08/2021 "
                                                               name="chat_date">
                                                        @error("chat_date")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
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

@section('scripts')
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    </script>
@endsection
<style>
    .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        margin-left: -2px !important;
        margin-top: -8px;
        color : #fff000 !important
    }
    .form-check {
        display: inline-block !important;
    }
    .userType {
        display: block;
    }
</style>
