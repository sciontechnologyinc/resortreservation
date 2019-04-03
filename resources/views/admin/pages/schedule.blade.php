@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Schedule</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Resort Schedule</h4>
                  {!! Form::open(['id' => 'dataForm', 'url' => '/schedule/store']) !!}
                  @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    @if(count($errors) > 0 )
                        <div class="alert alert-danger">
                            <strong>Whoooppss !!</strong> There were some problem with your input. <br>
                            <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @forelse ($schedules as $schedule)
                    {{-- ALREADY HAVE SCHEDULE --}}
                    <input type="text" class="form-control" name="monday" value="{{$schedule->monday}}" style="display:none">
                    <input type="text" class="form-control" name="tuesday" value="{{$schedule->tuesday}}" style="display:none">
                    <input type="text" class="form-control" name="wednesday" value="{{$schedule->wednesday}}" style="display:none">
                    <input type="text" class="form-control" name="thursday" value="{{$schedule->thursday}}" style="display:none">
                    <input type="text" class="form-control" name="friday" value="{{$schedule->friday}}" style="display:none">
                    <input type="text" class="form-control" name="saturday" value="{{$schedule->saturday}}" style="display:none">
                    <input type="text" class="form-control" name="sunday" value="{{$schedule->sunday}}" style="display:none">
                    <div class="form-group row">
                        @if ($schedule->monday == 'on')
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Monday" value="Monday"><span><input type="checkbox" name="" id="mon" checked></span>&nbsp&nbsp Monday</label>
                        @else
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Monday" value="Monday"><span><input type="checkbox" name="" id="mon"></span>&nbsp&nbsp Monday</label>
                        @endif
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
                    </div>
                    <div class="form-group row">
                        @if ($schedule->tuesday == 'on')
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Tuesday" value="Tuesday"><span><input type="checkbox" name="" id="tues" checked></span>&nbsp&nbsp Tuesday</label>
                        @else
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Tuesday" value="Tuesday"><span><input type="checkbox" name="" id="tues"></span>&nbsp&nbsp Tuesday</label>
                        @endif
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
                    </div>
                    <div class="form-group row">
                            @if ($schedule->wednesday == 'on')
                                <label for="inputPassword" class="col-sm-12 col-form-label" name="Wednesday" value="Wednesday"><span><input type="checkbox" name="" id="wed" checked></span>&nbsp&nbsp Wednesday</label>
                            @else
                                <label for="inputPassword" class="col-sm-12 col-form-label" name="Wednesday" value="Wednesday"><span><input type="checkbox" name="" id="wed"></span>&nbsp&nbsp Wednesday</label>
                            @endif
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
                    </div>
                    <div class="form-group row">
                        @if ($schedule->thursday == 'on')
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Thursday" value="Thursday"><span><input type="checkbox" name="" id="thur" checked></span>&nbsp&nbsp Thursday</label>
                        @else
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Thursday" value="Thursday"><span><input type="checkbox" name="" id="thur"></span>&nbsp&nbsp Thursday</label>
                        @endif
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
                    </div>
                    <div class="form-group row">
                        @if ($schedule->friday == 'on')
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Friday" value="Friday"><span><input type="checkbox" name="" id="fri" checked></span>&nbsp&nbsp Friday</label>
                        @else
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Friday" value="Friday"><span><input type="checkbox" name="" id="fri"></span>&nbsp&nbsp Friday</label>
                        @endif
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
                    </div>
          
                    <div class="form-group row">
                        @if ($schedule->saturday == 'on')
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Saturday" value="Saturday"><span><input type="checkbox" name="" id="sat" checked></span>&nbsp&nbsp Saturday</label>
                        @else
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Saturday" value="Saturday"><span><input type="checkbox" name="" id="sat"></span>&nbsp&nbsp Saturday</label>
                        @endif
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
                    </div>
                    <div class="form-group row">
                        @if ($schedule->sunday == 'on')
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Sunday" value="Sunday"><span><input type="checkbox" name="" id="sun" checked></span>&nbsp&nbsp Sunday</label>
                        @else
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Sunday" value="Sunday"><span><input type="checkbox" name="" id="sun"></span>&nbsp&nbsp Sunday</label>
                        @endif
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
                      </div>
                    @empty
                    {{-- EMPTY --}}
                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Monday" value="Monday"><span><input type="checkbox" name="" id="mon"></span>&nbsp&nbsp Monday</label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                  <label class="col-sm-2 col-form-label">Day Time</label>
                                  <label class="col-sm-2 col-form-label">Time-in</label>
                                  <input type="time" class="form-control" name="day_mon_timein" placeholder="" value="08:00:00">
                                  <input type="text" class="form-control" name="users_id" value="{{Auth::user()->id}}" style="display:none">
                                  <label class="col-sm-2 col-form-label">Time-out</label>
                                  <input type="time" class="form-control" name="day_mon_timeout" value="17:00:00">
                            </div>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Night Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="night_mon_timein" placeholder="" value="08:00:00">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="night_mon_timeout" value="17:00:00">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Tuesday" value="Tuesday"><span><input type="checkbox" name="" id="tues"></span>&nbsp&nbsp Tuesday</label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_tues_timein" placeholder="" value="08:00:00">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_tues_timeout" value="17:00:00">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_tues_timein" placeholder="" value="08:00:00">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_tues_timeout" value="17:00:00">
                              </div>
                            
                    </div>
                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Wednesday" value="Wednesday"><span><input type="checkbox" name="" id="wed"></span>&nbsp&nbsp Wednesday</label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_wed_timein" placeholder="" value="08:00:00">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_wed_timeout" value="17:00:00">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_wed_timein" placeholder="" value="08:00:00">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_wed_timeout" value="17:00:00">
                              </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Thursday" value="Thursday"><span><input type="checkbox" name="" id="thur"></span>&nbsp&nbsp Thursday</label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_thurs_timein" placeholder="" value="08:00:00">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_thurs_timeout" value="17:00:00">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_thurs_timein" placeholder="" value="08:00:00">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_thurs_timeout" value="17:00:00">
                              </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-12 col-form-label" name="Friday" value="Friday"><span><input type="checkbox" name="" id="fri"></span>&nbsp&nbsp Friday</label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_fri_timein" placeholder="" value="08:00:00">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_fri_timeout" value="17:00:00">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_fri_timein" placeholder="" value="08:00:00">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_fri_timeout" value="17:00:00">
                              </div>
                    </div>
          
                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Saturday" value="Saturday"><span><input type="checkbox" name="" id="sat"></span>&nbsp&nbsp Saturday</label>
                            <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_sat_timein" placeholder="" value="08:00:00">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_sat_timeout" value="17:00:00">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_sat_timein" placeholder="" value="08:00:00">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_sat_timeout" value="17:00:00">
                              </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-12 col-form-label" name="Sunday" value="Sunday"><span><input type="checkbox" name="" id="sun"></span>&nbsp&nbsp Sunday</label>
                              <div class="col-sm-8" style="display: inline-flex;">
                                    <label class="col-sm-2 col-form-label">Day Time</label>
                                    <label class="col-sm-2 col-form-label">Time-in</label>
                                    <input type="time" class="form-control" name="day_sun_timein" placeholder="" value="08:00:00">
                                    <label class="col-sm-2 col-form-label">Time-out</label>
                                    <input type="time" class="form-control" name="day_sun_timeout" value="17:00:00">
                              </div>
                              <div class="col-sm-8" style="display: inline-flex;">
                                      <label class="col-sm-2 col-form-label">Night Time</label>
                                      <label class="col-sm-2 col-form-label">Time-in</label>
                                      <input type="time" class="form-control" name="night_sun_timein" placeholder="" value="08:00:00">
                                      <label class="col-sm-2 col-form-label">Time-out</label>
                                      <input type="time" class="form-control" name="night_sun_timeout" value="17:00:00">
                              </div>
                              <input type="text" class="form-control" name="monday" value="off" style="display:none">
                            <input type="text" class="form-control" name="tuesday" value="off" style="display:none">
                            <input type="text" class="form-control" name="wednesday" value="off" style="display:none">
                            <input type="text" class="form-control" name="thursday" value="off" style="display:none">
                            <input type="text" class="form-control" name="friday" value="off" style="display:none">
                            <input type="text" class="form-control" name="saturday" value="off" style="display:none">
                            <input type="text" class="form-control" name="sunday" value="off" style="display:none">

                      </div>
                    @endforelse
                    
                      <div class="form-group row">
                              <div class="col-sm-8 col-sm-offset-7" style="display: inline-flex;">
                                    {!!Form::submit('Save', ['id' => 'addForm','class' => 'btn btn-success mr-2']) !!}
                              </div>
                      </div>
               
                </div>
              </div>
              {!! Form::close() !!}
            </div>
    </div>
