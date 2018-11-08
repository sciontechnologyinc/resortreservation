@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="massagetype" class="nav-link">Massage Types</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="#" class="nav-link">Add Massage Type</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Massage Type</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="massagetypename">Resort Name</label>
                      <input type="text" class="form-control" id="massagetypename" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="massagetypename">Address</label>
                        <input type="text" class="form-control" id="massagetypename" placeholder="">
                      </div>
                      <div class="form-group">
                          <label for="massagetypename">Email Address</label>
                          <input type="text" class="form-control" id="massagetypename" placeholder="">
                      </div>
                      <div class="form-group">
                          <label for="massagetypename">Contact Number</label>
                          <input type="text" class="form-control" id="massagetypename" placeholder="">
                      </div>
                    <div class="form-group col-lg-12"><label class="form-control-label">Password</label>
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                     </div>
         
                     <div class="form-group col-lg-12"><label class="form-control-label">Confirm Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                     </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
</div>
</div>
</div>
@endsection