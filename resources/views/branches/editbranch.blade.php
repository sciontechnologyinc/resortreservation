@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="branches" class="nav-link">Branches</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="#" class="nav-link">Add Branch</a>
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
 {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => '/branches/' . $branch->id ]) !!}
<div class="content-wrapper">
    <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Branch</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                    {!!Form::label('branchno', 'Branch No', array('class' => 'form-control-label'))!!}
                    {!!Form::text('branchno',$branch->branchno, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('branchname', 'Branch Name', array('class' => 'form-control-label'))!!}
                    {!!Form::text('branchname',$branch->branchname, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('address', 'Branch Address', array('class' => 'form-control-label'))!!}
                    {!!Form::text('address',$branch->address, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('contactno', 'Contact No', array('class' => 'form-control-label'))!!}
                    {!!Form::text('contactno',$branch->contactno, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
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