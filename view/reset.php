<?php
session_start();
if(!empty($_SESSION['user']))
{
    header('Location: ../view/gallery.php');
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Sign in</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>
		<div class="page-wrap">

			<!-- Nav -->
			<?php include("../includes/menu1.html"); ?>

			<!-- Main -->
				<section id="main">

					<!-- Header -->
						<header id="header">
							<div><span>Camagru</span></div>
						</header>

					<!-- Section -->
						<section id="al">
							<div id="log">
								<header>
									<h1>New password</h1>
								</header>
								<form action="../controller/reset.php" method="post">
									<!--password-->
										<span class="fa fa-key" aria-hidden="true"></span>
										<input type="password" name="passwd"  id="psw" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" maxlength="40" required>
									<!--password1-->
										<span class="fa fa-key" aria-hidden="true"></span>
										<input type="password" name="passwd1" placeholder="Retype Password" required maxlength="40"></br>
										<input type="hidden" name="email" value="<?php echo $_GET['email'];?>"></br>
									<!--ok-->
                                        <?php if($_GET['error'] == 1)
                                        {
                                            echo "<h1>password non identique, retry</h1>";
                                        }?>
										<input id="saveForm" name="signin-btn" type="submit" value="Sign up" />
								</form>
							</div>	
						</section>

					<!-- Contact -->
						<section id="contact">


							<!-- Form -->
								<div class="column">
									<h3>Get in Touch</h3>
									<form action="../controller/get-in-touch.php" method="post">
										<div class="field half first">
											<label for="name">Name</label>
											<input name="name" id="name" type="text" placeholder="Name">
										</div>
										<div class="field half">
											<label for="email">Email</label>
											<input name="email" id="email" type="email" placeholder="Email">
										</div>
										<div class="field">
											<label for="message">Message</label>
											<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
										</div>
										<ul class="actions">
											<li><input value="Send Message" class="button" type="submit"></li>
										</ul>
									</form>
								</div>

						</section>

					<!-- Footer -->
					<?php include("../includes/footer.html"); ?>
				</section>
		</div>


	</body>
</html>