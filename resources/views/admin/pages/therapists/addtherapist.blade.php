@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="therapists" class="nav-link">Therapists</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="#" class="nav-link">Add Therapists</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Therapists</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="therapistsid">Therapists ID</label>
                      <input type="text" class="form-control" id="therapistsid" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="therapistname">Therapist Name</label>
                      <input type="text" class="form-control" id="therapistname" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="contactno">Contact No.</label>
                      <input type="text" class="form-control" id="contactno" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="specialty">Specialty</label>
                      <input type="text" class="form-control" id="specialty" placeholder="">
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