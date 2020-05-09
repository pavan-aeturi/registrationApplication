<!doctype html>
<html lang="en">
<head>
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
 	<link rel="stylesheet" href="./stylesheet.css">
 </head>
 <body>

 	<div class="container">
 		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php">DOSAR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}?>
            
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
      <li class="nav-item">
        <a class="nav-link " href="./spotRegistration.php" >Spot Registration</a>
      </li>
        <li class="nav-item active">
        <a class="nav-link " href="./print.php" >Print Passes<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
 --> 
      
    </div>
</nav>
     </div>
     <br>
     <div id="over search" style="width:70%; margin:auto;">
        
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
                class="form-inline"style="float:left;">
     <h3 style="float:left;">SEARCH BY NAME: </h3>
    <br>
    <input type="text" class="form-control" style="min-width=300px;" id="name" name="post_from" placeholder="Name">  
              <br>         
           <button type="submit" name="post_search_id"  class="btn btn-primary" value="search">search</button>
           <br>   
         </form>
     
    
        <?php include('connections.php');
          include('simple_html_dom.php');
        
         
$query="SELECT ID,NAME,COLLEGE,EVENT,CHECKBOX FROM day0 where CHECKBOX=0 order by ID desc;";
$result=mysqli_query($connection,$query);

        if(mysqli_num_rows($result))
         {
            echo "<br><br>";
            echo "<form action=".htmlspecialchars($_SERVER["PHP_SELF"])." method='post'>";
            echo "<div style='height: 400px; overflow: auto;'>";
             echo "<table  class='table table-striped' name='show'><tr><th >ID</th><th>NAME</th><th>COLLEGE</th><th>EVENT</th><th>pass issued<div>".'<input type="checkbox"  class="checkall btn btn-primary" id="select_all"> Check all'."</div></th></tr>";
            $id=array();
             while($row=mysqli_fetch_assoc($result))
                 {
                 array_push($id,$row["ID"]);
                 if($row["CHECKBOX"]==1)
                   $res= "<tr><td>".$row["ID"]."</td>"."<td>".$row["NAME"]."</td><td>".$row["COLLEGE"]."</td><td>".$row["EVENT"].'</td><td>
                        <input name="post_check[]" value='.$row["ID"].' type="checkbox" class="case"  autocomplete="off" checked></td>'."</tr>";
                 else
                   $res= "<tr><td>".$row["ID"]."</td>"."<td>".$row["NAME"]."</td><td>".$row["COLLEGE"]."</td><td>".$row["EVENT"].'</td><td>
                        <input name="post_check[]" type="checkbox" class="case" ></td>'."</tr>";
                 echo $res;
                 }   
            echo "</table>";
            echo "</div><br>";
            echo '<button type="submit" name="post_save" style="float:left" class="btn btn-primary">SAVE</button>';
             echo "</form>";
        }
        else
        {
            echo "<strong>NO RESULTS</strong> in database";
        }
        mysqli_close($connection);   
    ?>
    <?php
         include('connections.php');
     if(isset($_POST["post_save"]))
         {
            
             $check=$_POST["post_check"];
             console_log($check);
          if(isset($_POST['submit'])){

    if(!empty($check)) {
        foreach($check as $value){
            mysqli_query($connection,"update day0 set CHECKBOX=1 where ID=".strval($value).";");	 
         
        }
            }
            }
   
            
         }
          mysqli_close($connection);       
?>
     </div>
     

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"> </script>
     <SCRIPT language="javascript">
$(function(){
 
    // add multiple select / deselect functionality
    $("#select_all").click(function () {
          $('.case').attr('checked', this.checked);
    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".case").click(function(){
 
        if($(".case").length == $(".case:checked").length) {
            $("#select_all").attr("checked", "checked");
        } else {
            $("#select_all").removeAttr("checked");
        }
 
    });
});
</SCRIPT>
    
</body>
 </html>