@extends('website.master.template')
@section('header')
@foreach ($companyinformation as $companyinfo)
        <li><a href="{{ route('website_chose', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
        <li><a href="{{ route('website_aboutus', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
        <li><a href="{{ route('website_services', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Services</span></div></a></li>
        <li><a href="{{ url('website/pages/allreservation') }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>reservation</span></div></a></li>
        <li class="profile-hov"> <div class="nav_item d-flex flex-column align-items-center justify-content-center">
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
    <div class="aboutmain">
        <h3 class="loc">Location</h3>
        <p class="loc2"> <b></b>{{$companyinfo->address}}<i> </i> </p>
        <div class="nt_gmap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241.18998419844064!2d121.02091388489778!3d14.710344364049392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b11799f5a5bf%3A0xd007e2008613fdea!2sNuat+Thai!5e0!3m2!1sen!2sph!4v1535485215614" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
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
                            <div class="logo_title"><img src="{{asset('storage/uploads/').'/'.$companyinfo->photo}}" class="companyLogo"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer Menu -->
                <div class="col-lg-5 footer_col">
                    <div class="footer_menu">
                        <ul class="d-flex flex-row align-items-start justify-content-start">
                            <li><a href="{{ url('nuatthaihome')}}">Home</a></li>
                            <li><a href="{{ url('nuatthaiaboutus')}}">About us</a></li>
                            <li><a href="{{ url('website/pages/services')}}">Services</a></li>
                            <li><a href="{{ url('website/pages/allreservation') }}">Reservation</a></li>
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