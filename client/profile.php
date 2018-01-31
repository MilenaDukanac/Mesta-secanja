<?php
session_start();
if(!isset($_SESSION['type'])) {
    header("Location: home.php");
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

$username = $_SESSION['username'];

?>

<section class="mbr-section" id="testimonials1-17" data-rv-view="16" style="background-color: rgb(40, 50, 78); padding-top: 80px; padding-bottom: 40px;">

    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class = "row col-lg-12">
                <div class="col-lg-3 col-lg-offset-3" align="center">
                    <div class="mbr-img">

                        <?php
                            if (file_exists("../server/profilePhotos/".$username."Avatar.png")) {
                                echo "<input type=\"image\" src=\"../server/profilePhotos/" . $username . "Avatar.png\" href=\"#changePhoto\" data-toggle=\"modal\" class=\"avatar\" style=\"border-radius: 50%; width:250px;height:250px;\" alt=\"Avatar\"/>";
                            }
                            else{
                                echo "<input type=\"image\" src=\"../server/profilePhotos/avatar.png\" href=\"#changePhoto\" data-toggle=\"modal\" class=\"avatar\" style=\"border-radius: 50%; width:250px;height:250px;\" alt=\"Avatar\"/>";
                            }
                        ?>
<!--                        <input type="file" id="my_file" style="display: none;" />-->
<!--                        <img src="assets/images/avatar.png" class="avatar" style="border-radius: 50%" alt="Avatar">-->
                    </div>
                </div>
                <div class="col-lg-3 col-lg-offset-1">
                    <div class="mbr-author-name" >
                        <h3 class="mbr-section-title display-4" style="color: rgb(0, 154, 200);"><b>
                            <?php
                                echo $_SESSION['name']." ".$_SESSION['surname'];
                            ?></b>
                        </h3>
                        <h2 class="mbr-section-title display-5" style="color: rgb(0, 154, 200);">
                            <i>
                            <?php
                                echo $_SESSION['username'];
                            ?></i>
                        </h2>
                        <p class="mbr-section-title display-5" style="color: rgb(0, 154, 200);">

                            <?php
                                echo $_SESSION['type'];
                            ?>
                        </p>
                        <p class="mbr-section-title display-5" style="color: rgb(0, 154, 200);">
                            Institution:
                            <?php
                                echo $_SESSION['institution'];
                            ?>
                        </p>
                        <div class="dropdown">
                          <a class="dropdown-toggle user-action" style="color: rgb(0, 154, 200);" href="#" data-toggle="dropdown">Options
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu">
                              <li><a href="#changePassword" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Change password</a></li>
                              <div class="dropdown-divider"></div>
                              <li><a href="#deleteAccount" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Delete account</a></li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="changePhoto" class="modal fade">
    <div class="modal-dialog modal-confirm text-center">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(0, 154, 200);">
                <h4 class="modal-title text-white">Add New Photo</h4>
            </div>

            <div class="container modal-body">
                <form id="uploadForm" class=" m-t-3 col-lg-10 col-lg-offset-1" method="post" action="uploadProfilePhoto.php"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-control-label" for="photo"><h2>Upload Profile Photo</h2></label>
                        <br>
                        <input type="file" name="photo" id="photo" required="">
                        <input type="hidden" value="<?php echo $username;?>" id="username" name="username">
                        <br><br>
                        <input class="btn btn-sm text-white" type="submit" name="submit" value="Upload" style="background-color: rgb(0, 154, 200);">
                        <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">
                          Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    niz.push("deleteAccount");
</script>
<div id="deleteAccount" class="modal fade">
    <div class="modal-dialog modal-confirm text-center" ng-controller="deleteController">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body container">
              <form id="deleteForm" class=" m-t-3 col-lg-10 col-lg-offset-1">
                  <div class="form-group">
                      <h5>Do you really want to delete your account?</h5>
                      <br><br>
                      <button type="button" class="btn btn-sm btn-danger" ng-click="delete()">
                        Delete account
                      </button>
                      <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">
                        Cancel
                      </button>
                  </div>
                  <div ng-show="showDeleteAccountMessage">{{deleteAccountMessage}}</div>
              </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    niz.push("changePassword");
</script>
<div id="changePassword" class="modal fade">
    <div class="modal-dialog modal-confirm text-center" ng-controller="changePasswordController">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Change password</h4>
            </div>
            <div class="container modal-body">
                <form name="changePasswordForm" id="changePasswordForm">
                    <div class="form-group">
                        <label class="form-control-label" for="old">Old password*</label>
                        <input type="password" class="form-control" required="" name="old" data-form-field="old" id="old" ng-model="user.oldPassword">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="new">New password*</label>
                        <input type="password" class="form-control" required="" name="new" data-form-field="new" id="new" ng-model="user.newPassword">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="confirmed">Confirm new password*</label>
                        <input type="password" class="form-control" required="" name="confirmed" data-form-field="confirmed" id="confirmed" ng-change="same(user.newPassword, user.confirmedPassword)" ng-model="user.confirmedPassword">
                        <span class="form-control-label"  style="color: darkred" ng-show="sameR && changePasswordForm.confirmed.$dirty">The passwords don't match!</span>
                    </div>
                    <div class=" form-group mbr-buttons mbr-buttons--center btn-inverse">
                    <button type="button" class="btn btn-sm btn-danger" ng-click="changePassword()" data-toggle="modal">
                      Change password
                    </button>
                    <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">
                      Cancel
                    </button>
                    </div>
                    <div ng-show="showChangePasswordMessage">{{changePasswordMessage}}</div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
