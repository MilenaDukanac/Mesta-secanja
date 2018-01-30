<?php
session_start();

if($_SESSION['type']==="admin"){
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

<script type="text/javascript" src="tagSearch.js"></script>
<script>
    niz.push("tagSearch");
</script>

<section  ng-controller="tagSearchController" style="padding-top: 30px; padding-bottom: 0rem; padding-left: 30px; padding-right: 30px">
    <div class="form-group"  ng-controller="tagSearchController">
        <div class="row">
            <div ng-repeat="tag in tags" >
                <div class="col-xs-3">
                    <label for="{{tag.name}}" class="text-white">{{tag.name}}: </label><br>
                    <select class="form-control" id="{{tag.name}}" ng-model="photoTags[tag.id]">
                        <option value="{{possibleValue.value}}" ng-repeat="possibleValue in tagPossibleValues | TagFilter: tag.id">
                            {{possibleValue.value}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <input class="btn btn-sm text-white" type="submit" value="Search" ng-click="search()" style="margin-top: 35px; background-color: rgb(0, 154, 200);">
            </div>
        </div>


        <section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" data-filter="true" id="gallery4-v" data-rv-view="16" style="padding-top: 30px; padding-bottom: 0rem; ">
            <div class="mbr-gallery-row">
                <div class=" mbr-gallery-layout-default">
                    <div ng-repeat="photo in photos" class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-video-url="false">
                        <div  data-slide-to="0" data-toggle="modal">
                            <img src="../server/upload/{{photo.name}}" alt="" class="img-thumbnail">
                            <span class="icon-focus"></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
    </div>
</section>




<?php
include('footer.php');
?>
