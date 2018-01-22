<!DOCTYPE html>
<html ng-app="deleteAccount">
  <head>
    <title>  CENTRAL cemeteries </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>

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
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="assets/navdrop.css" type="text/css">
    <linc rel="stylesheet" href="assets/successpopup.css" type="text/css">

    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
    <script src="assets/dropdown/js/script.min.js"></script>
    <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/smooth-scroll/smooth-scroll.js"></script>
	  <script src="assets/theme/js/script.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="assets/angular-1.6.7/angular.min.js"></script>
    <script type="text/javascript" src="deleteAccount.js"></script>

    <input name="animation" type="hidden">
  </head>

  <body style="padding-top: 90px;@media (max-width: device-width) { body {padding-top: 0px; }}">
	<section id="ext_menu-n" data-rv-view="92" ng-controller=deleteController>
	  <nav class="navbar navbar-dropdown">
		  <div class="container">
			  <div class="mbr-table">
				  <div class="mbr-table-cell">
					  <div class="navbar-brand">
						  <a href="home.php" class="etl-icon icon-lightbulb mbr-iconfont mbr-iconfont-menu navbar-logo" style="color: rgb(250, 197, 28);"></a>
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
						  <li class="nav-item dropdown">
  							<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
                  <?php
                    echo $_SESSION['name']." ".$_SESSION['surname'];
                  ?>
                  <b class="caret"></b>
                </a>
  							<ul class="dropdown-menu">
  								<li><a href="#myModal" class="dropdown-item" data-toggle="modal">Delete account</a></li>
                  <div class="dropdown-divider"></div>
  								<li><a href="logout.php" class="dropdown-item">Log out</a></li>
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
    <div id="myModal" class="modal fade">
      <div class="modal-dialog modal-confirm text-center">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h4 class="modal-title">Are you sure?</h4>
          </div>
          <div class="modal-body">
            <p>Do you really want to delete your account?</p>
          </div>
          <div class="modal-footer btn-group center">
            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" ng-click="delete()">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </section>
