<!-- Begin Header -->
<?php
    use App\Models\Seller;
    use App\Models\Admin;
    $sellers = Seller::get();
    $admin = Admin::first();
?>
<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">   
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                    class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <img class="brand-logo" alt="modern admin logo"
                             src="../../../../kabbani/kabbani/assets/images/logo-sm.png">
                        <h3 class="brand-text">Kabbani Admin</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                        class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="{{ route('admin_editProfile',Auth::user()->id) }}">
                       <strong> Edit Profile </strong></a>

                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand text-bold-700" href="#">
                        @foreach ($sellers as $seller)    
                            @if(Auth::user()->seller_id == $seller->id)
                                {{ $seller->store_name }}
                            @endif
                        @endforeach
                        
                    </i></a></li>
                    <li class="nav-item d-none d-md-block ml-5 mt-1">
                        @foreach ($sellers as $seller)    
                            @if(Auth::user()->email == $seller->email)
                                <a href="{{ route('admin.dashboard.changeStatus',$seller->id) }}" class="btn btn-outline-warning text-white btn-min-width box-shadow-3 mr-1 mb-1">
                                    @if ($seller->active == 1)
                                        {{ 'Unactive' }}
                                    @else 
                                        {{ 'Active' }}   
                                    @endif
                                </a>
                            @endif
                        @endforeach

                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">Welcome 
                            <span
                                class="user-name text-bold-700">{{ Auth::user()->name }}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img  style="height: 35px;" src="../../kabbani/assets/images/users/user-1.jpg" alt="avatar"><i></i></span>
                        
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin_logout') }}"><i class="ft-power"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!--End  Header -->
<style>
    .bg-info {
        background-color: #D62128!important;
    }
    .brand-logo {
        width:75px !important;
    }

</style>