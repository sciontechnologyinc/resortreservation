@extends('website.master.template')
@section('headerLogo')
@endsection

@section('header')
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Services</span></div></a></li>
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Resorts</span></div></a></li>
        <li class="profile-hov"> <div class="nav_item d-flex flex-column align-items-center justify-content-center">
@endsection

@section('header2')
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Resorts</a></li>
@endsection
@section('content')
<div class="container reservation-page">
    <div class="reservation-title mx-0 px-0">Account Reservations</div>
    <div class="table-responsive">
        
        <div class="container col-xl-12">
            <br>
            <br>
            <table id="table_id" class="display" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Reservation</th>
                            <th>Contact No.</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>No. of Reservation</th>
                            <th>Package</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
        </div>
        
    </div>
    <br/>
@endsection