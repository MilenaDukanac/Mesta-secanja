<?php
session_start();

if(!isset($_SESSION['type'])) {
    include 'headerGuest.php';
}
else if($_SESSION['type']==="admin")
    include 'headerAdmin.php';
else if($_SESSION['type']==="other")
    include 'headerOther.php';
else if($_SESSION['type']==="inner")
    include 'headerInner.php';
else
    include 'headerGuest.php'
?>
<script type="text/javascript" src="cemeteries.js"></script>

<script type="text/javascript">
    niz.push("cemeteries");
</script>


<section class="mbr-cards mbr-section mbr-section-nopadding" id="features1-x" data-rv-view="54" style="background-color: rgb(255, 255, 255); padding-top:90px">
    <div ng-controller="cemeteriesController" class="mbr-cards-row row">

      <div class="mbr">
        <label for="country">Country: </label><br>
        <select id="country" ng-model="country">
            <option value="all" >All</option>
            <option value="{{country.id}}" ng-repeat="country in countries">
              {{country.name}}
            </option>
        </select>
        <br>
        <label for="region">Region: </label><br>
        <select id="region" ng-model="region">
            <option value="all" >All</option>
            <option value="{{region.regionId}}" ng-repeat="region in regions | CemeteriesCountryFilter:country">
              {{region.regionName}}
            </option>
        </select>
        <br>
        <label for="place">Place: </label><br>
        <select id="place" ng-model="place">
            <option value="all" >All</option>
            <option value="{{place.id}}" ng-repeat="place in places | CemeteriesRegionFilter:region | CemeteriesCountryFilter: country">
              {{place.name}}
            </option>
        </select>
      </div>

        <div class="mbr-testimonials mbr-section mbr-section-nopadding">
            <div class="container">
                <div class="row">
                    <div ng-repeat="cemetery in cemeteries | CemeteriesCountryFilter:country | CemeteriesRegionFilter: region | CemeteriesPlaceFilter: place"  class="col-xs-12 col-md-3 col-lg-3">
                        <div class="mbr-testimonial card card-block mbr-testimonial-lg">
                            <div class="card card-block">
                                <div class="card-img"><img src="assets/images/cemetery.jpg" class="card-img-top"></div>
                                <div class="card-block">
                                    <h4 class="card-title">{{cemetery.name}}</h4>
                                    <h5 class="card-subtitle">Country: {{cemetery.countryName}}</h5>
                                    <h5 class="card-subtitle">Region: {{cemetery.regionName}}</h5>
                                    <h5 class="card-subtitle">Place: {{cemetery.placeName}}</h5>
                                    <h5 class="card-subtitle">Place Description: {{cemetery.placeDescription}}</h5>
                                    <div class="card-btn">
                                        <a href="cemetery.php?id={{cemetery.id}}" class="btn btn-primary" ng-click="choose(cemetery.id)">MORE</a>
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
