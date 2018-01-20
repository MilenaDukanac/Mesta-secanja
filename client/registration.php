<?php
include('headerGuest.php');
?>

<section class="mbr-section form1 mbr-after-navbar" id="form1-o" data-rv-view="56" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
	<div class="mbr-section mbr-section__container mbr-section__container--middle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-xs-center">
					<h3 class="mbr-section-title display-2">Register</h3>
					<small class="mbr-section-subtitle">If you don't have an account yet, you can register here for free.</small>
				</div>
			</div>
		</div>
	</div>

  <div class="mbr-section mbr-section-nopadding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-6 col-lg-offset-3" data-form-type="formoid">
          <div data-form-alert="true">
            <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">
              You successfully registered
            </div>
          </div>

          <form action="home.php" method="post">
            <div class="form-group">
              <label class="form-control-label" for="form1-o-name">Name*</label>
              <input type="text" class="form-control" name="name" required="" data-form-field="Name" id="form1-o-name">
            </div>

            <div class="form-group">
              <label class="form-control-label" for="form1-o-surname">Surname*</label>
              <input type="text" class="form-control" name="surname" required="" data-form-field="Surname" id="form1-o-surname">
            </div>

            <div class="form-group">
              <label class="form-control-label" for="form1-o-email">Email*</label>
              <input type="email" class="form-control" name="email" required="" data-form-field="Email" id="form1-o-email">
            </div>

            <div class="form-group">
              <label class="form-control-label" for="form1-o-username">Username*</label>
              <input type="text" class="form-control" name="username" required="" data-form-field="Username" id="form1-o-username">
            </div>

            <div class="form-group">
              <label class="form-control-label" for="form1-o-password">Password*</label>
              <input type="password" class="form-control" name="password" required="" data-form-field="Password" id="form1-o-password">
            </div>
			
			<div class="form-group">
              <label class="form-control-label" for="form1-o-institution">Institution*</label>
              <input type="text" class="form-control" name="institution" required="" data-form-field="Institution" id="form1-o-institution">
            </div>
			
			<div class="form-group">
              <label class="form-control-label" for="form1-o-note">Note</label>
              <input type="note" class="form-control text-area" name="note" data-form-field="Note" id="form1-o-note">
            </div>

            <div class="mbr-buttons mbr-buttons--right btn-inverse">
              <button type="submit" class="btn btn-sm btn-black">
                Register
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include('footer.php');
?>
