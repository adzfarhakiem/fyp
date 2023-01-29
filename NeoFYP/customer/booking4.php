<?php
$database = mysqli_connect("localhost", "root", "", "fyp");

if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='c'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }

}else{
    header("location: ../login.php");
}

$user_email = $_POST['email'];
$start_time = $_POST['start_time'];
$start_date = $_POST['start_date'];


// Retrieve cId
$query_id = "SELECT cId FROM customer WHERE cEmail='$user_email'";
$result_id = mysqli_query($database, $query_id);
$cId = mysqli_fetch_assoc($result_id)['cId'];

// Insert data into bookings table
$query = "INSERT INTO grooming (cId, start_time, start_date, title) VALUES ('$cId', '$start_time', '$start_date', 'Grooming')";

if($_POST){
  if(isset($_POST["submit"])){
    if (mysqli_query($database, $query)) {
      echo "New booking created successfully";
      header("location: ../schedule4.php");
  } else {
      echo "Error: " . $query . "<br>" . mysqli_error($database);
      header("location: ../schedule4.php");
  }
   
      //echo ;
      header("location: cDash.php?action=schedule2-added&id=");

  }
}


mysqli_close($database);
?>