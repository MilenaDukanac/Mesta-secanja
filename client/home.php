<?php
    session_start();
    if(!isset($_SESSION['type'])) {
        include 'headerHomeGuest.php';
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

<script type="text/javascript" src="search.js"></script>
<script>
    niz.push("searchCemetery");
</script>


<div class="form-group row"  ng-controller="searchController" style="padding-left: 25%;">
    <div class="col-xs-3">
        <label for="country" class="text-white">Country: </label><br>
        <select class="form-control" id="country" ng-model="country">
            <option value="all">All</option>
            <option value="{{country.id}}" ng-repeat="country in countries">
                {{country.name}}
            </option>
        </select>
    </div>
    <div class="col-xs-3">
        <label for="region" class="text-white">Region: </label><br>
        <select class="form-control" id="region" ng-model="region">
            <option value="all" >All</option>
            <option value="{{region.regionId}}" ng-repeat="region in regions | CountryFilter:country">
                {{region.regionName}}
            </option>
        </select>
    </div>
    <div class="col-xs-3">
        <input class="btn btn-sm text-white" type="submit" value="Search" ng-click="search()" style="margin-top: 35px; background-color: rgb(0, 154, 200);">
    </div>
    <div class="col-xs-3">
      <?php
          if(isset($_SESSION['type'])){
            if((time() - $_SESSION['lastTime']) > 1440){
              header("location:logout.php");
            }
            else{
              $_SESSION['lastTime'] = time();
              echo "<a href = \"tagSearch.php\"><button class=\"btn btn-sm text-white\" style = \"margin-top: 35px; background-color: rgb(0, 154, 200);\" >Search by tags</button></a>";
            }
          }
      ?>
    </div>
</div>


<section class="mt-5" id="map1-7" data-rv-view="101">
        <div class="mbr-map" style="height: 600px;">
              <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJvT-116N6WkcR5H4X8lxkuB0" allowfullscreen=""></iframe>
        </div>
    </section>

<?php
include('footer.php');
?>
