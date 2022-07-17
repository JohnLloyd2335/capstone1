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
    <title>E-TUROK | THIRD DOSE IMMUNIZATION</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons CDN Link -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/89863904a8.js" crossorigin="anonymous"></script>
    <!-- Font Awesome -->

    <!-- JQuery Data Tables--> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>  
    <!-- JQuery Data Tables-->


    
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
          <a href="vaccine.php" >
            <i class="fas fa-syringe"></i>
            <span class="links_name">Vaccine</span>
          </a>
        </li>

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
              <a class="links_name" href="adult_immunization.php"> <i class='bx bx-box' ></i><span>Adult</span></a><br>
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
          <a href="database_backup.php">
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
        <span class="dashboard">Third Dose Immunization</span>
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

    <div class="main-content mx-2 px-2">
    
      <!-- Infant 2nd Dose -->
      <div class="container-fluid mt-4 ">
        <h4 class="font-weight-light text-center">Infant Immunization</h4>
      <table id="third_dose_infant_immunization_list" class="table table-striped table-bordered">  
        <thead class="text-center">  
            <tr> 
                <th>Firstname</th> 
                <th>Middlename</th> 
                <th>Lastname</th> 
                <th>Mobile No.</th> 
                <th>Vaccine</th>  
                <th>Dose(s)</th> 
                <th>Dose(s) Received</th> 
                <th>1st Dose Schedule</th>  
                <th>2nd Dose Schedule</th>  
                <th>3rd Dose Schedule</th>  
                <th>Action</th>   
            </tr>  
        </thead> 
        <tbody >
            <?php  
            $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id WHERE doses=3 AND doses_received=2 AND immunization.immunization_category_id=1;");
            while($row = mysqli_fetch_array($selectAllImmunization)):?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td><?php echo $row['vaccine']; ?></td>
                <td><?php echo $row['doses']; ?></td>
                <td><?php echo $row['doses_received']; ?></td>
                <td><?php echo $row['first_dose_schedule']; ?></td>
                <td><?php echo $row['second_dose_schedule']; ?></td>
                <td><?php echo $row['third_dose_schedule']; ?></td>
                
                <td class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-sm" data-target="#viewImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-primary btn-sm" data-target="#editImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-info btn-sm" data-target="#SMSImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-sms"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile;?>  
        </tbody> 
        
        </table>  
        <script>  
        $(document).ready(function(){  
            $('#third_dose_infant_immunization_list').DataTable();  
        });  
        </script>
      </div>
      <!-- Infant 2nd Dose -->

      <!-- School Age Chilren 2nd Dose -->
      <div class="container-fluid mt-4 ">
        <h4 class="font-weight-light text-center">School Age Children Immunization</h4>
      <table id="third_dose_school_age_immunization_list" class="table table-striped table-bordered">  
        <thead class="text-center">  
            <tr> 
                <th>Firstname</th> 
                <th>Middlename</th> 
                <th>Lastname</th> 
                <th>Mobile No.</th> 
                <th>Vaccine</th>  
                <th>Dose(s)</th> 
                <th>Dose(s) Received</th> 
                <th>1st Dose Schedule</th>  
                <th>2nd Dose Schedule</th>  
                <th>Action</th>     
            </tr>  
        </thead> 
        <tbody >
            <?php  
           $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id WHERE doses=3 AND doses_received=2 AND immunization.immunization_category_id=2;");
            while($row = mysqli_fetch_array($selectAllImmunization)):?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td><?php echo $row['vaccine']; ?></td>
                <td><?php echo $row['doses']; ?></td>
                <td><?php echo $row['doses_received']; ?></td>
                <td><?php echo $row['first_dose_schedule']; ?></td>
                <td><?php echo $row['second_dose_schedule']; ?></td>
                <td><?php echo $row['third_dose_schedule']; ?></td>
                
                <td class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-sm" data-target="#viewImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-primary btn-sm" data-target="#editImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-info btn-sm" data-target="#SMSImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-sms"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile;?>  
        </tbody> 
        
        </table>  
        <script>  
        $(document).ready(function(){  
            $('#third_dose_school_age_immunization_list').DataTable();  
        });  
        </script>
      </div>
      <!-- School Age Chilren 2nd Dose -->

      <!-- Pregnant 2nd Dose -->
      <div class="container-fluid mt-4 ">
        <h4 class="font-weight-light text-center">Pregnant Immunization</h4>
      <table id="third_dose_pregnant_immunization_list" class="table table-striped table-bordered">  
        <thead class="text-center">  
            <tr> 
            <th>Firstname</th> 
                <th>Middlename</th> 
                <th>Lastname</th> 
                <th>Mobile No.</th> 
                <th>Vaccine</th>  
                <th>Dose(s)</th> 
                <th>Dose(s) Received</th> 
                <th>1st Dose Schedule</th>  
                <th>2nd Dose Schedule</th>  
                <th>Action</th>   
            </tr>  
        </thead> 
        <tbody >
            <?php  
            $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id WHERE doses=3 AND doses_received=2 AND immunization.immunization_category_id=3;");
            while($row = mysqli_fetch_array($selectAllImmunization)):?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td><?php echo $row['vaccine']; ?></td>
                <td><?php echo $row['doses']; ?></td>
                <td><?php echo $row['doses_received']; ?></td>
                <td><?php echo $row['first_dose_schedule']; ?></td>
                <td><?php echo $row['second_dose_schedule']; ?></td>
                <td><?php echo $row['third_dose_schedule']; ?></td>
                
                <td class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-sm" data-target="#viewImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-primary btn-sm" data-target="#editImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-info btn-sm" data-target="#SMSImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-sms"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile;?>  
        </tbody> 
        
        </table>  
        <script>  
        $(document).ready(function(){  
            $('#third_dose_pregnant_immunization_list').DataTable();  
        });  
        </script>
      </div>
      <!-- Pregnant 2nd Dose -->

      <!-- Adult 2nd Dose -->
      <div class="container-fluid mt-4 ">
        <h4 class="font-weight-light text-center">Adult Immunization</h4>
      <table id="third_dose_adult_immunization_list" class="table table-striped table-bordered">  
        <thead class="text-center">  
            <tr> 
                <th>Firstname</th> 
                <th>Middlename</th> 
                <th>Lastname</th> 
                <th>Mobile No.</th> 
                <th>Vaccine</th>  
                <th>Dose(s)</th> 
                <th>Dose(s) Received</th> 
                <th>1st Dose Schedule</th>  
                <th>2nd Dose Schedule</th>  
                <th>Action</th>   
            </tr>  
        </thead> 
        <tbody >
            <?php  
            $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id WHERE doses=3 AND doses_received=2 AND immunization.immunization_category_id=4;");
            while($row = mysqli_fetch_array($selectAllImmunization)):?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td><?php echo $row['vaccine']; ?></td>
                <td><?php echo $row['doses']; ?></td>
                <td><?php echo $row['doses_received']; ?></td>
                <td><?php echo $row['first_dose_schedule']; ?></td>
                <td><?php echo $row['second_dose_schedule']; ?></td>
                <td><?php echo $row['third_dose_schedule']; ?></td>
                
                <td class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-sm" data-target="#viewImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-primary btn-sm" data-target="#editImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-info btn-sm" data-target="#SMSImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-sms"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile;?>  
        </tbody> 
        
        </table>  
        <script>  
        $(document).ready(function(){  
            $('#third_dose_adult_immunization_list').DataTable();  
        });  
        </script>
      </div>
      <!-- Adult 2nd Dose -->

      <!-- Senior Citizen 2nd Dose -->
      <div class="container-fluid mt-4 ">
        <h4 class="font-weight-light text-center">Senior Citizen Immunization</h4>
      <table id="third_dose_senior_immunization_list" class="table table-striped table-bordered">  
        <thead class="text-center">  
            <tr> 
                <th>Firstname</th> 
                <th>Middlename</th> 
                <th>Lastname</th> 
                <th>Mobile No.</th> 
                <th>Vaccine</th>  
                <th>Dose(s)</th> 
                <th>Dose(s) Received</th> 
                <th>1st Dose Schedule</th>  
                <th>2nd Dose Schedule</th>  
                <th>Action</th>      
            </tr>  
        </thead> 
        <tbody >
            <?php  
           $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id WHERE doses=3 AND doses_received=2 AND immunization.immunization_category_id=5;");
            while($row = mysqli_fetch_array($selectAllImmunization)):?>
            <tr>
            <td><?php echo $row['first_name']; ?></td>
                 <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td><?php echo $row['vaccine']; ?></td>
                <td><?php echo $row['doses']; ?></td>
                <td><?php echo $row['doses_received']; ?></td>
                <td><?php echo $row['first_dose_schedule']; ?></td>
                <td><?php echo $row['second_dose_schedule']; ?></td>
                <td><?php echo $row['third_dose_schedule']; ?></td>
                
                <td class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-sm" data-target="#viewImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-primary btn-sm" data-target="#editImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-info btn-sm" data-target="#SMSImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-sms"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile;?>  
        </tbody> 
        
        </table>  
        <script>  
        $(document).ready(function(){  
            $('#third_dose_senior_immunization_list').DataTable();  
        });  
        </script>
      </div>
      <!-- Senior Citizen 2nd Dose -->

    </div>
  </section>

