<?php

$con=mysqli_connect("db.sice.indiana.edu","i308f18_jarmcgui","my+sql=i308f18_jarmcgui", "i308f18_jarmcgui");
// Check connection
if (!$con)
 {
   die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else {

  $user_sql = "SELECT * FROM user";
  $user_query = mysql_query($user_sql) or die();
  $rsUser = mysql_fetch_assoc($user_query);

}

?>
