 <?php
 $username='root';
 $password='tiger@#7845.';
 $server='localhost';
 $db='day2night';
 $connection=mysqli_connect($server,$username,$password,$db);
 if(!$connection)
 {
 	die("connection failed".mysqli_connect_error());
 }
 //echo "connected Successfully!";
 ?>