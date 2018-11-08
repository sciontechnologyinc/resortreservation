@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="massagetypes" class="nav-link">Service</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="#" class="nav-link">Add Service</a>
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
{!! Form::open(['id' => 'dataForm', 'url' => '/massagetypes']) !!}
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Services</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                    {!!Form::label('Service', 'Service', array('class' => 'form-control-label'))!!}
                    {!!Form::text('massagetypename',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('Service Description', 'Service Description', array('class' => 'form-control-label'))!!}
                    {!!Form::text('massagetypedescription',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('price', 'Price', array('class' => 'form-control-label'))!!}
                    {!!Form::text('price',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
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