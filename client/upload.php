<?php
$target_dir = "../server/upload/";

$target_file = $target_dir . basename($_FILES["photo"]["name"]);

$uploadOk = 1;
$success = 0;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$cemeteryId = $_POST["cemeteryId"];

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["photo"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    $success = 0;

} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        $success = 1;

    } else {
        echo "Sorry, there was an error uploading your file.";
        $success = 0;
    }


}

?>


<html ng-app="uploadPhoto">
<head>
    <meta charset="utf-8" />
    <script>document.write('<base href="' + document.location + '" />');</script>
    <link rel="stylesheet" href="assets/ng-tags-input.min.css" />
    <link rel="stylesheet" href="../client/assets/bootstrap/css/bootstrap.min.css">
    <script src="../client/assets/angular-1.6.7/angular.min.js"></script>
    <script src="assets/ng-tags-input.min.js"></script>
    <script src="uploadPhoto.js"></script>
</head>
<body ng-controller="tags">

    <script type="text/javascript">
        var success = <?php echo $success; ?>;
    </script>

    <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse" ng-show="showBackButton">
        <button  class="btn btn-primary" ng-click="goBack()">
            Back
        </button>
    </div>

    <form id="insertForm" class=" m-t-3 col-lg-10 col-lg-offset-1" ng-show="showPhotoForm">

        <div class="form-group">

            <script>
                var name = "<?php echo basename( $_FILES["photo"]["name"]) ?>";
                var cemeteryId = "<?php echo $cemeteryId; ?>";
            </script>

            <label class="form-control-label" > Name </label>
            <label class="form-control-label" >
                {{newPhoto.name}}
            </label>
        </div>
        <div class="form-group">
            <label class="form-control-label" for="form2-o-author">Author*</label>
            <input type="text" class="form-control" required="" name="author" data-form-field="author" id="form2-o-author" ng-model="newPhoto.author">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="form2-o-year">Year*</label>
            <input type="number" class="form-control" required="" name="year" data-form-field="year" id="form2-o-year" ng-model="newPhoto.year">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="form2-o-note">Note</label>
            <input type="text" class="form-control" name="note" data-form-field="note" id="form2-o-note" ng-model="newPhoto.note">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="form2-o-longitude">Longitude</label>
            <input type="text" class="form-control" name="longitude" data-form-field="longitude" id="form2-o-longitude" ng-model="newPhoto.longitude">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="form2-o-latitude">Latitude</label>
            <input type="text" class="form-control" name="latitude" data-form-field="latitude" id="form2-o-latitude" ng-model="newPhoto.latitude">
        </div>
        <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
            <button  class="btn btn-primary" ng-click="insertPhoto()">
                Next
            </button>
        </div>
        <div ng-show="showNewPhotoMessage">{{newPhotoMessage}}</div>
    </form>

  <br/>
  <div class="m-t-3 col-lg-10 col-lg-offset-1" ng-show="showTagsForm">
      <br/>
      <p> Add tags </p>

      <br/>

      <div  id = "tagName">
          <p ng-repeat="tag in tags">
              {{tag.name}}: <tags-input ng-model="photoTags[tag.id]"></tags-input>
          </p>
      </div>
      <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
          <button  class="btn btn-primary" ng-click="insertTags()">
              Finish
          </button>
      </div>
  </div>

</body>
</html>