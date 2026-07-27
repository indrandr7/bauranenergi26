<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Forum Lingkar Merapi</title>	

		<meta name="keywords" content="Forum Lingkar Merapi" />
		<meta name="description" content="Forum Lingkar Merapi">
		<meta name="author" content="forum lingkar merapi">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('theme/img/favicon.ico') }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{ asset('theme/img/apple-touch-icon.png') }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('theme/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('theme/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/css/theme-shop.css') }}">

		<!-- Revolution Slider CSS -->
		<link rel="stylesheet" href="{{ asset('theme/vendor/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/rs-plugin/css/layers.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/rs-plugin/css/navigation.css') }}">
		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{ asset('theme/vendor/circle-flip-slideshow/css/component.css') }}">

		<!-- Skin CSS -->
		{{-- <link id="skinCSS" rel="stylesheet" href="{{ asset('theme/css/skins/default.css') }}"> --}}
        <link id="skinCSS" rel="stylesheet" href="{{ asset('theme/css/skins/skin-corporate-5.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}">

	</head>
	<body data-plugin-page-transition>

		<div class="body">

			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
				<div class="header-body">
					<div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-logo">
                                        <a href="index.html">
                                            <img alt="FLM" width="80" data-sticky-width="70" src="{{ asset('logoflm.png') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <div class="header-nav header-nav-stripe order-2 order-lg-1">
                                        <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle active" href="index.html">
                                                            Beranda
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle" href="#">
                                                            Tentang Kami
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="page-careers.html">Visi dan Misi</a></li>
                                                            <li><a class="dropdown-item" href="page-faq.html">Keanggotaan</a></li>
                                                            <li><a class="dropdown-item" href="page-login.html">Tugas dan Tanggung Jawab</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle" href="index.html">
                                                            Kegiatan
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle" href="index.html">
                                                            Publikasi
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle" href="index.html">
                                                            Hubungi Kami
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                    <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                                        <div class="header-nav-feature header-nav-features-search d-inline-flex">
                                            <a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch" aria-label="Search"><i class="fas fa-search header-nav-top-icon"></i></a>
                                            <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                                                <form role="search" action="page-search-results.html" method="get">
                                                    <div class="simple-search input-group">
                                                        <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                                        <button class="btn" type="submit" aria-label="Search">
                                                            <i class="fas fa-search header-nav-top-icon"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</header>

			<div role="main" class="main">
				<div class="slider-container rev_slider_wrapper" style="height: 670px;">
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 670, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': true }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
						<ul>
                            <li data-transition="fade">
                                <img src="{{ asset('uploads/imagesliders/flm-slider.png') }}"  
                                    alt=""
                                    data-bgposition="center center" 
                                    data-bgfit="cover" 
                                    data-bgrepeat="no-repeat" 
                                    class="rev-slidebg">
                            </li>
                            <li data-transition="fade">
                                <img src="{{ asset('uploads/imagesliders/flm-slider2.png') }}"  
                                    alt=""
                                    data-bgposition="center center" 
                                    data-bgfit="cover" 
                                    data-bgrepeat="no-repeat" 
                                    class="rev-slidebg">
                            </li>
						</ul>
					</div>
				</div>

				<div class="home-intro bg-primary" id="home-intro">
					<div class="container">

						<div class="row align-items-center">
							<div class="col-lg-8">
								<p>
									The fastest way to grow your business with the leader in <span class="highlighted-word">Technology</span>
									<span>Check out our options and features included.</span>
								</p>
							</div>
							<div class="col-lg-4">
								<div class="get-started text-start text-lg-end">
									<a href="#" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">Get Started Now</a>
									<div class="learn-more">or <a href="index.html">learn more.</a></div>
								</div>
							</div>
						</div>

					</div>
				</div>

                <div class="container">
                    <div class="row pt-5">
                        <div class="col">

                            <div class="row text-center pb-5">
                                <div class="col-md-9 mx-md-auto">
                                    <div class="overflow-hidden mb-3">
                                        <h4 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                                            <span>Forum Lingkar Merapi</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="post-content">
                                <p style="text-align: justify;">Forum Lingkar Merapi adalah sebuah wadah kolaboratif sebagai pusat koordinasi, komunikasi dan sinergi bagi berbagai pemangku kepentingan (stakeholders) di wilayah lingkar Gunung Merapi. Forum ini terdiri dari lembaga pemerintah pusat dan daerah, pemerintah pusat melalui Badan Geologi Kementerian ESDM c.q. BPPTKG dan BPBD 4 kabupaten di 2 provinsi (Yogyakarta dan Jawa Tengah) yaitu Sleman, Magelang, Boyolali dan Klaten.</p>
                                <p style="text-align: justify;">
                                    Tujuan utama dari Forum Lingkar Merapi adalah untuk memperkuat kapasitas komunitas dan kelembagaan dalam pengurangan risiko bencana (PRB) terkait aktivitas Gunung Merapi yang dinamis. Sekber ini berfungsi sebagai jembatan yang menghubungkan berbagai inisiatif mandiri di setiap daerah menjadi sebuah gerakan yang lebih terorganisir dan komprehensif.
                                </p>
                                <p style="text-align: justify;">
                                    Beberapa pilar kegiatan utama yang dikelola oleh Sekber Forum Lingkar Merapai meliputi:
                                    <ul>
                                        <li>Pemberdayaan dan Pelatihan: Sekber menyelenggarakan program peningkatan kapasitas masyarakat tentang risiko bencana Gunung Merapi melalui pelatihan mitigasi bencana</li>
                                        <li>Koordinasi dan Komunikasi: Sekber menjadi pusat informasi dan pertukaran pengetahuan antar anggota forum, memastikan tersedianya aliran informasi yang cepat dan akurat dari lembaga teknis seperti BPPTKG dan BPBD Daerah ke masyarakat, serta memfasilitasi dialog konstruktif antar lembaga</li>
                                    </ul>
                                </p>
                                <p style="text-align: justify;">
                                    Melalui pendekatan yang inklusif, partisipatif dan kolaboratif, Sekber Forum Lingkar Merapi bertujuan untuk menciptakan masyarakat lingkar Merapi yang tidak hanya siap menghadapi ancaman bencana, namun juga mampu tumbuh dan berkembang secara berkelanjutan dalam harmoni dengan lingkungan Gunung Merapi.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-5 mt-4">
                        <div class="col">
                            <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold text-color-primary">Postingan</strong> Terbaru</h2>
                        </div>
                    </div>
                    <div class="row recent-posts pb-5 mb-4">
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <article>
                                <div class="row">
                                    <div class="col">
                                        <a href="blog-post.html" class="text-decoration-none">
                                            <img src="{{ asset('depan/img/blog/blog-corporate-3-1.jpg') }}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto pe-0">
                                        <div class="date">
                                            <span class="day text-color-dark font-weight-extra-bold">18</span>
                                            <span class="month text-1">FEB</span>
                                        </div>
                                    </div>
                                    <div class="col ps-1">
                                        <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-dark">Rapat Forum Lingkar Merapi</a></h4>
                                        <p class="line-height-5 pe-4 mb-1">Forum Lingkar Merapi melaksanakan rapat dengan pembahasan pemutakhiran informasi aktivitas Gunung Merapi dan pembahasan program kegiatan Forum Lingkar Merapi tahun 2026.</p>
                                        <a href="/" class="read-more text-color-primary font-weight-bold text-2">selengkapnya <i class="fas fa-chevron-right text-1 ms-1"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <article>
                                <div class="row">
                                    <div class="col">
                                        <a href="blog-post.html" class="text-decoration-none">
                                            <img src="{{ asset('depan/img/blog/blog-corporate-3-1.jpg') }}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto pe-0">
                                        <div class="date">
                                            <span class="day text-color-dark font-weight-extra-bold">30</span>
                                            <span class="month text-1">FEB</span>
                                        </div>
                                    </div>
                                    <div class="col ps-1">
                                        <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-dark">Gunung Merapi, Salah Satu Gunung Api Paling Aktif di Dunia</a></h4>
                                        <p class="line-height-5 pe-4 mb-1">Sebagai salah satu gunung api paling aktif, tentunya akan sangat menarik jika kita menilik sejarah Gunung Merapi.</p>
                                        <a href="/" class="read-more text-color-primary font-weight-bold text-2">selengkapnya <i class="fas fa-chevron-right text-1 ms-1"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <article>
                                <div class="row">
                                    <div class="col">
                                        <a href="blog-post.html" class="text-decoration-none">
                                            <img src="{{ asset('depan/img/blog/blog-corporate-3-1.jpg') }}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto pe-0">
                                        <div class="date">
                                            <span class="day text-color-dark font-weight-extra-bold">17</span>
                                            <span class="month text-1">JAN</span>
                                        </div>
                                    </div>
                                    <div class="col ps-1">
                                        <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-dark">Sejarah Letusan Gunung Merapi Berdasarkan Fasies Gunung Api</a></h4>
                                        <p class="line-height-5 pe-4 mb-1">Fasies Gunungapi Merapi yang terletak di DAS Bedog Propinsi Daerah Istimewa Yogyakarta dan bahaya gunungapi yang diakibatkan oleh erupsi Gunungapi Merapi berdasarkan pada fasies gunungapinya.</p>
                                        <a href="/" class="read-more text-color-primary font-weight-bold text-2">selengkapnya <i class="fas fa-chevron-right text-1 ms-1"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <article>
                                <div class="row">
                                    <div class="col">
                                        <a href="blog-post.html" class="text-decoration-none">
                                            <img src="{{ asset('depan/img/blog/blog-corporate-3-1.jpg') }}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto pe-0">
                                        <div class="date">
                                            <span class="day text-color-dark font-weight-extra-bold">9</span>
                                            <span class="month text-1">JAN</span>
                                        </div>
                                    </div>
                                    <div class="col ps-1">
                                        <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-dark">Gunung Merapi: Sejarah Panjang, Mitologi, dan Wisata Alam</a></h4>
                                        <p class="line-height-5 pe-4 mb-1">Gunung Merapi adalah gunung dengan ketinggian puncak sekitar 2.930 mdpl, yang terletak diwilayah Pulau Jawa khususnya Provinsi Daerah Istimewa Yogyakarta.</p>
                                        <a href="/" class="read-more text-color-primary font-weight-bold text-2">selengkapnya <i class="fas fa-chevron-right text-1 ms-1"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <section class="section bg-color-grey section-height-3 border-0 m-0">
                    <div class="container pb-2">
                        <div class="row">
                            <div class="col-lg-5 text-center text-md-start mb-5 mb-lg-0">
                                <h2 class="text-color-dark font-weight-normal text-6 mb-2">Publikasi <strong class="font-weight-extra-bold text-color-primary">Terkini</strong></h2>
                                <p class="lead">Temukan tulisan, buletin, dokumentasi yang terkait dengan Gunung Merapi disini.</p>
                                <a href="#" class="btn btn-primary font-weight-semibold btn-px-4 btn-py-2 text-2">Selengkapnya</a>
                            </div>
                            <div class="col-md-7 order-2 order-md-1 text-center text-md-start">
                                <div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                    @for ($i = 0; $i < 4; $i++)
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalku" onclick="showFormRead()">
                                            <img class="img-fluid rounded-0 mb-2" src="{{ asset('depan/img/team/team-1.jpg') }}" alt="" />
                                            <p class="text-2 mb-0 lineheight-17 ratatengah warna-putih" style="text-align: center !important;">
                                                Buletin Merapi Edisi {{ $i+1 }}
                                                {{-- {{ $prokumden->judul_publikasi }} --}}
                                                {{-- <a href="javascript:void(0)" class="btn btn-primary btn-sm mb-2">
                                                    Selengkapnya
                                                </a> --}}
                                            </p>
                                        </a>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
			</div>

			<footer id="footer">
                <div class="container">
                    {{-- <div class="footer-ribbon">
                        <span>Get in Touch</span>
                    </div> --}}
                    <div class="row py-5 my-4">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            {{-- <a href="index.html" class="logo pe-0 pe-lg-3"> --}}
                                {{-- <img alt="Forum Lingkar Merapi" src="{{ asset('logo/logo-flm-putih.png') }}" class="opacity-7- bottom-4" width="100"> --}}
                                {{-- <img alt="Forum Lingkar Merapi" src="{{ asset('logo-flm.png') }}" class="opacity-7- bottom-4" width="100"> --}}
                            {{-- </a> --}}
                            <p class="mt-2 mb-2">Forum Lingkar Merapi adalah sebuah wadah kolaboratif sebagai pusat koordinasi, komunikasi dan sinergi bagi berbagai pemangku kepentingan (stakeholders) di wilayah lingkar Gunung Merapi.</p>
                            <p class="mb-0"><a href="#" class="btn-flat btn-xs text-color-light"><strong class="text-2">LIHAT SELENGKAPNYA</strong><i class="fas fa-angle-right p-relative top-1 ps-2"></i></a></p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-3 mb-3">HUBUNGI KAMI</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list list-icons list-icons-lg">
                                        <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i><p class="m-0">234 Street Name, City Name</p></li>
                                        <li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i><p class="m-0"><a href="tel:8001234567">(800) 123-4567</a></p></li>
                                        <li class="mb-1"><i class="far fa-envelope text-color-primary"></i><p class="m-0"><a href="mailto:mail@example.com">mail@example.com</a></p></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list list-icons list-icons-sm">
                                        <li><i class="fas fa-angle-right"></i><a href="page-faq.html" class="link-hover-style-1 ms-1"> Beranda</a></li>
                                        <li><i class="fas fa-angle-right"></i><a href="sitemap.html" class="link-hover-style-1 ms-1"> Tentang Kami</a></li>
                                        <li><i class="fas fa-angle-right"></i><a href="contact-us.html" class="link-hover-style-1 ms-1"> Kegiatan</a></li>
                                        <li><i class="fas fa-angle-right"></i><a href="contact-us.html" class="link-hover-style-1 ms-1"> Publikasi</a></li>
                                        <li><i class="fas fa-angle-right"></i><a href="contact-us.html" class="link-hover-style-1 ms-1"> Hubungi Kami</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright footer-copyright-style-2">
                    <div class="container py-2">
                        <div class="row py-4">
                            <div class="col d-flex align-items-center justify-content-center">
                                <p>© Copyright {{ date('Y') }}. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
		</div>

		<!-- Vendor -->
		<script src="{{ asset('theme/vendor/plugins/js/plugins.min.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('theme/js/theme.js') }}"></script>

		<!-- Revolution Slider Scripts -->
		<script src="{{ asset('theme/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script src="{{ asset('theme/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
		<!-- Circle Flip Slideshow Script -->
		<script src="{{ asset('theme/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') }}"></script>
		<!-- Current Page Views -->
		<script src="{{ asset('theme/js/views/view.home.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('theme/js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('theme/js/theme.init.js') }}"></script>

	</body>
</html>
