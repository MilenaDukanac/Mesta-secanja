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

<script type="text/javascript" src="oneCemetery.js"></script>

<script type="text/javascript">
    niz.push("oneCemetery");
</script>

<script>

    var $username = " <?php
        if(isset($_SESSION['type'])){
            if((time() - $_SESSION['lastTime']) > 1440){
                header("location:logout.php");
            }
            else{
                $_SESSION['lastTime'] = time();
                if($_SESSION['type']==="admin" || $_SESSION['type']==="inner" || $_SESSION['type']==="other") {
                    echo $_SESSION['username'];
                }
            }
        }
        else
            echo "";
        ?>";
</script>

<section ng-controller="oneCemeteryController" style="padding-top: 30px; padding-bottom: 0rem; padding-left: 30px; padding-right: 30px">
    <h4 class="text-md-center" style="color: rgb(0, 154, 200)">{{cemetery.name}}</h4>
    <h5 class="text-md-center" style="color: rgb(0, 154, 200);">Region: <a href="cemeteries.php?country=all&region={{region.id}}" class="text-white">{{region.name}}</a></h5>

    <div style="padding-top: 30px; padding-bottom: 0rem" ng-show="showDescription">
        <h5 style="color: rgb(0, 154, 200);">Description:</h5>
        <h6 class="text-white text-justify" style="padding-right: 30px; padding-left: 30px;">{{cemetery.description}}</h6>
    </div>

    <!-- Gallery -->
    <section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" data-filter="true" id="gallery4-v" data-rv-view="16" style="padding-top: 30px; padding-bottom: 0rem; ">
        <h5 style="color: rgb(0, 154, 200);">Gallery:</h5>



        <?php
        if(isset($_SESSION['type'])){
            if((time() - $_SESSION['lastTime']) > 1440){
                header("location:logout.php");
            }
            else{
                $_SESSION['lastTime'] = time();
                if($_SESSION['type']==="admin" || $_SESSION['type']==="inner") {
                    echo "<button class=\"btn btn-sm text-white\" href = \"#addNewPhoto\" data-toggle = \"modal\" style = \"background-color: rgb(0, 154, 200);\" >Add new photo </button>";
                }
            }
        }
        ?>

        <div class="mbr-gallery-row">
            <div class=" mbr-gallery-layout-default">
                <div ng-repeat="photo in photos" class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false">
                    <div href="#onePhoto" data-slide-to="0" data-toggle="modal" ng-click="choosePhoto(photo.id)">
                        <img src="../server/upload/{{photo.name}}" style="width:300px;height:300px;" alt="" class="img-thumbnail">
                        <span class="icon-focus"></span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>

    <div style="padding-top: 30px; padding-bottom: 0rem" ng-show="showAdditionalData">
        <h5 style="color: rgb(0, 154, 200);">Additional data:</h5>
        <h6 class="text-white text-justify" style="padding-right: 30px; padding-left: 30px;">{{cemetery.additionalData}}</h6>
    </div>

    <div style="padding-top: 30px; padding-bottom: 0rem" ng-show="showTags">
        <h5 style="color: rgb(0, 154, 200);">Tags:</h5>
        <div class="row">
            <div ng-repeat="tag in tags">
                <div class="col-md-3">
                <a style="color: {{tag.color}}; background: white;">{{tag.name}}: {{tag.value}}</a>
                </div>
            </div>
        </div>>
    </div>
    <!-- Map -->

    <div ng-show="showMap">
        <div style="padding-top: 30px; padding-bottom: 0rem">
            <h5 style="color: rgb(0, 154, 200);">Map:</h5>
        </div>

        <section class="mt-5" id="map1-7" data-rv-view="101" style="padding-top: 30px; padding-bottom: 30px; padding-left: 30px; padding-right: 30px">
            <div class="mbr-map" style="height: 600px;">
                <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJvT-116N6WkcR5H4X8lxkuB0" allowfullscreen=""></iframe>
            </div>
        </section>
    </div>

    <!-- Pop-up za new photo -->
    <div id="addNewPhoto" class="modal fade">
        <div class="modal-dialog modal-confirm text-center">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(0, 154, 200);">
                    <h4 class="modal-title text-white">Add New Photo</h4>
                </div>

                <div class="container modal-body">
                    <form id="uploadForm" class=" m-t-3 col-lg-10 col-lg-offset-1" method="post" action="upload.php"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control-label" for="photo"><h2>Upload Photo</h2></label>
                            <br>
                            <input type="file" name="photo" id="photo" required="">
                            <input type="hidden" value="{{cemeteryId}}" id="cemeteryId" name="cemeteryId">
                            <br><br>
                            <input class="btn btn-sm text-white" type="submit" name="submit" value="Upload" style="background-color: rgb(0, 154, 200);">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="onePhoto" class="modal fade">
        <div class="modal-dialog modal-confirm modal-lg">

            <div class="modal-content" style="background: white;">
                <div class="container modal-body">
                    <div class="row">
                        <div class="col-md-9" align="center">
                            <img src="../server/upload/{{photoInfo.name}}" alt="" class="img-thumbnail">
                            <label class="form-control-label" align="center">{{photoInfo.note}}</label>
                        </div>
                        <div>
                            <label class="form-control-label" align="left"><strong>Author: {{photoInfo.author}}</strong></label>
                            <label class="form-control-label" align="left"><strong>Year of photography: {{photoInfo.year}}</strong></label>
                            <div ng-show="showPhotoPosition">
                                <label class="form-control-label" align="left">longitude: {{photoInfo.longitude}}</label>
                                <br>
                                <label class="form-control-label" align="left">latitude: {{photoInfo.latitude}}</label>
                            </div>
                            <br>
                            <label class="form-control-label" align="left"><strong>TAGS</strong>:</label>
                            <br>
                            <div class="offset-1" ng-repeat="photoTag in photoTags">
                                <label style="color: {{photoTag.color}};">{{photoTag.name}}: {{photoTag.value}} </label>
                                <br>
                            </div>
                            <div>
                                <label class="form-control-label"><strong>COMMENTS</strong></label>
                                <br>
                                <ul>
                                    <li ng-repeat="comment in comments | limitTo:5">
											<span class='complete-{{item.complete}}'>
												<strong>{{comment.username}}</strong> <small>{{comment.time}}</small>
												<br> <i>{{comment.text}}</i>
												<br>
												</span>
                                    </li>
                                </ul>
                                <button class="btn btn-sm text-white" style = "background-color: rgb(0, 154, 200); width: 25%;" ng-show="showButtonMoreComments" ng-click="change()">Show More Comments</button>

                                <ul>
                                    <li ng-show="showMoreComments" ng-repeat="comment in comments | limitTo:(5-comments.length)">
											<span class='complete-{{item.complete}}'>
												<strong>{{comment.username}}</strong> <small>{{comment.time}}</small>
												<br> <i>{{comment.text}}</i>
												<br>
												</span>
                                    </li>
                                </ul>

                                <br/>

                                <?php
                                if(isset($_SESSION['type'])){
                                    if((time() - $_SESSION['lastTime']) > 1440){
                                        header("location:logout.php");
                                    }
                                    else{
                                        $_SESSION['lastTime'] = time();
                                        if($_SESSION['type']==="admin" || $_SESSION['type']==="inner" || $_SESSION['type']==="other") {
                                            echo "<textarea class=\"form-control\" placeholder=\"Type your comment...\" id=\"text\" required=\"\" ng-model=\"text\"> </textarea>
															<br/>
															<input type=\"button\" class=\"btn btn-sm text-white\" style = \"background-color: rgb(0, 154, 200);\" value=\"Add Comment\" ng-click=\"addComment()\">";
                                        }
                                    }
                                }
                                ?>
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
