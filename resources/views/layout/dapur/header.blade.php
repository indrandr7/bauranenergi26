<!--
Warna Header:
header-orchidgreen, header-indigogreen, header-blue, header-green, header-yellow, header-orenge, 
header-dark, header-purple, header-red, header-darkgreen, header-darkblue
-->
<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-orchidgreen">
	<div class="m-header">
		<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
		<a href="#!" class="b-brand">
			<img src="{{ asset('logo/logobed.png') }}" width="45px" alt="" class="logo">
			<span style="margin-left: 5px;line-height:15px;">Bauran Energi Daerah</span>
		</a>
		<a href="#!" class="mob-toggler">
			<i class="feather icon-more-vertical"></i>
		</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
				<div class="search-bar">
					<input type="text" class="form-control border-0 shadow-none" placeholder="Search here">
					<button type="button" class="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</li>
			<li class="nav-item">
				<a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li>
				<div class="dropdown drp-user">
					<span style="margin-right: 10px;">{{ Auth::user()->name }}</span>
					<img src="{{ asset('mainpro/images/user-default.png') }}" class="img-radius wid-40" alt="User-Profile-Image">
					
					{{-- <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
						<span style="margin-right: 10px;">{{ Auth::user()->name }}</span>
						<img src="{{ asset('mainpro/images/user-default.png') }}" class="img-radius wid-40" alt="User-Profile-Image">
					</a>
					<div class="dropdown-menu dropdown-menu-right profile-notification">
						<div class="pro-head">
							<img src="{{ asset('mainpro/images/user-default.png') }}" class="img-radius" alt="User-Profile-Image">
							<span>{{ Auth::user()->name }}</span>
						</div>
						<ul class="pro-body">
							<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i> Profil Saya</a></li>
							<li><a href="{{ url('logout') }}" class="dropdown-item"><i class="feather icon-log-out"></i> Logout</a></li>
						</ul>
					</div> --}}
				</div>
			</li>
		</ul>
	</div>
</header>