@extends('website.master.template')

@section('header')
@foreach ($companyinformation as $companyinfo)

        <li><a href="{{ route('website_chose', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
        <li><a href="{{ route('website_aboutus', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
        <li><a href="{{ url('website/pages/services')}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Services</span></div></a></li>
        <li><a href="{{ url('website/pages/allreservation') }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>reservation</span></div></a></li>
        <li class="profile-hov"> <div class="nav_item d-flex flex-column align-items-center justify-content-center">
@endsection

@section('header2')
        <li><a href="{{ route('website_chose', $companyinfo->user_id) }}">Home</a></li>
        <li><a href="{{ url('nuatthaiaboutus') }}">About us</a></li>
        <li><a href="{{ url('website/pages/services') }}">Services</a></li>
        <li><a href="{{ url('website/pages/reservation') }}">Reservation</a></li>
@endsection
@section('content')
<header>
    
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('/images/image4.jpg')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('/images/image5.jpg')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('/images/image6.jpg')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

<div class="container">

</div>

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
                @endforeach

            </div>
        </div>
</footer>
@endsection

<script>
        $(document).ready( function () {
            $('#table_id').DataTable();
            // $.ajax({
            //     url:'websites/1',
            //     method:'GET',
            //     data:{},
            //     success: function(response){
            //         console.table(response);
            //     }
            // });
        });
</script>
@section('scripts')

@endsection