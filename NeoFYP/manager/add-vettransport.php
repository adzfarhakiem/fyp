<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='m'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $date = $_POST["date"];
      $time = $_POST["time"];
      $capacity = $_POST["capacity"];
    
      // Insert the transport slot into the database using the provided date, time, and capacity
      // Connect to the database
      $database= new mysqli("localhost","root","","fyp");
      if ($database->connect_error){
          die("Connection failed:  ".$database->connect_error);
      }
  
     
      $sql = "INSERT INTO vet_transport (start_date, start_time, capacity, title)
      VALUES ('$date', '$time', '$capacity', 'Vet Transport')";
      if ($database->query($sql) === TRUE) {
        echo "New transport slot created successfully";
        header("location: ../schedule.php");
      } else {
        echo "Error: " . $sql . "<br>" . $database->error;
        header("location: ../schedule.php");
      }
            //echo ;
            header("location: mDash.php?action=schedule-added&id=");
      $database->close();
    }
    
    

?>