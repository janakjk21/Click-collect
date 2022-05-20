<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Swiper demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<!-- <link rel="stylesheet" href="./Topcatogerios.css" /> -->
	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<!-- Demo styles -->
	<style>
		html,
		body {
			position: relative;
			height: 20%;
		}

		body {
			background: #f9f9f9;
			font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
			margin: 0;
			padding: 0;

		}

		.swiper {
			width: 100%;


		}

		.swiper-slide {
			text-align: center;
			font-size: 18px;
			background: #fff;

			/* Center slide text vertically */
			display: -webkit-box;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			-webkit-justify-content: center;
			justify-content: center;
			-webkit-box-align: center;
			-ms-flex-align: center;
			-webkit-align-items: center;
			align-items: center;

			box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
			border-radius: 3%;
		}

		.swiper-slide img {
			display: block;
			width: 100%;
			/* height: 70%; */
			object-fit: cover;
			border-radius: 5%;
		}
	</style>
</head>

<body>
	<div style="background-color: #f9f9f9">
		<hr>
		<div style="margin-top :70px; "></div>
		<div style="text-align: center; ">
			<h1 style="font-size:50px ; "> Deal of The day</h1>
		</div>

		<div class="swiper mySwiper" style="border-radius:5%;background-color: #f9f9f9">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="card">
						<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
							<img src="./assets/img/Banner Swiper/home4-category2-banner1.webp" class="w-100" />
							<a href="#!">
								<div class="mask">
									<div class="d-flex justify-content-start align-items-end h-100">
										<h5><span class="badge bg-primary ms-2">New</span></h5>
									</div>
								</div>
								<div class="hover-overlay">
									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
								</div>
							</a>
						</div>
						<div class="card-body">
							<a href="" class="text-reset">
								<h5 class="card-title mb-3">Product name</h5>
							</a>
							<a href="" class="text-reset">
								<p>Category</p>
							</a>
							<h6 class="mb-3">$61.99</h6>
						</div>

					</div>

					<!-- <div style="width: 300px">
						<a class="" href="" style="text-decoration: none">
							<div>
								<img src="./assets/img/swiper/product04.webp" alt="Milks &amp; Creams" data-ll-status="loaded" class="entered lazyloaded" />
							</div>
							<h3 style="color: #a2c207">Milks & Creams</h3>
						</a>
					</div> -->
				</div>
				<div class="swiper-slide">
					<div class="card">
						<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
							<img src="./assets/img/Banner Swiper/home4-category2-banner1.webp" class="w-100" />
							<a href="#!">
								<div class="mask">
									<div class="d-flex justify-content-start align-items-end h-100">
										<h5><span class="badge bg-primary ms-2">New</span></h5>
									</div>
								</div>
								<div class="hover-overlay">
									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
								</div>
							</a>
						</div>
						<div class="card-body">
							<a href="" class="text-reset">
								<h5 class="card-title mb-3">Product name</h5>
							</a>
							<a href="" class="text-reset">
								<p>Category</p>
							</a>
							<h6 class="mb-3">$61.99</h6>
						</div>

					</div>
				</div>
				<div class="swiper-slide">
					<div class="card">
						<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
							<img src="./assets/img/Banner Swiper/home4-category2-banner1.webp" class="w-100" />
							<a href="#!">
								<div class="mask">
									<div class="d-flex justify-content-start align-items-end h-100">
										<h5><span class="badge bg-primary ms-2">New</span></h5>
									</div>
								</div>
								<div class="hover-overlay">
									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
								</div>
							</a>
						</div>
						<div class="card-body">
							<a href="" class="text-reset">
								<h5 class="card-title mb-3">Product name</h5>
							</a>
							<a href="" class="text-reset">
								<p>Category</p>
							</a>
							<h6 class="mb-3">$61.99</h6>
						</div>

					</div>
				</div>
				<div class="swiper-slide">
					<div class="card">
						<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
							<img src="./assets/img/Banner Swiper/home4-category2-banner1.webp" class="w-100" />
							<a href="#!">
								<div class="mask">
									<div class="d-flex justify-content-start align-items-end h-100">
										<h5><span class="badge bg-primary ms-2">New</span></h5>
									</div>
								</div>
								<div class="hover-overlay">
									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
								</div>
							</a>
						</div>
						<div class="card-body">
							<a href="" class="text-reset">
								<h5 class="card-title mb-3">Product name</h5>
							</a>
							<a href="" class="text-reset">
								<p>Category</p>
							</a>
							<h6 class="mb-3">$61.99</h6>
						</div>

					</div>
				</div>
				<div class="swiper-slide">
					<div class="card">
						<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
							<img src="./assets/img/Banner Swiper/home4-category2-banner1.webp" class="w-100" />
							<a href="#!">
								<div class="mask">
									<div class="d-flex justify-content-start align-items-end h-100">
										<h5><span class="badge bg-primary ms-2">New</span></h5>
									</div>
								</div>
								<div class="hover-overlay">
									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
								</div>
							</a>
						</div>
						<div class="card-body">
							<a href="" class="text-reset">
								<h5 class="card-title mb-3">Product name</h5>
							</a>
							<a href="" class="text-reset">
								<p>Category</p>
							</a>
							<h6 class="mb-3">$61.99</h6>
						</div>

					</div>
				</div>
				<div class="swiper-slide">
					<div class="card">
						<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
							<img src="./assets/img/Banner Swiper/home4-category2-banner1.webp" class="w-100" />
							<a href="#!">
								<div class="mask">
									<div class="d-flex justify-content-start align-items-end h-100">
										<h5><span class="badge bg-primary ms-2">New</span></h5>
									</div>
								</div>
								<div class="hover-overlay">
									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
								</div>
							</a>
						</div>
						<div class="card-body">
							<a href="" class="text-reset">
								<h5 class="card-title mb-3">Product name</h5>
							</a>
							<a href="" class="text-reset">
								<p>Category</p>
							</a>
							<h6 class="mb-3">$61.99</h6>
						</div>

					</div>
				</div>


			</div>
			<div class="swiper-pagination"></div>
			<div style="margin-top :70px;"></div>
		</div>
	</div>


	<!-- Swiper JS -->
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper(".mySwiper", {
			slidesPerView: 1,
			spaceBetween: 10,

			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			breakpoints: {
				640: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				768: {
					slidesPerView: 4,
					spaceBetween: 40,
				},
				1024: {
					slidesPerView: 4,
					spaceBetween: 50,
				},
			},
		});
	</script>
</body>

</html>