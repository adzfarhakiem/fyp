<?php   

$database= new mysqli("localhost","root","","fyp");
if ($database->connect_error){
    die("Connection failed:  ".$database->connect_error);
}

 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `admin` WHERE aEmail = '$id'";  
      $run = mysqli_query($database,$query);  
      if ($run) {  
          $query2 = "DELETE FROM `utype` WHERE email = '$id'";
          $run2 = mysqli_query($database,$query2); 
               if($run2){
                    header('location:mAdmin.php');
               }  
      }else{  
           echo "Error: ".mysqli_error($database);  
      }  
 }  

 
 ?> 