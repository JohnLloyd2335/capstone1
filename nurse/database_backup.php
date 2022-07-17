<?php 
require("../database/database-config.php");
require_once("../utilities.php");
NurseCheckSession();
$activeUser = $_SESSION["nurse-logged-in-user"];
$array = getActiveUserInfo($activeUser);

$activeUserId = $array['activeUserId'];
$activeUserName = $array['activeUserName'];
$activeUserFirstName = $array['activeUserFirstName'];
$activeUserMiddleName = $array['activeUserMiddleName'];
$activeUserLastName = $array['activeUserLastName'];
$activeUserDOB = $array['activeUserDOB'];
$activeUserAge = $array['activeUserAge'];
$activeUserGender = $array['activeUserGender'];
$activeUserImg = $array['activeUserImg'];
$activeUserCategory = $array['activeUserCategory'];

$date = date('Y-m-d');

$selectAllVaccine = $sqlConn->query("SELECT * FROM vaccine");
$vaccineRows = $selectAllVaccine->num_rows;

$selectAllImmunization = $sqlConn->query("SELECT * FROM immunization");
$immunizationRows = $selectAllImmunization->num_rows;

$selectAllIUsers = $sqlConn->query("SELECT * FROM users");
$UsersRows = $selectAllIUsers->num_rows;

$selectAllVaccineCategory = $sqlConn->query("SELECT * FROM vaccine_category");
$VaccineCategoryRows = $selectAllVaccineCategory->num_rows;



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>E-TUROK | BACKUP</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons CDN Link -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/89863904a8.js" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>


</style>
<body>
<div class="sidebar d-flex flex-column">
    <div class="logo-details d-flex flex-column py-4 mb-5">
      <img src="../images/pila_logo.png" alt="" height="80" width="80">
      <span class="logo_name mt-3">E - TUROK MO</span>
    </div>
      <ul class="nav-links py-5">
      <li>
          <a href="dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="vaccine.php">
            <i class="fas fa-syringe"></i>
            <span class="links_name">Vaccine</span>
          </a>
        </li>

        <!-- <li>
          <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">Booklet</span>
          </a>
        </li> -->

        <button class="dropdown-btn">
          <i class="fa fa-shield"></i>
          <span class="links_name">Immunization</span>
          <i class="fas fa-caret-down ml-3"></i>
        </button>


        <div class="dropdown-container">
          <a href="infant_immunization.php">
            <i class="fas fa-baby"></i>
            <span class="links_name">Infant</span>
          </a>
          <a href="school_age_immunization.php">
            <i class="fas fa-child"></i>
            <span class="links_name">School Aged Chilren</span>
          </a>
          <a href="pregnant_immunization.php">
            <i class="fas fa-female"></i>
            <span class="links_name">Pregnant</span>
          </a>
          <a href="adult_immunization.php">
            <i class="fas fa-restroom"></i>
            <span class="links_name">Adult</span>
          </a>
          <a href="senior_citizen_immunization.php">
            <i class="fas fa-hat-cowboy-side"></i>
            <span class="links_name">Senior Citizen</span>
          </a>
        </div>

        <button class="dropdown-btn">
          <i class="fas fa-calendar-alt"></i>
          <span class="links_name mr-4">Doses</span>
          <i class="fa fa-caret-down ml-5"></i>
        </button>


        <div class="dropdown-container">
          <a href="second_dose.php">
            <i class="far fa-calendar-plus"></i>
            <span class="links_name">Second Dose</span>
          </a>
          <a href="third_dose.php">
            <i class="far fa-calendar-plus"></i>
            <span class="links_name">Third Dose</span>
          </a>
        </div>


        <li>
          <a href="archive.php">
            <i class="fas fa-inbox"></i>
            <span class="links_name">Archive</span>
          </a>
        </li>

           <!-- Dropdown -->
           <!-- <a class="dropdown-btn">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Imunization</span>
            <i class="fas fa-chevron-down ml-4"></i>
            <div class="dropdown-container">
              <a class="links_name" href="#"> <i class='bx bx-box' ></i><span>Adult</span></a><br>
              <a class="links_name" href="#"> <i class='bx bx-box' ></i><span>Pregnant</span></a><br>
              <a class="links_name" href="#"> <i class='bx bx-box' ></i><span>Infant</span></a><br>
            </div>
          </a> -->
          <!---->

        <!-- <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">SMS</span>
          </a>
        </li> -->
        <li>
          <a href="database_backup.php" class="active">
            <i class='bx bx-coin-stack' ></i>
           
            <span class="links_name">Database Backup</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Total order</span>
          </a>
        </li> -->
        <li>
          <a href="manage_user.php">
            <i class="fas fa-users"></i>
            <span class="links_name">Manage User</span>
          </a>
        </li>
        
        <!-- <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li> -->
        <!-- <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->


        <!-- Dropdown -->
        <!-- <a class="dropdown-btn">
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Dashboard</span>
          <div class="dropdown-container">
            <a class="links_name" href="#"> <i class='bx bx-box' ></i><span>Category</span></a><br>
            <a class="links_name" href="#"> <i class='bx bx-box' ></i><span>Category</span></a><br>
            <a class="links_name" href="#"> <i class='bx bx-box' ></i><span>Category</span></a><br>
          </div>
        </a> -->
        <!---->
        
        <!-- <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li> -->
        
      </ul>
