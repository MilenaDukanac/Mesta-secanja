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
    <link rel="stylesheet" href="assets/popover.css">

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
    <script type="text/javascript" src="expandInner.js"></script>
    <script type="text/javascript" src="newTag.js"></script>
    <script type="text/javascript" src="newCountry.js"></script>
    <script type="text/javascript" src="newRegion.js"></script>
    <script type="text/javascript" src="newPlace.js"></script>
    <script type="text/javascript" src="newCemetery.js"></script>
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
                                <li><a href="profile.php" class="dropdown-item" style="color: rgb(0, 154, 200);">View profile</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a href="#expandInner" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Expand inner circle</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a href="#newTag" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Add new tag</a></li>
                                <li><a href="#newCountry" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Add new country</a></li>
                                <li><a href="#newRegion" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Add new region</a></li>
                                <li><a href="#newPlace" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Add new place</a></li>
                                <li><a href="#newCemetery" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Add new cemetery</a></li>
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
        niz.push("expandInner");
    </script>
    <div id="expandInner" class="modal fade">
        <div class="modal-dialog modal-confirm text-center" ng-controller="expandInnerController">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Expand inner circle</h4>
                </div>
                <div class="container modal-body">
                    <form id="expandInnerForm">
                        <div class="form-group">
                            <label class="form-control-label" for="form1-o-username">Username*</label>
                            <input type="text" class="form-control" required="" name="username" data-form-field="username" id="form1-o-username" ng-model="newInner.username">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="expandInner()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal" ng-click="clearMsg()">
                                Close
                            </button>
                        </div>
                        <div ng-show="showExpandInnerMessage">{{expandInnerMessage}}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        niz.push("newTag");
    </script>
    <div id="newTag" class="modal fade">
        <div class="modal-dialog modal-confirm text-center" ng-controller="newTagController">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Add new tag</h4>
                </div>
                <div class="container modal-body">
                    <form name="formTag">
                        <div class="form-group">
                            <label class="form-control-label" for="form2-o-category">Category*</label>
                            <input type="text" class="form-control" required="" name="category" data-form-field="category" id="form2-o-category" ng-model="newTag.category">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form2-o-tagname">Tag name*</label>
                            <input type="text" class="form-control" required="" name="tagname" data-form-field="tag name" id="form2-o-tagname" ng-model="newTag.tagName">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form2-o-tagname">Posible values*</label>
                            <input type="text" placeholder="Insert possible values separated by ;" class="form-control" required="" name="possiblevalues" data-form-field="tag name" id="form2-o-possiblevalues" ng-model="newTag.possibleValues">

                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="insertTag()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal" ng-click="clearMsg()">
                                Close
                            </button>
                        </div>
                        <div ng-show="showNewTagMessage">{{newTagMessage}}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        niz.push("newCountry");
    </script>
    <div id="newCountry" class="modal fade">
        <div class="modal-dialog modal-confirm text-center" ng-controller="newCountryController">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Add new country</h4>
                </div>
                <div class="container modal-body">
                    <form name="formCountry">
                        <div class="form-group">
                            <label class="form-control-label" for="form3-o-country">Country*</label>
                            <input type="text" class="form-control" required="" name="country" data-form-field="country" id="form3-o-country" ng-model="countryName">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="insertCountry()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal" ng-click="clearMsg()">
                                Close
                            </button>
                        </div>
                        <div ng-show="showNewCountryMessage">{{newCountryMessage}}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        niz.push("newRegion");
    </script>
    <div id="newRegion" class="modal fade">
        <div class="modal-dialog modal-confirm text-center" ng-controller="newRegionController">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Add new region</h4>
                </div>
                <div class="container modal-body">
                    <form class="offset-3" name="formRegion">
                        <div class="form-group">
                            <label class="form-control-label" for="form4-o-country">Country*</label>
                            <input type="text" class="form-control" required="" name="country" data-form-field="country" id="form4-o-country" ng-model="newRegion.country">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form4-o-region">Region*</label>
                            <input type="text" class="form-control" required="" name="region" data-form-field="region" id="form4-o-region" ng-model="newRegion.region">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="insertRegion()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal" ng-click="clearMsg()">
                                Close
                            </button>
                        </div>
                        <div ng-show="showNewRegionMessage">{{newRegionMessage}}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        niz.push("newPlace");
    </script>
    <div id="newPlace" class="modal fade">
        <div class="modal-dialog modal-confirm text-center" ng-controller="newPlaceController">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Add new place</h4>
                </div>
                <div class="container modal-body">
                    <form class="offset-3" name="formPlace">
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-region">Region*</label>
                            <input type="text" class="form-control" required="" name="region" data-form-field="region" id="form5-o-region" ng-model="newPlace.region">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-region">Place*</label>
                            <input type="text" class="form-control" required="" name="place" data-form-field="place" id="form5-o-place" ng-model="newPlace.place">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-description">Description</label>
                            <input type="text" class="form-control" name="description" data-form-field="description" id="form5-o-description" ng-model="newPlace.description">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="insertPlace()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal" ng-click="clearMsg()">
                                Close
                            </button>
                        </div>
                        <div ng-show="showNewPlaceMessage">{{newPlaceMessage}}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        niz.push("newCemetery");
    </script>
    <div id="newCemetery" class="modal fade">
        <div class="modal-dialog modal-confirm text-center" ng-controller="newCemeteryController">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Add new cemetery</h4>
                </div>
                <div class="container modal-body">
                    <form class="offset-3" name=formCemetery>
                        <div class="form-group">
                            <label class="form-control-label" for="form6-o-place">Place*</label>
                            <input type="text" class="form-control" required="" name="place" data-form-field="place" id="form6-o-place" ng-model="newCemetery.place">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form6-o-cemetery">Cemetery*</label>
                            <input type="text" class="form-control" required="" name="cemetery" data-form-field="cemetery" id="form6-o-cemetery" ng-model="newCemetery.cemetery">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form6-o-description">Description</label>
                            <input type="text" class="form-control" name="description" data-form-field="description" id="form6-o-description" ng-model="newCemetery.description">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form6-o-additional">Additional data</label>
                            <input type="text" class="form-control" name="additional" data-form-field="additional data" id="form6-o-additional" ng-model="newCemetery.additionalData">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form6-o-longitude">Longitude</label>
                            <input type="text" class="form-control" name="longitude" data-form-field="longitude" id="form6-o-longitude" ng-model="newCemetery.longitude">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form6-o-latitude">Latitude</label>
                            <input type="text" class="form-control" name="latitude" data-form-field="latitude" id="form6-o-latitude" ng-model="newCemetery.latitude">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="insertCemetery()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal" ng-click="clearMsg()">
                                Close
                            </button>
                        </div>
                        <div ng-show="shownNewCemeteryMessage">{{newCemeteryMessage}}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
