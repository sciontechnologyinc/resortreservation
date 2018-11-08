@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="{{ url('resorts') }}" class="nav-link">Resort</a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ url('resorts/add') }}" class="nav-link">Create Resort</a>
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
        <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Add Resort</h4>
                          {!! Form::open(['id' => 'dataForm1', 'url' => 'resorts/save']) !!}
                          <div class="form-group">
                               {!!Form::label('name', 'Resort Name', array('class' => 'form-control-label'))!!}
                               {!!Form::text('name',null, ['placeholder' => 'First Name', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                               {!!Form::text('admin','1', ['placeholder' => 'First Name', 'class' => 'form-control col-lg-12', 'required' => '', 'hidden' ])!!}
                          </div>
              
                          <div class="form-group">
                               {!!Form::label('email', 'Email', array('class' => 'form-control-label'))!!}
                               {!!Form::text('email',null, ['placeholder' => 'Email', 'class' => 'form-control col-lg-12'])!!}
                          </div>

                          <div class="form-group ">
                               {!!Form::label('contactno', 'Contact', array('class' => 'form-control-label'))!!} <small>(09)123456789</small>
                               {!!Form::number('contactno',null, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'id' => 'contactno', 'required' => '' ])!!}
                               {{-- &nbsp;&nbsp;<span id="spnPhoneStatus"></span> --}}
                          </div>
                          
                          <div class="form-group"><label class="form-control-label">Password</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                           </div>
               
                           <div class="form-group"><label class="form-control-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                           </div>
                               {!!Form::submit('Add Resort', ['id' => 'addForm','class' => 'btn btn-primary']) !!}
                       </div>
                   {!! Form::close() !!}
                        </div>
                      </div>
        </div>
        </div>
</div>
@endsection