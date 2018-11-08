@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="packages" class="nav-link">Packages</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="#" class="nav-link">Add Package</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Package</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="packagecode">Package Code</label>
                      <input type="text" class="form-control" id="packagecode" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="packagedescription">Package Description</label>
                      <input type="text" class="form-control" id="packagedescription" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" id="price" placeholder="">
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