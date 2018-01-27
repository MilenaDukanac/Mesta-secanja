<!DOCTYPE html>
<html ng-app="rootApp">
<head>
    <title>  CENTRAL cemeteries </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="shortcut icon" href="assets/images/logo-small.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
    <script src="assets/dropdown/js/script.min.js"></script>
    <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/smooth-scroll/smooth-scroll.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/masonry/masonry.pkgd.min.js"></script>
    <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
    <script src="assets/mobirise-gallery/player.min.js"></script>
    <script src="assets/mobirise-gallery/script.js"></script>

    <script type="text/javascript" src="assets/angular-1.6.7/angular.min.js"></script>
    <script type="text/javascript" src="login.js"></script>

    <script type="text/javascript">
        var niz = [];
    </script>
    <input name="animation" type="hidden">

</head>

<body style="background-color: rgb(40, 50, 78); padding-top: 90px;@media (max-width: device-width) { body {padding-top: 0px; }}">
<section id="ext_menu-n" data-rv-view="92">
    <nav class="navbar navbar-dropdown">
        <div class="container">
            <div class="mbr-table">
                <div class="mbr-table-cell">
                    <div class="navbar-brand">
                        <img src="assets/images/logo-small.png" href="home.php">
                        <a class="navbar-caption text-warning" href="home.php">CENTRAL Cemeteries</a>
                    </div>
                </div>

                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item">
                            <a class="nav-link link" href="cemeteries.php">CEMETERIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="regions.php">REGIONS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#contacts4-3">CONTACT</a>
                        </li>

                    </ul>

                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</section>
<script type="text/javascript">
    niz.push("app");
</script>
<section class="mbr-info mbr-info-extra mbr-section mbr-section-md-padding mbr-after-navbar" id="msg-box1-d" data-rv-view="98" style="background-color: rgb(40, 50, 78); padding-top: 0px; padding-bottom: 30px;">
    <div class="container">
        <div class="row">
            <div class="mbr-table-md-up">
                <div class="mbr-table-cell mbr-right-padding-md-up col-md-8 text-xs-center text-md-left">
                    <h3 class="mbr-info-title mbr-section-title display-2 text-warning">WELCOME</h3></br>
                    <h2 class="mbr-info-subtitle mbr-section-subtitle">To use some of our special services, register or log in if you already have an account</h2>
                </div>

                <div class="mbr-table-cell col-md-4" ng-controller="loginControler">
                    <div class="text-xs-center">
                        <form>
                            <div class="form-group">
                                <div class="mt-1">
                                    <label class="form-control-label text-white" for="form1-o-username">Username</label>
                                    <input type="text" class="form-control" name="username" required="" data-form-field="Username" id="form1-o-username" ng-model="username">
                                </div>
                                <div class="mt-2">
                                    <label class="form-control-label text-white" for="form1-o-password">Password</label>
                                    <input type="password" class="form-control" name="password" required="" data-form-field="Password" id="form1-o-password" ng-model="password">
                                </div>
                            </div>
                        </form>
                        <a class="btn btn-primary" ng-click="login()" href="#newMessage" data-toggle="modal">Log in</a>
                        <a class="btn btn-secondary" href="registration.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

   <div id="newMessage" class="modal fade">
        <div class="modal-dialog modal-confirm text-center">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Warning</h4>
                </div>
                <div class="container modal-body">
                   <label class="form-control-label"> Incorrect username or password! </label> 
				   <br>
				   <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal">
                        Close
                   </button>
                </div>
            </div>
        </div>
    </div>
<!--<!DOCTYPE html>
<html ng-app="rootApp">
<head>
    <title>  CENTRAL cemeteries </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="shortcut icon" href="assets/images/logo-small.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
	<link rel="stylesheet" href="assets/navdrop1.css" type="text/css">
	
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
    <script src="assets/dropdown/js/script.min.js"></script>
    <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/smooth-scroll/smooth-scroll.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/masonry/masonry.pkgd.min.js"></script>
    <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
    <script src="assets/mobirise-gallery/player.min.js"></script>
    <script src="assets/mobirise-gallery/script.js"></script>

    <script type="text/javascript" src="assets/angular-1.6.7/angular.min.js"></script>
    <script type="text/javascript" src="login.js"></script>

    <script type="text/javascript">
        var niz = [];
    </script>
    <input name="animation" type="hidden">

</head>

<body style="background-color: rgb(40, 50, 78); padding-top: 90px;@media (max-width: device-width) { body {padding-top: 0px; }}">

<script type="text/javascript">
    niz.push("app");
</script>

<section id="ext_menu-n" data-rv-view="92">
    <nav class="navbar navbar-dropdown">
        <div class="container">
            <div class="mbr-table">
                <div class="mbr-table-cell">
                    <div class="navbar-brand">
                        <img src="assets/images/logo-small.png" href="home.php">
                        <a class="navbar-caption text-warning" href="home.php">CENTRAL Cemeteries</a>
                    </div>
                </div>

                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item">
                            <a class="nav-link link" href="cemeteries.php">CEMETERIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="regions.php">REGIONS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#contacts4-3">CONTACT</a>
                        </li>
						<li class="nav-item">
							<a class="nav-link link" href="registration.php">REGISTER</a>
						</li>	
						<li class="nav-item">
							<ul class="nav navbar-nav navbar-right ml-auto">
								<li class="nav-item" >
									<button data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Login</button>
									<ul class="dropdown-menu form-wrapper" data-backdrop="static">					
										<li>
											<form ng-controller="loginControler">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Username" required="required" ng-model="username">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" placeholder="Password" required="required" ng-model="password">
												</div>
												<button class="btn btn-sm btn-primary" ng-click="login()">
													Log in
												</button>
												<div class="alert alert-danger alert-dismissible" ng-show="showLoginMessage">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<strong>{{loginMessage}}</strong>
												</div>
												<div class="form-footer">
													<a href="#">Forgot Your password?</a>
												</div>
											</form>
										</li>
									</ul>
								</li>
							</ul>
						</li>
                    </ul>
					

                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</section>

<section class="mbr-info mbr-info-extra mbr-section mbr-section-md-padding mbr-after-navbar" id="msg-box1-d" data-rv-view="98" style="background-color: rgb(40, 50, 78); padding-top: 0px; padding-bottom: 30px;">
    <div class="container">
        <div class="row">
            <div class="mbr-table-md-up">
                <div class="mbr-table-cell mbr-right-padding-md-up col-md-8 text-xs-center text-md-left">
                    <h3 class="mbr-info-title mbr-section-title display-2 text-warning">WELCOME</h3></br>
                    <h2 class="mbr-info-subtitle mbr-section-subtitle">To use some of our special services, register or log in if you already have an account</h2>
                </div>

                <div class="mbr-table-cell col-md-4" ng-controller="loginControler">
                    <div class="text-xs-center">
                       <!-- <form>
                            <div class="form-group">
                                <div class="mt-1">
                                    <label class="form-control-label text-white" for="form1-o-username">Username</label>
                                    <input type="text" class="form-control" name="username" required="" data-form-field="Username" id="form1-o-username" ng-model="username">
                                </div>
                                <div class="mt-2">
                                    <label class="form-control-label text-white" for="form1-o-password">Password</label>
                                    <input type="password" class="form-control" name="password" required="" data-form-field="Password" id="form1-o-password" ng-model="password">
                                </div>
                            </div>
							<div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
								<button type="submit" class="btn btn-sm btn-primary" ng-click="login()">
									Log in
								</button>
							</div>
						</form>-->
						
                <!--    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
