<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resort Reservations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
@import url(//fonts.googleapis.com/css?family=Lato:400,900);
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

.info-card {
   
	-webkit-perspective: 600px;
}

.front, .back {
	border-radius: 10px;
	transition: -webkit-transform 1s;
	-webkit-transform-style: preserve-3d;
	-webkit-backface-visibility: hidden;
}

.front {
	padding: 20px;
	overflow: hidden;
	width: 100%;
	height: 300px;
	position: absolute;
    z-index: 1;
    text-align: center; 
}

.back {
	padding: 20px;
	padding-top: 0px;
	width: 100%;
	height: 300px;
	-webkit-transform: rotateY(-180deg);
	
}
[type=reset], [type=submit], button, html [type=button] {
    -webkit-appearance: none;
}
.info-card:hover .back {
	-webkit-transform: rotateY(0);
}

.info-card:hover .front {
	-webkit-transform: rotateY(180deg);
}
.fa-search:hover {
    color: #3e62b6;
}
    h2{
        color: black;
    }
    .thumbnail {
    border: 0.5px solid black !important;
    background-color: transparent !important;
    }
  p.rc-address {
    color: black;
    font-size: 18px;
}
    h4.rc-name {
    color: black;
    font-size: 28px;
}
    .thumbnail:hover {
    border: 0.5px solid #b7b6b6 !important;
    }
    .thumbnail>a>img:hover {
  -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
  -webkit-mask-size: 200%;
  animation: shine 2s infinite;
    }

    @-webkit-keyframes shine {
    from {
        -webkit-mask-position: 150%;
    }
    
    to {
        -webkit-mask-position: -50%;
    }
    }
    h2.resorts-title {
    text-align: center;
    padding: 20px 0px;
    font-size: 40px;
    }
    h2.flip-cname {
    text-align: center;
    font-size: 30px;
    padding: 20px 0px;
}
    .navbar-laravel {
    background-color: #4065b4;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
}
span.caret {
    display: none;
}
a.nav-link {
    font-size: 15px;
    color: white !important;
}
  </style>
</head>
<div class="overlay">
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                ResortReservation
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
<body background="red">
       
<div class="container">
  <h2 class="resorts-title">Resorts</h2>
    <center><div class="form-group" style="display:inline-flex">
        <input type="text" id="code" class="form-control col-lg-12" placeholder="Enter Resorts/Code" style="font-size: 1.9rem;" title="If you are done in Reservation you will received a Code that can enter here to check the Information and status of your Reservation!">
       &nbsp&nbsp&nbsp <i class="fa fa-search fa-2x" ></i>
    </div></center><br>
        <div class="row">
            @foreach($companyinformations as $companyinformation)
                <div class="col-md-4 perResort-container" value="{{$companyinformation->companyname}}">
                <div class="info-card">
                    <div class="thumbnail">
                        <div class="front">
                        <img src="{{asset('storage/app/public/uploads/'.$companyinformation->photo)}}" alt="Resort Logo" style="width:40%">
                        <div class="caption">
                            <center><h4 class="rc-name">{{$companyinformation->companyname}}</h4></center>
                            <center><p class="rc-address">{{$companyinformation->address}}</p></center>
                        </div>
                    </div>
                        <div class="back">
                                <h2 class="flip-cname">{{$companyinformation->companyname}}</h2>
                                <p>
                                        <center><h4 class="rc-name"></h4></center>
                                        <center><p class="rc-address">{{$companyinformation->address}}</p></center>
                                        <center><p class="rc-address">{{$companyinformation->contactno}}</p></center>
                                        <center><p class="rc-address">{{$companyinformation->email}}</p></center>
                                </p>
                                <center> <a type="button" class="btn btn-info" href="{{ route('website_chose', $companyinformation->user_id) }}">View</a></center>
                            </div>
                    </div>
                </div>
                </div>
             @endforeach
            
        </div>
</div>
</div>
<!-- Modal -->
<div id="codeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: inline-block;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reservation</h4>
      </div>
      <div class="modal-body codeBody"  style="font-size:15px">
        <div id="info">
            <center><h3 id="codeLabel"></h3></center><br>
            <div class="form-group">
                    <label>Contact No. :</label>
                    <label id="contact"></label>
            </div>
            <div class="form-group">
                    <label>From :</label>
                    <label id="from"></label>
            </div>
            <div class="form-group">
                    <label>To :</label>
                    <label id="to"></label>
            </div>
            <div class="form-group">
                    <label>Package :</label>
                    <label id="package"></label>
            </div>
            <div class="form-group">
                    <label>Amount :</label>
                    <label id="amount"></label>
            </div>
            <div class="form-group">
                    <label>Status :</label>
                    <label id="status"></label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</div>
<script>
    $(document).ready(function(){
        $("#code").on("keyup", function() {
        var key = this.value;
            $(".perResort-container").each(function() {
            var $this = $(this);
                $this.toggle($(this).attr('value').toLowerCase().indexOf(key) >= 0)
            });
        });

       $('.fa-search').click(function(){
           if($('#code').val() == '')
           {
               return false;
           }
           $('#codeModal').modal('show');
           $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/amount/reserve/'+$('#code').val(),
                method:'POST',
                data:{
                },
                success: function(response){
                            if(response.reserved.length == '')
                            {
                                $('#info').hide()
                                $('.remove').empty();
                                $('.codeBody').append(' <center class="remove"><h3 id="invalid">Invalid Code</h3></center><br>')
                            }else{
                            $('#info').show()
                            var x = response.reserved[0];
                            $('#codeLabel').text(x.code);
                            $('#contact').text(x.contactno);
                            $('#from').text(x.start_date);
                            $('#to').text(x.end_date);
                            $('#time').text(x.daytime);
                            $('#amount').text(x.amount);
                            $('#status').text(x.status);
                            $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url:'/amount/package/'+x.package,
                                    method:'POST',
                                    data:{
                                    },
                                    success: function(response){
                                                var y = response.codePackage[0];
                                                $('#package').text(y.packagedescription);
                                                $('.remove').empty();
                                            }
                                });
                            }
                        }
            });
       })
    })
</script>
</html>