<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Kabbani Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../kabbani/assets/images/favicon.png">

        <!-- App css -->
        <link href="../kabbani/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../kabbani/assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="../kabbani/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../kabbani/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../kabbani/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container mt-4">
            <div class="row vh-100 ">
                <div class="col-12 align-self-center">
                    <div class="auth-page">
                        <div class="card auth-card shadow-lg">
                            <div class="card-body" style="height: 450px">
                                <div class="px-3">
                                    <div class="auth-logo-box">
                                        <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="../kabbani/assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                                    </div><!--end auth-logo-box-->
                                     <!-- begin alert section-->
                                    <!-- end alert section-->
                                    <div class="text-center auth-logo-text">
                                        
                                        <h4 class="mt-0 mb-3 mt-5">Let's Get Started</h4>
                                        <p class="text-muted mb-0">Sign in to continue to Kabbani Dashboard.</p>  
                                    </div> <!--end auth-logo-text-->  
                                            @include('admin.includes.alerts.errors')
                                            @include('admin.includes.alerts.success')
                                        <form class="form-horizontal auth-form my-4" action="{{ route('admin_handleLogin') }}" method="post" novalidate>
                                            @csrf
                                        <div class="form-group">
                                            <label for="username">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i> 
                                                </span>                                                                                                              
                                                <input type="text" name="email" class="form-control" id="username" placeholder="Enter Email">
                                            </div>                                    
                                            @error('email')
                                                <div class="error">{{ $message }}</div>
                                            @enderror 
                                        </div><!--end form-group--> 
            
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i> 
                                                </span>                                                       
                                                <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter Password">
                                            </div> 
                                            @error('password')
                                                <div class="error">{{ $message }}</div>
                                            @enderror 
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="sumbit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                </div><!--end /div-->                                
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end auth-page-->
                </div><!--end col-->           
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        


        <!-- jQuery  -->
        <script src="../kabbani/assets/js/jquery.min.js"></script>
        <script src="../kabbani/assets/js/jquery-ui.min.js"></script>
        <script src="../kabbani/assets/js/bootstrap.bundle.min.js"></script>
        <script src="../kabbani/assets/js/metismenu.min.js"></script>
        <script src="../kabbani/assets/js/waves.js"></script>
        <script src="../kabbani/assets/js/feather.min.js"></script>
        <script src="../kabbani/assets/js/jquery.slimscroll.min.js"></script>        

        <!-- App js -->
        <script src="../kabbani/assets/js/app.js"></script>
        
    </body>

</html>