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
                            <li class="breadcrumb-item"><a href="{{ route('admin.installments') }}"> Installment </a>
                            </li>
                            <li class="breadcrumb-item active"> Add Installment </li>
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
                                <h4 class="card-title" id="basic-layout-form"> Add Installment </h4>
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
                                    <form class="form" action="{{ route('admin.installments.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label> Installment Image </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Installment Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Installment Name </label>
                                                        <input type="text" value="" id="installment_name"
                                                               class="form-control"
                                                               placeholder="Ex: Installment Online"
                                                               name="installment_name">
                                                        @error("installment_name")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Arabic Installment Name </label>
                                                        <input type="text" value="" id="installment_name_ar"
                                                               class="form-control"
                                                               placeholder="Ex:?????????????? ?????? ????????"
                                                               name="installment_name_ar">
                                                        @error("installment_name_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Installment Type </label>
                                                        <input type="text" value="" id="installment_type"
                                                               class="form-control"
                                                               placeholder="Ex: Misr Bank Visa"
                                                               name="installment_type">
                                                        @error("installment_type")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Arabic Installment Type </label>
                                                        <input type="text" value="" id="installment_type_ar"
                                                               class="form-control"
                                                               placeholder="Ex: ???????? ?????????????? ?????? ??????"
                                                               name="installment_type_ar">
                                                        @error("installment_type_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Description </label>
                                                        <input type="text" value="" id="description"
                                                               class="form-control"
                                                               placeholder="Ex: 6 Monthes without Fees"
                                                               name="description">
                                                        @error("description")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Arabic Description </label>
                                                        <input type="text" value="" id="description_ar"
                                                               class="form-control"
                                                               placeholder="Ex: 6 ???????? ???????? ??????????"
                                                               name="description_ar">
                                                        @error("description_ar")
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