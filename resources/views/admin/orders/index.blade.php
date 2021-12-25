@extends('layouts.admin2')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> Order Details </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main</a>
                            </li>
                            <li class="breadcrumb-item active"> Order Details </li>
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
                                <h3 class="card-title" style="font-weight:bold; font-family: 'Cairo'" >Order Details </h3>
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
                                                <th>Name</th>
                                                <th >Quantity</th>
                                                <th >Price</th>
                                                <th >Total</th>
                                                <th>Payment</th>
                                                <th>Fulfillment</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @isset($data)    
                                            @foreach ($data as $item)
                                                @foreach ($item['line_items'] as $line_item)    
                                                    <tr>
                                                        <td>{{ $line_item['name'] }}</td>
                                                        <td id="qty">{{ $line_item['quantity'] }}</td>
                                                        <td id="price">{{ $line_item['price'] }}</td>
                                                        <td id="total"></td>
                                                        @if ($item['financial_status'] == 'pending')
                                                            <td class="text-warning"> {{ $item['financial_status']}}</td>
                                                        @else
                                                            <td class="text-info"> {{ $item['financial_status']}}</td>
                                                        @endif
                                                        @if ($item['fulfillment_status'] == null)
                                                            <td class="text-warning">{{ 'Unfulfilled' }}</td>
                                                        @else
                                                            <td class="text-info">{{ $item['fulfillment_status']}}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
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
@section('scripts')
<script>
    var myQty = document.getElementById('qty').innerHTML;
    var myPrice = document.getElementById('price').innerHTML;
    console.log(myQty);
    var myTotal = myPrice * myQty;
    document.getElementById('total').innerHTML = myTotal;
</script>
@endsection

{{-- {{ dd($data) }} --}}
