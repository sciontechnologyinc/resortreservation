<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resort Reservations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
      @import url(//fonts.googleapis.com/css?family=Lato:400,900);
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

.info-card {
    float: left;
	margin: 10px;
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
}

.back {
	padding: 20px;
	padding-top: 0px;
	width: 100%;
	height: 300px;
	-webkit-transform: rotateY(-180deg);
	overflow: scroll;
}

.info-card:hover .back {
	-webkit-transform: rotateY(0);
}

.info-card:hover .front {
	-webkit-transform: rotateY(180deg);
}
      body {
            background-image: url('/images/background.png');
            background-color: #cccccc;
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
    }
    h4.rc-name {
    color: #d9edf7;
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
  </style>
</head>
<body background="red">

<div class="container">
  <h2 class="resorts-title">Resorts</h2>
        <div class="row">
            @foreach($companyinformations as $companyinformation)
                <div class="col-md-4">
                <div class="info-card">
                    <div class="thumbnail">
                        <div class="front">
                        <img src="{{asset('storage/uploads/').'/'.$companyinformation->photo}}" alt="Resort Logo" style="width:100%">
                        <div class="caption">
                            <center><h4 class="rc-name">{{$companyinformation->companyname}}</h4></center>
                            <center><p class="rc-address">{{$companyinformation->address}}</p></center>
                        </div>
                    </div>
                        <div class="back">
                                <h2>Lorem Ipsum</h2>
                                <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                </p>
                                <button type="button" class="btn btn-info" href="{{ route('website_chose', $companyinformation->user_id) }}">Select Resort</button>
                            </div>
                    </div>
                </div>
                </div>
             @endforeach
        </div>
</div>

</body>
<script>
    $(document).ready(function(){
      
    })
</script>
</html>