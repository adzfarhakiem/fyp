<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/NeoFYP/css/cDash.css" />

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
    $userid= $userfetch["cEmail"];
    $username=$userfetch["cName"];

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
              <div class="job"><?php echo $userid ?></div>
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

      <div><h1>Status<h1></div>

      <div class="container text-center">
        <div class="row">
          <div class="col">
            <div class="card text-center w-50">
              <div class="card-header">
              Today Sessions
              </div>
              <div class="card-body">
                <h1 class="card-title">500</h1>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card text-center w-50">
              <div class="card-header">
              New Appointment
              </div>
              <div class="card-body">
                <h1 class="card-title">750</h1>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card text-center w-50">
              <div class="card-header">
              Booked Appointment
              </div>
              <div class="card-body">
                <h1 class="card-title">632</h1>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </section>
    
    <script src="/NEOFYP/customer/cDash.js"> </script>

  </body>
</html>