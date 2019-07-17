<?php
include('verify.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="menuCSS.css">
<title> Menu </title>

<style>
 #AdminLogin {
	 display: none;
 }
</style>

</head>
<body>
<h1> Menu </h1>
<p> This will be the Menu Page for the Restaurant </p>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="182990376124-i302cq5m8v7tccf77ptqn3ki6tvdeo7l.apps.googleusercontent.com">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<a href="#" onclick="signOut();">Sign out</a>
<br>Email<br>
<textarea id="token" rows="" cols=""></textarea>
<br>
 <button id="verify_in_server">verify in server</button>
 <div id="verify_in_server_result"></div>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript">
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();


        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

		// var email =
        // The ID token you need to pass to your backend:
        var id_token = profile.getEmail(); //googleUser.getAuthResponse().id_token;
        // console.log("Token: " + id_token);

		$("#token").text(id_token);
      }

  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
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
<?php
$conn = mysqli_connect("db.sice.indiana.edu","i491u19_jmilhous","my+sql=i491u19_jmilhous","i491u19_jmilhous");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql =  "SELECT itemName, type, price, description FROM menu";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Item Name</th><th>Item Type</th><th>Price</th><th>Description</th><tr>";

	while ($row = mysqli_fetch_assoc($result)){

		echo "<tr><td>".$row["itemName"]."</td><td>".$row["type"]."</td><td>".$row["price"]."</td><td>".$row["description"]."</td></tr>";
			}
			echo "</table>";
		} else {
		echo "0 results";
		}
mysqli_close($conn);
?>



<ul>
<li><a href="homePage.html">Home</a></li>
<li><a href="menuPage.php">Menu</a></li>
<li><a href="newsPage.html">News</a></li>
<li><a href="contactUs.html">Contact Us</a></li>
<li><a href="eventPage.php">Events</a></li>
<li><a href="aboutUsPage.html">About Us</a></li>
<div id="AdminLogin">
<li><a href="AdminMenu.php">Admin Functions</a></li>
</div>
</ul>

</body>
</html>
