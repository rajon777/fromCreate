<?php
session_start();
require 'db.php';
$select_logo = "SELECT * FROM logos";
$select_logo_res = mysqli_query($db_connection, $select_logo);
$after_assoc_logo = mysqli_fetch_assoc($select_logo_res);
// about
$select = "SELECT * FROM abouts";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
// skill 
$skills = "SELECT * FROM skills WHERE stutas = 1";
$skills_res = mysqli_query($db_connection, $skills);

// services

$select = "SELECT * FROM services WHERE status = 1";
$select_res_services = mysqli_query($db_connection, $select);

// protfolios
$select = "SELECT * FROM protfolios WHERE status = 1";
$select_res_protfolio = mysqli_query($db_connection, $select);
// feedbacks 
$select_tes = "SELECT * FROM feedbacks";
$select_tes_res =  mysqli_query($db_connection, $select_tes);


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="portfolio,creative,business,company,agency,multipurpose,modern,bootstrap4">

	<meta name="author" content="themeturn.com">

	<title>Ratsaan| Creative portfolio template</title>

	<!-- Mobile Specific Meta-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<!-- Themeify Icon Css -->
	<link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
	<!-- animate.css -->
	<link rel="stylesheet" href="plugins/animate-css/animate.css">
	<link rel="stylesheet" href="plugins/aos/aos.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="plugins/owl/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="plugins/owl/assets/owl.theme.default.min.css">
	<!-- Slick slider CSS -->
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body class="portfolio" id="top">


	<!-- Navigation start -->
	<!-- Header Start -->

	<nav class="navbar navbar-expand-lg bg-transprent fixed-top navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="/fromCreate/index.php">
				<img src="uploads/logo/<?= $after_assoc_logo['header_logo'] ?>" alt="" width="150">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
				<span class="ti-view-list"></span>
			</button>

			<div class="collapse navbar-collapse text-center" id="navbarsExample09">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="/fromCreate/index.php">Home</a></li>
					<li class="nav-item"><a class="nav-link smoth-scroll" href="#skillbar">Expertise</a></li>
					<li class="nav-item"><a class="nav-link smoth-scroll" href="#service">Services</a></li>
					<li class="nav-item"><a class="nav-link smoth-scroll" href="#portfolio">Portfolio</a></li>
					<li class="nav-item"><a class="nav-link smoth-scroll" href="#testimonial">Testimonial</a></li>
					<li class="nav-item"><a class="nav-link smoth-scroll" href="#contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>


	<!-- Navigation End -->

	<!-- Banner start -->

	<!-- Slider Start -->
	<section class="slider py-7 ">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 col-sm-12 col-12 col-md-5">
					<div class="slider-img position-relative">
						<img src="uploads/image/<?= $after_assoc['image'] ?>" alt="" class="img-fluid w-100">
					</div>
				</div>

				<div class="col-lg-6 col-12 col-md-7">
					<?php
					$after_explode = explode(' ', $after_assoc['name']);
					$last = end($after_explode);
					?>
					<div class="ml-5 position-relative mt-5 mt-lg-0">
						<span class="head-trans"><?= $last ?></span>
						<h1 class="font-weight-normal text-color text-md"><i class="ti-minus mr-2"></i><?= $after_assoc['designation'] ?></h1>
						<h2 class="mt-3 text-lg mb-3 text-capitalize"><?= $after_assoc['name'] ?></h2>
						<p class="animated fadeInUp lead mt-4 mb-5 text-white-50 lh-35"><?= $after_assoc['desp'] ?></p>
						<a href="#about" class="btn btn-solid-border">About Me</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Banner End -->

	<!-- Skills start -->
	<section class="section bg-gray" id="skillbar" data-aos="fade-up">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>Skills Set</span>
						<h2 class="title">Expertise</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<?php foreach ($skills_res as $skill) { ?>
					<div class="col-lg-6 col-md-6">
						<div class="skill-bar mb-4 mb-lg-0">
							<div class="mb-4 text-right">
								<h4 class="font-weight-normal"><?= $skill['skill_name'] ?></h4>
							</div>
							<div class="progress">
								<div class="progress-bar" data-percent="<?= $skill['skill_percentage'] ?>">
									<span class="percent-text"><span class="count"><?= $skill['skill_percentage'] ?></span>%</span>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>
	</section>

	<!-- Skills End -->

	<!-- Service start -->
	<section class="section bg-gray" id="service" data-aos="fade-up">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>What i do</span>
						<h2 class="title">Services</h2>
					</div>
				</div>
			</div>

			<div class="row no-gutters">
				<?php foreach ($select_res_services as $service) { ?>
					<div class="col-lg-4 col-md-6">
						<div class="card p-5 rounded-0">
							<h3 class="my-4 text-capitalize"><?= $service['title'] ?></h3>
							<p><?= $service['desp'] ?></p>
						</div>
					</div>
				<?php } ?>

			</div>

			<div class="row align-items-center mt-5" data-aos="fade-up">
				<div class="col-lg-6 mt-5">
					<h2 class="mb-5 text-lg-2 text-white-50">Let's <span class="text-white">work together</span> on your next project </h2>
				</div>
				<div class="col-lg-4 ml-auto text-right">
					<a href="#contact" class="btn btn-main text-white smoth-scroll">Hire Me</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Service End -->

	<!-- Portfolio start -->
	<section class="section" id="portfolio" data-aos="fade-up">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus"></i>works</span>
						<h2 class="title">Portfolio</h2>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="post_gallery owl-carousel owl-theme">
					<?php foreach ($select_res_protfolio as $protfolio) { ?>
						<div class="item">
							<div class="portfolio-item position-relative ">
								<img style="width: 400px; height: 400px;" src="/fromCreate/uploads/protfolio/<?= $protfolio['image'] ?>" alt="" class="img-fluid">

								<div class="portoflio-item-overlay">
									<a href="portfolio-single.html"><i class="ti-plus"></i></a>
								</div>
							</div>
							<div class="text mt-3">
								<h4 class="mb-1 text-capitalize"><?= $protfolio['title'] ?></h4>
								<p class="text-uppercase letter-spacing text-sm"><?= $protfolio['category'] ?></p>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</section>
	<!-- Portfolio End -->

	<!-- Tetsimonial start -->
	<section id="testimonial" class="section testomionial" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="section-title">
						<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>testimonial</span>
						<h1 class="title">What People Say About me</h1>
					</div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="testimonial-slider">
						<?php foreach ($select_tes_res as $feedback) { ?>
							<div class="testimonial-item position-relative">
								<i class="ti-quote-left text-white-50"></i>
								<div class="testimonial-content">
									<p class="text-md mt-3"><?= $feedback['feedback'] ?></p>

									<div class="media mt-5 align-items-center">
										<img src="/fromCreate/uploads/feedback/<?= $feedback['image'] ?>" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
										<div class="media-body">
											<h3 class="mb-0"><?= $feedback['name'] ?></h3>
											<span class="text-muted"><?= $feedback['category'] ?></span>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
	</section>
	<!-- Tetsimonial End -->


	<!-- Contact start  1-->
	<section class="section" id="feedback" data-aos="fade-up">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>Feedback</span>
						<h1 class="title">Give Your Feedback</h1>
					</div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-8">
					<?php if (isset($_SESSION['feedback'])) { ?>
						<h3 class="text-green"><?= $_SESSION['feedback'] ?></h3>
					<?php }
					unset($_SESSION['feedback']) ?>

					<form class="contact__form form-row contact-form" method="POST" action="feedback/feedback_post.php" id="contactForm" enctype="multipart/form-data">
						<div class="form-group col-lg-6 mb-5">
							<input type="text" id="name" name="name" class="form-control bg-transparent" placeholder="Your Name">
						</div>
						<div class="form-group col-lg-6 mb-5">
							<input type="text" name="category" id="" class="form-control bg-transparent" placeholder="Your Categroy">
						</div>
						<div class="form-group col-lg-12 mb-5">
							<input type="file" name="image" id="" class="form-control bg-transparent" placeholder="Your File">
							<?php if (isset($_SESSION['feedback_err'])) { ?>
								<h3 class="text-danger"><?= $_SESSION['feedback_err'] ?></h3>
							<?php }
							unset($_SESSION['feedback_err']) ?>

							<?php if (isset($_SESSION['feedback_size'])) { ?>
								<h3 class="text-danger"><?= $_SESSION['feedback_size'] ?></h3>
							<?php }
							unset($_SESSION['feedback_size']) ?>
						</div>

						<div class="form-group col-lg-12 mb-5">
							<textarea id="message" name="feedback" cols="30" rows="6" class="form-control bg-transparent" placeholder="Your Message"></textarea>

							<div class="text-center">
								<input class="btn btn-main text-white mt-5" id="submit" name="submit" type="submit" class="btn btn-hero" value="Send Feedback">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact End -->

	<!-- Contact start 2-->
	<section class="section" id="contact" data-aos="fade-up">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>Contact</span>
						<h1 class="title">Get in Touch</h1>
					</div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-8">
					<?php if (isset($_SESSION['massage'])) { ?>
						<div class="text-info"><?= $_SESSION['massage'] ?></div>
					<?php }
					unset($_SESSION['massage']) ?>
					<form class="contact__form form-row contact-form" method="post" action="massage/massage_post.php">

						<div class="form-group col-lg-6 mb-5">
							<input type="text" id="name" name="name" class="form-control bg-transparent" placeholder="Your Name">
						</div>
						<div class="form-group col-lg-6 mb-5">
							<input type="text" name="email" id="email" class="form-control bg-transparent" placeholder="Your Email">
						</div>
						<div class="form-group col-lg-12 mb-5">
							<input type="text" name="subject" id="subject" class="form-control bg-transparent" placeholder="Your Subject">
						</div>

						<div class="form-group col-lg-12 mb-5">
							<textarea id="massage" name="massage" cols="30" rows="6" class="form-control bg-transparent" placeholder="Your Message"></textarea>

							<div class="text-center">
								<input class="btn btn-main text-white mt-5" id="submit" name="submit" type="submit" class="btn btn-hero" value="Send Message">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact End -->







	<!-- Extra Footer section Start -->
	<footer class="bg-dark text-white text-center text-lg-start">
		<div class="container p-4">
			<div class="row">
				<div class="col-lg-2">
					<img src="uploads/logo/<?= $after_assoc_logo['footer_logo'] ?>" alt="" width="250">
				</div>

				<div class="col-lg-4 text-center pl-5 my-auto">
					<p class="lead"><span class="text-color">Dreambuzz</span> © 2024 All Right Reserved Ratsaan.</p>
					<a href="#top" class="backtop smoth-scroll"><i class="ti-angle-up"></i></a>
				</div>

				<div class="col-lg-6 m-auto">
					<h5 class="text-uppercase mb-4 ml-4" style="font-size: 30px;">Contact Us</h5>
					<ul class="">
						<a target="blank" href="https://www.facebook.com/sk.rajonsarker.1" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
								<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
							</svg></i></i></a>
						<a href="" class="text-info pl-2 pr-2"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
								<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
							</svg></i></a>
						<a href="" class="text-danger pl-2;"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
								<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
							</svg></i></a>
						<a target="blank" href="https://wa.me/<01722144515>" class="text-success pl-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
								<path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
							</svg>
						</a>

					</ul>
				</div>
			</div>
		</div>

	</footer>

	<!-- Font Awesome for social media icons -->
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


	<!-- Extra Footer Section end-->





	<!-- 
    Essential Scripts
    =====================================-->

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- Main jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4.3.1 -->
	<script src="plugins/bootstrap/js/popper.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/nav/jquery.easing.1.3.html"></script>

	<!-- Slick Slider -->
	<script src="plugins/slick-carousel/slick/slick.min.js"></script>
	<script src="plugins/owl/owl.carousel.min.js"></script>

	<!-- Skill COunt -->
	<script src="plugins/counto/apear.js"></script>
	<script src="plugins/counto/counTo.js"></script>
	<!-- AOS Animation -->
	<script src="plugins/aos/aos.js"></script>

	<script src="js/script.js"></script>
	<script src="js/ajax-contact.html"></script>

</body>

</html>