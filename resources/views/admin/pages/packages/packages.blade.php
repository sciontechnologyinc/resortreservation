@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a href="addpackage" class="nav-link">Add Package</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Packages</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Package Code
                          </th>
                          <th>
                            Package Description
                          </th>
                          <th>
                            Price
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>
                           A1
                          </td>
                          <td>
                            1 hr Thai Massage + 30 mins Head Massage
                          </td>
                          <td>
                            400
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
