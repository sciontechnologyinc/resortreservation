@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Therapists</a>
                    </li>
                    <li class="nav-item">
                        <a href="addtherapist" class="nav-link">Add Therapist</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Therapists</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Therapist ID
                          </th>
                          <th>
                            Therapist Name
                          </th>
                          <th>
                            Contact No.
                          </th>
                          <th>
                            Specialty
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>
                           001
                          </td>
                          <td>
                            Maria Reyes
                          </td>
                          <td>
                           09123456789
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
