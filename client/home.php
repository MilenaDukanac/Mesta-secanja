<?php
    session_start();
    if(!isset($_SESSION['type'])) {
        include 'headerHomeGuest.php';
    }
    else if($_SESSION['type']==="admin")
        include 'headerAdmin.php';
    else if($_SESSION['type']==="other")
        include 'headerOther.php';
   else if($_SESSION['type']==="inner")
        include 'headerInner.php';
//dodati

?>
<section class="row form-group id="exCollapsingNavbar" style= "padding:95px" align="center">
    <div class="btn-group col-xs-5"  align-items="center" ng-controller="searchController">
        <label class="form-control-label" for="form1-o-name">Country</label>
        <input type="text" class="form-control" name="country" required="" data-form-field="Country" id="form1-o-country" ng-model="country">


        <label class="form-control-label" for="form1-o-name">Region</label>
        <input type="text" class="form-control" name="region" required="" data-form-field="Region" id="form1-o-region" ng-model="region">

        <input type="submit" value="Search" ng-click="searchCem()">


    </div>

</section>


<section class="mt-5" id="map1-7" data-rv-view="101">
        <div class="mbr-map" style="height: 600px;">
              <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJvT-116N6WkcR5H4X8lxkuB0" allowfullscreen=""></iframe>
        </div>
    </section>

<!--    <div>-->
<!--        <div ng-controller="MainController">-->
<!--            <div class="mapCanvas">-->
<!--                <ui-gmap-google-map-->
<!--                        center="map.center"-->
<!--                        zoom="map.zoom"-->
<!--                        draggable="map.draggable"-->
<!--                        options="options">-->
<!--                    <ui-gmap-marker-->
<!--                            coords="marker.coords"-->
<!--                            options="marker.options"-->
<!--                            idkey="marker.id">-->
<!--                    </ui-gmap-marker>-->
<!--                </ui-gmap-google-map>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<?php
include('footer.php');
?>
