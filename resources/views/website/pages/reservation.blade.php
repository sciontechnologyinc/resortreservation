@extends('website.master.template')
@section('headerLogo')
@endsection

@section('header')
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Services</span></div></a></li>
        <li><a href="{{ url('/') }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Resorts</span></div></a></li>
        <li class="profile-hov"> <div class="nav_item d-flex flex-column align-items-center justify-content-center">
@endsection

@section('header2')
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="{{ url('/') }}">Resorts</a></li>
@endsection
@section('content')
<div class="container reservation-page">
    <div class="reservation-title mx-0 px-0">YOUR RESERVATIONS</div>
    @if ($message = Session::get('success'))
    <div class="container">
      <div class="alert alert-success">
        <strong>Success!</strong> {!!$message!!}.
      </div>
    </div>
    <?php Session::forget('success');?>
    @endif
 
    @if ($message = Session::get('error'))
    <div class="container">
      <div class="alert alert-danger">
        <strong>Success!</strong> {!!$message!!}.
      </div>
    </div>
    <?php Session::forget('error');?>
    @endif
    <div class="table-responsive">

     
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