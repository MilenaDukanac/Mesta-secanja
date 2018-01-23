<?php
session_start();

if($_SESSION['type']==="admin")
    include 'headerAdmin.php';
else if($_SESSION['type']==="other")
    include 'headerOther.php';
else if($_SESSION['type']==="inner")
    include 'headerInner.php';
?>

  <section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" data-filter="true" id="gallery4-v" data-rv-view="16" style="padding-top: 90px; padding-bottom: 0rem;">
      <!-- Filter -->
      <div class="mbr-gallery-filter container gallery-filter-active">
          <ul>
              <li class="mbr-gallery-filter-all active">All</li>
          </ul>
      </div>

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

      <!-- Lightbox -->
      <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery4-v">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                      <ol class="carousel-indicators">
                          <li data-app-prevent-settings="" data-target="#lb-gallery4-v" class=" active" data-slide-to="0"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-v" data-slide-to="1"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-v" data-slide-to="2"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-v" data-slide-to="3"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-v" data-slide-to="4"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-v" data-slide-to="5"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-v" data-slide-to="6"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-v" data-slide-to="7"></li>
                      </ol>
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img src="assets/images/bike.jpg" alt="">
                          </div><div class="carousel-item">
                              <img src="assets/images/code-man.jpg" alt="">
                          </div><div class="carousel-item">
                              <img src="assets/images/coworkers.jpg" alt="">
                          </div><div class="carousel-item">
                              <img src="assets/images/desktop.jpg" alt="">
                          </div><div class="carousel-item">
                              <img src="assets/images/room-laptop.jpg" alt="">
                          </div><div class="carousel-item">
                              <img src="assets/images/table.jpg" alt="">
                          </div><div class="carousel-item">
                              <img src="assets/images/windows-books.jpg" alt="">
                          </div><div class="carousel-item">
                              <img src="assets/images/working-area.jpg" alt="">
                          </div>
                      </div>
                      <a class="left carousel-control" role="button" data-slide="prev" href="#lb-gallery4-v">
                          <span class="icon-prev" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" role="button" data-slide="next" href="#lb-gallery4-v">
                          <span class="icon-next" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>

                      <a class="close" href="#" role="button" data-dismiss="modal">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
<?php
include('footer.php');
?>