@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Branches</a>
                    </li>
                    <li class="nav-item">
                        <a href="addbranch" class="nav-link">Add Branch</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Branches</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Branch No.
                          </th>
                          <th>
                            Branch Name
                          </th>
                          <th>
                            Address
                          </th>
                          <th>
                            Contact No.
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($branches as $branch)
                      <tr>
                          <td>
                          {{ $branch->branchno }}
                          </td>
                          <td>
                          {{ $branch->branchname }}
                          </td>
                          <td>
                          {{ $branch->address }}
                          </td>
                          <td>
                          {{ $branch->contactno }}
                          </td>
                          <td>
                          <center>
                          <div class="form-group" style="display:inline-flex">
                          <a rel="tooltip" title="Edit" class="btn btn-success btn-sm mr-1" href="branches/{!! $branch->id !!}/edit"><i class="fa fa-edit"></i></a>
                          {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => '/branches/' . $branch->id]) !!}
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'rel' => 'tooltip', 'title' => 'Delete'] )  }}
                          {!! Form::close() !!}
                          </div>
                          </center>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection
