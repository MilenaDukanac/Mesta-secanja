<?php
include('headerGuest.php');
?>
<script type="text/javascript" src="register.js"></script>
<section ng-app="app" class="mbr-section form1 mbr-after-navbar" id="form1-o" data-rv-view="56" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
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

  <div class="mbr-section mbr-section-nopadding" ng-controller="registerControler">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-6 col-lg-offset-3" data-form-type="formoid">
          <div data-form-alert="true">
            <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">
              You successfully registered
            </div>
          </div>

          <form name="f">
            <div class="form-group">
              <label class="form-control-label" for="form1-o-name">Name*</label>

              <input type="text" class="form-control" name="name" ng-required="true" data-form-field="Name" id="form1-o-name" ng-model="newUser.name" ng-pattern="/^[a-zA-Z ]+$/">
              <span class="form-control-label"  style="color: darkred" ng-show="f.name.$error.required && f.name.$dirty">This field is required!</span>
              <span class="form-control-label"  style="color: darkred" ng-show="f.name.$error.pattern && f.name.$dirty">The name is not valid, it can only contains uppercase, lowercase and spaces!</span>
            <div>

            <div class="form-group">
              <label class="form-control-label" for="form1-o-surname">Surname*</label>
              <input type="text" class="form-control" name="surname" required="" data-form-field="Surname" id="form1-o-surname" ng-model="newUser.surname" ng-pattern="/^[a-zA-Z ]+$/">
                <span class="form-control-label"  style="color: darkred" ng-show="f.surname.$error.required && f.surname.$dirty">This field is required!</span>
                <span class="form-control-label"  style="color: darkred" ng-show="f.surname.$error.pattern && f.surname.$dirty">The surname is not valid, it can only contains uppercase, lowercase and spaces!</span>
            </div>

            <div class="form-group">
              <label class="form-control-label" for="form1-o-email">Email*</label>
              <input type="email" class="form-control" name="email" required="" data-form-field="Email" id="form1-o-email" ng-model="newUser.email">
                <span class="form-control-label"  style="color: darkred" ng-show="f.email.$error.required && f.email.$dirty">This field is required!</span>
                <span class="form-control-label"  style="color: darkred" ng-show="f.email.$error.email && f.email.$dirty">The email is not valid!</span>
            </div>

            <div class="form-group">
              <label class="form-control-label" for="form1-o-username">Username*</label>
              <input type="text" class="form-control" name="username" required="" data-form-field="Username" id="form1-o-username" ng-model="newUser.username" ng-maxlength="16" ng-minlength="5" ng-pattern="/^[a-zA-Z0-9_]+$/" ng-change="unique()">
              <span class="form-control-label"  style="color: darkred" ng-show="f.username.$error.required && f.username.$dirty">This field is required!</span>
              <span class="form-control-label"  style="color: darkred" ng-show="f.username.$error.pattern && f.username.$dirty">The username is not valid, it can only contains uppercase, lowercase, numbers and _ !</span>
              <span class="form-control-label"  style="color: darkred" ng-show="(f.username.$error.maxlength || f.username.$error.minlength) && f.username.$dirty">The username must be betwen 5 and 16 characters!</span>
              <span class="form-control-label"  style="color: darkred" ng-show="greska">This username is already taken!</span>
            </div>

            <div class="form-group">
              <label class="form-control-label" for="form1-o-password">Password*</label>
              <input name="password" type="password" class="form-control" required="" data-form-field="Password" id="form1-o-password" ng-model="newUser.password" ng-pattern="/^[A-Za-z0-9_-]+$/" ng-minlength="6" ng-maxlength="32">
              <span class="form-control-label"  style="color: darkred" ng-show="f.password.$error.required && f.password.$dirty">This field is required!</span>
              <span class="form-control-label"  style="color: darkred" ng-show="f.password.$error.pattern && f.password.$dirty">The password is not valid, it can only contains uppercase, lowercase, numbers, _ and - !</span>
              <span class="form-control-label"  style="color: darkred" ng-show="(f.password.$error.maxlength || f.password.$error.minlength) && f.password.$dirty">The username must be betwen 6 and 32 characters!</span>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="form1-o-password">Confirm Password*</label>
              <input name="confpass" type="password" class="form-control" required="" data-form-field="Password" id="form1-o-password" ng-change="same(newUser.password,confpass)" ng-model="confpass">
                <span class="form-control-label"  style="color: darkred" ng-show="f.confpass.$error.required && f.confpass.$dirty">This field is required!</span>
                <span class="form-control-label"  style="color: darkred" ng-show="sameR && f.confpass.$dirty">The passwords don't match!</span>
            </div>
			
			<div class="form-group">
              <label class="form-control-label" for="form1-o-institution">Institution*</label>
              <input type="text" class="form-control" name="institution" required="" data-form-field="Institution" id="form1-o-institution" ng-model="newUser.institution" ng-pattern="/^[a-zA-Z ]+$/">
              <span class="form-control-label"  style="color: darkred" ng-show="f.institution.$error.required && f.institution.$dirty">This field is required!</span>
              <span class="form-control-label"  style="color: darkred" ng-show="f.institution.$error.pattern && f.institution.$dirty">The institution is not valid, it can only contains uppercase, lowercase and spaces!</span>
            </div>
			
			<div class="form-group">
              <label class="form-control-label" for="form1-o-note">Note</label>
              <input type="note" class="form-control text-area" name="note" data-form-field="Note" id="form1-o-note" ng-model="newUser.note">
            </div>

            <div class="mbr-buttons mbr-buttons--right btn-inverse">
              <button type="submit" class="btn btn-sm btn-black" ng-click="register()">
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
