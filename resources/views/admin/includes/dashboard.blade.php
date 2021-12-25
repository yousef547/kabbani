@extends('layouts.admin')
<?php
    use App\Models\Seller;
    use App\Models\MainCategory;
    use App\Models\Category;
    use App\Models\SubCategory;
    use App\Models\Product;

       $sellers = Seller::get();
       $mainCategories = MainCategory::get();
       $categories = Category::get();
       $subCategories = SubCategory::get();
       $products = Product::get();
       foreach ($products as $product);
?>

@section('content')    
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div> 
        @foreach ($sellers as $seller)
            @if(Auth::user()->email == $seller->email)
                    <!-- Candlestick Multi Level Control Chart -->
                <div class="content-body">
                    <div id="crypto-stats-3" class="row"> 
                        <div class="col-xl-4 col-12">
                            <div class="card crypto-card-3 pull-up">
                                <div class="card-content">
                                    <a href="{{ route('admin.products') }}">
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col-2">
                                                <h1><i class="la la-share-alt warning font-large-3"></i></h1>
                                            </div>
                                            <div class="col-6 pl-2">
                                                <h4 class="font-weight-bold mt-1 text-center">Gross Profit</h4>
                                                <h6 class="text-muted"></h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <h4 class="">Total</h4>
                                                <h3 class="success darken-4 font-weight-bold" id="profit"><i class=""></i></h3>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                <div class="row">
                                        <div class="col-12">
                                            <canvas id="btc-chartjs" class="height-75"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="card crypto-card-3 pull-up">
                                <div class="card-content">
                                    <a href="{{ route('admin.categories') }}">
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <div class="col-2">
                                                    <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="Sale"></i></h1>
                                                    <i class="las la-coins"></i>
                                                </div>
                                                <div class="col-6 pl-1">
                                                    <h3 class="font-weight-bold mt-1 text-center">Total Sale</h3>
                                                    <h6 class="text-muted"></h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <h4 class="">Total</h4>
                                                    <h2 class="success darken-4 font-weight-bold" id="totalSale"><i class=""></i></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="row">
                                        <div class="col-12">
                                            <canvas id="eth-chartjs" class="height-75"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="card crypto-card-3 pull-up">
                                <div class="card-content">
                                    <a href="{{ route('admin.subCategories') }}">
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <div class="col-2">
                                                    <h1><i class="cc XRP info font-large-2" total = "Commisions"></i></i></h1>
                                                </div>
                                                <div class="col-6 pl-2">
                                                    <h4 class="font-weight-bold mt-1 text-center">Commissions</h4>
                                                    <h6 class="text-muted"></h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <h4 class="">Total</h4>
                                                    <h2 class="success darken-4 font-weight-bold" id="commissions"><i class=""></i></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="row">
                                        <div class="col-12">
                                            <canvas id="xrp-chartjs" class="height-75"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Candlestick Multi Level Control Chart -->

                    <!-- Sell Orders & Buy Order -->
                        <div class="row match-height">
                            <div class="col-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Best Seller</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <p class="text-success">Total Best Seller : 0 </p>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table table-de mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity Sold</th>
                                                    <th>Selling Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class=" bg-lighten-5">
                                                    <td>Johnson's Baby Lotion</td>
                                                    <td>50 bottles</td>
                                                    <td>38 L.E</td>
                                                </tr>
                                                <tr class="bg-success bg-lighten-5">
                                                    <td>Mustela 123 Vitamin Barrier</td>
                                                    <td>20 bottles</td>
                                                    <td>125 L.E</td>
                                                </tr>
                                                <tr class=" bg-lighten-5">
                                                    <td>Molfix Baby Diapers Size 4</td>
                                                    <td>50 Packet</td>
                                                    <td>150 L.E</td>
                                                </tr>
                                                <tr class="bg-success bg-lighten-5">
                                                    <td>Hero Baby Vanilla (6+ Months)</td>
                                                    <td>113 Pack</td>
                                                    <td>48 L.E</td>
                                                </tr>
                                                <tr class=" bg-lighten-5">
                                                    <td>Johnson's Baby Lotion</td>
                                                    <td>50 bottles</td>
                                                    <td>38 L.E</td>
                                                </tr>
                                                <tr class="bg-success bg-lighten-5">
                                                    <td>Molfix Maxi Baby Diaper</td>
                                                    <td>120 Packet</td>
                                                    <td>85 L.E</td>
                                                </tr>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Out Of Stock</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <p class="text-danger">Total Product Unavaliable: 0 </p>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <div class="table-responsive">
                                                <table class="table table-de mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Selling Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($products as $product)
                                                            @if ($product->main_category_id == $seller->main_category_id)    
                                                            @if ($product->quant == 0)
                                                                <tr class=" bg-lighten-5">
                                                                    <td>{{ $product->product_name }}</td>
                                                                    <td class="text-danger">{{ $product->quant }}</td>
                                                                    <td>{{ $product->price }}</td>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--/ Sell Orders & Buy Order -->

                    <!-- Active Orders -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Orders Details</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <td>
                                                {{-- <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i> Cancel all</button> --}}
                                            </td>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table table-de mb-0 display nowrap table-striped table-bordered scroll-horizontal">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Order Id</th>
                                                    <th>Customer</th>
                                                    <th>Total</th>
                                                    <th>Payment</th>
                                                    <th>Fulfillment</th>
                                                    <th>Items</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="table">
                                                    <?php 
                                                        $data = Http::get('https://5b56453e6397f31b04204cfcdacb92f3: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@kabbanifurniture.myshopify.com/admin/api/2021-04/orders.json?status=any')->json();    
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Active Orders -->
                </div>
            @elseif (Auth::user()->seller_id == $seller->id && Auth::user()->role_id == 3)
                <div class="content-body">
                    <div id="crypto-stats-3" class="row"> 
                        <div class="col-xl-4 col-12">
                            <div class="card crypto-card-3 pull-up">
                                <div class="card-content">
                                    <a href="{{ route('admin.products') }}">
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col-2">
                                                <h1><i class="la la-share-alt warning font-large-3"></i></h1>
                                            </div>
                                            <div class="col-6 pl-2">
                                                <h2 class="font-weight-bold mt-1 text-center">Products</h2>
                                                <h6 class="text-muted"></h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <h4 class="">Total</h4>
                                                <h2 class="success darken-4 font-weight-bold "> {{ Product::where('main_category_id' , $seller->main_category_id)->count() }} <i class=""></i></h2>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                <div class="row">
                                        <div class="col-12">
                                            <canvas id="btc-chartjs" class="height-75"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="card crypto-card-3 pull-up">
                                <div class="card-content">
                                    <a href="{{ route('admin.categories') }}">
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <div class="col-2">
                                                    <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="Products"></i></h1>
                                                </div>
                                                <div class="col-7 pl-1">
                                                    <h2 class="font-weight-bold mt-1 text-center">Categories</h2>
                                                    <h6 class="text-muted"></h6>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <h4 class="">Total</h4>
                                                    <h2 class="success darken-4 font-weight-bold "> {{ Category::where('main_category_id',$seller->main_category_id)->count() }} <i class=""></i></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="row">
                                        <div class="col-12">
                                            <canvas id="eth-chartjs" class="height-75"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="card crypto-card-3 pull-up">
                                <div class="card-content">
                                    <a href="{{ route('admin.subCategories') }}">
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <div class="col-2">
                                                    <h1><i class="cc XRP info font-large-2" title="orders"></i></h1>
                                                </div>
                                                <div class="col-7 pl-2">
                                                    <h4 class="font-weight-bold mt-1 text-center">Sub Categories</h4>
                                                    <h6 class="text-muted"></h6>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <h4 class="">Total</h4>
                                                    <h2 class="success darken-4 font-weight-bold "><i class=""></i>{{ SubCategory::where('main_category_id',$seller->main_category_id)->count() }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="row">
                                        <div class="col-12">
                                            <canvas id="xrp-chartjs" class="height-75"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <!-- Candlestick Multi Level Control Chart -->

                    <!-- Sell Orders & Buy Order -->
                    <div class="row match-height">
                        <div class="col-12 col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Best Seller</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <p class="text-success">Total Best Seller : 0 </p>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-de mb-0">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity Sold</th>
                                                <th>Selling Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class=" bg-lighten-5">
                                                <td>Johnson's Baby Lotion</td>
                                                <td>50 bottles</td>
                                                <td>38 L.E</td>
                                            </tr>
                                            <tr class="bg-success bg-lighten-5">
                                                <td>Mustela 123 Vitamin Barrier</td>
                                                <td>20 bottles</td>
                                                <td>125 L.E</td>
                                            </tr>
                                            <tr class=" bg-lighten-5">
                                                <td>Molfix Baby Diapers Size 4</td>
                                                <td>50 Packet</td>
                                                <td>150 L.E</td>
                                            </tr>
                                            <tr class="bg-success bg-lighten-5">
                                                <td>Hero Baby Vanilla (6+ Months)</td>
                                                <td>113 Pack</td>
                                                <td>48 L.E</td>
                                            </tr>
                                            <tr class=" bg-lighten-5">
                                                <td>Johnson's Baby Lotion</td>
                                                <td>50 bottles</td>
                                                <td>38 L.E</td>
                                            </tr>
                                            <tr class="bg-success bg-lighten-5">
                                                <td>Molfix Maxi Baby Diaper</td>
                                                <td>120 Packet</td>
                                                <td>85 L.E</td>
                                            </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Out Of Stock</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <p class="text-danger">Total Products Out Of Stock: 
                                                {{ Product::where('main_category_id' , $seller->main_category_id)->where( 'quant', 0)->count()}} </p>                                                
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                            <table class="table table-de mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Selling Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                        @if ($product->main_category_id == $seller->main_category_id)    
                                                        @if ($product->quant == 0)
                                                            <tr class=" bg-lighten-5">
                                                                <td>{{ $product->product_name }}</td>
                                                                <td class="text-danger">{{ $product->quant }}</td>
                                                                <td>{{ $product->price }}</td>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Products reached the minimum</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                            <table class="table table-de mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Minimum Quantity</th>
                                                    <th>Selling Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                        @if ($product->main_category_id == $seller->main_category_id)    
                                                        @if ($product->quant <= $product->min_quant && $product->quant > 0 )
                                                            <tr class=" bg-lighten-5">
                                                                <td>{{ $product->product_name }}</td>
                                                                <td class="text-danger">{{ $product->quant }}</td>
                                                                <td class="text-warning">{{ $product->min_quant }}</td>
                                                                <td>{{ $product->price }}</td>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Sell Orders & Buy Order -->
                    <!-- Active Orders -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Product Quantity</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <td>
                                            {{-- <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i> Cancel all</button> --}}
                                        </td>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="arrows">Product Name</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th class="arrows">Quantity</th>
                                                <th class="arrows">Price</th>
                                                <th >Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($products)
                                                @foreach ($products as $product) 
                                                    @foreach ($sellers as $seller)
                                                        @if (Auth::user()->seller_id == $seller->id)
                                                            @if ($product->main_category_id == $seller->main_category_id)
                                                                <tr class="text-center">
                                                                    <td>{{ $product->product_name }}</td>
                                                                    <td>
                                                                        @foreach ($categories as $category)
                                                                            @if ($category->id == $product->category_id)
                                                                                {{ $category->category_name }}
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        @foreach ($subCategories as $subCategory)
                                                                            @if ($subCategory->id == $product->sub_category_id)
                                                                                {{ $subCategory->sub_category_name }}
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td>{{ $product->quant }}</td>
                                                                    <td>{{ $product->price }}</td>
                                                                    <td>
                                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                                            <a href="{{ route('admin.quantity.edit',$product->id) }}" class="btn btn-outline-primary box-shadow-3 mr-1 mb-1">Add Quantity</a>
                                                                            @if (Auth::user()->is_supervisor == 1)
                                                                                <a href="{{ route('admin.product.changeStatus',$product->id) }}" class="btn btn-outline-warning box-shadow-3 mr-1 mb-1">
                                                                                    @if ($product->active == 1)
                                                                                        {{ 'Unactive' }}
                                                                                    @else 
                                                                                        {{ 'Active' }}   
                                                                                    @endif
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Active Orders -->
                </div>
            @endif
        @endforeach
        @if (Auth::user()->is_supervisor == 1)
            <div class="content-body">
                        <div id="crypto-stats-3" class="row"> 
                            <div class="col-xl-4 col-12">
                                <div class="card crypto-card-3 pull-up">
                                    <div class="card-content">
                                        <a href="{{ route('admin.sellers') }}">
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <div class="col-2">
                                                    <h1><i class="la la-share-alt warning font-large-3"></i></h1>
                                                </div>
                                                <div class="col-5 pl-2">
                                                    <h2 class="font-weight-bold mt-1 text-center">Sellers</h2>
                                                    <h6 class="text-muted"></h6>
                                                </div>
                                                <div class="col-5 text-right">
                                                    <h4 class="">Total</h4>
                                                    <h2 class="success darken-4 font-weight-bold "> {{ $sellers->count() }} <i class=""></i></h2>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    <div class="row">
                                            <div class="col-12">
                                                <canvas id="btc-chartjs" class="height-75"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="card crypto-card-3 pull-up">
                                    <div class="card-content">
                                        <a href="{{ route('admin.products') }}">
                                            <div class="card-body pb-0">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="Products"></i></h1>
                                                    </div>
                                                    <div class="col-6 pl-1">
                                                        <h2 class="font-weight-bold mt-1 text-center">Products</h2>
                                                        <h6 class="text-muted"></h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <h4 class="">Total</h4>
                                                        <h2 class="success darken-4 font-weight-bold "> {{ $products->count() }} <i class=""></i></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="row">
                                            <div class="col-12">
                                                <canvas id="eth-chartjs" class="height-75"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="card crypto-card-3 pull-up">
                                    <div class="card-content">
                                        <a href="{{ route('admin.products') }}">
                                            <div class="card-body pb-0">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <h1><i class="cc XRP info font-large-2" title="orders"></i></h1>
                                                    </div>
                                                    <div class="col-5 pl-2">
                                                        <h2 class="font-weight-bold mt-1 text-center">Orders</h2>
                                                        <h6 class="text-muted"></h6>
                                                    </div>
                                                    <div class="col-5 text-right">
                                                        <h4 class="">Total</h4>
                                                        <h2 class="success darken-4 font-weight-bold "> 
                                                            <?php 
                                                                $data = Http::get('https://5b56453e6397f31b04204cfcdacb92f3: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@kabbanifurniture.myshopify.com/admin/api/2021-04/orders/count.json?status=any')->json();    
                                                            ?>
                                                            {{ $data['count'] }}
                                                        <i class=""></i></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="row">
                                            <div class="col-12">
                                                <canvas id="xrp-chartjs" class="height-75"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Candlestick Multi Level Control Chart -->

                        <!-- Sell Orders & Buy Order -->
                        <div class="row match-height">
                            <div class="col-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="../../../kabbani/kabbani/assets/admin/images/icon-dashboard.png" class="w-50" alt="icon">
                                        <h4 class="card-title mt-3">Sales Information</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <p class="text-warning" id="theTotal"></p>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table table-de mb-0">
                                                <thead>
                                                <tr>
                                                    <th>This Week</th>
                                                    <th>This Month</th>
                                                    <th>This Year</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="bg-success bg-lighten-5">
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Store Statistics</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <p class="text-success">Total Earning : 0 L.E</p>
                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        <p>Here you can check all recent activities on your Marketplace Store.</p>
                                    </div>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table table-de mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Store Name</th>
                                                    <th>Products</th>
                                                    <th>Orders</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($sellers as $seller) 
                                                    <!--@foreach ($products as $product) -->
                                                    <!--    @if ($seller->id !== 1)                                 -->
                                                    <!--        <tr class="bg-lighten-5">-->
                                                    <!--            <td>{{ $seller->store_name}}</td>-->
                                                    <!--            <td>-->
                                                    <!--                @if ($product->seller_id == $seller->id)-->
                                                    <!--                    {{ Product::where('main_category_id', $seller->main_category_id)->count() }}-->
                                                    <!--                @endif-->
                                                    <!--            </td>-->
                                                    <!--            <td>0</td>-->
                                                    <!--        </tr>-->
                                                    <!--    @endif -->
                                                    <!--@endforeach-->
                                                @endforeach
                                                </tbody>
                                                <thead>
                                                        <tr>
                                                            <th>Total</th>
                                                            <th>
                                                                    {{ Product::count() }}
                                                            </th>
                                                            <th>0</th>
                                                        </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Sell Orders & Buy Order -->
                        <!-- Active Orders -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Orders Details</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <td>
                                                {{-- <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i> Cancel all</button> --}}
                                            </td>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table table-de mb-0 display nowrap table-striped table-bordered scroll-horizontal">
                                                <thead>
                                                <tr>
                                                    <th class="headerSortDown">Date</th>
                                                    <th class="headerSortDown">Order Id</th>
                                                    <th class="headerSortDown">Customer</th>
                                                    <th class="headerSortDown">Total</th>
                                                    <th class="headerSortDown">Store</th>
                                                    <th class="headerSortDown">Payment</th>
                                                    <th class="headerSortDown">Fulfillment</th>
                                                    <th >Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="table">
                                                    <?php 
                                                        $data = Http::get('https://5b56453e6397f31b04204cfcdacb92f3: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@kabbanifurniture.myshopify.com/admin/api/2021-04/orders.json?status=any&read_all_orders&limit=10')->json();    
                                                    ?>
                                                        @foreach ($data as $items) 
                                                            @foreach ($items as $item)    
                                                                <tr>
                                                                    <td>{{ $item['created_at'] }}</td>
                                                                    <td class="success">{{ $item['order_number'] }}</td>
                                                                    <td>{{ $item['contact_email']}}</td>
                                                                    <td id="total">{{ $item['total_price']}}</td>
                                                                    <td>{{$item['line_items']['0']['vendor']}}</td>
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
                                                                    <td>
                                                                        <a href=" {{ route('admin.orders',$item['id']) }} " class="btn btn-sm round btn-outline-info"> View </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tfoot>
                                                                <tr>
                                                                    <th class="text-center">Total Orders</th>
                                                                    <th class="text-center text-info">
                                                                        <?php 
                                                                            $data = Http::get('https://5b56453e6397f31b04204cfcdacb92f3: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@kabbanifurniture.myshopify.com/admin/api/2021-04/orders/count.json?status=any')->json();    
                                                                        ?>
                                                                        {{$data['count']}}
                                                                    </th>
                                                                    <th class="text-center">Total</th>
                                                                    <th id="myTotal" class="text-info"></th>
                                                                </tr>
                                                            </tfoot>                                         
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Active Orders -->
            </div>           
        @endif
            
    </div>
</div>

<style>
    .headerSortDown:after {
  content: ' ';
  position: relative;
  left: 5px;
  border: 8px solid transparent;
  top: 20px;
  border-top-color: silver;
}

</style>

@endsection
@section('scripts')
<script>
    var table = document.getElementById('table'); 
    var sumVal = 0;   
    var lengtth = table.rows.length;
    console.log (lengtth); 
    for (var i = 0 ; i < table.rows.length ; i ++)
    {
        sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
    }
    console.log (sumVal);
    document.getElementById('myTotal').innerHTML = sumVal;
    var totalSale = document.getElementById('totalSale').innerHTML = sumVal;
    var myTotal = document.getElementById('theTotal').innerHTML = "Total Sales: " + sumVal;
    var commissions = document.getElementById('commissions').innerHTML = sumVal * 10/100;
    var profit = document.getElementById('profit').innerHTML = totalSale - commissions;

</script>
@endsection