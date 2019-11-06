<?php
require_once "classControllers/init.php";
$admin = new Admins();
$res = null;
if (!isset($_SESSION["role"])) {
 header('Location:admin_login.php');
}
if (isset($_GET["editAdminId"])) {
 $id = $_GET["editAdminId"];
 $res = $admin->getAdmin($id);
}

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <meta http-equiv="X-UA-Compatible" content="ie=edge" />
 <title>View Admin</title>
 <link rel="icon" type="img/png" href="images/hng-favicon.png">

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

 <link rel="stylesheet" href="css/viewAdmin.css">

 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

 <style type="text/css">
  .card {
   height: 150px;
   background: #ccc;
   margin: 15px;
   padding: 10px;
   border-radius: 15px;

  }
 </style>

		}
	</style>

</head>
<body>
 <div class="container-fluid mx-auto admin__content">
  <h2 class="admin__details">Admin Details </h2>
  <div class="row w-100 mx-auto">
   <div class="col-lg-3 col-md-4 profile">

    <?php
    if ($_SESSION["hasPic"] == "no") {
     // admin has NO picture, show default
     echo '<img src="adminProfilePics/default.jpg" height="90px" width="90px"/>';
    } else if ($_SESSION["hasPic"] == "yes") {
     // admin has picture
     echo '<img src="adminProfilePics/' . $_SESSION["admin_id"] . '.jpg" class="img-circle img-responsive" height="90px" width="90px" />';
    }
    ?>

    <div id="user__profile">
     <kbd class="kbd text-light"><?php echo $_SESSION["fullname"]; ?></kbd>

     <div class="role">
     <h5 class="text-light badge badge-primary">ADMINISTRATOR</h5>
     <hr  class="border__bottom">
    </div>
    </div>

      <div class="menu">
       <li class="item" id="dashboard">
        <a href="dashboard.php" class="btns menu-headings"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
       </li>
       <li class="item" id="users">
        <a href="#users" class="btns menu-headings"><i class="fas fa-users"></i>Users<span class="chevron"></span></a>
        <div class="submenu">
         <a href="admins.php"><i class="fas fa-user-shield"></i>Admins</a>
         <a href="registered_interns.php"> <i class="fas fa-user-graduate"></i>Interns</a>
         <a href="registered_mentors.php"><i class="fas fa-hands-helping"></i>Mentors</a>
         <a href="registered_sponsors.php"><i class="fas fa-hand-holding-usd"></i>Sponsors</a>
        </div>
       </li>

       <li class="item" id="features">
        <a href="#features" class="btns menu-headings"><i class="fas fa-tools"></i>Features<span class="chevron"></span></a>
        <div class="submenu">
         <a href="internreview.php"><i class="fas fa-history"></i>Reviews</a>
         <a href="updateCountdown.php"><i class="far fa-clock"></i>CountDown</a>
         <a class="news" href="news_update.php"><i class="far fa-newspaper"></i>News Update</a>
        </div>
       </li>
       <?php
       if ($_SESSION["role"] == 1) {
        '<a href="admins.php">Admins</a>';
       }
       ?>


       <li class="item">
        <a href="./logout.php" class="btns"><i class="fas fa-sign-out-alt"></i>Logout</a>
       </li>
      </div>
   </div>

   <div class="col-lg-8 col-md-7 details mt-5">

    <div class="container-fluid">

     <div class="fullname">
      <h4 class="contact">Full Name</h4>
      <h4 class="contact__details">
       <?php echo $res["firstname"] . ' ' . $res["lastname"]; ?>
      </h4>
      <hr class="horizontal__line">
     </div>

     <div class="email my-5">
      <h4 class="contact">Email</h4>
      <h4 class="contact__details">
       <?php echo $res["email"]; ?>
      </h4>
      <hr class="horizontal__line">
     </div>

     <div class="role">
      <h4 class="contact">Role</h4>
      <h4 class="contact__details">
       <?php if ($res["role"] == 1) {
        echo "Super Admin";
       } else {
        echo "Admin";
       } ?>
      </h4>
      <hr class="horizontal__line">
     </div>

     <div class="admin__button">
      <a href="admins.php">
       <button class="btn btn-lg btn-primary">All Admins</button>
      </a>
      <span class=" ml-2 badge">
       <?php echo $id; ?>
      </span>

     </div>

    </div>
   </div>
  </div>
 </div>

</body>
</html>

<script  type="text/javascript" src="js/sidebar.js"></script>
<script type="text/javascript" src="js/dashboard.js"></script>
