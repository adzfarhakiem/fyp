<?php
session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='c'){
        header("location: ../login.php");
    }else{
        $userid=$_SESSION["user"];
    }

}else{
    header("location: ../login.php");
}


//import database
include("../config.php");
$userrow = $database->query("select * from customer where cEmail='$userid'");
$userfetch=$userrow->fetch_assoc();
$useremail= $userfetch["cEmail"];
$username=$userfetch["cName"];
$userid= $userfetch["cId"];

if($_POST){
    $delete = $_POST['delete'];

    $sql = $database->query("DELETE FROM schedule WHERE scheduleid ='$delete' ");
    header('Location: appointment2.php');
}

?>