<?php
session_start();

if($_SESSION['type']==="admin")
    include 'headerAdmin.php';
else if($_SESSION['type']==="other")
    include 'headerOther.php';
else if($_SESSION['type']==="inner")
    include 'headerInner.php';
?>

<section class="mbr-section" id="testimonials1-17" data-rv-view="16" style="background-color: rgb(40, 50, 78); padding-top: 80px; padding-bottom: 40px;">

    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class = "row">
                <div class="col-xs-3 col-xs-offset-3">
                    <div class="mbr-img">
                        <img src="assets/images/face2.jpg" class="avatar" alt="Avatar">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="mbr-author-name">
                        <h3 class="mbr-section-title display-4 ">
                            <?php
                                echo $_SESSION['name']." ".$_SESSION['surname'];
                            ?>
                        </h3>
                        <p class="mbr-section-title display-5">
                            Type:
                            <?php
                                echo $_SESSION['type'];
                            ?>
                        </p>
                        <p class="mbr-section-title display-5">
                            Institution:
                            <?php
                                echo $_SESSION['institution'];
                            ?>
                        </p>
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

            <!-- Deo za slike koje je postavio taj korsnik -->
            <div class="col-xs-12 col-md-12 col-lg-12 text-xs-center ">
                <div class="card-block text-white">
                    <p>Ovde bi mozda trebalo da idu slike koje je taj korisnik upload-ovao.</p>
                </div>
            </div>
        </div>
    </div>


</section>

<?php
include('footer.php');
?>
