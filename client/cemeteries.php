<?php
session_start();
if(!isset($_SESSION['type'])) {
    include 'headerHomeGuest.php';
}
else if($_SESSION['type']==="admin"){
    if((time() - $_SESSION['lastTime']) > 1440){
      header("location:logout.php");
    }
    else{
      $_SESSION['lastTime'] = time();
      include 'headerAdmin.php';
    }
}
else if($_SESSION['type']==="other"){
    if((time() - $_SESSION['lastTime']) > 1440){
      header("location:logout.php");
    }
    else{
      $_SESSION['lastTime'] = time();
      include 'headerOther.php';
    }
}
else if($_SESSION['type']==="inner"){
    if((time() - $_SESSION['lastTime']) > 1440){
      header("location:logout.php");
    }
    else{
      $_SESSION['lastTime'] = time();
      include 'headerInner.php';
    }
}
?>

<script type="text/javascript" src="cemeteries.js"></script>

<script type="text/javascript">
    niz.push("cemeteries");
</script>


<section class="mbr-cards mbr-section mbr-section-nopadding" id="features1-x" data-rv-view="54" style="background-color: rgb(40, 50, 78); padding-top:90px">
    <div ng-controller="cemeteriesController" class="mbr-cards-row row">

        <div class="form-group row" style="padding-left: 20%;">
            <div class="col-xs-3">
                <label for="country" class="text-white">Country: </label><br>
                <select class="form-control" id="country" ng-model="country">
                    <option value="all">All</option>
                    <option value="{{country.id}}" ng-repeat="country in countries">
                        {{country.name}}
                    </option>
                </select>
            </div>
            <div class="col-xs-3">
                <label for="region" class="text-white">Region: </label><br>
                <select class="form-control" id="region" ng-model="region">
                    <option value="all" >All</option>
                    <option value="{{region.regionId}}" ng-repeat="region in regions | CemeteriesCountryFilter:country">
                        {{region.regionName}}
                    </option>
                </select>
            </div>
            <div class="col-xs-3">
                <label for="place" class="text-white">Place: </label><br>
                <select class="form-control" id="place" ng-model="place">
                    <option value="all" >All</option>
                    <option value="{{place.id}}" ng-repeat="place in places | CemeteriesRegionFilter:region | CemeteriesCountryFilter: country">
                        {{place.name}}
                    </option>
                </select>
            </div>
        </div>


        <div class="mbr-testimonials mbr-section mbr-section-nopadding">
            <div class="container">
                <div class="row">
                    <div ng-repeat="cemetery in cemeteries | CemeteriesCountryFilter:country | CemeteriesRegionFilter: region | CemeteriesPlaceFilter: place"  class="col-xs-12 col-md-3 col-lg-3">
                        <div class="mbr-testimonial card card-block">
                            <div class="card card-block">
                                <div class="card-img"><img src="assets/images/cemetery.jpg" class="card-img-top"></div>
                                <div class="card-block">
                                    <h4 class="card-title">{{cemetery.name}}</h4>
                                    <h5 class="card-subtitle">Country: {{cemetery.countryName}}</h5>
                                    <h5 class="card-subtitle">Region: {{cemetery.regionName}}</h5>
                                    <h5 class="card-subtitle">Place: {{cemetery.placeName}}</h5>
                                    <h5 class="card-subtitle">Place Description: {{cemetery.placeDescription}}</h5>
                                    <div class="card-btn">
                                        <a href="cemetery.php?id={{cemetery.id}}" class="btn btn-info" ng-click="choose(cemetery.id)">MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>
