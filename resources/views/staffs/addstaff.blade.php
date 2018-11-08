@extends('admin.master.template')

@section('headerButton')
<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="{{ url('staffs')}}" class="nav-link">Staffs</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="{{ url('addstaffs')}}" class="nav-link">Add Staff</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
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
{!! Form::open(['id' => 'dataForm', 'url' => '/staffs']) !!}
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Staff</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                    {!!Form::label('staffid', 'Staff ID', array('class' => 'form-control-label'))!!}
                    {!!Form::text('staffid',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('staffname', 'Staff Name', array('class' => 'form-control-label'))!!}
                    {!!Form::text('staffname',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('contactno', 'Contact No.', array('class' => 'form-control-label'))!!}
                    {!!Form::text('contactno',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('type', 'Type', array('class' => 'form-control-label'))!!}
                    {!!Form::select('type', array('Receptionist' => 'Receptionist', 'Therapist' => 'Therapist')) !!}
                    </div>
                    {!!Form::submit('Submit', ['id' => 'addForm','class' => 'btn btn-success mr-2']) !!}
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</div>
{!! Form::close() !!}
</div>

@endsection