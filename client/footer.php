		<footer class="mbr-footer footer4 mbr-section" id="contacts4-3" data-rv-view="103" style="background-color: rgb(40, 50, 78); padding-top: 90px; padding-bottom: 10px; padding-top: 30px;">
			<div class="container">
				<div class="mbr-contacts row">

					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6">
								<p class="mbr-contacts__text">
									<strong>Links</strong>
								</p>
								<ul class="mbr-contacts__list">
									<li>
										<a class="text-white" href="home.php">Home</a>
									</li>
									<li>
										<a class="text-white" href="cemeteries.php">Cemeteries</a>
									</li>
									<li>
										<a class="text-white" href="regions.php">Regions</a>
									</li>
									<li>
										<a class="text-white" href="about.php">About</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<?php
						use PHPMailer\PHPMailer\PHPMailer;
						use PHPMailer\PHPMailer\Exception;

						if(isset($_POST['submit'])){
							$email = $_POST['email'];
							$message = $_POST['message'];

							//Load composer's autoloader
							require 'vendor/autoload.php';

							$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
							try {
									//Server settings
									//$mail->SMTPDebug = 2;                                 // Enable verbose debug output

									//Ovde treba da se podesi mail protokol i server, za svaki racunar mora posebno
									$mail->isSMTP();                                      // Set mailer to use SMTP
									$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
									$mail->SMTPAuth = true;                               // Enable SMTP authentication
									$mail->Username = $email;                 // SMTP username
									$mail->Password = '';                           // SMTP password
									$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
									$mail->Port = 587;                                    // TCP port to connect to

									//Recipients
									$mail->setFrom($email);  // treablo bi onaj koji salje mail
									$mail->addAddress('');  //Onaj koji prima mail

									//Content
									$mail->isHTML(true);                                  // Set email format to HTML
									$mail->Subject = 'Here is the subject';
									$mail->Body    = $message;
									$mail->AltBody = '';

									$mail->send();
									echo 'Message has been sent';
							} catch (Exception $e) {
									echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
							}
						}
								?>
						<form action="#" method="post">
							<div class="form-group">
								<label class="form-control-label" for="contacts4-3-email">Email<span class="form-asterisk">*</span></label>
								<input type="email" class="form-control input-sm input-inverse" name="email" required="" data-form-field="Email" id="contacts4-3-email">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="contacts4-3-message">Message</label>
								<textarea class="form-control input-sm input-inverse" name="message" data-form-field="Message" rows="4" id="contacts4-3-message"></textarea>
							</div>

							<div class="mbr-buttons mbr-buttons--right btn-inverse">
								<button type="submit" name="submit" class="btn btn-sm btn-black">
									Contact us
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</footer

		<br><br>

		<div class="container text-xs-center text-white" style="font-size: 15px;">
			<p title="Design & Development" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Milena Dukanac, Jelena Ivković, Natalija Kominac, Miloš Lončarević, Anđela Mijailović, Filip Miljaković">Copyright &copy; 2018 Faculty of Mathematics, University of Belgrade</p>
		</div>

		<script>
				$(document).ready(function(){
			  $('[data-toggle="popover"]').popover();
			});
		</script>

		<div id="scrollToTop" class="scrollToTop mbr-arrow-up">
			<a style="text-align: center;"><i class="mbr-arrow-up-icon" onclick="topFunction()"></i></a>
		</div>

		<script>
			function topFunction() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		</script>

    <script type="text/javascript">
        var rootApp = angular.module('rootApp', niz);
        console.log(niz);
  	</script>

	</body>
</html>
