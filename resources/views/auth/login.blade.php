<!doctype html>
<html lang="en">
    <head>
        <title>Bauran Energi Daerah</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('theme/img/logo/favicon.png') }}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ asset('theme/img/logo/favicon.png') }}">

        {{-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('login/fonts.googleapis.com_css_family=Lato_300,400,700&display=swap.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('login/stackpath.bootstrapcdn.com_font-awesome_4.7.0_css_font-awesome.min.css') }}" rel="stylesheet" > --}}
        <link href="{{ asset('login/css/style.css') }}" rel="stylesheet" >
	</head>

	<body class="img js-fullheight" style="background-image: url('{{ asset('login/images/bg.jpg') }}');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
                    <img alt="Bauran Energi Daerah" width="300px" height="auto" data-sticky-width="60" data-sticky-height="60" src="{{ asset('logo/logobed.png') }}">
				</div>
			</div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">

                        <form action="{{ url('/loginprocess') }}" method="post" class="signin-form">
                            @csrf
                            
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" id="password-field" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                {{-- <button type="submit" class="form-control btn btn-primary submit px-3">Login</button> --}}
                                <button type="submit" class="form-control btn btn-primary submit px-3" style="background-color: rgba(53,130,255,0.7) !important;border:0px #3582FF !important;color:#ffffff !important;">Login</button>
                            </div>
                            {{-- <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff">Forgot Password</a>
                                </div>
                            </div> --}}
                        </form>
                        {{-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                        </div> --}}
                    </div>
                </div>
            </div>
		</div>
	</section>

    <script src="{{ asset('login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('login/js/popper.js') }}"></script>
    <script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>

	</body>
</html>

