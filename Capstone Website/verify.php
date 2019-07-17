<?php
session_start();
	$conn = mysqli_connect("db.sice.indiana.edu","i308f18_jarmcgui","my+sql=i308f18_jarmcgui", "i308f18_jarmcgui");

	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
		}


if (isset ( $_REQUEST['token'] ) && $_REQUEST['token'] != '') {


	$token = print_r($_REQUEST['token'], true);


    $sql = "SELECT email FROM employeeLogin
			WHERE admin = 1 AND email = '$token';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$resultArray = array();
		while($row = $result->fetch_assoc()) {
			$tempArray = array();
			$tempArray = $row;
			array_push($resultArray, $tempArray);

		}
		?>
	<style type="text/css">#AdminLogin {
	display: inline-block;
	}</style>
	<?php

	$_SESSION['login_admin'] = 'Admin User';
	echo $_SESSION['login_admin'];
	?>
<style type="text/css">#verify_in_server{
display: none;
}</style>
<?php
	//echo "Admin user";
	} else {
	echo '<script language="javascript">';
	echo 'alert("You are not authorized")';
	echo '</script>';


}
}

$conn->close();


?>
