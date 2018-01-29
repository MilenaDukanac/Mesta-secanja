<?php
$target_dir = "../server/upload/";

$target_file = $target_dir . basename($_FILES["photo"]["name"]);

$uploadOk = 1;
$success = 0;
$message = "";

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$cemeteryId = $_POST["cemeteryId"];

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $message .= "File is not an image. ";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $message .= "Sorry, file already exists. ";
    $uploadOk = 0;
}

if ($_FILES["photo"]["size"] > 100000000) {
    $message .= "Sorry, your file is too large. ";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $message .= "Sorry, only JPG, JPEG & PNG files are allowed. ";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $message .= "Sorry, your file was not uploaded. ";
    $success = 0;

} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $message .= "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded. ";
        $success = 1;
    } else {
        $message .= "Sorry, there was an error uploading your file. ";
        $success = 0;
    }


}


?>
<html ng-app="uploadPhoto">
<head>
    <title>  CENTRAL cemeteries </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="shortcut icon" href="assets/images/logo-small.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

    <script>document.write('<base href="' + document.location + '" />');</script>
    <link rel="stylesheet" href="assets/ng-tags-input.min.css" />
    <link rel="stylesheet" href="../client/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <script src="../client/assets/angular-1.6.7/angular.min.js"></script>
    <script src="assets/ng-tags-input.min.js"></script>
    <script src="uploadPhoto.js"></script>
</head>
<body ng-controller="tags" class="container-fluid" style="background-color: rgb(40, 50, 78); padding-top: 30px;@media (max-width: device-width) { body {padding-top: 0px; }}">

<script type="text/javascript">
    var success =  "<?php echo $success; ?>";
    var message =  "<?php echo $message; ?>";
</script>

<div class=" form-group mbr-buttons mbr-buttons--center btn-inverse" ng-show="showBackButton">
    <label class="form-control-label text-white"> {{firstMessage}} </label>
    <br>
    <button  class="btn btn-sm text-white" ng-click="goBack()" style="background-color: rgb(0, 154, 200); border-radius: 24px">
        Back
    </button>
</div>

<form id="insertForm" class=" m-t-3 col-lg-10 col-lg-offset-1" ng-show="showPhotoForm">

    <div class="form-group">

        <script>
            var name = "<?php echo basename( $_FILES["photo"]["name"]) ?>";
            var cemeteryId = "<?php echo $cemeteryId; ?>";
        </script>

        <h3 class="form-control-label font-weight-bold" style="color: rgb(0, 154, 200);">PHOTO DETAILS</h3>

        <br>
        <br>
        <label class="form-control-label text-white"> {{firstMessage}} </label>
        <br>
        <br>
        <label class="form-control-label text-white" > Name </label>
        <label class="form-control-label text-white" >
            {{newPhoto.name}}
        </label>
    </div>
    <div class="form-group">
        <label class="form-control-label text-white" for="form2-o-author">Author*</label>
        <input type="text" class="form-control" required="" name="author" data-form-field="author" id="form2-o-author" ng-model="newPhoto.author">
    </div>
    <div class="form-group">
        <label class="form-control-label text-white" for="form2-o-year">Year*</label>
        <input type="number" class="form-control" required="" name="year" data-form-field="year" id="form2-o-year" ng-model="newPhoto.year">
    </div>
    <div class="form-group">
        <label class="form-control-label text-white" for="form2-o-note">Note</label>
        <input type="text" class="form-control" name="note" data-form-field="note" id="form2-o-note" ng-model="newPhoto.note">
    </div>
    <div class="form-group">
        <label class="form-control-label text-white" for="form2-o-longitude">Longitude</label>
        <input type="text" class="form-control" name="longitude" data-form-field="longitude" id="form2-o-longitude" ng-model="newPhoto.longitude">
    </div>
    <div class="form-group">
        <label class="form-control-label text-white" for="form2-o-latitude">Latitude</label>
        <input type="text" class="form-control" name="latitude" data-form-field="latitude" id="form2-o-latitude" ng-model="newPhoto.latitude">
    </div>
    <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
        <button type="submit" class="btn btn-sm text-white" ng-click="insertPhoto()" style="background-color: rgb(0, 154, 200); border-radius: 24px">
            Next
        </button>
    </div>
    <div ng-show="showNewPhotoMessage">{{newPhotoMessage}}</div>
</form>

<br/>
<div class="m-t-3 col-lg-10 col-lg-offset-1" ng-show="showTagsForm">

    <h3 class="form-control-label font-weight-bold" style="color: rgb(0, 154, 200);">PHOTO TAGS</h3>
    <br>
    <br/>
    <label class="form-control-label text-white"> Add tags </label>

    <br/>

    <div  id = "tagName" class="text-white">
        <p ng-repeat="tag in tags" >
            {{tag.name}}: <tags-input class="text-black" ng-model="photoTags[tag.id]"> </tags-input>
        </p>
    </div>
    <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
        <button type="submit"  class="btn btn-sm text-white" ng-click="insertTags()" style="background-color: rgb(0, 154, 200); border-radius: 24px">
            Finish
        </button>
    </div>
    <div ng-show="errorMessageShow" class="col-xs-12 col-md-12 col-lg-12 m-t-1 text-lg-left">
        <div class="card">
            <div class="card-block text-white" style="background-color: rgb(0, 154, 200);">
                <div  ng-repeat="message in errorMessage">
                    <p>ERROR: {{message}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>