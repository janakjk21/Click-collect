<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Swiper demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<!-- <link rel="stylesheet" href="./Topcatogerios.css" /> -->
	<!-- Link Swiper's CSS -->
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
			/* box-shadow: 0 0 4px 0 rgba(1, 1, 1, 0.1); */
			box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
		}

		.swiper-slide img {
			display: block;
			width: 100%;
			height: 70%;
			object-fit: cover;
		}
	</style>
</head>

<body>
	<hr>
	<div style="margin-top :70px;"></div>
	<div style="text-align: center;">
		<h1 style="font-size:50px ; "> Deal of The day</h1>
	</div>

	<div class="swiper mySwiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div style="width: 300px">
					<a class="" href="" style="text-decoration: none">
						<div class="nasa-cat-thumb text-center nasa-transition">
							<img src="./assets/img/swiper/product04.webp" alt="Milks &amp; Creams" data-ll-status="loaded" class="entered lazyloaded" />
						</div>
						<h3 style="color: #a2c207">Milks & Creams</h3>
					</a>
				</div>
			</div>
			<div class="swiper-slide">
				<div style="width: 323px">
					<a class="" href="" style="text-decoration: none">
						<div class="nasa-cat-thumb text-center nasa-transition">
							<img src="./assets/img/swiper/product05.webp" alt="Milks &amp; Creams" data-ll-status="loaded" class="entered lazyloaded" />
						</div>
						<h3 style="color: #a2c207">Milks & Creams</h3>
					</a>
				</div>
			</div>
			<div class="swiper-slide">
				<div style="width: 323px">
					<a class="" href="" style="text-decoration: none">
						<div class="nasa-cat-thumb text-center nasa-transition">
							<img src="./assets/img/swiper/product06.webp" alt="Milks &amp; Creams" data-ll-status="loaded" class="entered lazyloaded" />
						</div>
						<h3 style="color: #a2c207">Milks & Creams</h3>
					</a>
				</div>
			</div>
			<div class="swiper-slide">
				<div style="width: 323px">
					<a class="" href="" style="text-decoration: none">
						<div class="nasa-cat-thumb text-center nasa-transition">
							<img src="./assets/img/swiper/product07.webp" alt="Milks &amp; Creams" data-ll-status="loaded" class="entered lazyloaded" />
						</div>
						<h3 style="color: #a2c207">Milks & Creams</h3>
					</a>
				</div>
			</div>
			<div class="swiper-slide">
				<div style="width: 323px">
					<a class="" href="" style="text-decoration: none">
						<div class="nasa-cat-thumb text-center nasa-transition">
							<img src="./assets/img/swiper/product07.webp" alt="Milks &amp; Creams" data-ll-status="loaded" class="entered lazyloaded" />
						</div>
						<h3 style="color: #a2c207">Milks & Creams</h3>
					</a>
				</div>
			</div>
			<div class="swiper-slide">
				<div style="width: 323px">
					<a class="" href="" style="text-decoration: none">
						<div class="nasa-cat-thumb text-center nasa-transition">
							<img src="./assets/img/swiper/product07.webp" alt="Milks &amp; Creams" data-ll-status="loaded" class="entered lazyloaded" />
						</div>
						<h3 style="color: #a2c207">Milks & Creams</h3>
					</a>
				</div>
			</div>


		</div>
		<div class="swiper-pagination"></div>
		<div style="margin-top :70px;"></div>
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
					slidesPerView: 5,
					spaceBetween: 50,
				},
			},
		});
	</script>
</body>

</html>