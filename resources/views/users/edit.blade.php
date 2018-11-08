@extends('website.master.template')

@section('content')

@extends('website.master.template')

@section('content')
<div class="container reservation-page">
    <div class="reservation-title mx-0 px-0">Account Settings</div>
 <form method="post" action="{{route('users.update', $user)}}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name"  value="{{ $user->name }}" class="form-control col-lg-12"/>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email"  value="{{ $user->email }}" class="form-control col-lg-12"/>
        </div>
        <div class="form-group">
            <label for="contactno">Contact No.</label>
            <input type="number" name="contactno" value="{{ $user->contactno }}"class="form-control col-lg-12">
        </div>
        <div class="form-group">
            <label for="contactno">Password</label>
            <input type="password" name="password" class="form-control col-lg-12"/>
        </div>  
        <div class="form-group">
            <label for="contactno">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control col-lg-12"/>
        </div>
        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
    </form>
    <br>
</div>
    @endsection