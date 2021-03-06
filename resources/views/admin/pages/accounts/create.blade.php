@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="accounts" class="nav-link">Accounts</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Create Accounts</a>
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
 {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => '/accounts/' . $account->id ]) !!}
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Account</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                    {!!Form::label('name', 'Name', array('class' => 'form-control-label'))!!}
                    {!!Form::text('name', ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('email', 'Email', array('class' => 'form-control-label'))!!}
                    {!!Form::text('email',['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('contactno', 'Contact No.', array('class' => 'form-control-label'))!!}
                    {!!Form::text('contactno', ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('password', 'Password', array('class' => 'form-control-label'))!!}
                    {!!Form::text('password', ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
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