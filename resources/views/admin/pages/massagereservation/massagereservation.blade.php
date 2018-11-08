@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Add Reservation</a>
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
                      @foreach($bookmassages as $bookmassage)    
                       <tr>
                          <td>{{ $bookmassage->fullname }}</td>
                          <td>{{ $bookmassage->contactno }}</td>
                          <td>{{ $bookmassage->noofreservation }}</td>
                       </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection
