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
                            <li class="breadcrumb-item"><a href="{{ route('admin.wheel') }}"> Weel </a>
                            </li>
                            <li class="breadcrumb-item active"> Add New Weel Gift </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add New Weel Gift </h4>
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
                                    @if (App\Models\Wheel::count() < 8)
                                        <h3>You reached to <span style="color:red"> {{ App\Models\Wheel::count() }} </span> Gifts From <span style="color:red"> 8 </span> Gifts </h3>
                                            <form class="form" action="{{ route('admin.wheel.store') }}" method="POST">
                                                @csrf
                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i> Weels Gifts Data </h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> Wheel Gift Value </label>
                                                                <input type="text" value="" id="value"
                                                                    class="form-control"
                                                                    placeholder="Ex: Discount 10 % "
                                                                    name="value">
                                                                @error("value")
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
                                                        <i class="la la-check-square-o"></i> Save
                                                    </button>
                                                </div>
                                            </form>
                                    @else
                                    <h3> <span style="color: red">Sorry you reached to maximize number of wheel gifts</span></h3>
                                    <br>
                                    <h3> <span style="color: green">You can edit the above throught</span></h3>
                                    <br>
                                    <a href="{{ route('admin.wheel')}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>

                                    @endif
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