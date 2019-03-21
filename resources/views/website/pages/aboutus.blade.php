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

@section('content')

<header class= "aboutheader">
 <div class="card about1">
        {{-- <div class="aboutmain">
          <h3 class="aboutus1">About Us</h3>
          <p class="aboutus"> 

        </div>     --}}
    
      <div class="aboutmain">
        <h3 class="mvs">Mission</h3>
        <center><p class="mission">{{$companyinfo->mission}}</p></center>
      </div>   
    
      <div class="aboutmain">
          <h3 class="mvs">Vision</h3>
          <center><p class="vision">{{$companyinfo->vision}}</p></center>
      </div>  
</div> 
@endforeach

</header>


@endsection

@section('footer')
<footer class="footer">
        <div class="container">
            <div class="row">

                    
                <!-- Footer Logo -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_logo_container">
                        <div class="footer_logo">
                            <a href="#" class="text-center">
                            <div class="logo_title"><img src="{{asset('storage/app/public/uploads/').'/'.$companyinfo->photo}}" class="companyLogo"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer Menu -->
                <div class="col-lg-5 footer_col">
                    <div class="footer_menu">
                        <ul class="d-flex flex-row align-items-start justify-content-start">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Reservation</a></li>
                        </ul>
                        <div class="footer_menu_text">
                            <center><p id="footerText">{{$companyinfo->footerinformation}}</p></center>
                        </div>
                    </div>
                </div>

                <!-- Footer Contact -->
                <div class="col-lg-4 footer_col">
                    <div class="footer_contact clearfix">
                        <div class="footer_contact_content float-lg-right">
                            <ul>
                                <li>Address: <span id="FooterAddress">{{$companyinfo->address}}</span></li>
                                <li>Tel No.: <span id="FooterContact">{{$companyinfo->contactno}}</span></li>
                                <li>Email: <span id="FooterEmail">{{$companyinfo->email}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</footer>
@endsection