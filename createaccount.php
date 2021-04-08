<?PHP
	include 'config/database.php'; 
	$php_errormsg = "";
	if (!empty($_POST))
	{
		// Declaration of strings
		$password = ($_POST['password']);
		$conpassword = ($_POST['conPassword']);
  
		// Use == operator
		if ($password == $conpassword) {
    		$query="INSERT into users (firstName, lastName, email, cust_password) VALUES (:firstName, :lastName, :email, :cust_password)";
			$stmt=$con->prepare($query);
			$stmt->bindParam(":firstName",$_POST['firstName'],PDO::PARAM_STR);
			$stmt->bindParam(":lastName",$_POST['lastName'],PDO::PARAM_STR);
			$stmt->bindParam(":email",$_POST['email'],PDO::PARAM_STR);
			$stmt->bindParam(":cust_password",$_POST['password'],PDO::PARAM_STR);
			$stmt->execute();
		}
		else {
    		$php_errormsg = "Passwords do not match.";
		}
		
	}
?>

<!DOCTYPE HTML>

<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Create Account</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="contact is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php">Twenty <span>by HTML5 UP</span></a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="index.php">Welcome</a></li>
							<li class="submenu">
								<a href="#">Layouts</a>
								<ul>
									<li><a href="left-sidebar.html">Left Sidebar</a></li>
									<li><a href="right-sidebar.html">Right Sidebar</a></li>
									<li><a href="no-sidebar.html">No Sidebar</a></li>
									<li><a href="contact.html">Contact</a></li>
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
							<li><a href="#" class="button primary">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon solid fa-envelope"></span>
						<h2>Create A Account</h2>
						<p>Required to Schedule Appointments and Contact Me</p>
					</header>

					<!-- One -->
						<section class="wrapper style4 special container medium">

							<!-- Content -->
								<div class="content">
									<form method="POST" action="createaccount.php">
										<div class="row gtr-50">
											<div class="col-6 col-12-mobile">
												<input type="text" name="firstName" placeholder="First Name" />
											</div>
											<div class="col-6 col-12-mobile">
												<input type="text" name="lastName" placeholder="Last Name" />
											</div>
											<div class="col-12">
												<input type="text" name="email" placeholder="Email" />
											</div>
											<div class="col-12">
												<input type="text" name="password" placeholder="Password" />
											</div>
											<div class="col-12">
												<input type="text" name="conPassword" placeholder="Confirm Password" />
											</div>
											<div class="col-12">
												<ul class="buttons">
													<li><input type="submit" class="special" value="Make Account" /></li>
												</ul>
											</div>
											<div>
												<?php
													echo $php_errormsg;
												?>
											</div>	
										</div>
									</form>
								</div>

						</section>

				</article>

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
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>