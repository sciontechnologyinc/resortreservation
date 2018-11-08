<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reservation" aria-expanded="false" aria-controls="reservation">
              <i class="menu-icon mdi mdi-clipboard-text"></i>
              <span class="menu-title">Reservation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reservation">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link resorts" href="{{ url('resorts') }}">Resorts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('bookmassages') }}">Manage Reservation</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="cabins">Cabins</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link" href="staffs">Staffs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="massagetypes">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="packages">Packages</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="promotions">Promo</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#maintenance" aria-expanded="false" aria-controls="maintenance">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Maintenance</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="maintenance">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="branches">Branches</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">What's New</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('companyinfo') }}">
              <i class="menu-icon mdi mdi-information-outline"></i>
              <span class="menu-title">Company Information</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="menu-icon mdi mdi-account-box-outline"></i>
              <span class="menu-title">Admin Settings</span>
            </a>
          </li>
        </ul>
      </nav>