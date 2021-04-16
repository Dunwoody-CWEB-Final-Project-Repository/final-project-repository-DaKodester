<?PHP
	include 'config/database.php';

    // Create insert statement
    /*$query="INSERT into appointments (appointmentID, userID, adminID ) VALUES (1234, 12345, 123456)";
    // run insert
    $stmt=$con->prepare($query);
    $stmt->execute();*/
?>


<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cody's Car Wash</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="index is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1 id="logo"><a href="index.html">Cody's <span>Car Wash</span></a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="index.html">Welcome</a></li>
							<li class="submenu">
								<a href="#">Menu</a>
								<ul>
									<li><a href="left-sidebar.html">About Me</a></li>
									<li><a href="right-sidebar.html">Recent Projects</a></li>
									<li><a href="no-sidebar.html">No Sidebar</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="login.php">Log-In</a></li>
									<li class="submenu">
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Dolore Sed</a></li>
											<li><a href="#">Consequat</a></li>
											<li><a href="#">Lorem Magna</a></li>
											<li><a href="#">Sed Magna</a></li>
											<li><a href="#">Ipsum Nisl</a></li>
										</ul>
									</li>
								</ul>
							</li>

							<li><a href="createaccount.php" class="button primary">Sign Up</a></li>

							<li><a href="login.php" class="button primary">Log-In</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">

					<!--
						".inner" is set up as an inline-block so it automatically expands
						in both directions to fit whatever's inside it. This means it won't
						automatically wrap lines, so be sure to use line breaks where
						appropriate (<br />).
					-->
					<div class="inner">

						<header>
							<h2>Cody's Car Wash</h2>
						</header>
						<p>This is Cody's Car Wash, Click Down
						<br />
						Below To Schedule an Appointment
						<br />
						<footer>
							<ul class="buttons stacked">
								<li><a href="#main" class="button fit scrolly">Schedule An Appointment</a></li>
							</ul>
						</footer>

					</div>

				</section>
				

				<?php
					include 'config/database.php';
					$php_errormsg = "";
					if (!empty($_POST)){
						$query="INSERT into appointments (fname, lname, email, description) VALUES (:fname, :lname, :email, :description)";
						$stmt=$con->prepare($query);
						$stmt->bindParam(":fname",$_POST['fname'],PDO::PARAM_STR);
						$stmt->bindParam(":lname",$_POST['lname'],PDO::PARAM_STR);
						$stmt->bindParam(":email",$_POST['email'],PDO::PARAM_STR);
						$stmt->bindParam(":description",$_POST['description'],PDO::PARAM_STR);
						$stmt->execute();
					}else {
						$php_errormsg = "Please Fully fill out form.";
					}
						
				?>
				<!-- Main -->
				<article id="main">	

					<header class="special container">
						
						<form form method="POST" action="index.php">
							<label for="fname">First name:</label><br>
							<input type="text" id="fname" name="fname">
							<label for="lname">Last name:</label><br>
							<input type="text" id="lname" name="lname">
							<label for="lname">Email:</label><br>
							<input type="text" id="email" name="email">
							<textarea type="text" id="description" name="description">Enter description of what you want done...</textarea>
							
							<input id="submitbutt" type="submit" value="Create Appointment">
						  </form>
					</header>
				</article>

					

			<!-- CTA -->
				<section id="cta">

					<header>
						<h2>Ready to do <strong>something</strong>?</h2>
						<p>Proin a ullamcorper elit, et sagittis turpis integer ut fermentum.</p>
					</header>
					<footer>
						<ul class="buttons">
							<li><a href="#" class="button primary">Take My Money</a></li>
							<li><a href="#" class="button">LOL Wut</a></li>
						</ul>
					</footer>

				</section>

			<!-- Footer -->
				<footer id="footer">

					<ul class="icons">
						<li><a href="#" class="icon brands circle fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands circle fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands circle fa-google-plus-g"><span class="label">Google+</span></a></li>
						<li><a href="#" class="icon brands circle fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands circle fa-dribbble"><span class="label">Dribbble</span></a></li>
					</ul>

					<ul class="copyright">
						<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>