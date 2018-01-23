<!DOCTYPE html>
<html ng-app="rootApp">
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
    <link rel="stylesheet" href="assets/successpopup.css" type="text/css">

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
    <script type="text/javascript" src="expendInner.js"></script>
    <script type="text/javascript" src="newTag.js"></script>
    <script type="text/javascript" src="newCountry.js"></script>
    <script type="text/javascript" src="newRegion.js"></script>
    <script type="text/javascript" src="newCemetery.js"></script>

    <script type="text/javascript">
        var niz = [];
    </script>

    <input name="animation" type="hidden">
</head>

<body style="padding-top: 90px;@media (max-width: device-width) { body {padding-top: 0px; }}">
<section id="ext_menu-n" data-rv-view="92">
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
                                <li><a href="profile.php" class="dropdown-item">View profile</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a href="#expendInner" class="dropdown-item" data-toggle="modal">Expend inner circle</a></li>
                                <li><a href="#newTag" class="dropdown-item" data-toggle="modal">Add new tag</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a href="#newCountry" class="dropdown-item" data-toggle="modal">Add new country</a></li>
                                <li><a href="#newRegion" class="dropdown-item" data-toggle="modal">Add new region</a></li>
                                <li><a href="#newCemetery" class="dropdown-item" data-toggle="modal">Add new cemetery</a></li>
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

    <script type="text/javascript">
        niz.push("expendInner");
    </script>
    <div id="expendInner" class="modal fade">
        <div class="modal-dialog modal-confirm text-center" ng-controller="expendInnerController">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Expend inner circle</h4>
                </div>
                <div class="container modal-body">
                    <form class="offset-3">
                        <div class="form-group">
                            <label class="form-control-label" for="form1-o-username">Username</label>
                            <input type="text" class="form-control" name="username" data-form-field="Name" id="form1-o-username" ng-model="newInner.username">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form1-o-type">Type</label>
                            <input type="text" class="form-control" name="type" data-form-field="Type" id="form1-o-type" ng-model="newInner.type">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="ExpendInner()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                        <!--	<div ng-show="showExpendInnerMessage">{{expendInnerMessage}}</div>-->
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
                    <form class="offset-3">
                        <div class="form-group">
                            <label class="form-control-label" for="form2-o-category">Category</label>
                            <input type="text" class="form-control" name="category" data-form-field="Category" id="form2-o-category" ng-model="newTag.category">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form2-o-tagname">Tag name</label>
                            <input type="text" class="form-control" name="tagname" data-form-field="Tag name" id="form2-o-tagname" ng-model="newTag.tagName">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="newTag()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                        <!--	<div ng-show="showNewTagMessage">{{NewTagMessage}}</div>-->
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
                    <form class="offset-3">
                        <div class="form-group">
                            <label class="form-control-label" for="form3-o-country">Country</label>
                            <input type="text" class="form-control" name="country" data-form-field="Country" id="form3-o-country" ng-model="countryName">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="newCountry()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                        <!--	<div ng-show="showExpendInnerMessage">{{expendInnerMessage}}</div>-->
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
                    <form class="offset-3">
                        <div class="form-group">
                            <label class="form-control-label" for="form4-o-country">Country</label>
                            <input type="text" class="form-control" name="type" data-form-field="Country" id="form4-o-country" ng-model="newRegion.country">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form4-o-region">Region</label>
                            <input type="text" class="form-control" name="region" data-form-field="Region" id="form4-o-region" ng-model="newRegion.region">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="insertRegion()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                        <!--	<div ng-show="showNewRegionMessage">{{newRegionMessage}}</div>-->
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
                    <form class="offset-3">
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-region">Region</label>
                            <input type="text" class="form-control" name="region" data-form-field="Region" id="form5-o-username" ng-model="newCemetery.region">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-cemetery">Cemetery</label>
                            <input type="text" class="form-control" name="cemetery" data-form-field="Cemetery" id="form5-o-cemetery" ng-model="newCemetery.cemetery">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-description">Description</label>
                            <input type="text" class="form-control" name="description" data-form-field="description" id="form5-o-description" ng-model="newCemetery.description">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-additional">Additional data</label>
                            <input type="text" class="form-control" name="additional" data-form-field="Additional data" id="form5-o-additional" ng-model="newCemetery.additionalData">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-longitude">Longitude</label>
                            <input type="text" class="form-control" name="longitude" data-form-field="Longitude" id="form5-o-longitude" ng-model="newCemetery.longitude">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="form5-o-latitude">Latitude</label>
                            <input type="text" class="form-control" name="latitude" data-form-field="Latitude" id="form5-o-latitude" ng-model="newCemetery.latitude">
                        </div>
                        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                            <button type="submit" class="btn btn-sm btn-primary" ng-click="insertCemetery()">
                                Save
                            </button>
                            <button type="submit" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                        <!--	<div ng-show="shownNewCemeteryMessage">{{newCemeteryMessage}}</div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
