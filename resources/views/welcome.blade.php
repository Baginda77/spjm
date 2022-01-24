<!DOCTYPE html>
<html lang="en">

	<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

	<title>Antrin SPJM - BC Soetta</title>

	<!-- Additional CSS Files -->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/font-awesome.css') !!}">
	<link rel="stylesheet" href="{!! asset('css/templatemo-breezed.css') !!}">
	<link rel="stylesheet" href="{!! asset('css/my-style.css') !!}">
	</head>

	<body>

	<!-- ***** Preloader Start ***** -->
	<div id="preloader">
		<div class="jumper">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->

	<!-- ***** Header Area Start ***** -->
	<header class="header-area header-sticky">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="main-nav">
						<!-- ***** Logo Start ***** -->
						<a href="/" class="logo">
							Antrian SPJM
						</a>
						<!-- ***** Logo End ***** -->
						<!-- ***** Menu Start ***** -->
						<ul class="nav">
							<li class="scroll-to-section"><a href="https://tiket.bcsoetta.org/client/view_knowledge/14" target="_blank">Info</a></li>
						</ul>
						<a class='menu-trigger'>
							<span>Menu</span>
						</a>
						<!-- ***** Menu End ***** -->
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- ***** Header Area End ***** -->

	<!-- ***** Main Banner Area Start ***** -->
	<div class="main-banner header-text" id="top">
		<div class="Modern-Slider">
		  <!-- Item -->
		  <div class="item">
			<div class="img-fill">
				<img src="{!! asset('images/slide-02.jpg') !!}" alt="">
				<div class="text-content">
					<h5>Cek Nomor Antrian</h5>
					<div id="subscribe" class="container">
						<form action="/cari" method="get">
							<div class="col-lg-10 offset-lg-1">
								<div class="row" style="margin-bottom: 15px;">
									<div class="col-md-3 col-sm-12">
										<fieldset>
											<select name="jenis" id="jnsaju" required="">
												<option value="271">JAS</option>
												<option value="269">TNS</option>
											</select>
										</fieldset>
									</div>
									<div class="col-md-8 col-sm-10">
										<fieldset>
											<input name="nomorsurat" type="text" placeholder="Isikan nomor Siap Terbang..." required="" minlength="5" maxlength="11">
										</fieldset>
									</div>
									<div class="col-md-1 col-sm-2">
										<fieldset>
											<button type="submit" id="form-submit" class="main-button"><i class="fa fa-search fa-lg"></i></button>
										</fieldset>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		  </div>
		</div>
	</div>
	<!-- ***** Main Banner Area End ***** -->

	<!-- ***** Result Area Starts ***** -->
	<section class="section" id="result">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    @yield('content')

				</div>
			</div>
		</div>
	</section>
	<!-- ***** Result Area Ends ***** -->

	<!-- ***** Footer Start ***** -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xs-12">
					<div class="left-text-content">
						<p>Copyright &copy; <a href="https://tiket.bcsoetta.org" target="_blank">Duktek Soetta</a>

						- Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
					</div>
					<div id="log"></div>
				</div>
			</div>
		</div>
	</footer>


		<!-- jQuery -->
		<script src="{!! asset('js/jquery-2.1.0.min.js') !!}"></script>

		<!-- Bootstrap -->
		<script src="{!! asset('js/popper.js') !!}"></script>
		<script src="{!! asset('js/bootstrap.min.js') !!}"></script>


		<!-- Global Init -->
		<script src="{!! asset('js/custom.js') !!}"></script>

		<!-- My Script -->
		<script src="{!! asset('js/myscript.js') !!}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.3/socket.io.js" integrity="sha512-2RDFHqfLZW8IhPRvQYmK9bTLfj/hddxGXQAred2wNZGkrKQkLGj8RCkXfRJPHlDerdHHIzTFaahq4s/P4V6Qig==" crossorigin="anonymous"></script>

	</body>
</html>
