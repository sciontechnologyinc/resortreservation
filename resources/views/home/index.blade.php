@extends('website.master.template')

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
          <div class="carousel-item active" style="background-image: url('/images/slider1.png')">
            <div class="carousel-caption d-none d-md-block">
                <h3>Sometimes massage is the only thing that makes sense.</h3>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('/images/slider2.png')">
            <div class="carousel-caption d-none d-md-block">
                <h3>Time spent getting a massage is never wasted.</h3>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('/images/slider3.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Massage is not just a luxury. It's a way of a healthier, happier life.</h3>
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
    <div class="whatsnew">What's New</div>
    <div class="whatsnew-desc">Our therapist - Joy, Dailen, Janet, Joy, Belen and Annaliza’s visit and training in Thailand.</div>
    <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="/images/thaitour1.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/thaitour1.jpg"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="/images/thaitour2.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/thaitour2.jpg"
                         alt="Another alt text">
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="/images/thaitour3.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/thaitour3.jpg"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="/images/thaitour4.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/thaitour4.jpg"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="/images/thaitour5.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/thaitour5.jpg"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="/images/thaitour6.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/thaitour6.jpg"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="/images/thaitour1.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/thaitour1.jpg"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Test1"
                   data-image="/images/thaitour2.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/thaitour2.jpg"
                         alt="Another alt text">
                </a>
            </div>
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