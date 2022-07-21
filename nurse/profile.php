<?php 
require("../database/database-config.php");
require_once("../utilities.php");
NurseCheckSession();
$activeUser = $_SESSION["nurse-logged-in-user"];;
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
    <title>E-TUROK | Profile</title>
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
          <a href="manage_user.php" >
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
        <span class="dashboard">Profile</span>
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

    <div class="main-content mx-4 px-2">
      <div class="container-fluid p-1">
        <div class="row">
            <div class="col border  d-flex justify-content-start pr-5 pt-2 font-weight-bold">
                <div class="dropdown">
                    <i class="fas fa-ellipsis-v text-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editProfileModal<?php echo $activeUserId; ?>">Edit Profile</a>
                    </div>
                </div>  
            </div>

            

        </div>
        <div class="row">
            <div class="col profile-img-background d-flex flex-column justify-content-start align-items-center pb-3 pt-1">
                <img class="img-fluid border border-primary  rounded-circle border " src="<?php echo $activeUserImg; ?>" alt="" height="180" width="150">
                <h4 class="text-white mt-3"><?php echo $activeUserFirstName." ". $activeUserMiddleName." ". $activeUserLastName; ?></h4>
            </div>
        </div>
        <div class="container-fluid">     
            <h4 class="font-weight-light mt-2">Personal Information</h4>
            <div class="row mt-1">
                
                    <div class="col">
                        <div class="form-group d-flex flex-column">
                            <label for="">Date of Birth</label>
                            <input type="datetime-local" class="form-control" value="<?php echo $activeUserDOB; ?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group d-flex flex-column">
                            <label for="">Age</label>
                            <input type="number" class="form-control" value="<?php echo $activeUserAge; ?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group d-flex flex-column">
                            <label for="">Gender</label>
                            <input type="text" class="form-control" value="<?php echo $activeUserGender; ?>" readonly>
                        </div>
                    </div>

                    
                    
                
            </div>
            <h4 class="font-weight-light mt-3">Account Details</h4>
            <div class="row mt-1">
                <div class="col">
                    <div class="form-group d-flex flex-column">
                        <label for="">Username</label>
                        <input type="text" class="form-control" value="<?php echo $activeUserName; ?>" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group d-flex flex-column">
                        <label for="">User Type</label>
                        <input type="text" class="form-control" value="<?php echo $activeUserCategory; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </section>

<!-- Modals -->

    
    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal<?php echo $activeUserId; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">Edit Profile</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
          <form action="../crud.php" method="POST" enctype="multipart/form-data">
              <?php 
              if(empty($activeUserImg)){
                $activeUserImg = "../user_profile_img/default_profile.jpg";
              }
              else{
                $activeUserImg = "../user_profile_img/". $activeUserImg;
              }
              ?>
              <div class="container-fluid text-center p-2 rounded-top bg-dark text-white">
                  <div class="row ">
                    <div class="col">
                      <img src="<?php echo $activeUserImg; ?>" alt="" height="150" width="150" class="border border-primary rounded-circle border-5">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col">
                    <div class="custom-file bg-transparent bg-light">
                        <input type="file" class="custom-file-input bg-transparent text-white bg-light" id="customFile" name="file">
                        <label class="custom-file-label bg-transparent text-white border-dark" for="customFile">Change Profile Picture</label>
                    </div>
                    </div>
                  </div>

              </div>

              <div class="container-fluid p-2">
              <h4 class="font-weight-light">Personal Information</h4>
                <div class="row mb-2">

                      <div class="col">
                        <input type="hidden" name="profile_id" value="<?php echo $activeUserId; ?>">
                        <label for="exampleFormControlFile1">Firstname</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $activeUserFirstName; ?>" required name="first_name">
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">Middlename</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $activeUserMiddleName; ?>" required name="middle_name">
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">Lastname</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $activeUserLastName; ?>" required name="last_name">
                      </div>

                  </div>

                  <div class="row mb-2">

                
                    <div class="col">
                      <label for="exampleFormControlFile1">Date of Birth</label>
                      <input type="datetime-local" class="form-control" id="exampleFormControlFile1"  value="<?php echo $activeUserDOB; ?>" required name="dob">
                    </div>

                    <div class="col">
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Age</label>
                              <div class="wrapper" style="width:200px;height:80px;" id="test">
                                <select name="age" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required> 
                                
                                  <?php 
                                  
                                  $i = 0;
                                  
                                  while($i < 100){
                                  ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php $i++; 
                                  } ?>
                                <option selected value="<?php echo $activeUserAge; ?>"><?php echo $activeUserAge; ?></option>
                                </select>
                                <script>
                                  $(document).ready(function() {
                                      $("#test").find("option").eq(0).remove();
                                  });
                                </script>
                              </div>
                          </div>
                      </div>

                    <div class="col">
                    <div class="form-group">
                            <label for="exampleFormControlFile1">Gender</label>
                            <select class="custom-select" id="inputGroupSelect01" name="gender" required>
                              <?php 
                              if($activeUserGender == "Male"){
                              ?>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                              <?php }
                              elseif($activeUserGender == "Female"){
                              ?>
                                <option value="Male">Male</option>
                                <option value="Female" selected>Female</option>
                              <?php }
                              else{?>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              <?php } ?>
                            </select>
                              
                        </div>
                    </div>

                  </div>

                  <h4 class="font-weight-light">Account Details</h4>
                  <div class="row mb-2">
                   
                
                      <div class="col">
                        <label for="exampleFormControlFile1">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $activeUserName?>" required name="user_name">
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlFile1"  value="<?php echo $_SESSION["nurse-logged-in-password"];?>" name="password">
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">User Category</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $activeUserCategory?>" readonly>
                      </div>

                      
                  
                      
                  </div>

                  <h5 class="font-weight-light">Password <small class="text-muted">optional</small></h5>
                  <div class="row mb-2">

                      <div class="col">
                        <input type="hidden" name="correct_password" value="<?php echo $_SESSION["nurse-logged-in-password"]; ?>">
                        <label for="exampleFormControlFile1">Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="exampleFormControlFile1"   >
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="exampleFormControlFile1"   >
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="exampleFormControlFile1"   >
                      </div>

                  </div>
              </div>

                

               

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="edit_profile_nurse">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
        </div>
    </div>
    <!-- Edit Profile Modal -->

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