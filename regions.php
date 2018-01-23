<?php
session_start();

if($_SESSION['type']==="admin")
    include 'headerAdmin.php';
else if($_SESSION['type']==="other")
    include 'headerOther.php';
else if($_SESSION['type']==="inner")
    include 'headerInner.php';
?>

  <script type="text/jscript" src="regions.js"> </script>
<script type="text/javascript">
    niz.push("regions");
</script>
  <section class="mbr-cards mbr-section mbr-section-nopadding" id="features1-x" data-rv-view="54" style="background-color: rgb(255, 255, 255); padding-top:90px">
      <div ng-controller="mainController" class="mbr-cards-row row">

        <label for="country">Country: </label><br>
        <select id="country" ng-model="country">
            <option value="all" >All</option>
            <option value="{{country.name}}" ng-repeat="country in countries">
              {{country.name}}
            </option>
        </select>

            <div class="mbr-testimonials mbr-section mbr-section-nopadding">
                <div class="container">
                    <div class="row">
                        <div ng-repeat="region in regions|orderBy:'countryName'|CountryFilter:country" class="col-xs-12 col-md-3 col-lg-3">
                            <div class="mbr-testimonial card card-block mbr-testimonial-lg">
                              <div class="card card-block">
                                  <div class="card-img"><img src="assets/images/desktop.jpg" class="card-img-top"></div>
                                  <div class="card-block">
                                      <h4 class="card-title">{{region.regionName}}</h4>
                                      <h5 class="card-subtitle">{{region.countryName}}</h5>
                                      <div class="card-btn">
                                        <a href="cemetery.php" class="btn btn-primary">MORE</a>
                                      </div>
                                  </div>
                              </div><!--
                                <div class="card-block"><p>{{region.countryName}}</p></div>
                                <div class="mbr-author card-footer">
                                    <div class="mbr-author-img"><img src="assets/images/face1.jpg" class="img-circle"></div>
                                    <div class="mbr-author-name">{{region.regionName}}</div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!--
        <div class="mbr-cards-row row">
            <div ng-repeat="region in regions|orderBy:'countryName'" class="mbr-cards-col col-xs-12 col-md-4 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
                <div class="container">
                    <div class="card card-block">
                        <div class="card-img"><img src="assets/images/desktop.jpg" class="card-img-top"></div>
                        <div class="card-block">
                            <h4 class="card-title">{{region.regionName}}</h4>
                            <h5 class="card-subtitle">{{region.countryName}}</h5>
                            <p class="card-text">One of Bootstrap 4's big points is responsiveness and Mobirise makes effective use of this by generating highly responsive website for you.</p>
                            <div class="card-btn">
                              <a href="cemetery.php" class="btn btn-primary">MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
        </div>-->
      </div>
  </section>

<?php
include('footer.php');
?>
