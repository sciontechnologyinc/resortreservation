@extends('admin.master.template')
@section('headerButton')
<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="{{ url('companyinformation')}}" class="nav-link">Company Information</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="{{ url('editcompanyinformation')}}" class="nav-link">Edit Company Information</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Company Information</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                    {!!Form::label('companyname', 'Company Name', array('class' => 'form-control-label'))!!}
                    {!!Form::text('companyname',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('mission', 'Mission', array('class' => 'form-control-label'))!!}
                    {!!Form::text('mission',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('vision', 'Vision', array('class' => 'form-control-label'))!!}
                    {!!Form::text('vision',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('contactno', 'Contact No', array('class' => 'form-control-label'))!!}
                    {!!Form::text('contactno',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}                    </div>
                    <div class="form-group">
                    {!!Form::label('address', 'Address', array('class' => 'form-control-label'))!!}
                    {!!Form::text('address',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('email', 'Email', array('class' => 'form-control-label'))!!}
                    {!!Form::text('email',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('footerinformation', 'Footer Information', array('class' => 'form-control-label'))!!}
                    {!!Form::text('footerinformation',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</div>
</div>
@endsection