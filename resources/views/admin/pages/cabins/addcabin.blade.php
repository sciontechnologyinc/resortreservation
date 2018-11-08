@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="cabins" class="nav-link">Cabins</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="#" class="nav-link">Add Cabin</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Cabin</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="cabinno">Cabin No</label>
                      <input type="text" class="form-control" id="cabinno" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="cabinname">Cabin Name</label>
                      <input type="text" class="form-control" id="cabinname" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="cabindescription">Cabin Description</label>
                      <input type="text" class="form-control" id="cabindescription" placeholder="">
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