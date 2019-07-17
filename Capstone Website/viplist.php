<?php

$conn=mysqli_connect("db.sice.indiana.edu","i308f18_jarmcgui","my+sql=i308f18_jarmcgui", "i308f18_jarmcgui");
// Check connection
if (!$conn)
 {
   die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else {

  $sql =  "SELECT * FROM user";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	echo "<table><tr><th>name</th><th>email</th><tr>";

  	while ($row = mysqli_fetch_assoc($result)){

  		echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td></tr>";
  			}
  			echo "</table>";
  		} else {
  		echo "0 results";
  		}
  mysqli_close($conn);
}

?>
