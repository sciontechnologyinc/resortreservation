<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Resort Reservation</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('website/styles/bootstrap-4.1.2/bootstrap.min.css') !!}">
    <link href="{!! asset('website/plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('website/plugins/colorbox/colorbox.css') !!}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{!! asset('website/plugins/OwlCarousel2-2.2.1/owl.carousel.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('website/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('website/plugins/OwlCarousel2-2.2.1/animate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('website/styles/main_styles.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('website/styles/news_responsive.css') !!}">
    <link rel="stylesheet" href="{!! asset('https://use.fontawesome.com/releases/v5.0.13/css/all.css') !!}" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <!-- Bootstrap core CSS -->
     <link href="{!! asset('website/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{!! asset('website/css/full-slider.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="{!! asset('website/vendor/jquery/jquery.min.js') !!}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <style>
        img.companyLogo {
            width: 230px !important;
            height: 120px !important;
        }
        h3.mvs,.loc{
            color:#081224 !important;
        }
        p{
            color:#081224 !important;
            padding: 5px !important;
        }
    </style>
</head>
<body>
<div class="super_container">
    @include('website.partial.header')
    @yield('content')
    @yield('footer')
</div>
</body>
    <script src="{!! asset('website/styles/bootstrap-4.1.2/popper.js') !!}"></script>
    <script src="{!! asset('website/styles/bootstrap-4.1.2/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('website/plugins/greensock/TweenMax.min.js') !!}"></script>
    <script src="{!! asset('website/plugins/greensock/TimelineMax.min.js') !!}"></script>
    <script src="{!! asset('website/plugins/scrollmagic/ScrollMagic.min.js') !!}"></script>
    <script src="{!! asset('website/plugins/greensock/animation.gsap.min.js') !!}"></script>
    <script src="{!! asset('website/plugins/greensock/ScrollToPlugin.min.js') !!}"></script>
    <script src="{!! asset('website/plugins/masonry/masonry.js') !!}"></script>
    <script src="{!! asset('website/plugins/easing/easing.js') !!}"></script>
    <script src="{!! asset('website/plugins/parallax-js-master/parallax.min.js') !!}"></script>
    <script src="{!! asset('website/js/news.js') !!}"></script>
    <script src="{!! asset('website/js/function.js') !!}"></script>
    <script src="{!! asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready( function () {
        $('#table_id').DataTable();
        $('.paypal').click(function(){
               $('#amount').val($(this).attr('value'));
               var fullDate = new Date();
               var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) :(fullDate.getMonth()+1);
               var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
                  setTimeout(() => {
                        $( "#paypalbtn" ).trigger( "click" );
                  }, 500);
            })
    });
    </script>
    @yield('scripts');
</html>