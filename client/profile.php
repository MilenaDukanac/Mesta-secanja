<?php
session_start();

if($_SESSION['type']==="admin")
    include 'headerAdmin.php';
else if($_SESSION['type']==="other")
    include 'headerOther.php';
else if($_SESSION['type']==="inner")
    include 'headerInner.php';

$username = $_SESSION['username'];

?>

<section class="mbr-section" id="testimonials1-17" data-rv-view="16" style="background-color: rgb(40, 50, 78); padding-top: 80px; padding-bottom: 40px;">

    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class = "row col-xs-12">
                <div class="col-xs-3 col-xs-offset-3">
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
                <div class="col-xs-6">
                    <div class="mbr-author-name">
                        <h3 class="mbr-section-title display-4" style="color: rgb(0, 154, 200);">
                            <?php
                                echo $_SESSION['name']." ".$_SESSION['surname'];
                            ?>
                        </h3>
                        <p class="mbr-section-title display-5" style="color: rgb(0, 154, 200);">
                            Type:
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
                        <a class="nav-item dropdown" style="color: rgb(0, 154, 200);" href="#" data-toggle="dropdown" class="mbr-section-title display-5 nav-link dropdown-toggle user-action" style="color: rgb(0, 154, 200);">Options
                            <ul class="dropdown-menu">
                                <li><a href="#changePassword" class="dropdown-item" data-toggle="modal" style="color: rgb(0, 154, 200);">Change password</a></li>
                            </ul>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Deo za tekst o korisniku -->
            <div class="col-xs-12 col-md-12 col-lg-12 m-t-3 text-xs-center">
                <div class=" card ">
                    <div class="card-block">
                        <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, aspernatur, voluptatibus, atque, tempore molestiae sed modi a ullam sint adipisci rerum vel praesentium voluptas deserunt veniam provident culpa sequi veritatis.”
                        </p>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
