<?php 

include_once  "models/Functions.php";
include_once "config/Database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="static/img/favicon.png" rel="icon">
  <link href="static/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="static/vendor/aos/aos.css" rel="stylesheet">
  <link href="static/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="static/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="static/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="static/css/style2.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
     <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">
            
            <h1 class="logo"><a >
                <div  data-aos="fade-left" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                <img src="static/img/logo/logo.jpeg" class="img-fluid" alt="">
                </div>
            </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link scrollto active" href="#hero">Acceuil</a></li>
                <li><a class="nav-link scrollto" href="#about">A propos</a></li>
                <li><a class="nav-link scrollto" href="#services">Projets</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                <!--<li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>-->
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                
                    <li class="dropdown"><a href="#"><span>Notre boutique</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    
                    <li class="dropdown"><a href="#"><span>Materiels électrique</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Materiels plomberie</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Materiels de climatisation</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>

                
                
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
        <img src="static/img/logo/logo.jpeg" class="img-fluid" alt="">
      </div>
      <h1>L'INGENIERIE DU BATIMENT ENTRE VOS MAINS</h1>
      <h2>Votre satisfaction est au centre de notre vision</h2>
      <a href="Admin/index.html" class="btn-get-started scrollto">Demandez un devis maintenant</a>
    </div>
    </section><!-- End Hero -->
    <!-- ======= MAIN======= -->
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
          <div class="container">
    
            <div class="row">
              <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
                <img src="static/img/wwr/img1.png" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                <h3>Pourquoi travaller avec nous?</h3>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                  <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
              </div>
            </div>
    
          </div>
        </section><!-- End About Section -->
    
        <!-- ======= Why Us Section ======= --
        <section id="why-us" class="why-us">
          <div class="container">
    
            <div class="row">
    
              <div class="col-lg-4" data-aos="fade-up">
                <div class="box">
                  <span>01</span>
                  <h4>Lorem Ipsum</h4>
                  <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
                </div>
              </div>
    
              <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
                <div class="box">
                  <span>02</span>
                  <h4>Repellat Nihil</h4>
                  <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
                </div>
              </div>
    
              <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <div class="box">
                  <span>03</span>
                  <h4> Ad ad velit qui</h4>
                  <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
                </div>
              </div>
    
            </div>
    
          </div>
        </section> End Why Us Section -->
    
       
    
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
          <div class="container">
    
            <div class="section-title">
              <span>Services</span>
              <h2>Services</h2>
              <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
            </div>
    
            <div class="row">
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <div class="icon-box">
                  <div class="icon"><i class="bx bxl-dribbble"></i></div>
                  <h4><a href="">Lorem Ipsum</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="150">
                <div class="icon-box">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">Sed ut perspiciatis</a></h4>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <div class="icon"><i class="bx bx-tachometer"></i></div>
                  <h4><a href="">Magni Dolores</a></h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="450">
                <div class="icon-box">
                  <div class="icon"><i class="bx bx-world"></i></div>
                  <h4><a href="">Nemo Enim</a></h4>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="600">
                <div class="icon-box">
                  <div class="icon"><i class="bx bx-slideshow"></i></div>
                  <h4><a href="">Dele cardo</a></h4>
                  <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="750">
                <div class="icon-box">
                  <div class="icon"><i class="bx bx-arch"></i></div>
                  <h4><a href="">Divera don</a></h4>
                  <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                </div>
              </div>
    
            </div>
    
          </div>
        </section><!-- End Services Section -->
    
        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
          <div class="container" data-aos="zoom-in">
    
            <div class="text-center">
              <h3>L'ingénierie Dans Son Excellence
                </h3>
              <p>Nous utilisons les dernières technologies et normes pour garantir les meilleures études de conception et d’exécution</p>
            
            </div>
    
          </div>
        </section><!-- End Cta Section -->
    
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
          <div class="container">
    
            <div class="section-title">
              <span>NOS TRAVAUX</span>
              <h2>NOS TRAVAUX</h2>
              <p>L'assurance d'une expertise de qualité</p>
            </div>
    
            <div class="row" data-aos="fade-up">
              <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">Voir tous</li>
                  <li data-filter=".filter-app">Travaux exécutés</li>
                  <li data-filter=".filter-card">Travaux de conception</li>
                  <li data-filter=".filter-web">Travaux en cours</li>
                </ul>
              </div>
            </div>
    
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">

            
                      <?php 
                    
                        $conception= file_get_contents('conception.json');
                        $conception= json_decode($conception,true);
                        for( $i=0; $i<count($conception);$i++) :
                    
                             
                      ?>
                            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                                <img src=<?php echo $conception[$i]['urlimg']?> class="img-fluid" alt='' style="max-width:100%;height:auto">
                                <div class="portfolio-info">
                                <h4><?php echo $conception[$i]['categorie']?> </h4>
                                <p><?php echo $conception[$i]['descriptionWimg']?></p>
                                <a href=<?php echo $conception[$i]['urlimg']?> data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title=<?php echo $conception[$i]['descriptionWimg']?>><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                              </div>
                              </div>
                      <?php  endfor; ?>
           
       
                      <?php 
                    
                        $conception= file_get_contents('exe.json');
                        $conception= json_decode($conception,true);
                        for( $i=0; $i<count($conception);$i++) :
                    
                             
                      ?>
                                 <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <img src=<?php echo $conception[$i]['urlimg']?> class="img-fluid" alt='' style="max-width:100%;height:auto">
                                <div class="portfolio-info">
                                <h4><?php echo $conception[0]['categorie']?> </h4>
                                <p><?php echo $conception[$i]['descriptionWimg']?></p>
                                <a href=<?php echo $conception[$i]['urlimg']?> data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title=<?php echo $conception[$i]['descriptionWimg']?>><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                              </div>
                              </div>
                        <?php  endfor; ?>
            
                   
                      <?php 
                    
                          $conception= file_get_contents('cours.json');
                          $conception= json_decode($conception,true);
                          for( $i=0; $i<count($conception);$i++) :
                      
                         
                       ?>
                             <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <img src=<?php echo $conception[$i]['urlimg']?> class="img-fluid" alt='' style="max-width:100%;height:auto">
                            <div class="portfolio-info">
                            <h4><?php echo $conception[0]['categorie']?> </h4>
                            <p><?php echo $conception[$i]['descriptionWimg']?></p>
                            <a href=<?php echo $conception[$i]['urlimg']?> data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title=<?php echo $conception[$i]['descriptionWimg']?>><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                          </div>
                          </div>
                       <?php  endfor; ?>


                  
          
            </div>
    
          </div>
        </section><!-- End Portfolio Section -->
    
      
    
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
          <div class="container">
    
            <div class="section-title">
              <span>L'EQUIPE WANDTECH</span>
              <h2>L'EQUIPE WANDTECH</h2>
              <p>Une équipe jeune et dynamique à votre service</p>
            </div>
    
            <div class="row">
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                <div class="member">
                  <img src="static/img/team/team-1.jpg" alt="">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <p>
                    Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                  </p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                <div class="member">
                  <img src="static/img/team/team-2.jpg" alt="">
                  <h4>Sarah Jhinson</h4>
                  <span>Product Manager</span>
                  <p>
                    Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                  </p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                <div class="member">
                  <img src="static/img/team/team-3.jpg" alt="">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <p>
                    Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                  </p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
    
            </div>
    
          </div>
        </section><!-- End Team Section -->
    
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container">
    
            <div class="section-title">
              <span>Contact</span>
              <h2>Contact</h2>
              <p>Nous restons à proximité de vos besoins</p>
            </div>
    
            <div class="row" data-aos="fade-up">
              <div class="col-lg-6">
                <div class="info-box mb-4">
                  <i class="bx bx-map"></i>
                  <h3>Notre Address</h3>
                  <p> Grand Mall CAMAIRCO,Yaounde</p>
                </div>
              </div>
    
              <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Laissez nous un Email</h3>
                  <p>contact@example.com</p>
                </div>
              </div>
    
              <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Appelez Nous</h3>
                  <p>+237 655391094</p>
                </div>
              </div>
    
            </div>
    
            <div class="row" data-aos="fade-up">
    
              <div class="col-lg-6 ">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
              </div>
    
              <div class="col-lg-6">
                <form action='controller/AppsController.php' method="post" role="form" >
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="Name" class="form-control"  placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" name="Email"  placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="Sujet"  placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="Message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Votre message a bien été envoyé. Merci!</div>
                  </div>
                  <div class="text-center"><button type="submit" name="msg_submit">Envoyez Message</button></div>
                </form>
              </div>
    
            </div>
    
          </div>
        </section><!-- End Contact Section -->
    <!--
        <section class="vh-100 gradient-custom">
        </section>
     -->
       
    
    
        <!-- Modal LOGIN -->
         <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Espace administrateur</h4>
                    <button  class="btn-close  btn-danger" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body row d-flex justify-content-center align-items-center h-100">
                
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
            
                            <div class="mb-md-5 mt-md-4 pb-5">
            
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <form action="PHP/sessionManagement/login.php" method="post" role="form" enctype="multipart/form-data">

                                <div class="row">
                               

                                  <div class=" form-white mb-4 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                  </div>
                                  <div class="form-white mb-4 form-group">
                                    <input type="password" name="password" class="form-control" id="pass" placeholder="Your pass" required>
                                  </div>
                                </div>
                                
                               
                                
                                <div><button class="btn btn-danger" type="submit" name="login">Envoyez Message</button></div>
                              </form>
                        </div>
                            <div>
                                <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>
                            
                        </div>
                    </div>
                            
                </div>
                
          


                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

  <!-- Modal LOGIN -->
         <!-- The Modal -->
         <div class="modal fade" id="myModalRegister">
            <div class="modal-dialog">
                <div class="modal-content bg-dark">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Espace administrateur</h4>
                        <button  class="btn-close  btn-danger" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body row d-flex justify-content-center align-items-center h-100">
                    
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                
                                <div class="mb-md-5 mt-md-4 pb-5">
                
                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <form action="controller/AppsController.php" method="post" role="form" enctype="multipart/form-data">

                                    <div class="row">
                                  

                                      <div class=" form-white mb-4 form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                      </div>
                                      <div class="form-white mb-4 form-group">
                                        <input type="password" name="password" class="form-control" id="pass" placeholder="Your pass" required>
                                      </div>
                                    </div>
                                    
                                  
                                    
                                    <div><button class="btn btn-danger" type="submit" name="login">Envoyez Message</button></div>
                                  </form>
                            </div>
                                <div>
                                    <p class="mb-0">Don't have an account? <a type="button" class="text-white-50 fw-bold" data-bs-toggle="modal"  data-bs-target="#myModalregister">Sign Up</a>
                                 
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                                
                    </div>
                    
              


                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
          </div>
    <div class="row">
       

      <div class="row form-group">
        <form action='controller/AppsController.php' method='post' role='form'>
           
              <div class="col-md-6">
                <input type="text" name="nom_user" class="form-control" placeholder="Nom" required>
              </div>
              <div class="col-md-6">
                <input type="text" name="prenom_user" class="form-control"  placeholder="Prenom" required>
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email_user"  placeholder="Your Email" required>
              </div>

              <div class="col-md-6">
                <input type="password" class="form-control" name="password"  placeholder="Mots de passe" required>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" name="telephone"  placeholder="telephone" required>
              </div>
              <div class="col-md-6">
                <input type="file" class="form-control" name="image"  placeholder="votre image" required>
              </div>

              <button type="submit" name="addUser">Envoyez</button>
               
        </form>
      </div>
    </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
  
            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>WANTECH TECHNOLOGIES</h3>
                <p>
                  Grand Mall CAMAIRCO <br>
                  Yaounde<br><br>
                  <strong>Phone:</strong> +237 655391094<br>
                  <strong>Email:</strong> info@example.com<br>
                </p>
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Nos Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Instation electrique</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Plomberie</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Climatisation</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Systemes de securite</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#"></a></li>
              </ul>
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Genius</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
          Designed by <a href="">Genius</a>
        </div>
      </div>
    </footer><!-- End Footer -->
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    

   



<!-- Vendor JS Files -->
<script src="static/vendor/aos/aos.js"></script>
<script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="static/vendor/glightbox/js/glightbox.min.js"></script>
<script src="static/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="static/vendor/swiper/swiper-bundle.min.js"></script>
<script src="static/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="static/js/main.js"></script>
</body>
</html>