</div>
@section('script')
    <script>
        $(document).ready(function(){
            $('#mon').change(function(){
                if($('#mon'). prop("checked") == true){
                    $('[name=monday]').val('on')
                }else{
                    $('[name=monday]').val('off')
                }
            })
            $('#tues').change(function(){
                if($('#tues'). prop("checked") == true){
                    $('[name=tuesday]').val('on')
                }else{
                    $('[name=tuesday]').val('off')
                }
            })
            $('#wed').change(function(){
                if($('#wed'). prop("checked") == true){
                    $('[name=wednesday]').val('on')
                }else{
                    $('[name=wednesday]').val('off')
                }
            })
            $('#thur').change(function(){
                if($('#thur'). prop("checked") == true){
                    $('[name=thursday]').val('on')
                }else{
                    $('[name=thursday]').val('off')
                }
            })
            $('#fri').change(function(){
                if($('#fri'). prop("checked") == true){
                    $('[name=friday]').val('on')
                }else{
                    $('[name=friday]').val('off')
                }
            })
            $('#sat').change(function(){
                if($('#sat'). prop("checked") == true){
                    $('[name=saturday]').val('on')
                }else{
                    $('[name=saturday]').val('off')
                }
            })
            $('#sun').change(function(){
                if($('#sun'). prop("checked") == true){
                    $('[name=sunday]').val('on')
                }else{
                    $('[name=sunday]').val('off')
                }
            })
        })
    </script>
@endsection
@endsection
