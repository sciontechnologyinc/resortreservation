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
                                            {!!Form::label('Reservation Code', 'Reservation Code', array('class' => 'form-control-label'))!!}
                                            {!!Form::text('code', '' , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                                            </div>
                                            <div class="form-group">
                                            {!!Form::label('contactno', 'Contact No', array('class' => 'form-control-label'))!!}
                                            {!!Form::number('contactno','' , ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
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
                                            <div class="form-group">
                                            {!!Form::label('datetime', 'From', array('class' => 'form-control-label'))!!}
                                            {!!Form::date('from',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                            </div>
                                            <div class="form-group">
                                                   {!!Form::label('datetime', 'To', array('class' => 'form-control-label'))!!}
                                                   {!!Form::date('to',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                                   {{-- {!!Form::time('time',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!} --}}
                                           </div>
                                           <div class="form-group">
                                                   {!!Form::label('datetime', 'Day Time', array('class' => 'form-control-label'))!!}
                                                   {!!Form::checkbox('day',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                                   {!!Form::label('datetime', 'Night Time', array('class' => 'form-control-label'))!!}
                                                   {!!Form::checkbox('night',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                           </div>
                                          
                                            <div class="form-group">
                                                   {!!Form::label('amount', 'Total Amount', array('class' => 'form-control-label'))!!}
                                                   {!!Form::number('amount','' , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly'=>''])!!}
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
                                            {!!Form::label('Reservation Code', 'Reservation Code', array('class' => 'form-control-label'))!!}
                                            {!!Form::text('code', '' , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                                            </div>
                                            <div class="form-group">
                                            {!!Form::label('contactno', 'Contact No', array('class' => 'form-control-label'))!!}
                                            {!!Form::number('contactno','' , ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
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
                                            <div class="form-group">
                                            {!!Form::label('datetime', 'From', array('class' => 'form-control-label'))!!}
                                            {!!Form::date('from',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                            </div>
                                            <div class="form-group">
                                                   {!!Form::label('datetime', 'To', array('class' => 'form-control-label'))!!}
                                                   {!!Form::date('to',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                                   {{-- {!!Form::time('time',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!} --}}
                                           </div>
                                           <div class="form-group">
                                                   {!!Form::label('datetime', 'Day Time', array('class' => 'form-control-label'))!!}
                                                   {!!Form::checkbox('day',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                                   {!!Form::label('datetime', 'Night Time', array('class' => 'form-control-label'))!!}
                                                   {!!Form::checkbox('night',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                           </div>
                                            <div class="form-group">
                                                   {!!Form::label('amount', 'Total Amount', array('class' => 'form-control-label'))!!}
                                                   {!!Form::number('amount','' , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly'=>''])!!}
                                           </div>
                                           <div class="form-group">
                                                {!!Form::label('status', 'Status', array('class' => 'form-control-label'))!!}
                                                {!!Form::text('status','' , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly'=>''])!!}
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
