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
$grade = $_POST["pGrade"];

// Retrieve cId
$query_id = "SELECT cId FROM customer WHERE cEmail='$user_email'";
$result_id = mysqli_query($database, $query_id);
$cId = mysqli_fetch_assoc($result_id)['cId'];

// Insert data into bookings table
$query = "INSERT INTO mating (cId, start_time, start_date, title, pGrade) VALUES ('$cId', '$start_time', '$start_date', 'Mating', '$grade')";

if($_POST){
  if(isset($_POST["submit"])){
    if (mysqli_query($database, $query)) {
      echo "New booking created successfully";
      header("location: ../schedule3.php");
  } else {
      echo "Error: " . $query . "<br>" . mysqli_error($database);
      header("location: ../schedule3.php");
  }
   
      //echo ;
      header("location: cDash.php?action=schedule2-added&id=");

  }
}


mysqli_close($database);
?>