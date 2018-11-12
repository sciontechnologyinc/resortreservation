@extends('website.master.template')
@foreach ($companyinformation as $companyinfo)
@section('headerLogo')
    {{$companyinfo->companyname}}
@endsection

@section('header')
        <li><a href="{{ route('website_chose', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
        <li><a href="{{ route('website_aboutus', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
        <li><a href="{{ url('websites/services/'.$companyinfo->user_id)}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Services</span></div></a></li>
        <li><a href="{{ url('/') }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Resorts</span></div></a></li>
        <li class="profile-hov"> <div class="nav_item d-flex flex-column align-items-center justify-content-center">
@endsection

@section('header2')
        <li><a href="{{ route('website_chose', $companyinfo->user_id) }}">Home</a></li>
        <li><a href="{{ route('website_aboutus', $companyinfo->user_id) }}">About us</a></li>
        <li><a href="{{ route('website_services', $companyinfo->user_id)}}">Services</a></li>
        <li><a href="{{ url('/') }}">Resorts</a></li>
@endsection
@endforeach
@section('content')

<style>
.card-container {
    display: grid;
    padding: 1rem;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    grid-gap: 1rem;
}
.card {
    display: grid;
}
.card .button {
    align-self: end;
}

.service-price {
    text-align: center;
    font-size: 22px;
    color: #3f3f3f;
}
/* Simple Card styles for prettying */

html {
    font-size: 16px;
    font-family: 'Open Sans', 'Helvetica Neue', 'Arial', sans-serif;
}

body {
    background-color: #efefef;
}
* {
    box-sizing: border-box;
}
.card {
    box-shadow: 0px 1px 5px #555;
    background-color: white;
}
.card__title {
    font-size: 2rem;
    padding: .5rem;
}
.card__description {
    padding: 20px 0px;
    line-height: 1.6em;
}
main.card__description {
    text-align: center;
}
header.card__title {
    text-align: center;
    color:#383838;
}
article.card {
    cursor: pointer;
}
article.card.servicesper {
    background: url(/images/welcome-cover.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    width: 70%;
    margin: auto;
}
.overlay {
    background: rgb(255, 255, 255, 0.7);
}
.container.services {
    border-top: 1px solid #d6d6d6;
}
</style>

<header class= "aboutheader">
 <div class="card about1">
    <div class="whitebg1">
    <div class="services-title">Services/Packages</div>
    </div>
</div>   
<section class="card-container" >
    @foreach($packages as $package)
    <article class="card servicesper" data-toggle="modal" data-target="#{{$package->id }}">
    <div class="overlay">
        <header class="card__title">
            <h3>{{ $package->packagecode }} </h3>
        </header>
        <main class="card__description">
           <div class="services-img"><img src="{{asset('storage/uploads/'.$package->photo)}}" alt=""></div>
        </main>
    </div>
    </article>
    @endforeach

</section>
@foreach($packages as $package)
<div class="modal fade" id="{{$package->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $package->packagecode }} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {{ $package->packagedescription }}<br>
      Php. {{ $package->price }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<div class="container services">
  <h2></h2>
   <section class="customer-logos slider">
      <div class="slide"><img src="/images/image1.jpg"></div>
      <div class="slide"><img src="/images/image2.jpg"></div>
      <div class="slide"><img src="/images/image3.jpg"></div>
      <div class="slide"><img src="/images/image4.jpg"></div>
      <div class="slide"><img src="/images/image5.jpg"></div>
      <div class="slide"><img src="/images/image6.jpg"></div>
      <div class="slide"><img src="/images/image7.jpg"></div>
      <div class="slide"><img src="/images/image8.jpg"></div>
      <div class="slide"><img src="/images/image9.jpg"></div>
      <div class="slide"><img src="/images/image10.jpg"></div>
   </section>
</div>

<div class="padding"></div>
</header>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection