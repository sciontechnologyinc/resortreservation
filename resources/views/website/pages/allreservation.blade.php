@extends('website.master.template')
@section('header')
        <li><a href="{{ route('website_chose', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
        <li><a href="{{ route('website_aboutus', $companyinfo->user_id) }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
        <li><a href="{{ url('website_services',$companyinfo->user_id)}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Services</span></div></a></li>
        <li><a href="{{ url('/') }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Resorts</span></div></a></li>
        <li class="profile-hov"> <div class="nav_item d-flex flex-column align-items-center justify-content-center">
@endsection
@section('content')
<div class="container reservation-page">
    <div class="reservation-title mx-0 px-0">RESERVATIONS</div>
    <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No. of Reservation</th>
              <th>Date</th>
              <th>Status</th>
              <th>Paypal</th>
            </tr>
          </thead>
          <tbody>
          @foreach($packages as $package)
            <tr>
              <td>{{ $package->noofreservation }}</td>
              <td>{{ $package->datetime }}</td>
              <td>{{ $package->status }}</td>
              <td><img src="{!! asset('images/PayMaya-logo.png') !!}" height="12%" stlye="margin-bottom:30px"></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    <br/>
</div>
@endsection

