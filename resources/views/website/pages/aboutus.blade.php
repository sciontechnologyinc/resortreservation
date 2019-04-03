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

<header class= "aboutheader">
 <div class="card about1">
        {{-- <div class="aboutmain">
          <h3 class="aboutus1">About Us</h3>
          <p class="aboutus"> 

        </div>     --}}
        <h3 class="mvs">Schedule</h3>

        <div class="sched col-sm-offset-3" style="margin-left:25%">
                @forelse ($schedules as $schedule)
                <div class="form-group row">
                        @if ($schedule->monday == 'on')
                        <label class="col-sm-12 col-form-label"><h5>MONDAY :</h5></label>
                        <div class="col-sm-8" style="display: inline-flex;">
                                <label class="col-sm-2 col-form-label">Day Time</label>
                                <label class="col-sm-2 col-form-label">Time-in</label>
                                <input type="time" class="form-control" name="day_mon_timein" placeholder="" value="{{$schedule->day_mon_timein}}">
                                <input type="text" class="form-control" name="users_id" value="{{Auth::user()->id}}" style="display:none">
                                <label class="col-sm-2 col-form-label">Time-out</label>
                                <input type="time" class="form-control" name="day_mon_timeout" value="{{$schedule->day_mon_timeout}}">
                          </div>
                          <div class="col-sm-8" style="display: inline-flex;">
                                  <label class="col-sm-2 col-form-label">Night Time</label>
                                  <label class="col-sm-2 col-form-label">Time-in</label>
                                  <input type="time" class="form-control" name="night_mon_timein" placeholder="" value="{{$schedule->night_mon_timein}}">
                                  <label class="col-sm-2 col-form-label">Time-out</label>
                                  <input type="time" class="form-control" name="night_mon_timeout" value="{{$schedule->night_mon_timeout}}">
                          </div>
                        @endif
                            
                    </div>
                    <div class="form-group row">
                        @if ($schedule->tuesday == 'on')
                        <label class="col-sm-12 col-form-label"><h5>TUESDAY :</h5></label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_tues_timein" placeholder="" value="{{$schedule->day_tues_timein}}">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_tues_timeout" value="{{$schedule->day_tues_timeout}}">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_tues_timein" placeholder="" value="{{$schedule->night_tues_timein}}">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_tues_timeout" value="{{$schedule->night_tues_timeout}}">
                              </div>
                        @endif

                    </div>
                    <div class="form-group row">
                            @if ($schedule->wednesday == 'on')
                        <label class="col-sm-12 col-form-label"><h5>WEDNESDAY :</h5></label>

                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_wed_timein" placeholder="" value="{{$schedule->day_wed_timein}}">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_wed_timeout" value="{{$schedule->day_wed_timeout}}">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_wed_timein" placeholder="" value="{{$schedule->night_wed_timein}}">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_wed_timeout" value="{{$schedule->night_wed_timeout}}">
                              </div>
                            @endif

                    </div>
                    <div class="form-group row">
                        @if ($schedule->thursday == 'on')
                        <label class="col-sm-12 col-form-label"><h5>THURSDAY :</h5></label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_thurs_timein" placeholder="" value="{{$schedule->day_thurs_timein}}">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_thurs_timeout" value="{{$schedule->day_thurs_timeout}}">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_thurs_timein" placeholder="" value="{{$schedule->night_thurs_timein}}">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_thurs_timeout" value="{{$schedule->night_thurs_timeout}}">
                              </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        @if ($schedule->friday == 'on')
                        <label class="col-sm-12 col-form-label"><h5>FRIDAY :</h5></label>

                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_fri_timein" placeholder="" value="{{$schedule->day_fri_timein}}">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_fri_timeout" value="{{$schedule->day_fri_timeout}}">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_fri_timein" placeholder="" value="{{$schedule->night_fri_timein}}">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_fri_timeout" value="{{$schedule->night_fri_timeout}}">
                              </div>
                        @endif
                    </div>
          
                    <div class="form-group row">
                        @if ($schedule->saturday == 'on')
                            <label class="col-sm-12 col-form-label"><h5>SATURDAY :</h5></label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_sat_timein" placeholder="" value="{{$schedule->day_sat_timein}}">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_sat_timeout" value="{{$schedule->day_sat_timeout}}">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_sat_timein" placeholder="" value="{{$schedule->night_sat_timein}}">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_sat_timeout" value="{{$schedule->night_sat_timeout}}">
                              </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        @if ($schedule->sunday == 'on')
                        <label class="col-sm-12 col-form-label"><h5>SUNDAY :</h5></label>
                              <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_sun_timein" placeholder="" value="{{$schedule->day_sun_timein}}">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_sun_timeout" value="{{$schedule->day_sun_timeout}}">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_sun_timein" placeholder="" value="{{$schedule->night_sun_timein}}">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_sun_timeout" value="{{$schedule->night_sun_timeout}}">
                              </div>
                        @endif

                      </div>
                    @empty
                        NO SCHEDULE YET
                    @endforelse
        </div>   

      <div class="aboutmain">
        <h3 class="mvs">Mission</h3>
        <center><p class="mission">{{$companyinfo->mission}}</p></center>
      </div>   
    
      <div class="aboutmain">
          <h3 class="mvs">Vision</h3>
          <center><p class="vision">{{$companyinfo->vision}}</p></center>
      </div>  
</div> 

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
                            <div class="logo_title"><img src="{{asset('storage/app/public/uploads/').'/'.$companyinfo->photo}}" class="companyLogo"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer Menu -->
                <div class="col-lg-5 footer_col">
                    <div class="footer_menu">
                        
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
@endforeach

@section('script')
    <script>
        $(document).ready(function(){
            $('[type=time]').prop('disabled',true);
        })
    </script>
@endsection
@endsection