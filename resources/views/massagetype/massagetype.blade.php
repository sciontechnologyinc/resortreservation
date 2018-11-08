@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Massage Types</a>
                    </li>
                    <li class="nav-item">
                        <a href="addmassagetype" class="nav-link">Add Massage Type</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Massage Types</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Massage Type Name
                          </th>
                          <th>
                            Massage Type Description
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>
                           Thai Massage
                          </td>
                          <td>
                            Thai Massage 
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
