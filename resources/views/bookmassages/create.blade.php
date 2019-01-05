@extends('website.master.template')
@section('headerLogo')
 
@endsection

@section('header')
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
        <li><a href="#}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
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
    <div class="reservation-title mx-0 px-0">RESERVATIONS</div>
    {!! $bookmassages->calendar() !!}
</div>
<br/>
 {!! $bookmassages->script() !!}
 <!-- Modal -->
 <div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         {!! Form::open(['id' => 'dataForm', 'url' => '/bookmassages', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Reservation Information</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
             <div class="container">
                 <div class="row">
                     <div class="col-md-12 grid-margin stretch-card">
                         <div class="card">
                             <div class="card-body">
                                 <div class="form-group">
                                 {!!Form::label('fullname', 'Full Name', array('class' => 'form-control-label'))!!}
                                 {!!Form::text('fullname', Auth::user()->name , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                               @foreach ($companyinformation as $companyinfo)
                                 {!!Form::text('user_id', $companyinfo->user_id , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '','hidden' ])!!}
                               @endforeach

                                 </div>
                                 <div class="form-group">
                                 {!!Form::label('contactno', 'Contact No', array('class' => 'form-control-label'))!!}
                                 {!!Form::text('contactno',Auth::user()->contactno , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                                 </div>
                                 <div class="form-group">
                                 {!!Form::label('datetime', 'Date/Time', array('class' => 'form-control-label'))!!}
                                 {!!Form::date('resvdate',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                                 <br/>
                                 {!!Form::time('resvtime',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                                 </div>
                                 <div class="form-group">
                                    {!!Form::label('noofhours', 'No. of hours', array('class' => 'form-control-label'))!!}
                                    <div class="iconic-input">
                                            <div class="input-group margin-bottom-sm">
                                            <span class="input-group-addon">
                                            </span>
                                            <select name="noofhours" class="form-control">
                                                    <option value="" disabled {{ old('department') ? '' : 'selected' }}>No. of Hours</option>
                                                    @for($i = 0; $i <= 100; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                            </select>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        {!!Form::label('noofreservation', 'No of People', array('class' => 'form-control-label'))!!}
                                        <div class="iconic-input">
                                                <div class="input-group margin-bottom-sm">
                                                <span class="input-group-addon">
                                                </span>
                                                <select name="noofreservation" class="form-control">
                                                        <option value="" disabled {{ old('department') ? '' : 'selected' }}>No. of People</option>
                                                        @for($i = 0; $i <= 100; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                </select>
                                                </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    {!!Form::label('Service', 'Service', array('class' => 'form-control-label'))!!}
                                    <div class="iconic-input">
                                         <div class="input-group margin-bottom-sm">
                                         <span class="input-group-addon">
                                         </span>
                                         <select name="package" class="form-control">
                                                 <option value="" disabled {{ old('department') ? '' : 'selected' }}>Choose a Service</option>
                                                 @foreach($packages as $package)
                                                     <option value="{{$package->packagecode}}" {{ old('package') ? 'selected' : '' }}>{{$package->packagedescription}}</option>
                                                 @endforeach
                                        </select>
                                         </div>
                                   </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           {!!Form::submit('Make Reservation', ['id' => 'addForm','class' => 'form-control btn btn-primary  col-lg-5 offset-6']) !!}
         </div>
         {!! Form::close() !!}
       </div>
     </div>
   </div>
   
@endsection
