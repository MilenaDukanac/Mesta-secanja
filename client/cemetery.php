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
        <h4 class="text-md-center" style="background: #28324e; color: rgb(0, 154, 200);">{{cemetery.name}}</h4>
        <h5 class="text-md-center" style="color: rgb(0, 154, 200);">Region:</h5>

        <div style="padding-top: 30px; padding-bottom: 0rem" ng-show="showDescription">
            <h5 style="background: #28324e; color: rgb(0, 154, 200);">Description:</h5>
            <h6 class="text-black text-justify" style="padding-right: 30px; padding-left: 30px; color: rgb(0, 154, 200);">{{cemetery.description}}</h6>
        </div>
        <section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" data-filter="true" id="gallery4-v" data-rv-view="16" style="padding-top: 30px; padding-bottom: 0rem; " ng-show="showGallery">
            <!--Description-->

            <!-- Gallery -->
            <h5 style="background: #28324e; color: rgb(0, 154, 200);">Gallery:</h5>

            <input type="button" class="btn btn-sm btn-secondary" href="#addNewPhoto" data-toggle="modal" value="Add New Photo">
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
        <div style="padding-top: 30px; padding-bottom: 0rem" ng-show="showAdditionalData">
            <h5 style="background: #28324e; color: rgb(0, 154, 200);">Additional data:</h5>
            <h6 class="text-black text-justify" style="padding-right: 30px; padding-left: 30px;">{{cemetery.additionalData}}</h6>
        </div>

        <div style="padding-top: 30px; padding-bottom: 0rem" ng-show="showTags">
            <h5 style="background: #28324e; color: rgb(0, 154, 200);">Tags:</h5>
        </div>
        <div ng-show="showMap">
            <div style="padding-top: 30px; padding-bottom: 0rem">
                <h5 style="background: #28324e; color: rgb(0, 154, 200);">Map:</h5>

            </div>

            <section class="mt-5" id="map1-7" data-rv-view="101" style="padding-top: 30px; padding-bottom: 30px; padding-left: 30px; padding-right: 30px">
                <div class="mbr-map" style="height: 600px;">
                    <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJvT-116N6WkcR5H4X8lxkuB0" allowfullscreen=""></iframe>
                </div>
            </section>

        </div>



        <div id="addNewPhoto" class="modal fade">
            <div class="modal-dialog modal-confirm text-center">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title">Add New Photo</h4>
                    </div>

                    <div class="container modal-body">
                        <form id="uploadForm" class=" m-t-3 col-lg-10 col-lg-offset-1" method="post" action="upload.php"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-control-label" for="photo"><h2>Upload Photo</h2></label>
                                <br>
                                <input type="file" name="photo" id="photo">
                                <input type="hidden" value="{{cemeteryId}}" id="cemeteryId" name="cemeteryId">
                                <br>
                                <br>
                                <input class="btn btn-primary" type="submit" name="submit" value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php
include('footer.php');
?>