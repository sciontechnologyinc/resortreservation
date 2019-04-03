<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          @if(Auth::user()->active == '1')
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reservation" aria-expanded="false" aria-controls="reservation">
              <i class="menu-icon mdi mdi-clipboard-text"></i>
              <span class="menu-title">Reservation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reservation">
              <ul class="nav flex-column sub-menu">
                @if (Auth::user()->admin == '2' && Auth::user()->active == '1')
                  <li class="nav-item">
                    <a class="nav-link resorts" href="{{ url('resorts') }}">Resorts</a>
                  </li>
                @elseif(Auth::user()->admin == '1' && Auth::user()->active == '1')
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('bookmassages') }}">Manage Reservation</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('galleries/show') }}">Galleries</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('schedule') }}">Schedule</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="packages">Packages</a>
                  </li>
                @endif
                  
              </ul>
            </div>
          </li>
          @if (Auth::user()->admin != '2' && Auth::user()->active == '1')
            <li class="nav-item">
              <a class="nav-link" href="{{ url('companyinfo') }}">
                <i class="menu-icon mdi mdi-information-outline"></i>
                <span class="menu-title">Company Information</span>
              </a>
            </li>
          @endif
        </ul>
      </nav>