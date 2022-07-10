<?php 
require("../database/database-config.php");
require_once("../utilities.php");
BHWCheckSession();
$activeUser = $_SESSION["bhw-logged-in-user"];
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
    <title>E-TUROK | MANAGE IMMUNIZATION</title>
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

        <!-- <li>
          <a href="vaccine.php" >
            <i class="fas fa-syringe"></i>
            <span class="links_name">Vaccine</span>
          </a>
        </li> -->

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
       <!-- <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
           
            <span class="links_name">Database Backup</span>
          </a>
        </li> -->
        <!-- <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Total order</span>
          </a>
        </li> -->
        <!-- <li>
          <a href="manage_user.php">
            <i class="fas fa-users"></i>
            <span class="links_name">Manage User</span>
          </a>
        </li> -->
        
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
        <span class="dashboard">Manage Immunization</span>
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
              <button type="submit" name="bhw_log_out" class="dropdown-item" href="#" style="cursor: pointer; border:none; outline: nonel">Logout</button>
            </form>
          </div>
      </div>
      </div>
    </nav>

    <div class="main-content mx-2 px-2">
      <div class="container-fluid">
        <div class="row d-flex p-2 justify-content-start">
            <div class="col">
                <button type="button" class="btn btn-primary" data-target="#addImmunizationModal" data-toggle="modal">Add Immunization</button>
            </div>
            
        </div>
      </div>
      <div class="container-fluid mt-4 ">
      <table id="immunization_list" class="table table-striped table-bordered">  
        <thead class="text-center">  
            <tr> 
                <th>Firstname</th> 
                <th>Middlename</th> 
                <th>Lastname</th> 
                <th>Vaccine Category</th> 
                <th>Vaccine</th>  
                <th>Dose(s)</th> 
                <th>Dose(s) Received</th> 
                <th>Remarks</th> 
                <th>Date Recorded</th>  
                <th>Action</th>   
            </tr>  
        </thead> 
        <tbody >
            <?php  
            $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id WHERE immunization.immunization_category_id= 3 ORDER BY date_recorded DESC;");
            while($row = mysqli_fetch_array($selectAllImmunization)):?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['immunization_category_name']; ?></td>
                <td><?php echo $row['vaccine']; ?></td>
                <td><?php echo $row['doses']; ?></td>
                <td><?php echo $row['doses_received']; ?></td>
                <td><?php echo $row['remarks']; ?></td>
                <td><?php echo $row['date_recorded']; ?></td>
                
                <td class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-sm" data-target="#viewImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-primary btn-sm" data-target="#editImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                    <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-info btn-sm" data-target="#archiveImmunizationModal<?php echo $row['immunization_id']; ?>" data-toggle="modal">
                      <i class="fas fa-inbox"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile;?>  
        </tbody> 
        
        </table>  
        <script>  
        $(document).ready(function(){  
            $('#immunization_list').DataTable();  
        });  
        </script>
      </div>
    </div>
  </section>

