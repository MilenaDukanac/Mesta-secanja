<?php
session_start();
if(!isset($_SESSION['type'])) {
    include 'headerGuest.php';
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

<script type="text/jscript" src="regions.js"> </script>
<script type="text/javascript">
    niz.push("regions");
</script>
  <section class="mbr-cards mbr-section mbr-section-nopadding" id="features1-x" data-rv-view="54" style="background-color: rgb(40, 50, 78); padding-top:90px">
      <div ng-controller="regionsController" class="mbr-cards-row row">

          <div class="form-group row" style="padding-left: 10%;">
              <div class="col-xs-3">
                  <label for="country" class="text-white">Country: </label><br>
                  <select class="form-control" id="country" ng-model="country">
                      <option value="all" >All</option>
                      <option value="{{country.id}}" ng-repeat="country in countries">
                          {{country.name}}
                      </option>
                  </select>
              </div>
          </div>

            <div class="mbr-testimonials mbr-section mbr-section-nopadding">
                <div class="container">
                    <div class="row">
                        <div ng-repeat="region in regions|orderBy:'countryName'|CountryFilter:country" class="col-xs-12 col-md-3 col-lg-3">
                            <div class="mbr-testimonial card card-block">
                              <div class="card card-block">
                                  <div class="card-img"><img src="assets/images/desktop.jpg" class="card-img-top"></div>
                                  <div class="card-block">
                                      <h4 class="card-title">{{region.regionName}}</h4>
                                      <h5 class="card-subtitle">{{region.countryName}}</h5>
                                      <div class="card-btn">
                                        <a class="btn btn-info" ng-click="search(region.regionId)">MORE</a>
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
