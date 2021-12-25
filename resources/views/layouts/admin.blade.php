<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Kabbani Admin is super flexible, powerful, clean & modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, Kabbani Admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Kabbani Admin & Dashboard</title>
    <link rel="apple-touch-icon" href="{{ asset('kabbani/assets/images/favicon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('kabbani/assets/images/favicon.png') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/plugins/animate/animate.css') }}">
    <!-- BEGIN VENDOR CSS-->
    <!-- fontawsem -->
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/fontawesome/css/all.min.css') }}">
    <!-- fontawsem -->
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('kabbani/assets/admin/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('kabbani/assets/admin/vendors/css/charts/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/vendors/css/forms/toggle/bootstrap-switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/vendors/css/forms/toggle/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/pages/chat-application.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/custom-rtl.css') }}">



    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/vendors/css/cryptocoins/cryptocoins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/vendors/css/extensions/datedropper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/vendors/css/extensions/timedropper.min.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('kabbani/assets/admin/css/style-rtl.css') }}">
    <!-- END Custom CSS-->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        #map {
            margin: auto;
        }
        .arrows {
            background-image: url(https://cdn.datatables.net/1.10.13/images/sort_both.png);
            background-repeat: no-repeat;
            background-position: right;
            margin-right: 10px;
        }
    </style>
</head>
<body class="vertical-layout vertical-menu 2-columns  @if(Request::is('admin/users/tickets/reply*')) chat-application @endif menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
      
    @include('admin.includes.header')
    @include('admin.includes.sidbar')
    
    @yield('content')
    @include('admin.includes.footer')

    {{-- @include('notify::messages') --}}
   

<!-- BEGIN VENDOR JS-->
<script src="{{asset('kabbani/assets/admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('kabbani/assets/admin/vendors/js/tables/datatable/datatables.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>

<script src="{{asset('kabbani/assets/admin/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('kabbani/assets/admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('kabbani/assets/admin/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>

<script src="{{asset('kabbani/assets/admin/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>

<script src="{{asset('kabbani/kabbani/assets/admin/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('kabbani/assets/admin/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('kabbani/assets/admin/js/scripts/pages/dashboard-crypto.js')}}" type="text/javascript"></script>

<script src="{{asset('kabbani/assets/admin/js/scripts/tables/datatables/datatable-basic.js')}}"
        type="text/javascript"></script>
<script src="{{asset('kabbani/assets/admin/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{asset('kabbani/assets/admin/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>

<script src="{{asset('kabbani/assets/admin/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>

<script>
    $('#meridians1').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians2').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians3').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians4').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians5').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians6').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians7').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians8').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians9').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians10').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians11').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians12').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians13').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians14').timeDropper({
        meridians: true,setCurrentTime: false
    });
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
</script>
    @yield('scripts')
    @section('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(".alertMessage").click(function(e){
        e.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your item been deleted.',
            'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your item is safe :)',
            'error'
                )
            }
        })    
    })
    </script>
</body>
</html>




