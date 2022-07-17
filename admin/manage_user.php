<?php 
require("../database/database-config.php");
require_once("../utilities.php");
AdminCheckSession();

$activeUser = $_SESSION["admin-logged-in-user"];
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
    <title>E-TUROK | MANAGE USER</title>
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

        <button class="dropdown-btn">
          <i class="fa fa-shield"></i>
          <span class="links_name">Immunization</span>
          <i class="fa fa-caret-down ml-4"></i>
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


        <!-- <li>
          <a href="#">
            <i class="fas fa-syringe"></i>
            <span class="links_name">Vaccine</span>
          </a>
        </li> -->

        <!-- <li>
          <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">Booklet</span>
          </a>
        </li> -->

        <!-- <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Immunization</span>
          </a>
        </li> -->

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
          <a href="manage_user.php" class="active">
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
        <span class="dashboard">Manage User</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details d-flex justify-content-end pr-5">
        <!-- <img src="images/profile.jpg" alt="">
        <span class="admin_name"><?php  ?></span>
        <i class='bx bx-chevron-down' ></i> -->
        <div class="dropdown">
          <?php 
          if(empty($activeUserImg)){
            $activeUserImg = "../user_profile_img/default_profile.jpg";
          }
          else{
            $activeUserImg = "../user_profile_img/". $activeUserImg;
          }
          ?>
          <img src="<?php echo $activeUserImg; ?>"  class="dropdown-toggle border border-info rounded-circle border-5" alt="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;" height="50" width="50">
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="profile.php">Profile</a>
            <form action="../crud.php" method="POST">
              <button type="submit" name="admin_log_out" class="dropdown-item" href="#" style="cursor: pointer; border:none; outline: nonel">Logout</button>
            </form>
          </div>
      </div>
      </div>
    </nav>

    <div class="main-content mx-2 px-2">
      <div class="container-fluid">
        <div class="row d-flex p-2 justify-content-start">
            <div class="col">
                <button type="button" class="btn btn-primary" data-target="#addUserModal" data-toggle="modal">Add User</button>
            </div>
            
        </div>
      </div>
      <div class="container-fluid mt-4 ">
      <table id="user_list" class="table table-striped table-bordered">  
        <thead class="text-center">  
            <tr>  
                <th>First Name</th>  
                <th>Middle Name</th> 
                <th>Last Name</th> 
                <th>DOB</th> 
                <th>Age</th> 
                <th>Gender</th> 
                <th>User Type</th>  
                <th>Action</th>   
            </tr>  
        </thead> 
        <tbody >
            <?php  
            $selectNurseUser = $sqlConn->query("SELECT * FROM users INNER JOIN user_category ON users.user_id = user_category.user_id WHERE user_type='Nurse/Midwife';");
            while($row = mysqli_fetch_array($selectNurseUser)):?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>   
                <td><?php echo $row['user_type']; ?></td>  
                <td class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-sm" data-target="#viewUserModal<?php echo $row['user_id']; ?>" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-primary btn-sm" data-target="#editUserModal<?php echo $row['user_id']; ?>" data-toggle="modal">
                    <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-danger btn-sm" data-target="#deleteUserModal<?php echo $row['user_id']; ?>" data-toggle="modal">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile;?>  
        </tbody> 
        
        </table>  
        <script>  
        $(document).ready(function(){  
            $('#user_list').DataTable();  
        });  
        </script>
      </div>
    </div>
  </section>

