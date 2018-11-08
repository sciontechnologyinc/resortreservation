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
                      <label for="massagetypename">Massage Type name</label>
                      <input type="text" class="form-control" id="massagetypename" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="massagetypedescription">Massage Type Description</label>
                      <input type="text" class="form-control" id="massagetypedescription" placeholder="">
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