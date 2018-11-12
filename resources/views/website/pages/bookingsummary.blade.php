@extends('website.master.template')
@section('header')
    <li><a href="{{ route('website_chose', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
    <li><a href="{{ route('website_aboutus', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
    <li><a href="{{ url('website_services',$companyinfo->user_id)}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Services</span></div></a></li>
    <li><a href="{{ url('/') }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Resorts</span></div></a></li>
    <li class="profile-hov"> <div class="nav_item d-flex flex-column align-items-center justify-content-center">
@endsection
@section('content')
<div class="bookingsummary-title">
    Booking Summary
</div>
<div class="container">
<div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Reservation Information</h4>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control col-lg-12" readonly>
                    </div>
                    <div class="form-group">
                        <label for="contactno">Contact No</label>
                        <input type="text" class="form-control col-lg-12" readonly>
                    </div>
                    <div class="form-group">
                        <label for="noofreservation">No Of Reservation</label>
                        <input type="text" class="form-control col-lg-12" readonly>
                    </div>
                    <div class="form-group">
                        <label for="datetime">Date/Time</label>
                        <input type="text" class="form-control col-lg-12" readonly>
                    </div>
                    <div class="form-group">
                        <label for="package">Package</label>
                        <input type="text" class="form-control col-lg-12" readonly>
                    </div>
                  </div>
                </div>
            </div>
        </div>
</div>

<div class="padding"></div>

@endsection