<!-- Modals -->

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-bold">Add User</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="../crud.php" enctype="multipart/form-data" method="POST">
                <div class="container-fluid ">
                  <h5 class="font-weight-bold">Personal Information</h5>

                  <div class="row">
                    <div class="col">
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Firstname</label>
                              <input type="text" class="form-control" id="exampleFormControlFile1" name="first_name" required>
                          </div>
                      </div> 
                      <div class="col">
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Middlename</label>
                              <input type="text" class="form-control" id="exampleFormControlFile1" name="middle_name" required>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Lastname</label>
                              <input type="text" class="form-control" id="exampleFormControlFile1" name="last_name" required>
                          </div>
                      </div>
                  </div>   
                  
                  <div class="row">
                    <div class="col">
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Date of Birth</label>
                              <input type="datetime-local" class="form-control" id="exampleFormControlFile1" name="dob" required>
                          </div>
                      </div> 
                      <div class="col">
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Age</label>
                              <div class="wrapper" style="width:200px;padding:20px;height:80px;">
                                <select name="age" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                  <?php 
                                  $i = 1;
                                  while($i < 100):
                                  ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php $i++; endwhile ?>
                                </select>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Gender</label>
                            <select class="custom-select" id="inputGroupSelect01" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                      </div>
                  </div>   

                </div>

                <div class="container-fluid p-2 mb-2">
                    <h5 class="font-weight-bold">Account Details</h5>
                    <div class="row">
                        <div class="col-sm-7 p-1 d-flex justify-content-around">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Profile Picture</label>

                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" required>
                            </div>
                        </div>
                        <div class="col-sm-5 p-1 d-flex justify-content-around">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">User Category</label>
                                <select class="custom-select" id="inputGroupSelect01" name="user_category" required>
                                    
                                    <option value="Nurse/Midwife">Nurse/Midwife</option>
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid px-2">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Username</label>
                                <input type="text" class="form-control" id="exampleFormControlFile1" name="user_name" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlFile1" name="password" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="exampleFormControlFile1" required>
                            </div>
                        </div>

                    </div>
                </div>

                

               
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="add_nurse_user">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            
        </div>
      </div>
    </div>

    <!-- Add User Modal -->

    
    <!-- View User Modal -->
    <?php  
    $selectNurseUser = $sqlConn->query("SELECT * FROM users INNER JOIN user_category ON users.user_id = user_category.user_id WHERE user_type='Nurse/Midwife';");
    while($row = mysqli_fetch_array($selectNurseUser)):?>
    <div class="modal fade" id="viewUserModal<?php echo $row['user_id']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-bold">View User</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <?php 
              $UserImg = $row['profile_img'];
              if(empty($UserImg)){
                $UserImg = "../user_profile_img/default_profile.jpg";
              }
              else{
                $UserImg = "../user_profile_img/". $UserImg;
              }
              ?>
              <div class="container-fluid text-center rounded-top bg-dark text-white p-2">
                  <div class="row ">
                    <div class="col">
                      <img src="<?php echo $UserImg; ?>" alt="" height="150px" width="150px" class="border border-primary rounded-circle border-5">
                    </div>
                  </div>

                  

                 

                  



              </div>

              <div class="container-fluid p-2 border">
              <h5 class="font-weight-bold">Personal Information</h5>
                <div class="row mb-2">

                      <div class="col">
                        <label for="exampleFormControlFile1">Fullname</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?>" readonly>
                      </div>

                      

                  </div>

                  <div class="row mb-2">

                
                    <div class="col">
                      <label for="exampleFormControlFile1">Date of Birth</label>
                      <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['dob']; ?>" readonly>
                    </div>

                    <div class="col">
                      <label for="exampleFormControlFile1">Age</label>
                      <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['age']; ?>" readonly>
                    </div>

                    <div class="col">
                      <label for="exampleFormControlFile1">Gender</label>
                      <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['gender']; ?>" readonly>
                    </div>

                  </div>

                  <h5 class="font-weight-bold">Account Details</h5>
                  <div class="row mb-2">
                   
                
                      <div class="col">
                        <label for="exampleFormControlFile1">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['user_name']?>" readonly>
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">User Category</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['user_type']?>" readonly>
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
    <!-- View User Modal -->

    <!-- Delete User Modal -->
    <?php  
    $selectNurseUser = $sqlConn->query("SELECT * FROM users INNER JOIN user_category ON users.user_id = user_category.user_id WHERE user_type='Nurse/Midwife';");
    while($row = mysqli_fetch_array($selectNurseUser)):?>
    <div class="modal fade" id="deleteUserModal<?php echo $row['user_id']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-bold">Delete User</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <div class="container-fluid">
                  <div class="row">
                    <div class="col d-flex justify-content-center">
                      <i class="fas fa-trash h1 border border-danger border-5 text-danger bg-light rounded-circle p-4"></i>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-center">
                      <h3>Are you sure you want to delete this record?</h3>
                    </div>
                  </div>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <form action="../crud.php" method="POST">
                <input type="hidden" name="delete_user_id" value="<?php echo $row['user_id']; ?>">
                <button type="submit" class="btn btn-danger" name="delete_nurse_user">Yes</button>
              </form>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- Delete User Modal -->

    <!-- Edit User Modal -->
    <?php  
    $selectNurseUser = $sqlConn->query("SELECT * FROM users INNER JOIN user_category ON users.user_id = user_category.user_id WHERE user_type='Nurse/Midwife';");
    while($row = mysqli_fetch_array($selectNurseUser)):?>
    <div class="modal fade" id="editUserModal<?php echo $row['user_id']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-bold">Edit User</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
          <form action="../crud.php" method="POST">
              <?php 
              $UserImg = $row['profile_img'];
              if(empty($UserImg)){
                $UserImg = "../user_profile_img/default_profile.jpg";
              }
              else{
                $UserImg = "../user_profile_img/". $UserImg;
              }
              ?>
              <div class="container-fluid text-center p-2 rounded-top bg-dark text-white">
                  <div class="row ">
                    <div class="col">
                      <img src="<?php echo $UserImg; ?>" alt="" height="150px" width="150px" class="border border-primary rounded-circle border-5">
                    </div>
                  </div>

              </div>

              <div class="container-fluid p-2">
              <h5 class="font-weight-bold">Personal Information</h5>
                <div class="row mb-2">

                      <div class="col">
                        <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
                        <label for="exampleFormControlFile1">Firstname</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['first_name']; ?>" required name="first_name">
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">Middlename</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['middle_name']; ?>" required name="middle_name">
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">Lastname</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['last_name']; ?>" required name="last_name">
                      </div>

                  </div>

                  <div class="row mb-2">

                
                    <div class="col">
                      <label for="exampleFormControlFile1">Date of Birth</label>
                      <input type="datetime-local" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['dob']; ?>" required name="dob">
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
                                <option selected disabled value="<?php echo $row['age']; ?>"><?php echo $row['age'] ?></option>
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
                              if($row['gender'] == "Male"){
                              ?>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                              <?php }
                              elseif($row['gender'] == "Female"){
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

                  <h5 class="font-weight-bold">Account Details</h5>
                  <div class="row mb-2">
                   
                
                      <div class="col">
                        <label for="exampleFormControlFile1">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['user_name']?>" readonly>
                      </div>

                      <div class="col">
                        <label for="exampleFormControlFile1">User Category</label>
                        <input type="text" class="form-control" id="exampleFormControlFile1"  value="<?php echo $row['user_type']?>" readonly>
                      </div>
                  
                      
                  </div>
              </div>

                

               

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="edit_nurse_user">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- Edit User Modal -->

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