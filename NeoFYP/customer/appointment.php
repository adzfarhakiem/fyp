<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/NeoFYP/css/cDash.css" />
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Boxicon -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Dashboard</title>
  </head>
  <body>
    
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
    
        //echo $userid;
        //echo $username;
    
    

?>
    <div class="sidebar">
      <div class="logo-details" style="height: 100px ;">
        <i><img src="/img/logo2-removebg-preview.png" style="width:30px"></i>
        <div class="logo_name"><div style="color:black;">MyLovelyCat</div> 
        <div style="color:black;">Houz</div>
      </div>
        
      <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <!-- <li>
          <i class="bx bx-search"></i>
          <input type="text" placeholder="Search..." />
          <span class="tooltip">Search</span>
        </li> -->
        <li>
          <a href="cDash.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Home</span>
          </a>
          <span class="tooltip">Home</span>
        </li>
        <li>
          <a href="schedule.php">
            <i class='bx bx-history'></i>
            <span class="links_name">Appointment</span>
          </a>
          <span class="tooltip">Appointment</span>
        </li>
        <li>
          <a href="appointment.php">
            <i class='bx bxs-report'></i>
            <span class="links_name">My Booking</span>
          </a>
          <span class="tooltip">My Booking</span>
        </li>
        <li>
        <li>
          <a href="cSetting.php">
            <i class="bx bx-cog"></i>
            <span class="links_name">Setting</span>
          </a>
          <span class="tooltip">Setting</span>
        </li>
        <li class="profile">
          <div class="profile-details">
            <img src="/img/profile.png" alt="profileImg">
            <div class="name_job">
              <div class="name"><?php echo $username ?></div>
              <div class="job"><?php echo $useremail ?></div>
            </div>
          </div>
          <a href="/NeoFYP/logout.php">
            <i class="bx bx-log-out" id="log_out"></i>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav class="navbar navbar-expand-lg" id="nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Home</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              
            </ul>
            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date - *
                                </p>
                                
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Kolkata');
        
                                $today = date('Y-m-d');
                                echo $today;



                                ?>
                                </p>
                            </td>
            <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
          </div>
        </div>
      </nav>

      <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  text-align: center;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #cf13a0;
  color: white;
}

.delete-btn{
  margin: 10px;
  padding: 15px 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  border-radius: 10px;
  display: block;
  border: 0px;
  font-weight: 700;
  box-shadow: 0px 0px 14px -7px #f09819;
  background-image: linear-gradient(45deg, #cf13a0 0%, #ff66ff 51%, #cf13a0  100%);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.delete-btn:hover {
  background-position: right center;
  /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
}

.delete-btn:active {
  transform: scale(0.95);
}
  </style>


<h style="font-size: 35px;"><b>My Booking</b></h>
<br><br>

<br>

<p><b>Grooming</b></p>
<table>
  <tr>
    <th>Grooming ID</th>
    <th>Title</th>
    <th>Start Time</th>
    <th>Start Date</th>
    <th>Status</th>
  </tr>
  <?php


    $database = mysqli_connect("localhost", "root", "", "fyp"); //connect to the database
    $sql = "SELECT groomingid, cId, title, start_time, start_date, status FROM grooming WHERE cId='$userid'";
    $result = mysqli_query($database, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['groomingid'] . "</td>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['start_time'] . "</td>";
      echo "<td>" . $row['start_date'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "</tr>";
    }
  ?>
</table>

<br>
<br>

<p><b>Boarding</b></p>
<table>
  <tr>
    <th>Boarding ID</th>
    <th>Title</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Status</th>
  </tr>
  <?php


    $database = mysqli_connect("localhost", "root", "", "fyp"); //connect to the database
    $sql = "SELECT boardingid, cId, title, start_time, end_time, start_date, end_date, status FROM boarding WHERE cId='$userid'";
    $result = mysqli_query($database, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['boardingid'] . "</td>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['start_time'] . "</td>";
      echo "<td>" . $row['end_time'] . "</td>";
      echo "<td>" . $row['start_date'] . "</td>";
      echo "<td>" . $row['end_date'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "</tr>";
    }
  ?>
</table>

<br>
<br>

<p><b>Mating</b></p>
<table>
  <tr>
    <th>Mating ID</th>
    <th>Title</th>
    <th>Start Time</th>
    <th>Start Date</th>
    <th>Request Grade</th>
    <th>Status</th>
  </tr>
  <?php


    $database = mysqli_connect("localhost", "root", "", "fyp"); //connect to the database
    $sql = "SELECT matingid, cId, title, start_time, start_date, pGrade, status FROM mating WHERE cId='$userid'";
    $result = mysqli_query($database, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['matingid'] . "</td>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['start_time'] . "</td>";
      echo "<td>" . $row['start_date'] . "</td>";
      echo "<td>" . $row['pGrade'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "</tr>";
    }
  ?>
</table>


      
    </section>
    
    <script src="/NEOFYP/customer/cDash.js"> </script>

  </body>
</html>