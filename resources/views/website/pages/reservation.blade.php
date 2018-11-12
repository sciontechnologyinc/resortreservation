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
    <div class="reservation-title mx-0 px-0">YOUR RESERVATIONS</div>
    @if ($message = Session::get('success'))
    <div class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
                class="w3-button w3-green w3-large w3-display-topright">&times;</span>
        <p>{!! $message !!}</p>
    </div>
    <?php Session::forget('success');?>
    @endif
 
    @if ($message = Session::get('error'))
    <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
                class="w3-button w3-red w3-large w3-display-topright">&times;</span>
        <p>{!! $message !!}</p>
    </div>
    <?php Session::forget('error');?>
    @endif
    <div class="table-responsive">

        <table class="table table-striped">
          <thead>
            <tr>
              <th>Package Code</th>
              <th>Package Description</th>
              <th>Price</th>
              <th>No. of Reservation</th>
              <th>Date</th>
              <th>Status</th>
              <th>Paypal</th>
            </tr>
          </thead>
          <tbody>
          @foreach($packages as $package)
            <tr>
              <td>{{ $package->packagecode }}</td>
              <td>{{ $package->packagedescription }}</td>
              <td>{{ $package->price }}</td>
              <td>{{ $package->noofreservation }}</td>
              <td>{{ $package->datetime }}</td>
              <td>{{ $package->status }}</td>
            <td><img src="{!! asset('images/paypal.svg') !!}" class="paypal" height="1%" stlye="margin-bottom:30px" id="{{ $package->id }}" value="{{ $package->price }}"> </img></td>
            </tr>
            @endforeach
          </tbody>
        </table>
          <button type="submit" name="your_name" value="your_value" class="btn-link">Go</button>
          <div id="paypalmodal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                      <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{!! URL::to('paypal') !!}">
                        {{ csrf_field() }}
                        <h2 class="w3-text-blue">Payment Form</h2>
                        <p>Demo PayPal form - Integrating paypal in laravel</p>
                        <p>      
                        <label class="w3-text-blue"><b>Enter Amount</b></label>
                        <input class="w3-input w3-border" name="amount"  id="amount" type="text"></p>      
                        <button class="w3-btn w3-blue" id="paypalbtn">Pay with PayPal</button></p>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
      </div>
    <br/>
</div>
@endsection