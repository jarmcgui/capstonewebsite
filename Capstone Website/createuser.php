 <?php

  $name = $_POST['name'];
  $email = $_POST['email'];

 if (!empty($name) || !empty($email)) {
 $con=mysqli_connect("db.sice.indiana.edu","i308f18_jarmcgui","my+sql=i308f18_jarmcgui", "i308f18_jarmcgui");
// Check connection
if (!$con)
	{
    die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else {
     $SELECT = "SELECT email from user Where email = ? Limit 1";
     $INSERT = "INSERT Into user (name, email) values (?, ?)";

     $stmt = $con->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;


     if ($rnum==0) {
       $stmt->close();

       $stmt = $con->prepare($INSERT);
       $stmt-> bind_param("ss", $name, $email);
       $stmt->execute();
       echo "New Record Inserted Successfully";

     } else {
       echo "You are already added";
     }
     $stmt->close();
     $con->close();
   }
 }

   else {
   echo "All fields are required";
   die();
 }



// if(isset($_POST['submit'])){
//  $name = $POST['name'];
//  $email = $POST['email'];
//
//  if (!empty($name) || !empty($email)) {
//    $host = 'db.sice.indiana.edu';
//    $dbUsername = 'i308f18_jarmcgui';
//    $dbPassword = 'my+sql=i308f18_jarmcgui';
//    $dbName = 'i308f18_jarmcgui';
//
//    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
//
//    if (mysqli_connect_error()) {
//      die('Connect Error('. mysqli_connect_error().')'. mysqli_connect())
//    } else {
//      $SELECT = "SELECT email from user Where email = ? Limit 1";
//      $INSERT = "INSERT Into user (name, email) values (?, ?)";
//
//      $stmt = $conn->prepare($SELECT);
//      $stmt->bind_param("s", $email);
//      $stmt->execute();
//      $stmt->bind_result($email);
//      $stmt->store_result();
//      $rnum = $stmt->num_rows;
//
//      if ($rnum==0) {
//        $stmt->close();
//
//        $stmt = $conn->prepare($INSERT);
//        $stmt-> bind_param("ss", $name, $email);
//        $stmt->execute();
//        echo "New Record Inserted Successfully";
//
//      } else {
//        echo "Your are already added";
//      }
//      $stmt->close();
//      $conn->close();
//    }
//
//  } else {
//    echo "All fields are required";
//    die();
//  }
//  }

?>
