<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="dashboard">
      <img src="{!! asset('images/companylogo.png') !!}" class="companyLogo"/>
    </a>
    <a class="navbar-brand brand-logo-mini" href="dashboard">
      <img src="{!! asset('images/companylogo.png') !!}" class="companyLogo"/>
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
      @yield('headerButton')
      <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown notif">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count">0</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <a class="dropdown-item notificationlist">
                      <p class="mb-0 font-weight-normal float-left notificationtext">You have 0 new notifications
                      </p>
                  </a>
              </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <span class="profile-text">Hello, {{Auth::user()->name}} !</span>
                  <img class="img-xs rounded-circle logoImage" src="{!!asset('images/default-user.png')!!}" alt="Profile image">
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <a class="dropdown-item" data-toggle="modal" data-target="#myModal">
                    <br>
                    Sign Out
                  </a>
              </div>
          </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
<span class="mdi mdi-menu"></span>
</button>
  </div>
</nav>

<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" >&times;</button>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
    <h4 class="modal-title">Sign Out Confirmation</h4>
  </div>
  <div class="modal-body">
    <p>Do you really want to sign out?</p>
  </div>
  <div class="modal-footer">
    <button id="signout-btn" type="submit" class="btn btn-success mr-2" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Sign Out</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/admin.js"></script>