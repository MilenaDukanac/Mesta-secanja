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
<section ng-controller="oneCemeteryController" class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" data-filter="true" id="gallery4-v" data-rv-view="16" style="padding-top: 90px; padding-bottom: 0rem;">

  <!-- Gallery -->
  <div class="mbr-gallery-row">
      <div class=" mbr-gallery-layout-default">
          <div>
              <div>
                  <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome">
                      <div href="#lb-gallery4-v" data-slide-to="0" data-toggle="modal">



                          <img src="assets/images/bike-small.jpg" alt="">

                          <span class="icon-focus"></span>

                      </div>
                  </div><div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Responsive">
                      <div href="#lb-gallery4-v" data-slide-to="1" data-toggle="modal">



                          <img src="assets/images/code-man-small.jpg" alt="">

                          <span class="icon-focus"></span>

                      </div>
                  </div><div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Creative">
                      <div href="#lb-gallery4-v" data-slide-to="2" data-toggle="modal">



                          <img src="assets/images/coworkers-small.jpg" alt="">

                          <span class="icon-focus"></span>

                      </div>
                  </div><div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Animated">
                      <div href="#lb-gallery4-v" data-slide-to="3" data-toggle="modal">



                          <img src="assets/images/desktop-small.jpg" alt="">

                          <span class="icon-focus"></span>

                      </div>
                  </div><div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome">
                      <div href="#lb-gallery4-v" data-slide-to="4" data-toggle="modal">



                          <img src="assets/images/room-laptop-small.jpg" alt="">

                          <span class="icon-focus"></span>

                      </div>
                  </div><div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Beautiful">
                      <div href="#lb-gallery4-v" data-slide-to="5" data-toggle="modal">



                          <img src="assets/images/table-small.jpg" alt="">

                          <span class="icon-focus"></span>

                      </div>
                  </div><div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Responsive">
                      <div href="#lb-gallery4-v" data-slide-to="6" data-toggle="modal">



                          <img src="assets/images/windows-books-small.jpg" alt="">

                          <span class="icon-focus"></span>

                      </div>
                  </div><div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false" data-tags="Animated">
                      <div href="#lb-gallery4-v" data-slide-to="7" data-toggle="modal">



                          <img src="assets/images/working-area-small.jpg" alt="">

                          <span class="icon-focus"></span>

                      </div>
                  </div>
              </div>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>


</section>
  
<?php
include('footer.php');
?>