</div>
  <section class="main-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details d-flex justify-content-between  px-5" style="cursor: pointer;">
        <!-- <img src="images/profile.jpg" alt="">
        <span class="admin_name"><?php  ?></span>
        <i class='bx bx-chevron-down' ></i> -->
        <div class="dropdown">
        <?php 
        date_default_timezone_set('Asia/Manila');
        $month_now = date("m");
        $selectExpiration =$sqlConn->query("SELECT * FROM vaccine WHERE MONTH(expiration_date)=$month_now ORDER BY expiration_date ASC");
        if($selectExpiration->num_rows > 0){
          $notification_class = "fas fa-bell text-danger";
        }
        else{
          $notification_class = "fas fa-bell text-dark";
        }
        ?>
        <i class="<?php echo $notification_class; ?>"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php 
          date_default_timezone_set('Asia/Manila');
          $month_now = date("m");
          $selectExpiration =$sqlConn->query("SELECT * FROM vaccine WHERE MONTH(expiration_date)=$month_now ORDER BY expiration_date ASC");
          while($row = $selectExpiration->fetch_assoc()):?>
            <a class="text-light font-weight-bold h6 dropdown-item bg bg-primary" href="vaccine.php">
              <?php echo $row['vaccine_name']; ?>
              <p class="text-danger font-weight-bold">
                <?php 
                $expiration_date = $row['expiration_date'];
                $date = date('F-d-Y',strtotime($expiration_date));
                echo "Expiration date: ".$date; 
                ?>
              </p>
          </a>
          <?php endwhile;?>
        </div>
      </div>      


        <div class="dropdown">
          <?php 
          if(empty($activeUserImg)){
            $activeUserImg = "../user_profile_img/default_profile.jpg";
          }
          else{
            $activeUserImg = "../user_profile_img/". $activeUserImg;
          }
          ?>
          <img src="<?php echo $activeUserImg; ?>"  class="dropdown-toggle border border-info rounded-circle border-5 " alt="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="profile.php">Profile</a>
          <form action="../crud.php" method="POST">
            <button type="submit" name="nurse_log_out" class="dropdown-item" href="#" style="cursor: pointer; border:none; outline: none;">Logout</button>
          </form>
        </div>
      </div>
      </div>
    </nav>

    <div class="main-content">
    <div class="container-fluid h-100 w-100 mt-5 px-4 py-2">
        <form action="../crud.php" method="post">
          <div class="row px-5">
            <div class="col-md-7 mb-2">
                <h5 class="text-muted font-weight-dark">Backup Name</h5>
                <input type="text" name="db_name" class="form-control">
                
            </div>
            <div class="col-md-3 d-flex justify-content-start align-items-end">
                <p class="text-muted"><?php 
                date_default_timezone_set('Asia/Manila');
                $date_time = date("Y-m-d h:i:sa"); 
                echo ".". $date_time.".sql"; 
                ?></p>
            </div>
            <div class="col-md-2 d-flex justify-content-start align-items-end mb-2">
                <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#backUpModal" data>Export</button>
            </div>
          </div>

          <!-- Database Backup Modal -->

            <div class="modal fade" id="backUpModal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h3 class="modal-title font-weight-light">Database Backup</h3>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      <div class="container-fluid">
                          <div class="row">
                            <div class="col d-flex justify-content-center">
                              <i class="fas fa-user-lock h1 border border-warning border-5 text-warning bg-light rounded-circle p-4"></i>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col text-center">
                              <h5 class="font-weight-light">Enter password to export database</h5>
                              <input type="hidden" name="correct_password" value="<?php echo $_SESSION['nurse-logged-in-password']; ?>">
                              <input class="form-control input-sm" type="password" name="entered_password" id="">
                            </div>
                          </div>
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                     
                        
                        <button type="submit" class="btn btn-primary" name="backup_database_nurse">Confirm</button>
                      
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                    
                </div>
                </div>
            </div>

          <!-- Database Backup Modal -->

        </form>
      </div>
    </div>
  </section>




  <script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");

  sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    logoName.style.display="block";
  }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    logoName.style.display="none";
  }
</script>
<script>
  let logoName = document.querySelector(".logo_name");

  let sidebarBtn = document.querySelector(".sidebarBtn");

  sidebarBtn.onclick = function() {
  if (logoName.style.display === "none") {
    logoName.style.display = "block";
  } else {
    logoName.style.display = "none";
  }
}
</script>

<script>
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;
  
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
  </script>