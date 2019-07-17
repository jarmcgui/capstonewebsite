<?php
include('verify.php');
session_start();
?>


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

		<style>
	  .g-signin2 {
	      position: absolute;
	      top: 0px;
				right: 0px;
				padding: 10px;
	    }
	    .data {
	      display: none;
				padding: 10px;
	    }

			.signoutbutton {
				position: absolute;
				top: 0px;
				right: 0px;
				padding: 10px;
			}

			#token {
				height: 45px;
			}

			#AdminLogin {
				display: none;
			}

	  </style>
	</head>

	<body>

<!-- Google Sigin in -->

<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="182990376124-i302cq5m8v7tccf77ptqn3ki6tvdeo7l.apps.googleusercontent.com">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<div class="data">
<div class="signoutbutton">
<button onclick="signOut();">Sign out</button>
</div>
<br>You are signed in as:<br>
<textarea readonly id="token" rows="" cols=""></textarea>
<br>
 <button id="verify_in_server">Login as Administrator</button>
 <div id="verify_in_server_result"></div>
</div>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript">
      function onSignIn(googleUser) {

				var profile=googleUser.getBasicProfile();
				$(".g-signin2").css("display","none");
				$(".data").css("display", "block");
				$("#pic").attr('src',profile.getImageUrl());
				$("#email").text(profile.getEmail());
				var id_token = profile.getEmail();
				$("#token").text(id_token);

      }

  function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
	  auth2.signOut().then(function(){
	    alert("You have been successfully signed out");
	    $(".g-signin2").css("display","block");
	    $(".data").css("display", "none");
			window.location.reload();





			  });

  }

 $("#verify_in_server").click(function(){

 $.ajax({
 type: "POST",
 url: "verify.php",
 data: { token: $("#token").text()},
 success: function(result){
     	    $("#verify_in_server_result").html(result);
				

    }
 });
 });
</script>



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
				<div id="AdminLogin">
				<li><a href="viplist.php">VIP List</a></li>
				</div>
			</ul>
			</div>
		</div>

		<!-- Plugin -->

		<ul class="rslides">
			<li><img src="images/coffee1.jpg" alt=""></li>
			<li><img src="images/coffee2.jpg" alt=""></li>
			<li><img src="images/coffee3.jpg" alt=""></li>
		</ul>
	</div>

	<!-- Form -->
	<form action="createuser.php" method="post" name="form" class="form-box">
		<div class="container-newsletter">
			<h2>Subscribe to VIP list</h2>
		</div>
		<div class="container-newsletter" style="background-color:white">
		<label for="name">Name:</label><br>
		<input type="text" name="name" class="inp" placeholder="" required><br>
		<label for="email">Email:</label><br>
		<input type="email" name="email" class="inp" placeholder="" required><br>
		<input type="submit" name="submit" value="submit">
	</div>
	</form>


<!-- Twitter -->

<Twitter>
<a class="twitter-timeline" href="https://twitter.com/JacksCoffee1?ref_src=twsrc%5Etfw" data-tweet-limit="4">Tweets by Jack's Coffee</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</Twitter>


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
