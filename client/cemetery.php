<?php
session_start();

if($_SESSION['type']==="admin")
    include 'headerAdmin.php';
else if($_SESSION['type']==="other")
    include 'headerOther.php';
else if($_SESSION['type']==="inner")
    include 'headerInner.php';
else
    include 'headerGuest.php'
?>

<script type="text/javascript" src="oneCemetery.js"></script>
<script type="text/javascript">
    niz.push("oneCemetery");
</script>
<section ng-controller="oneCemeteryController" style="padding-top: 30px; padding-bottom: 0rem; padding-left: 30px; padding-right: 30px">
    <h4 class="text-md-center text-warning" style="background: #28324e">{{cemetery.name}}</h4>
    <h5 class="text-black text-md-center">Region:</h5>

    <div style="padding-top: 30px; padding-bottom: 0rem">
        <h5 class="text-warning" style="background: #28324e">Description:</h5>
        <h6 class="text-black text-justify" style="padding-right: 30px; padding-left: 30px;">{{cemetery.description}}</h6>
    </div>
    <section  class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" data-filter="true" id="gallery4-v" data-rv-view="16" style="padding-top: 30px; padding-bottom: 0rem;">
        <!--Description-->

        <!-- Gallery -->
        <h5 class="text-warning" style="background: #28324e">Gallery:</h5>
        <div class="mbr-gallery-row">
          <div class=" mbr-gallery-layout-default">
              <div>
                  <div>
                      <div ng-repeat="photo in photos" class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome">
                          <div href="#lb-gallery4-v" data-slide-to="0" data-toggle="modal">



                              <img src="../photos/{{photo.name}}" alt="" class="img-thumbnail">

                              <span class="icon-focus"></span>

                          </div>
                      </div>

                  </div>
              </div>
              <div class="clearfix"></div>
          </div>
        </div>
    </section>
    <div style="padding-top: 30px; padding-bottom: 0rem">
        <h5 class="text-warning" style="background: #28324e">Additional data:</h5>
        <h6 class="text-black text-justify" style="padding-right: 30px; padding-left: 30px;">{{cemetery.additionalData}}</h6>
    </div>

    <div style="padding-top: 30px; padding-bottom: 0rem">
        <h5 class="text-warning" style="background: #28324e">Tags:</h5>

    </div>
    
    <div style="padding-top: 30px; padding-bottom: 0rem">
        <h5 class="text-warning" style="background: #28324e">Map:</h5>

    </div>
</section>

<section class="mt-5" id="map1-7" data-rv-view="101" style="padding-top: 30px; padding-bottom: 30px; padding-left: 30px; padding-right: 30px">
    <div class="mbr-map" style="height: 600px;">
        <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJvT-116N6WkcR5H4X8lxkuB0" allowfullscreen=""></iframe>
    </div>
</section>



<?php
include('footer.php');
?>