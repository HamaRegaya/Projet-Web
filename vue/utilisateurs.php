<?php
session_start();

if(isset($_SESSION["email"])) {
}else{
  session_destroy();
	header('Location: login.php');

    
}
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Courses | Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/img/slogan.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li class="active" ><a href="index.html">Home</a></li>
                                                <li><a href="courses.html">Courses</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="#">Blog</a>
                                                    <ul class="submenu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog_details.html">Blog Details</a></li>
                                                        <li><a href="elements.html">Element</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <!-- Button -->
                                               
                                                <li class="button-header"><a href="logout.php" class="btn btn3">logout</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> 
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>


    <main>
     
        <!--? slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                
		<div class="container">
			<div class="row">
				<h1><strong>Liste des Utilisateurs</strong></h1>
			</div>

			<div class="row">
                            </br>
					
				<table class="table table-striped">
					<thead>
						<tr>
                                                    <th><a href="?orderby=id">#</th>
                                                    <th><a href="?orderby=nom">Nom</a></th>
                                                    <th><a href="?orderby=prenom">Prenom</a></th>
                                                    <th><a href="?orderby=email">Email</a></th>
                                                    <th><a href="?orderby=telephone">Téléphone</a></th>
                                                    <th><a href="?orderby=mdp">Mot de Passe</a></th>
                                                    <th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($utilisateurs as $utilisateurs) : ?>						
							<tr>
                                                            <td><?php echo htmlentities($utilisateurs->id);?></td>
								<td><?php echo htmlentities($utilisateurs->nom);  ?></td>
                                                                <td><?php echo htmlentities($utilisateurs->prenom);  ?></td>
								<td><?php echo htmlentities($utilisateurs->email); ?></td>
								<td><?php echo htmlentities($utilisateurs->telephone); ?></td>
                                                                <td><?php echo htmlentities($utilisateurs->mdp);  ?></td>
								<td>
									
									<a class="btn btn-success" href="index.php?op=modifier&id=<?php echo $utilisateurs->id; ?>">Modifier</a>
									<a class="btn btn-danger" href="index.php?op=supprimer&id=<?php echo $utilisateurs->id; ?>"onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimmer</a>
								</td>

							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	
                            
			<ul class="nav pull-right top-menu">
        </ul>

        </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>
        <!-- ? services-area -->
       
        <!-- Courses area start -->
        
  </footer> 
  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="./assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

</body>
</html>