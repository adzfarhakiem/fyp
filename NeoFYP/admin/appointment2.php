<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/NeoFYP/css/aDash.css" />
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
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }else{
            $userid=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../config.php");
    $userrow = $database->query("select * from admin where aEmail='$userid'");
    $userfetch=$userrow->fetch_assoc();
    $useremail= $userfetch["aEmail"];
    $username=$userfetch["aName"];
    $userid= $userfetch["aId"];

    


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
          <a href="aDash.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="aListCustomer.php">
            <i class="bx bx-user"></i>
            <span class="links_name">List Customer</span>
          </a>
          <span class="tooltip">List Customer</span>
        </li>
        <li>
          <a href="appointment.php">
            <i class="bx bx-book-open"></i>
            <span class="links_name">Appointment</span>
          </a>
          <span class="tooltip">Appointment</span>
        </li>
        <li>
          <a href="appointment2.php">
            <i class="bx bx-book-open"></i>
            <span class="links_name">Booked List</span>
          </a>
          <span class="tooltip">Booked List</span>
        </li>
        <li>
          <a href="aSetting.php">
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
          <a class="navbar-brand" href="#">Navbar</a>
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
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
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

$list110 = $database->query("select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join customer on customer.cId=appointment.cId inner join admin on schedule.aId=admin.aId  where  admin.aId=$userid ");
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
  background-color: #252525;
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
  background-image: linear-gradient(45deg, #252525 0%, #993333 51%, #252525  100%);
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
      
      <p style="font-size: 30px;padding-left:12px;font-weight: 600;">Booking List</p>
 
      <?php

        $sql = $database->query("SELECT * FROM schedule WHERE title = 'Boarding' or title = 'Mating'  ");
        $appoin_data=$sql->fetch_all(MYSQLI_ASSOC);
        

      ?>
      <table>
      <thead>
        <tr>
        <th>Schedule ID</th>
        <th>Customer ID</th>
        <th>Title</th>
        <th>Start Time</th>
        <th>Start Date</th>
        <th>End Time</th>
        <th>End Date</th>
        <th>Request Pet Grade</th>
        <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($appoin_data as $i => $appoint):?>
          <tr>
            <td><?php echo $appoint['scheduleid'] ?></td>
            <td><?php echo $appoint['cId'] ?></td>
            <td><?php echo $appoint['title'] ?></td>
            <td><?php echo $appoint['start_time'] ?></td>
            <td><?php echo $appoint['start_date'] ?></td>
            <td><?php echo $appoint['end_time'] ?></td>
            <td><?php echo $appoint['end_date'] ?></td>
            <td><?php echo $appoint['pGrade'] ?></td>
            <td>
              <form action="delete-appointment2.php" method="post" class="delete-form" id="delete-form">
                <button type="submit" value="Submit" name="submit" class="delete-btn">Delete</button>
              </form>  
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      </table>



      
    </section>
    
    <script src="aDash.js"> </script>

  </body>
</html>