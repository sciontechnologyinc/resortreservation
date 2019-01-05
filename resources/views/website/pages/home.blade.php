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
<header>
        <header>
    
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                        @forelse ($galleries as $index => $gallery)
                            @if($index == 0)
                                <div class="carousel-item active" style="background-image: url('/images/{{$gallery->photo}}')">
                                    <div class="carousel-caption d-none d-md-block"></div>
                                </div>
                            @else
                            <div class="carousel-item" style="background-image: url('/images/{{$gallery->photo}}')">
                                    <div class="carousel-caption d-none d-md-block"></div>
                            </div>
                            @endif

                            @empty
                            <div class="carousel-item active" style="background-image: url('/images/defaultslide.jpg')">
                                <div class="carousel-caption d-none d-md-block"></div>
                            </div>
                        @endforelse
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
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        @if ($user = Auth::user())
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p>Please proceed to Reservation</p>
            </div>
            <div class="modal-footer">
                <a href="/bookmassages/create/{{$companyinfo->user_id}}"><button type="button" class="btn btn-success">Proceed</button></a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          @else
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p>Please register or login to continue</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}"><button type="button" class="btn btn-success">Log In</button></a>
              <a href="{{ route('register') }}"><button type="button" class="btn btn-default">Register</button></a>
            </div>
          </div>
          @endif
        </div>
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