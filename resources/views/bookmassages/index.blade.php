@extends('admin.master.template')

@section('content')
@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Reservations</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        {!! $bookmassages->calendar() !!}
        {!! $bookmassages->script() !!}
      </div>
    </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {!! Form::open(['id' => 'dataForm', 'url' => '/bookmassages', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="modal-header">
          Reservation Information
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
                                {!!Form::text('fullname',  null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                                </div>
                                <div class="form-group">
                                {!!Form::label('contactno', 'Contact No', array('class' => 'form-control-label'))!!}
                                {!!Form::text('contactno', null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                                </div>
                                <div class="form-group">
                                {!!Form::label('datetime', 'Date/Time', array('class' => 'form-control-label'))!!}
                                {!!Form::date('resvdate',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                                <br />
                                {!!Form::time('resvtime',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                                </div>
                                <div class="form-group">
                                   {!!Form::label('noofhours', 'No of Hours', array('class' => 'form-control-label'))!!}
                                   <div class="iconic-input">
                                           <div class="input-group margin-bottom-sm">
                                           <span class="input-group-addon">
                                           </span>
                                           <select name="noofhours" class="form-control">
                                                   <option value="" disabled {{ old('department') ? '' : 'selected' }}>No. of Hours</option>
                                                   @for($i = 0; $i <= 10; $i++)
                                                       <option value="{{$i}}">{{$i}}</option>
                                                   @endfor
                                           </select>
                                           </div>
                                   </div>
                               </div>
                               <div class="form-group">
                                    {!!Form::label('noofreservation', 'No of Reservation', array('class' => 'form-control-label'))!!}
                                    <div class="iconic-input">
                                            <div class="input-group margin-bottom-sm">
                                            <span class="input-group-addon">
                                            </span>
                                            <select name="noofreservation" class="form-control">
                                                    <option value="" disabled {{ old('department') ? '' : 'selected' }}>No. of Reservation</option>
                                                    @for($i = 0; $i <= 10; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                            </select>
                                            </div>
                                    </div>
                                </div>
                               <div class="form-group">
                                  {!!Form::label('package', 'Package', array('class' => 'form-control-label'))!!}
                                  <div class="iconic-input">
                                       <div class="input-group margin-bottom-sm">
                                       <span class="input-group-addon">
                                       </span>
                                       <select name="package" class="form-control">
                                               <option value="" disabled {{ old('department') ? '' : 'selected' }}>Choose a Package</option>
                                               @foreach($packages as $package)
                                                   <option value="{{$package->packagecode}}" {{ old('package') ? 'selected' : '' }}>{{$package->packagedescription}}</option>
                                               @endforeach
                                      </select>
                                       </div>
                                 </div>
                               </div>
                               <div class="form-group">
                                  {!!Form::label('status', 'Status', array('class' => 'form-control-label'))!!}
                                  <div class="iconic-input">
                                          <div class="input-group margin-bottom-sm">
                                          <span class="input-group-addon">
                                          </span>
                                          <select name="status" class="form-control">
                                                <option value="Pending">Pending</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Paid">Paid</option>
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

   <!-- Modal -->
 <div class="modal fade" id="editreserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {!! Form::open(['id' => 'dataForm', 'url' => '/bookmassages/update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="modal-header">
          Reservation Information
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
                                {!!Form::hidden('id', 'id', array('class' => 'form-control-label'))!!}
                                {!!Form::text('fullname',  null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                                </div>
                                <div class="form-group">
                                {!!Form::label('contactno', 'Contact No', array('class' => 'form-control-label'))!!}
                                {!!Form::text('contactno', null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                                </div>
                                <div class="form-group">
                                {!!Form::label('datetime', 'Date/Time', array('class' => 'form-control-label'))!!}
                                {!!Form::date('resvdate',null, ['placeholder' => '', 'class' => 'form-control col-lg-12' ])!!}
                                <br />
                                {!!Form::time('resvtime',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                </div>
                                <div class="form-group">
                                        {!!Form::label('noofhours', 'No of Hour/s', array('class' => 'form-control-label'))!!}
                                        <div class="iconic-input">
                                                <div class="input-group margin-bottom-sm">
                                                <span class="input-group-addon">
                                                </span>
                                                <select name="noofhours" class="form-control">
                                                        <option value="" disabled {{ old('department') ? '' : 'selected' }}>No. of Hour/s</option>
                                                        @for($i = 0; $i <= 10; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                </select>
                                                </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                   {!!Form::label('noofreservation', 'No of Reservation', array('class' => 'form-control-label'))!!}
                                   <div class="iconic-input">
                                           <div class="input-group margin-bottom-sm">
                                           <span class="input-group-addon">
                                           </span>
                                           <select name="noofreservation" class="form-control">
                                                   <option value="" disabled {{ old('department') ? '' : 'selected' }}>No. of Reservation</option>
                                                   @for($i = 0; $i <= 10; $i++)
                                                       <option value="{{$i}}">{{$i}}</option>
                                                   @endfor
                                           </select>
                                           </div>
                                   </div>
                               </div>
                               <div class="form-group">
                                  {!!Form::label('package', 'Package', array('class' => 'form-control-label'))!!}
                                  <div class="iconic-input">
                                       <div class="input-group margin-bottom-sm">
                                       <span class="input-group-addon">
                                       </span>
                                       <select name="package" class="form-control">
                                               <option value="" disabled {{ old('department') ? '' : 'selected' }}>Choose a Package</option>
                                               @foreach($packages as $package)
                                                   <option value="{{$package->packagecode}}" {{ old('package') ? 'selected' : '' }}>{{$package->packagedescription}}</option>
                                               @endforeach
                                      </select>
                                       </div>
                                 </div>
                               </div>
                               <div class="form-group">
                                  {!!Form::label('status', 'Status', array('class' => 'form-control-label'))!!}
                                  <div class="iconic-input">
                                          <div class="input-group margin-bottom-sm">
                                          <span class="input-group-addon">
                                          </span>
                                          <select name="status" class="form-control">
                                                <option value="Pending">Pending</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Paid">Paid</option>
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
          {!!Form::submit('Edit Appointment', ['id' => 'addForm','class' => 'form-control btn btn-primary  col-lg-5 offset-6']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
