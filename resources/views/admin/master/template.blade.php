<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resort Reservation</title> 
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('vendors/iconfonts/font-awesome/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('vendors/css/vendor.bundle.base.css') !!}">
    <link rel="stylesheet" href="{!! asset('vendors/css/vendor.bundle.addons.css') !!}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script src="{!! asset('website/vendor/jquery/jquery.min.js') !!}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <style>
        .navbar.default-layout .navbar-brand-wrapper .navbar-brand img {
            height: 60px !important;
            width: 140px !important;
        }
    </style>
</head>
<body>
        <div class='main'>
            <div class="flex-center position-ref full-height">
                <div class="container-scroller">
                        @include('admin.partial.header')
                        <div class="container-fluid page-body-wrapper">
                        @include('admin.partial.sidepanel')
                        @yield('content')
                        </div>
                </div>
            </div>
        </div>
</body>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/dashboard.js"></script>
  <script>
      $(document).ready( function () {
        if({{ Auth::user()->admin}} != 2){
            $('.resorts').hide();
        }else{

        }
        $.ajax({
            url:'/websites/showadmin/'+{{ Auth::user()->id }},
            method:'GET',
            data:{},
            success: function(response){
                var websites = response.companyinformation[0];
                $('.companyLogo').attr('src',"{!! asset('storage/app/public/uploads/"+websites.photo+"')!!}");
                $('.logoImage').attr('src',"{!! asset('storage/app/public/uploads/"+websites.photo+"')!!}");
            }
        });
    });
  </script>
</html>