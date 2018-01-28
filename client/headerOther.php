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
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="assets/navdrop.css" type="text/css">
    <link rel="stylesheet" href="assets/ng-tags-input.min.css" />

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
    <script>document.write('<base href="' + document.location + '" />');</script>
    <script src="assets/ng-tags-input.min.js"></script>


    <script type="text/javascript" src="assets/angular-1.6.7/angular.min.js"></script>
    <script type="text/javascript" src="deleteAccount.js"></script>
    <script type="text/javascript" src="uploadPhoto.js"></script>

    <script type="text/javascript">
        var niz = [];
    </script>
    <input name="animation" type="hidden">
</head>

<body class="container-fluid" style="background-color: rgb(40, 50, 78); padding-top: 90px;@media (max-width: device-width) { body {padding-top: 0px; }}">
<section id="ext_menu-n" data-rv-view="92">
    <nav class="navbar navbar-dropdown">
        <div class="container">
            <div class="mbr-table">
                <div class="mbr-table-cell">
                    <div class="navbar-brand">
						<a class="navbar-caption image" href="home.php">
							<img src="assets/images/logo-small.png">
						</a>
						<a class="navbar-caption" href="home.php" style="color: rgb(0, 154, 200);">CENTRAL Cemeteries</a>
                    </div>
                </div>

                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" style="color: rgb(0, 154, 200);">
                        <div class="hamburger-icon" style="color: rgb(0, 154, 200);"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item">
                            <a class="nav-link link" href="cemeteries.php" style="color: rgb(0, 154, 200);">CEMETERIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="regions.php" style="color: rgb(0, 154, 200);">REGIONS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="about.php" style="color: rgb(0, 154, 200);">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#contacts4-3" style="color: rgb(0, 154, 200);">CONTACT</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action" style="color: rgb(0, 154, 200);">
                                <?php
                                echo $_SESSION['name']." ".$_SESSION['surname'];
                                ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#deleteAcount" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Delete account</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a href="logout.php" class="dropdown-item" style="color: rgb(0, 154, 200);">Log out</a></li>
                            </ul>
                        </li>
                    </ul>

                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" style="color: rgb(0, 154, 200);">
                        <div class="close-icon" style="color: rgb(0, 154, 200);"></div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <script type="text/javascript">
        niz.push("deleteAcount");
    </script>
    <div id="deleteAcount" class="modal fade">
        <div class="modal-dialog modal-confirm text-center" ng-controller="deleteController">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Are you sure?</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete your account?</p>
                </div>
                <div class="modal-footer btn-group center">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" ng-click="delete()" href="#deleteMessage" data-toggle="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="deleteMessage" class="modal fade">
    <div class="modal-dialog modal-confirm text-center">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" >Delete Account</h4>
            </div>
            <div class="container modal-body">
                <label class="form-control-label"> Your account has been successfully deleted </label>
                <br>
                <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>