<!-- Modals -->

    <!-- Add Immunization Modal -->
    <div class="modal fade" id="addImmunizationModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">Add Immunization</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <!-- Modal body -->
            <div class="modal-body">
                <form action="../crud.php"  method="POST">
                  <div class="container-fluid my-2 mx-2">
                    <h4 class="font-weight-light">Patient Personal Information</h4>
                    <div class="row px-1">

                    <div class="col">
                        <div class="form-group">
                          <label>Firstname</label>
                          <input type="text" class="form-control" name="patient_first_name" required>
                        </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>Middlename</label>
                        <input type="text" class="form-control" name="patient_middle_name" required>
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="patient_last_name" required>
                      </div>
                    </div>

                        

                    </div>

                    <div class="row px-1">

                      <div class="col-md-9">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <?php  
                            $maxDate = date('Y-m-d');
                          ?>
                          <input type="date" class="form-control" name="dob" required max="<?php echo $maxDate; ?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                            <div class="form-group">
                            <label>Sex</label>
                            <select class="form-control" aria-label="Default select example" name="sex" required>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="row px-1">

                      <div class="col-md-8">
                        <div class="form-group">
                          <label>Place of Birth</label>
                          <input type="text" class="form-control" name="pob" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Age</label>
                              <div class="wrapper" style="width:200px;height:80px;">
                                <select name="age" class="form-control" >
                                
                                  <?php 
                                  $i = 12;
                                  while($i < 52):
                                  ?>
                                  <option value="<?php echo $i.' years old' ?>"><?php echo $i." years old" ?></option>
                                  <?php $i++; endwhile ?>
                                  
                                </select>
                              </div>
                          </div>
                      </div>

                    </div>

                    <div class="row px-1 mt-4">

                       <div class="col-md-9">
                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Contact No.</label>
                          <input type="number" class="form-control" name="contact_no" required>
                        </div>
                      </div>

                    </div>

                    <div class="row px-1">

                       <div class="col-md-6">
                        <div class="form-group">
                          <label>Father's Name</label>
                          <input type="text" class="form-control" name="f_full_name" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mother's Name</label>
                          <input type="text" class="form-control" name="m_full_name" required>
                        </div>
                      </div>

                    </div>

                    <div class="row px-1">

                       <div class="col-md-6">
                        <div class="form-group d-flex align-items-center justify-content-center">
                          <label>Height</label>
                          <input type="text" class="form-control mr-2 ml-2" name="height" required>
                          <label>cm</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group d-flex align-items-center justify-content-center">
                          <label>Weight</label>
                          <input type="number" class="form-control mr-2 ml-2" name="weight" required>
                          <label>kg</label>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="container-fluid my-2 mx-2">
                    <h4 class="font-weight-light">Immunization Details</h4>
                    <div class="row px-1">

                    <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Vaccine Category</label>
                            <?php
                              $query = "SELECT * FROM vaccine_category WHERE vaccine_category_id=3 Order by vaccine_category_id";
                              $result = $sqlConn->query($query);
                            ?>
                              <script type="text/javascript">
                                function FetchVaccine(id){
                                  $('#vaccine_name').html('');
                                  $.ajax({
                                    type:'post',
                                    url: 'ajaxdata.php',
                                    data : { vaccine_category_id : id},
                                    success : function(data){
                                      $('#vaccine_name').html(data);
                                    }

                                  })
                                }

                                </script>
                            <select name="immunization_category_id" id="immunization_category_name" class="form-control" onchange="FetchVaccine(this.value)" required>
                              <option selected="true" disabled="disabled">Select Vaccine Category</option>
                              <?php
                                if ($result->num_rows > 0 ) {
                                  while ($row = $result->fetch_assoc()) {
                                    echo '<option value='.$row['vaccine_category_id'].'>'.$row['vaccine_category_name'].'</option>';
                                  }
                                }
                              ?> 
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                              <label>Vaccine Name</label>
                              <select name="vaccine_id" id="vaccine_name" class="form-control" readonly  required>
                                
                              </select>
                        </div>

                    </div>

                    <div class="row px-1">
                      <div class="col">
                        <label>Remarks</label>
                        <textarea name="remarks" class="form-control" style="resize: none;"  rows="5"></textarea>
                      </div>
                    </div>
                  </div> 

                

               
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="add_immunization_bhw">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            
        </div>
      </div>
    </div>

    <!-- Add Immunization Modal -->

    
    <!-- View Immunization Modal -->
    <?php 
    $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id ORDER BY date_recorded DESC;");
    while($row = mysqli_fetch_array($selectAllImmunization)):?>
    <div class="modal fade" id="viewImmunizationModal<?php echo $row['immunization_id']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">View Vaccine</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="../crud.php"  method="POST">
                  <div class="container-fluid my-2 mx-2">
                    <h4 class="font-weight-light">Patient Personal Information</h4>
                    <div class="row px-1">

                    <div class="col-md">
                        <div class="form-group">
                          <label>Firstname</label>
                          <input type="text" class="form-control" value="<?php echo $row['first_name']; ?>" name="patient_first_name" readonly>
                        </div>
                      </div>

                      <div class="col-md">
                        <div class="form-group">
                          <label>Middlename</label>
                          <input type="text" class="form-control" value="<?php echo $row['middle_name']; ?>" name="patient_middle_name" readonly>
                        </div>
                      </div>

                      <div class="col-md">
                        <div class="form-group">
                          <label>Lastame</label>
                          <input type="text" class="form-control" value="<?php echo $row['last_name']; ?>" name="patient_last_name" readonly>
                        </div>
                      </div>

                        

                    </div>

                    <div class="row px-1">


                      <div class="col-md-8">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <?php  
                            $maxDate = date('Y-m-d');
                          ?>
                          <input type="date" class="form-control" name="dob" readonly max="<?php echo $maxDate; ?>" value="<?php echo $row['dob']; ?>">
                        </div>
                      </div>

                      <div class="col-md-4">
                            <div class="form-group">
                            <label>Sex</label>
                            <input type="text" class="form-control" name="sex" readonly value="<?php echo $row['sex']; ?>">  
                            </div>
                      </div>

                      


                    </div>
                    <div class="row px-1">

                      
                      <div class="col-md-8">
                          <div class="form-group">
                            <label>Place of Birth</label>
                            <input type="text" class="form-control" name="pob" readonly value="<?php echo $row['pob']; ?>">
                          </div>
                      </div>
                      <div class="col-md-4">
                            <label>Age</label>
                            <input type="text" class="form-control" name="pob" readonly value="<?php echo $row['age']; ?>">
                      </div>

                      
                    </div>

                    <div class="row px-1">

                       <div class="col-md-9">
                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address" readonly value="<?php echo $row['address']; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Contact No.</label>
                          <input type="number" class="form-control" name="contact_no" readonly value="<?php echo $row['contact_no']; ?>">
                        </div>
                      </div>

                    </div>

                    <div class="row px-1">

                       <div class="col-md-6">
                        <div class="form-group">
                          <label>Father's Name</label>
                          <input type="text" class="form-control" name="f_full_name" readonly value="<?php echo $row['f_full_name']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mother's Name</label>
                          <input type="text" class="form-control" name="m_full_name" readonly value="<?php echo $row['m_full_name']; ?>">
                        </div>
                      </div>

                    </div>

                    <div class="row px-1">

                       <div class="col-md-6">
                        <div class="form-group d-flex align-items-center justify-content-center">
                          <label>Height</label>
                          <input type="text" class="form-control mr-2 ml-2" name="height" readonly value="<?php echo $row['height']; ?>">
                          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group d-flex align-items-center justify-content-center">
                          <label>Weight</label>
                          <input type="text" class="form-control mr-2 ml-2" name="weight" readonly value="<?php echo $row['weight']; ?>">
                          
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="container-fluid my-2 mx-2">
                    <h4 class="font-weight-light">Immunization Details</h4>
                    <div class="row px-1">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Vaccine Category</label>
                            
                            <input type="text" name="immunization_category_id"  class="form-control" readonly value="<?php echo $row['immunization_category_name']; ?>">
                              
                          </div>
                        </div>

                        <div class="col-md-6">
                              <label>Vaccine Name</label>
                              <input type="text" name="vaccine_id" id="vaccine_name"  class="form-control" readonly value="<?php echo $row['vaccine']; ?>">
                              
                        </div>

                    </div>
                    <div class="row">
                      <div class="col">
                        <label>Doses</label>
                        <input type="number" value="<?php echo $row['doses'] ?>" class="form-control" readonly>
                      </div>
                      <div class="col">
                        <label>Doses Received</label>
                        <input type="number" value="<?php echo $row['doses_received'] ?>" class="form-control" readonly>
                      </div>
                    </div>

                    <div class="row px-1">
                      <div class="col">
                        <label>Remarks</label>
                        <textarea name="remarks" class="form-control" style="resize: none;"  rows="5" readonly><?php echo $row['remarks']; ?></textarea>
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
    <!-- View Vaccine Modal -->

    <!-- Delete Immunization Modal -->
    <?php 
    $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id;");
    while($row = mysqli_fetch_array($selectAllImmunization)):?>
    <div class="modal fade" id="archiveImmunizationModal<?php echo $row['immunization_id']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">Archive Immunization</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <div class="container-fluid">
                  <div class="row">
                    <div class="col d-flex justify-content-center">
                      <i class="fas fa-inbox h1 border border-info border-5 text-info bg-light rounded-circle p-4"></i>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-center">
                      <h3>Are you sure you want to archive this Record?</h3>
                    </div>
                  </div>
              </div>
              <form action="../crud.php" method="POST">

              
                          <input type="hidden" class="form-control" name="patient_first_name" value="<?php echo $row['first_name'] ?>" required>
                        

                    
                        <input type="hidden" class="form-control" name="patient_middle_name" required value="<?php echo $row['middle_name'] ?>">
                      

                   
                        <input type="hidden" class="form-control" name="patient_last_name" required value="<?php echo $row['last_name'] ?>">
                      

                        

                    
                          <input type="hidden" class="form-control" name="pob" required value="<?php echo $row['pob'] ?>">
                       

                      
                            <input type="hidden" class="form-control" name="sex" required value="<?php echo $row['sex'] ?>">
                           

                    
                        
                        <input type="hidden" class="form-control" name="dob" required value="<?php echo $row['dob'] ?>">
                      
                              <input type="hidden" class="form-control" name="age" required value="<?php echo $row['age'] ?>">
                              
                     
                          <input type="hidden" class="form-control" name="address" required value="<?php echo $row['address'] ?>">
                        
                          <input type="hidden" class="form-control" name="contact_no" required value="<?php echo $row['contact_no'] ?>">
                        
                    
                          <input type="hidden" class="form-control" name="f_full_name" required value="<?php echo $row['f_full_name'] ?>">
                        
                          <input type="hidden" class="form-control" name="m_full_name" required value="<?php echo $row['m_full_name'] ?>">
                        
                          
                          <input type="hidden" class="form-control mr-2 ml-2" name="height" required value="<?php echo $row['height'] ?>">
                          
                          <input type="hidden" class="form-control mr-2 ml-2" name="weight" required value="<?php echo $row['weight'] ?>">
                          
                  
                            <input type="hidden" name="immunization_category_id" value="<?php echo $row['vaccine_category_id'] ?>">
                          
                              <input type="hidden" name="vaccine_id" value="<?php echo $row['vaccine_id'] ?>">

                              <input type="hidden" name="vaccine" value="<?php echo $row['vaccine'] ?>">
                       
                        <input type="hidden" name="doses" value="<?php echo $row['doses'] ?>" class="form-control" readonly>
                      
                        <input type="hidden" name="doses_received" value="<?php echo $row['doses_received'] ?>" class="form-control" readonly>
                        

                      
                        <input type="hidden"name="remarks" class="form-control" value="<?php echo $row['remarks']; ?>">

                        <input type="hidden" name="date_recorded" class="form-control" value="<?php echo $row['date_recorded']; ?>">
                      

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              
                <input type="hidden" name="archive_immunization_id" value="<?php echo $row['immunization_id']; ?>">



                <button type="submit" class="btn btn-info" name="archive_immunization_bhw">Yes</button>
              </form>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- Delete Immnization Modal -->


    <!-- Edit Immunization Modal -->
    <?php 
    $selectAllImmunization = $sqlConn->query("SELECT * FROM immunization INNER JOIN immunization_category ON immunization.immunization_category_id = immunization_category.immunization_category_id ORDER BY date_recorded DESC;");
    while($row = mysqli_fetch_array($selectAllImmunization)):?> 
    <div class="modal fade" id="editImmunizationModal<?php echo $row['immunization_id']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">Edit Vaccine</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="../crud.php"  method="POST">
                  <input type="hidden" name="immunization_id" value="<?php echo $row['immunization_id']; ?>">
                  <input type="hidden" name="immunization_category_id" value="<?php echo $row['immunization_category_id']; ?>">
                  <div class="container-fluid my-2 mx-2">
                    <h4 class="font-weight-light">Patient Personal Information</h4>
                    <div class="row px-1">

                    <div class="col">
                        <div class="form-group">
                          <label>Firstname</label>
                          <input type="text" class="form-control" name="patient_first_name" value="<?php echo $row['first_name'] ?>" required>
                        </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>Middlename</label>
                        <input type="text" class="form-control" name="patient_middle_name" required value="<?php echo $row['middle_name'] ?>">
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="patient_last_name" required value="<?php echo $row['last_name'] ?>">
                      </div>
                    </div>

                        

                    </div>

                    <div class="row px-1">

                       <div class="col-md-8">
                        <div class="form-group">
                          <label>Place of Birth</label>
                          <input type="text" class="form-control" name="pob" required value="<?php echo $row['pob'] ?>">
                        </div>
                      </div>

                      <div class="col-md-4">
                            <div class="form-group">
                            <label>Sex</label>
                            <select class="form-control" aria-label="Default select example" name="sex" required>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                        </div>

                    </div>

                 <div class="row px-1">

                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <?php  
                          $maxDate = date('Y-m-d');
                        ?>
                        <input type="date" class="form-control" name="dob" required max="<?php echo $maxDate; ?>" value="<?php echo $row['dob'] ?>">
                      </div>
                    </div>

                    <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Age</label>
                              <div class="wrapper" style="width:200px;height:80px;" id="test">
                                <select name="age" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                                <option selected  value="<?php echo $row['age']; ?>"><?php echo $row['age'] ?></option> 
                                
                                <?php 
                                  $i = 1;
                                  while($i < 52):
                                  ?>
                                  <option value="<?php echo $i.' years old' ?>"><?php echo $i." years old" ?></option>
                                  <?php $i++; endwhile ?>
                                 
                                
                                </select>
                                <script>
                                  $(document).ready(function() {
                                      $("#test").find("option").eq(0).remove();
                                  });
                                </script>
                              </div>
                          </div>
                      </div>

                 </div>
                    <div class="row px-1 mt-4">

                       <div class="col-md-9">
                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address" required value="<?php echo $row['address'] ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Contact No.</label>
                          <input type="number" class="form-control" name="contact_no" required value="<?php echo $row['contact_no'] ?>">
                        </div>
                      </div>

                    </div>

                    <div class="row px-1">

                       <div class="col-md-6">
                        <div class="form-group">
                          <label>Father's Name</label>
                          <input type="text" class="form-control" name="f_full_name" required value="<?php echo $row['f_full_name'] ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mother's Name</label>
                          <input type="text" class="form-control" name="m_full_name" required value="<?php echo $row['m_full_name'] ?>">
                        </div>
                      </div>

                    </div>

                    <div class="row px-1">

                       <div class="col-md-6">
                        <div class="form-group d-flex align-items-center justify-content-center">
                          <label>Height</label>
                          <?php  
                          $heightArray = explode(" ", $row['height']);
                          $actualHeight = reset($heightArray); 
                          ?>
                          <input type="text" class="form-control mr-2 ml-2" name="height" required value="<?php echo  $actualHeight; ?>">
                          <label>cm</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group d-flex align-items-center justify-content-center">
                        <?php  
                          $weightArray = explode(" ", $row['weight']);
                          $actualWeight = intval(reset($weightArray)); 
                          ?>
                          <label>Weight</label>
                          <input type="number" class="form-control mr-2 ml-2" name="weight" required value="<?php echo $actualWeight; ?>">
                          <label>cm</label>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="container-fluid my-2 mx-2">
                    <h4 class="font-weight-light">Immunization Details</h4>
                    <div class="row px-1">

                    <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Vaccine Category</label>
                            <?php
                              $immunization_category_id = $row['immunization_category_id'];
                              $query = "SELECT * FROM immunization_category WHERE immunization_category_id='$immunization_category_id' Order by immunization_category_id LIMIT 1;";
                              $result = $sqlConn->query($query);
                              $row2 = $result->fetch_assoc();
                            ?>
                              

                                </script>
                            <select name="immunization_category_id" id="immunization_category_name" class="form-control"  readonly>
                              <option selected><?php echo $row2['immunization_category_name'] ?></option>
                              
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                              <label>Vaccine Name</label>
                              <select name="vaccine_id" id="vaccine_name2" class="form-control" readonly  required>
                                <option selected><?php echo $row['vaccine'] ?></option>
                              </select>
                        </div>

                    </div>

                    <div class="row">
                      <div class="col">
                        <label>Doses</label>
                        <input type="number" value="<?php echo $row['doses'] ?>" class="form-control" readonly>
                      </div>
                      <div class="col">
                        <label>Doses Received</label>
                        <select name="doses_received" class="form-control" id="test2">
                        
                          <?php
                          if($row['doses'] == 1):?>
                            <option value="1">1</option>
                          <?php 
                          elseif($row['doses'] == 2):?>
                            <option value="2">2</option>
                          <?php elseif($row['doses'] == 3):
                            if($row['doses_received'] == 2):?>
                              <option selected value="2">2</option>
                              <option value="3">3</option>
                              <?php else:?>
                                <option value="2">2</option>
                                <option selected value="3">3</option>
                          <?php endif; endif; ?>
                          
                        </select>
                        

                      </div>
                    </div>

                    <div class="row px-1">
                      <div class="col">
                        <label>Remarks</label>
                        <textarea name="remarks" class="form-control" style="resize: none;"  rows="5"><?php echo $row['remarks']; ?></textarea>
                      </div>
                    </div>
                  </div> 

                

               
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="edit_immunization_bhw">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <!-- Edit Immunization Modal -->
    

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

