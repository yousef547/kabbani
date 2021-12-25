@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> New Arrival Items  </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item active"> Count Down Items </li>
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
                                <h3 class="card-title" style="font-weight:bold; font-family: 'Cairo'"> All Count Down Items </h3>
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
                                                <th style="width: 25%">Title</th>
                                                <th style="width: 25%">Title in Arabic</th>
                                                <th style="width: 25%">Days</th>
                                                <th style="width: 25%">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($countDowns) 
                                                @foreach ($countDowns as $countDown)
                                                    <tr class="text-center">
                                                        <td>{{ $countDown->title }}</td>
                                                        <td>{{ $countDown->title_ar }}</td>
                                                        <td>{{ $countDown->days }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="{{ route('admin.countDowns.edit',$countDown->id) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                                                <a onclick="return myFunction();" href="{{ route('admin.countDowns.delete',$countDown->id) }}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
                                                                <a href="{{ route('admin.countDowns.changeStatus',$countDown->id) }}" class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    @if ($countDown->active == 1)
                                                                        {{ 'Unactive' }}
                                                                    @else 
                                                                        {{ 'Active' }}   
                                                                    @endif
                                                                </a>
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