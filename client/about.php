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

<section class="mbr-section" id="testimonials1-17" data-rv-view="16" style="background-color: rgb(40, 50, 78); padding-top: 80px; padding-bottom: 40px;">

    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2" style="color: rgb(0, 154, 200);">AUTHORS</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="mbr-testimonials mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="mbr-testimonial card mbr-testimonial-lg">
                        <div class="card-block"><p style="color: rgb(0, 154, 200);">“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, aspernatur, voluptatibus, atque, tempore molestiae sed modi a ullam sint adipisci rerum vel praesentium voluptas deserunt veniam provident culpa sequi veritatis.”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-img"><img src="assets/images/avatar.png" class="img-circle"></div>
                            <div class="mbr-author-name" style="color: rgb(0, 154, 200);">Julian Nyča</div>
                        </div>
                    </div>
                </div>
				<div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="mbr-testimonial card mbr-testimonial-lg">
                        <div class="card-block"><p style="color: rgb(0, 154, 200);">“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, aspernatur, voluptatibus, atque, tempore molestiae sed modi a ullam sint adipisci rerum vel praesentium voluptas deserunt veniam provident culpa sequi veritatis.”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-img"><img src="assets/images/avatar.png" class="img-circle"></div>
                            <div class="mbr-author-name" style="color: rgb(0, 154, 200);">Soňa Mikulová</div>
                        </div>
                    </div>
                </div>
				<div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="mbr-testimonial card mbr-testimonial-lg">
                        <div class="card-block"><p style="color: rgb(0, 154, 200);">“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, aspernatur, voluptatibus, atque, tempore molestiae sed modi a ullam sint adipisci rerum vel praesentium voluptas deserunt veniam provident culpa sequi veritatis.”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-img"><img src="assets/images/avatar.png" class="img-circle"></div>
                            <div class="mbr-author-name" style="color: rgb(0, 154, 200);">Suzana Stanković</div>
                        </div>
                    </div>
                </div>
				<div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="mbr-testimonial card mbr-testimonial-lg">
                        <div class="card-block"><p style="color: rgb(0, 154, 200);">“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, aspernatur, voluptatibus, atque, tempore molestiae sed modi a ullam sint adipisci rerum vel praesentium voluptas deserunt veniam provident culpa sequi veritatis.”</p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-img"><img src="assets/images/avatar.png" class="img-circle"></div>
                            <div class="mbr-author-name" style="color: rgb(0, 154, 200);">Anđelka Zečević</div>
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
