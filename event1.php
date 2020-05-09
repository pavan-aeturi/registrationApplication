<!doctype html>
<html lang="en">
<head>
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
 </head>
 <body>
     <div class="container">
 		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">DOSAR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./register.php">Register</a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="./event1.php">Events Data<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./spotRegistration.php" >Spot Registration</a>
      </li>
        
        <li class="nav-item">
        <a class="nav-link " href="./print.php" >Print Passes</a>
      </li>
    </ul>
     </div>
</nav>
         <div class="container">
             <br><br>
<?php include('connections.php');
$query="SELECT * FROM entry order by sno desc LIMIT 10 ";
$result=mysqli_query($connection,$query);

if(mysqli_num_rows($result))
 {
 	 echo "<table class='table table-bordered'><tr><th>ID</th></tr>";
 	 while($row=mysqli_fetch_assoc($result))
 	 	 {echo "<tr><td>".$row["ID"]."</td></tr>";
	 	 }
    
 	echo "</table>";
 	//echo "hello";
}
else
{
	echo "<strong>NO RESULTS</strong> in database";
}
mysqli_close($connection);
?>
             <script src="../js/bootstrap.min.js"> </script>
         </div>
</div>
</body>
 </html>