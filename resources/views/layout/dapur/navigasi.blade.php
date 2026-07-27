<nav class="pcoded-navbar menupos-fixed menu-light ">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div ">
			<ul class="nav pcoded-inner-navbar ">

				<li class="nav-item pcoded-menu-caption">
					<label>Menu Pengelolaan</label>
				</li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-trending-up"></i></span>
                        <span class="pcoded-mtext">Data</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ url('/bbm') }}">BBM</a></li>
                        <li><a href="{{ url('/bbmjenis') }}">Jenis BBM</a></li>
                        <li><a href="{{ url('/listrik') }}">Ketanagalistrikan</a></li>
                        <li><a href="{{ url('/listrikjenis') }}">Jenis Tenaga Listrik</a></li>
                        <li><a href="{{ url('/ebt') }}">EBT</a></li>
                        <li><a href="{{ url('/ebtjenis') }}">Jenis EBT</a></li>
                        <li><a href="{{ url('/batubara') }}">Batubara</a></li>
                        <li><a href="{{ url('/gasbumi') }}">Gas Bumi</a></li>
                        <li><a href="{{ url('/gasbumijenis') }}">Jenis Gas Bumi </a></li>
                        <li><a href="{{ url('/gasbumisektor') }}">Sektor Gas Bumi</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>
                        <span class="pcoded-mtext">Analisis</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="#">Bauran Energi</a></li>
                        <li><a href="#">Tren Capaian</a></li>
                        <li><a href="#">Perbandingan Target</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-video"></i></span>
                        <span class="pcoded-mtext">Rekomendasi</span>
                    </a>
                    <!-- <ul class="pcoded-submenu">
                        <li><a href="#">Laporan</a></li>
                        <li><a href="#">Export Data</a></li>
                    </ul> -->
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-video"></i></span>
                        <span class="pcoded-mtext">Laporan</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="#">Laporan</a></li>
                        <li><a href="#">Export Data</a></li>
                    </ul>
                </li>

				<li class="nav-item pcoded-menu-caption">
					<label>Pengaturan</label>
				</li>
                
                @if (Session::get('sesLevel') == 'admin-sistem')
                {{-- <li data-username="Form Validation" class="nav-item">
					<a href="{{ url('/dap/menuutama') }}" class="nav-link">
						<span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Menu Utama</span>
					</a>
				</li> --}}
				<li data-username="Form Validation" class="nav-item">
					<a href="{{ url('/dap/levelpengguna') }}" class="nav-link">
						<span class="pcoded-micon"><i class="feather icon-user-check"></i></span><span class="pcoded-mtext">Level Pengguna</span>
					</a>
				</li>
				<li data-username="Form Validation" class="nav-item">
					<a href="{{ url('/dap/pengguna') }}" class="nav-link">
						<span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Pengguna</span>
					</a>
				</li>
                @endif

				<li data-username="Form Validation" class="nav-item">
					<a href="{{ url('/dap/pengguna/gantipassword') }}" class="nav-link">
						<span class="pcoded-micon"><i class="feather icon-check-circle"></i></span><span class="pcoded-mtext">Ganti Password</span>
					</a>
				</li>
				<li data-username="Form Validation" class="nav-item">
					<a href="{{ url('logout') }}" class="dud-logout" title="Logout">
						<span class="pcoded-micon"><i class="feather icon-log-out"></i></span><span class="pcoded-mtext">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>