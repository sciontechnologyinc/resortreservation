<header class="header">
		<div class="header_content">

			<!-- Logo -->
			<div class="logo_container d-flex flex-column align-items-center justify-content-center">
				<div class="logo" style="color: wheat">
                        @yield('headerLogo')
				</div>
			</div>
      
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_inner d-flex flex-row align-items-center justify-content-start">
							<nav class="main_nav">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									@yield('header')
                    <a class="nav-link dropdown profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin-top: 20px;">
                     <i class="fa fa-user"></i>
                    </a>
                    @if ($user = Auth::user())
                    <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ url('website/pages/reservation') }}"><i class="fa fa-user"></i> Reservations</a>
                            <a class="nav-link" href=""><i class="fa fa-cog"></i> Settings</a>
                            <a class="nav-link" href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ url('login') }}"><i class="fa fa-user"></i> Login</a>
                    @endif
                    </div>   
                    </li>
								</ul>
							</nav>
              
							<a data-toggle="modal" data-target="#myModal" id="bookmassagebtn" class="button_container header_button ml-auto"><div class="button text-center"><span>Reserve Now!</span></div></a>
							<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>           
</nav>
</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>
    <div class="menu">
            <div class="background_image" style="background-image:url(images/menu.jpg)"></div>
            <div class="menu_content d-flex flex-column align-items-center justify-content-center">
                <ul class="menu_nav_list text-center">
                   @yield('header2')
                    <li><div class="nav_item d-flex flex-column align-items-center justify-content-center">
                        <a class="nav-link dropdown profile" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin-top: 20px;">
                         Profile
                        </a>
                        @if ($user = Auth::user())
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link profilebtn" href="{{ url('website/pages/profile') }}"><i class="fa fa-user"></i> Reservations</a>
                            <a class="nav-link profilebtn" href="{{ route('users.edit',$user) }}"><i class="fa fa-cog"></i> Settings</a>
                                <a class="nav-link profilebtn" href="{{ url('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                    </div>
                        @else
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link profilebtn" href="{{ url('login') }}"><i class="fa fa-user"></i> Login</a>
                        @endif
                       
          
                </div>   </li>
                    <li><a class="bookmassage-btn"data-toggle="modal" data-target="#myModal">Reserve Now!</a></li>
                </ul>
            </div>
            
    </div>

		
<style>
.btn-success {
    color: #fff;
    background-color: #04083a;
    border-color: #04083a;
}
	.btn-success:hover {
    color: #fff500;
    background-color: #04083a;
    border-color: #04083a;
}
.officiallogo{
    margin-bottom:15px !important;
    height: 85% !important;
}

a.nav-link.dropdown.profile {
   
    color: white !important;
}
a.bookmassage-btn {
    color: white !important;
}

li.profile-hov:hover {
    background: none !important;
}

a.nav-link.profilebtn {
    font-size: 30px;
    color: #0b1422;
}

link.dropdown.profile:hover {
    color: #fef600 !important;
    transition: ease 500ms;
}
a.nav-link.dropdown.profile {
    cursor: pointer;
}
</style>

<!-- Modal -->


