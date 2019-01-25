<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resort Reservations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
body {
    background-image: url(/images/resort_bg.jpg);
    background-color: #cccccc;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: -webkit-fill-available;
    background-attachment: fixed;
}
    h2{
        color: white;
    }
    .thumbnail {
    border: 0.5px solid #b7b6b61a !important;
    background-color: transparent !important;
    }
  p.rc-address {
    color: #d9edf7;
    font-size: 18px;
}
    h4.rc-name {
    color: #d9edf7;
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
    background-color: transparent;
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
.overlay {
    height: -webkit-fill-available;
    background: rgba(0,0,0,0.5);
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
        <div class="row">
            @foreach($companyinformations as $companyinformation)
                <div class="col-md-4">
                <div class="info-card">
                    <div class="thumbnail">
                        <div class="front">
                        <img src="{{asset('storage/uploads/'.$companyinformation->photo)}}" alt="Resort Logo" style="width:100%">
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
</body>
</div>
<script>
    $(document).ready(function(){
      
    })
</script>
</html>