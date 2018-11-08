@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Cabins</a>
                    </li>
                    <li class="nav-item">
                        <a href="addcabin" class="nav-link">Add Cabin</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cabins</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Cabin No.
                          </th>
                          <th>
                            Cabin Name
                          </th>
                          <th>
                            Description
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>
                           Cabin 1
                          </td>
                          <td>
                            First Cabin
                          </td>
                          <td>
                            Clean Cabin
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection
