<!doctype html>

<html lang="en">
<head>
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" href="stylesheet.css">
 </head>
 <body>

 	<div class="container">
 		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" >DOSAR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./register.php">Register</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./event1.php">
          Events data
        </a>
       
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./spotRegistration.php" >Spot Registration</a>
      </li>
        
        <li class="nav-item">
        <a class="nav-link " href="./print.php" >Print Passes</a>
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
 -->  </div>
</nav>
	<?php
		include('connections.php');
        
            function validateFormData($formData)
            {
                $formData=trim(stripslashes(htmlspecialchars($formData)));
                return $formData;
            }
        $name="";
       if(isset($_POST["post_submit"]))
           {
            if(!$_POST["post_name"])
               {
                   $nameerror="Please enter your name<br>";
               }
            else{
                $name=strtoupper(validateFormData($_POST["post_name"]));
            }
            $query="INSERT INTO entry(ID) VALUES('$name');";
            $query2="SELECT * FROM entry WHERE ID ='$name';";
            $result=mysqli_query($connection,$query2);
            if(mysqli_num_rows($result)>0)
            {
             echo "<div class='alert alert-danger'>Already registered record</div>";   
            }
            else if(mysqli_query($connection,$query))
                {
                    echo "<div class='alert alert-success'>New Record in Database!</div>";
                }
                else
                {
                    echo "<div class='alert alert-danger'>Error:".$query."<br>".mysqli_error($connection)."</div>";
                }
            
       }
            mysqli_close($connection);
?>
        <img src="./SpecialNights.jpg" width="1000px" height="350px" class="over"/>
        <br>
        <div  class="border border-light rounded">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-inline justify-content-center" text-align="center">
             <small class="text-danger">*<?php echo $nameError;?></small>
             <div class="form-group" text-align="center">
                
             <input placeholder="ID" name="post_name" type="text"  border="rounded" class="form-control" autofocus>
             </div>
              
            <button type="submit" name="post_submit"  class="btn btn-primary" value="REGISTER">REGISTER</button>
        </form>
            
            </div>
	</div>
<script src="../js/bootstrap.min.js"> </script>
</body>
 </html>