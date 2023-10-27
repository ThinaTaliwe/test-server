<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GBA System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/landingassets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/landingassets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/landingassets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/landingassets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/landingassets/vendor/aos/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/landingassets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/landingassets/img/logo.png" alt=""> -->
        <h1>Group Burial Association</h1>
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#" class="active">Home</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <a class="btn-getstarted" href="{{ url('/login') }}">Sign In</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="assets/landingassets/img/birds/2.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
			<h2 data-aos="fade-up" data-aos-delay="100">Welcome to the Group Burial Association.</h2>
			<p data-aos="fade-up" data-aos-delay="200">Ensuring Dignity and Respect in Life's Final Chapter</p>
          </div>
          <div class="col-lg-5">
            <form action="/../index.php" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
              <input type="text" class="form-control" placeholder="Enter email address">
              <input type="button" class="btn btn-primary" onclick="document.location='/register'" value="Join Now">
            </form>
          </div>
        </div>
      </div>

    </section><!-- End Hero Section -->

    <!-- Testimonials Section - Home Page -->
    <section id="testimonials" class="testimonials">

      <div class="container">

        <div class="row align-items-center">

          <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
            <h3>Testimonials</h3>
			<p>
				Read from people who have found peace and solace with our burial services.
			  </p>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

            <div class="swiper">
              <template class="swiper-config">
                {
                "loop": true,
                "speed" : 600,
                "autoplay": {
                "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
                }
                }
              </template>
              <div class="swiper-wrapper">

				<div class="swiper-slide">
					<div class="testimonial-item">
					  <div class="d-flex">
						<img src="assets/landingassets/img/testimonials/testimonials-1.jpg" class="testimonial-img flex-shrink-0" alt="">
						<div>
						  <h3>Mary Johnson</h3>
						  <h4>Member Since 2022</h4>
						  <div class="stars">
							<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
						  </div>
						</div>
					  </div>
					  <p>
						<i class="bi bi-quote quote-icon-left"></i>
						<span>GBA provided incredible support during our family's toughest times. Their attention to detail and respect for our loved one made the process much easier to navigate.</span>
						<i class="bi bi-quote quote-icon-right"></i>
					  </p>
					</div>
				  </div><!-- End testimonial item -->
				  
				  <div class="swiper-slide">
					<div class="testimonial-item">
					  <div class="d-flex">
						<img src="assets/landingassets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
						<div>
						  <h3>Robert Thompson</h3>
						  <h4>Member Since 2021</h4>
						  <div class="stars">
							<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
						  </div>
						</div>
					  </div>
					  <p>
						<i class="bi bi-quote quote-icon-left"></i>
						<span>The level of professionalism and compassion shown by GBA is unmatched. They were there for us every step of the way.</span>
						<i class="bi bi-quote quote-icon-right"></i>
					  </p>
					</div>
				  </div><!-- End testimonial item -->
				  
				  <div class="swiper-slide">
					<div class="testimonial-item">
					  <div class="d-flex">
						<img src="assets/landingassets/img/testimonials/testimonials-4.jpg" class="testimonial-img flex-shrink-0" alt="">
						<div>
						  <h3>Linda Williams</h3>
						  <h4>Member Since 2023</h4>
						  <div class="stars">
							<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
						  </div>
						</div>
					  </div>
					  <p>
						<i class="bi bi-quote quote-icon-left"></i>
						<span>Joining GBA was one of the best decisions we've made. Knowing that they will take care of everything with such dignity and respect gives us peace of mind.</span>
						<i class="bi bi-quote quote-icon-right"></i>
					  </p>
					</div>
				  </div><!-- End testimonial item -->
				  
				  <div class="swiper-slide">
					<div class="testimonial-item">
					  <div class="d-flex">
						<img src="assets/landingassets/img/testimonials/testimonials-5.jpg" class="testimonial-img flex-shrink-0" alt="">
						<div>
						  <h3>Charles Smith</h3>
						  <h4>Member Since 2022</h4>
						  <div class="stars">
							<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
						  </div>
						</div>
					  </div>
					  <p>
						<i class="bi bi-quote quote-icon-left"></i>
						<span>GBA provided a great service for my family. Their compassion and understanding in our time of need was beyond our expectations.</span>
						<i class="bi bi-quote quote-icon-right"></i>
					  </p>
					</div>
				  </div><!-- End testimonial item -->
				  

              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Testimonials Section -->

    <!-- Contact Section - Home Page -->
    <section id="contact" class="contact">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Should you have any queries or require further information, please don't hesitate to contact us.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>A108 Adam Street</p>
                  <p>New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                  <p>+1 6678 254445 41</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                  <p>contact@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday</p>
                  <p>9:00AM - 05:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <x-button id="btnSendEmail" type="submit" class="btn-primary" text="Send E-Mail">Send E-Mail</x-button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container copyright text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1"><span>GBA System</span></strong> <span>All Rights Reserved</span></p>
    </div>

  </footer><!-- End Footer -->

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/landingassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/landingassets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/landingassets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/landingassets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/landingassets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/landingassets/vendor/aos/aos.js"></script>
  <script src="assets/landingassets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/landingassets/js/main.js"></script>

</body>

</html>