<!-- Modals -->
    <!-- View Immunization Modal -->
    <?php 
    $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id;");
    while($row = mysqli_fetch_array($selectAllImmunization)):?>
    <div class="modal fade" id="viewImmunizationModal<?php echo $row['immunization_id']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">View Immunization</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              
            <div class="container-fluid p-2">

                <div class="row">
                    <input type="hidden" name="immunization_id" value="<?php echo $row['immunization_id']; ?>">

                    <div class="col">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="first_name" class="form-control"  value="<?php echo $row['first_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Middlename</label>
                            <input type="text" name="middle_name" class="form-control" value="<?php echo $row['middle_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" name="contact_no" class="form-control"  value="<?php echo $row['contact_no']; ?>" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vaccine</label>
                            <input type="text" name="vaccine" class="form-control" value="<?php echo $row['vaccine']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Doses</label>
                            <input type="text" name="doses" class="form-control" value="<?php echo $row['doses']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Doses Received</label>
                            <input type="text" name="doses_received" class="form-control" value="<?php echo $row['doses_received']; ?>" readonly>
                        </div>
                    </div>

                </div>

                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label>First Dose Schedule</label>
                                <input type="text" name="first_dose_schedule" class="form-control" value="<?php echo $row['first_dose_schedule']; ?>" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Second Dose Schedule</label>
                                <?php 
                                if(empty($row['second_dose_schedule'])){
                                    $second_dose_schedule = "Set Schedule";
                                }
                                else{
                                    $second_dose_schedule = $row['second_dose_schedule'];
                                }  
                                ?>
                                <input type="text" name="second_dose_schedule" class="form-control" value="<?php echo $second_dose_schedule; ?>" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Third Dose Schedule</label>
                                <?php 
                                if(empty($row['third_dose_schedule'])){
                                    $third_dose_schedule = "Set Schedule";
                                }
                                else{
                                    $third_dose_schedule = $row['third_dose_schedule'];
                                }  
                                ?>
                                <input type="text" name="third_dose_schedule" class="form-control" value="<?php echo $third_dose_schedule; ?>" readonly>
                            </div>
                        </div>

                    </div>
                    

                

                

            </div>
              
                          
                      

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- View Immnization Modal -->

    <!-- Edit Schedule Modal -->
    <?php 
    $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id;");
    while($row = mysqli_fetch_array($selectAllImmunization)):?>
    <div class="modal fade" id="editImmunizationModal<?php echo $row['immunization_id']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">Edit Immunization</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              
            <div class="container-fluid p-2">

                <div class="row">
                    <form action="../crud.php" method="post">
                    <input type="hidden" name="immunization_id" value="<?php echo $row['immunization_id']; ?>">

                    <div class="col">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="first_name" class="form-control"  value="<?php echo $row['first_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Middlename</label>
                            <input type="text" name="middle_name" class="form-control" value="<?php echo $row['middle_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="number" name="contact_no" class="form-control"  value="<?php echo $row['contact_no']; ?>" >
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vaccine</label>
                            <input type="text" name="vaccine" class="form-control" value="<?php echo $row['vaccine']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Doses</label>
                            <input type="text" name="doses" class="form-control" value="<?php echo $row['doses']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Doses Received</label>
                            <select name="doses_received" class="form-control">
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>

                </div>

                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label>First Dose Schedule</label>
                                <input type="date" name="first_dose_schedule" class="form-control" value="<?php echo $row['first_dose_schedule']; ?>" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <?php 
                                $date = date("Y-m-d");
                                ?>
                                <label>Second Dose Schedule</label>
                                <input type="date" name="second_dose_schedule" min="<?php echo $date; ?>" class="form-control" value="<?php echo $row['second_dose_schedule']; ?>" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <?php 
                                $date = date("Y-m-d");
                                ?>
                                <label>Third Dose Schedule</label>
                                <input type="date" name="third_dose_schedule" min="<?php echo $row['second_dose_schedule']; ?>" class="form-control" value="<?php echo $row['third_dose_schedule']; ?>" >
                            </div>
                        </div>

                    </div>
            </div>
              
                          
                      

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="edit_third_dose">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            
        </div>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- Edit Schedule Modal -->

    <!-- SMS Immunization Modal -->
    <?php 
    $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id;");
    while($row = mysqli_fetch_array($selectAllImmunization)):?>
    <div class="modal fade" id="SMSImmunizationModal<?php echo $row['immunization_id']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">Send Notification</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              
            <div class="container-fluid p-2">
              <form action="../crud.php" method="post">
                <div class="row">
                    

                    <div class="col">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="first_name" class="form-control"  value="<?php echo $row['first_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Middlename</label>
                            <input type="text" name="middle_name" class="form-control" value="<?php echo $row['middle_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" name="contact_no" class="form-control"  value="<?php echo $row['contact_no']; ?>" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vaccine</label>
                            <input type="text" name="vaccine" class="form-control" value="<?php echo $row['vaccine']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Doses</label>
                            <input type="text" name="doses" class="form-control" value="<?php echo $row['doses']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Doses Received</label>
                            <input type="text" name="doses_received" class="form-control" value="<?php echo $row['doses_received']; ?>" readonly>
                        </div>
                    </div>

                </div>

                    <div class="row">

                        <div class="col">
                          <label>Message</label>
                          <textarea cols="30" rows="10" name="message" class="form-control" style="resize:none;" name="message">RHU Pila Third Dose Schedule: <?php echo $row['third_dose_schedule']; ?>
                          </textarea>
                        </div>

                    </div>
                    

                

                

            </div>
              
                          
                      

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" name="send_sms" class="btn btn-primary">Send</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
            
        </div>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- SMSImmnization Modal -->
    
          

<!-- Modals-->

  

  <script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
  }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
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

