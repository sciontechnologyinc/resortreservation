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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <style>
        .navbar.default-layout .navbar-brand-wrapper .navbar-brand img {
            height: 55px !important;
            width: 100px !important;
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
        @if(Auth::user()->admin=="2")
            <script>
                $('#notificationDropdown').click(function(){
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/notification',
                method:'GET',
                data:{
                  
                },
                success: function(data){
                    $('.notificationtext').text('You have '+data.number+' new notifications')
                    var x = data.notification;
                    for (y=0; y <= x.length; y++){
                        $('.notificationlist').after('<div class="dropdown-divider"></div>'+
                                                    '<a class="dropdown-item preview-item">'+
                                                    '<div class="preview-thumbnail">'+
                                                        '<div class="preview-icon bg-info">'+
                                                            '<i class="mdi mdi-email-outline mx-0"></i>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="preview-item-content">'+
                                                        '<h6 class="preview-subject font-weight-medium text-dark">New Resort Registration</h6>'+
                                                        '<p class="font-weight-light small-text">'+
                                                            x[y].firstname+' '+x[y].lastname+' wants to join !'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</a>')
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url:'notification/update',
                            method:'POST',
                            data:{
                                notification:'1'
                            },
                            success: function(data){
                               
                            }
                        });
                    }
            }

            });
                })
            setInterval(() => {
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                    url:'/notification',
                    method:'GET',
                    data:{
                    },
                    success: function(data){
                        $('.count').text(data.number)
                    }
                });
            }, 1000);
            </script>

        @elseif(Auth::user()->admin == 1)
        <script>
            $('#notificationDropdown').click(function(){
         $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url:'/notification',
         method:'GET',
         data:{
           
         },
         success: function(data){
             var x = data.reservation;
             $('.notificationtext').text('You have '+data.reservednumber+' new notifications')
             for (y=0; y <= x.length; y++){
                 $('.notificationlist').after('<div class="dropdown-divider"></div>'+
                                             '<a class="dropdown-item preview-item">'+
                                             '<div class="preview-thumbnail">'+
                                                 '<div class="preview-icon bg-info">'+
                                                     '<i class="mdi mdi-email-outline mx-0"></i>'+
                                                 '</div>'+
                                             '</div>'+
                                             '<div class="preview-item-content">'+
                                                 '<h6 class="preview-subject font-weight-medium text-dark">New Reservation</h6>'+
                                                 '<p class="font-weight-light small-text">'+
                                                        x[y].code +' Reserved ! Total Amount of '+ x[y].amount+' while Payment is '+ x[y].status+
                                                 '</p>'+
                                             '</div>'+
                                         '</a>')
                                $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        url:'notification/update',
                                        method:'POST',
                                        data:{
                                            notification:'1'
                                        },
                                        success: function(data){
                                            
                                        }
                                    });
                                }
                        }
                        });
            })
                        setInterval(() => {
                            $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                                url:'/notification',
                                method:'GET',
                                data:{
                                },
                                success: function(data){
                                    $('.count').text(data.reservednumber)
                                }
                            });
                        }, 1000);
     </script>

        @endif
</body>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/dashboard.js"></script>
  <script>
      $(document).ready( function () {
        function printData()
          {
            var divToPrint=document.getElementById("datatable");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            
            newWin.print();
            newWin.close();
          }

          $('.print').on('click',function(){
    
            printData();
          })

        $(".activate").on("click", function(){

            if (confirm('Are you sure you want to change the Status of this Account?')) {
               var x = $(this).attr('value');
                if(x == '1'){
                    y = '0';
                }else{
                    y='1';
                }
                
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/amount/activate/'+this.id,
                        method:'POST',
                        data:{
                            active:y
                        },
                        success: function(data){
                            location.reload();
                        }
                    });
            }
        });

// NOTIFICATION
 
        $.ajaxSetup({
      headers: {
        'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
        $('.fa-bell').click(function(){
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
    })
       
    });
  </script>
  @yield('script')
</html>