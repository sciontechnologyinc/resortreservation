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
      body {
            background-image: url('/images/background.png');
            background-color: #cccccc;
            }
    h2{
        color: white;
    }
  </style>
</head>
<body background="red">

<div class="container">
  <h2>Resorts</h2>
        <div class="row">
            @foreach($companyinformations as $companyinformation)
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="{{ route('website_chose', $companyinformation->user_id) }}" >
                    <img src="{{asset('storage/uploads/').'/'.$companyinformation->photo}}" alt="Resort Logo" style="width:100%">
                    <div class="caption">
                        <center><h4>{{$companyinformation->companyname}}</h4></center>
                        <center><p>{{$companyinformation->address}}</p></center>
                    </div>
                    </a>
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