@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> Installments  </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item active"> Installments </li>
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
                                <h3 class="card-title" style="font-weight:bold; font-family: 'Cairo'" >All Installments </h3>
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
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Installment Name</th>
                                                <th>Arabic Installment Name</th>
                                                <th>Installment Type</th>
                                                <th>Arabic Installment Type Name</th>
                                                <th>Installment Image</th>
                                                {{-- <th class="width:20%">Description</th>
                                                <th class="width:20%">Arabic Description</th> --}}
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($installments)    
                                                @foreach ($installments as $installment)
                                                    <tr class="text-center">
                                                        <td>{{ $installment->installment_name }}</td>
                                                        <td>{{ $installment->installment_name_ar }}</td>
                                                        <td>{{ $installment->installment_type }}</td>
                                                        <td>{{ $installment->installment_type_ar }}</td>
                                                        <td><img src="{{ $installment->photo }}" class="w-50"></td>
                                                        {{-- <td>{{ $installment->description }}</td>
                                                        <td>{{ $installment->description_ar }}</td> --}}
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="{{ route('admin.installments.edit',$installment->id) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                                                <a href="{{ route('admin.installments.delete',$installment->id) }}" class="alertMessage btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
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

@endsection