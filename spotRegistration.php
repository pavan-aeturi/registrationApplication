<!doctype html>
<html lang="en"  style="overflow: scroll;">
<head>
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
 	<link rel="stylesheet" href="stylesheet.css">
 </head>
 <body >

 	<div class="container">
 		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php">DOSAR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="./index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./register.php">Register</a>
      </li>
        <li class="nav-item">
           <a class="nav-link" href="./event1.php">Events data</a>
        </li>
      <li class="nav-item active">
        <a class="nav-link " href="./spotRegistration.php" >Spot Registration<span class="sr-only">(current)</span></a>
      </li>
       
        <li class="nav-item">
        <a class="nav-link " href="./print.php" >Print Passes</a>
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
 --> 
    </div>
</nav>
        <br>    
    <h2>Registration Form</h2>
     <?php
      include('connections.php');
       function validateFormData($formData)
            {
                $formData=trim(stripslashes(htmlspecialchars($formData)));
                return $formData;
            }
      $name="";
      $nameerror="";
      if(isset($_POST["post_register"]))
      {
          $college=$_POST["post_college"];
          $mobile=($_POST["post_mobile"]=="")?0:($_POST["post_mobile"]);
          $city=$_POST["post_city"];
          $event=$_POST["post_event"];
           if($_POST["post_name"]=="")
               {
                   $nameerror="Please enter your name<br>";
                   echo "<div class='alert alert-danger'>Please Register with minimum details of name , pass and T&C</div>";   
               }
            else if(!empty($_POST["post_check"]))
            {
                $name=strtoupper(validateFormData($_POST["post_name"]));
                $query="INSERT INTO day0(NAME,COLLEGE,MOBILE,CITY,EVENT)
                VALUES('$name','$college','$mobile','$city',
                '$event');";
                 if(mysqli_query($connection,$query))
                {
                    echo "<div class='alert alert-success'>succesfully Registered!</div>";
                }
                else
                {
                  echo "<div class='alert alert-danger'>Error:".$query."<br>".mysqli_error($connection)."</div>";   
                }
            }
            else{
               // $nameerror="Please enter your name<br>";
               echo "<div class='alert alert-danger'>Accepting T&C is compulsory to register</div>";       
            }
      }
    ?>
    <div class="over" style="width:80%; float:center; background-color:rgb(248,248,248); margin-top:20px;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="justify-content-center">
    <div class="form-group over" style="width:70%;">
    <label for="name" style="float :left; " ><small class="text-danger">*</small>Name</label>
  
    <input type="text" class="form-control" style="min-width=300px;" id="name" name="post_name" placeholder="Name">  
    <label for="college"  style="float:left;">College</label>
    <input type="text"  style=" min-width=300px;" class="form-control" name="post_college"id="college" placeholder="College Name">
    
    <label for="mobile"  style="float:left;">mobile</label>
    <input type="number"  name="post_mobile" style=" min-width=300px;" class="form-control" id="mobile" placeholder="mobile">
    
    <label for="city"  style="float:left;">City/State</label>
    <input type="text"  name="post_city" style=" min-width=300px;" class="form-control" id="city" placeholder="City/State">
    <label for="event" style="float:left;">Select Pass form:</label>
      <select name="post_event" class="form-control" id="event">
        <option>3 DAY ACCO</option>
        <option>4 DAY ACCO</option>
        <option>COMBO NIGHTS</option>
        <option>EVENTS ONLY</option>
        <option>PARTICIPANT</option>
        <option selected>VISITOR</option>
      </select>
    <input type="checkbox" name="post_check" class="form-check-input" id="exampleCheck1">
    <label  class="form-check-label" for="exampleCheck1">I agree to abibe by <a href="./m6.pdf">Rules and Regulations</a></label>
   </div>
  <button type="submit" class="btn btn-primary" name="post_register">Register</button>
</form>
    <form>
            
    </form>
        </div>
        
	</div>
<script src="../js/bootstrap.min.js"> </script>
</body>
 </html>