<!doctype html>
<html lang="en">

	<!--
		I360 Web Design
		Basic HTML/CSS template
	-->

	<head>
		<meta charset="utf-8">
		<title>I360 Template</title>
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/styles.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Playfair+Display" rel="stylesheet">
		<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
	</head>

	<body>

		<!-- Navigation -->

		<div class="navigation">
			<div class="logo">
				<img src="images/dark_logo_transparent_background.png" alt="lgo">
			</div>
			<div class="menu">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="news.html">News</a></li>
				<li><a href="events.html">Events</a></li>
				<li><a href="menu.html">Menu</a></li>
				<li><a href="Contact.html">Contact</a></li>
			</ul>
			</div>
		</div>

		<!-- Plugin -->

		<ul class="rslides">
			<li><img src="images/coffee1.jpg" alt=""></li>
			<li><img src="images/coffee2.jpg" alt=""></li>
			<li><img src="images/coffee3.jpg" alt=""></li>
		</ul>


<!-- VIP LIST -->

<ul>
    <?php do {
    ?>
    <li><a href="viplist.php"><?php echo $rsUser["email"]; ?></a></li>
    <?php
    } while ($rsUser = mysql_fetch_assoc($user_query));
    ?>
</ul>



<!-- Footer -->

<footer>
	<div class="contact">
		<div class = "contact-info">
			<address>
				<strong>Jack's Coffee</strong><br>
				3961 College Ave<br>
				Bloomington, Indiana 47404
			</address>
			<p>317-255-3189</p>
			<p><a href="mailto:JacksCoffee@sbcglobal.net">JacksCoffee@sbcglobal.net</a></p>
		</div>
	</div>
</footer>
<!-- JS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="responsiveslides.min.js"></script>
<!-- Activation JS -->

<script>
  $(function() {
    $(".rslides").responsiveSlides();
  });
</script>

	</body>
</html>
