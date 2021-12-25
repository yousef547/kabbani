@extends('layouts.login')
@section('title')
    Edit Profile
@endsection
            @section('content')
                <h2 class="text-center text-warning my-4">All Customers</h2>
                    <div class="content-body">
                        <!-- DOM - jQuery events table -->
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            @isset($customers)    
                                                @foreach ($customers as $customer)
                                                    <tr class="text-center">
                                                        <td>{{ $customer->name }}</td>
                                                        <td>{{ $customer->email }}</td>
                                                        <td>{{ $customer->phone }}</td>
                                                        <td>{{ $customer->address }}</td>
                                                        <td>{{ $customer->latitude }}</td>
                                                        <td>{{ $customer->longitude }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
            @endsection