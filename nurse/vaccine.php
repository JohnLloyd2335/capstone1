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
    <title>E-TUROK | MANAGE VACCINE</title>
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
          <a href="vaccine.php" class="active">
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
        <span class="dashboard">Manage Vaccine</span>
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
      <div class="container-fluid">
        <div class="row d-flex p-2 justify-content-start">
            <div class="col">
                <button type="button" class="btn btn-primary" data-target="#addVaccineModal" data-toggle="modal">Add Vaccine</button>
            </div>
            
        </div>
      </div>
      <div class="container-fluid mt-4 ">
      <table id="vaccine_list" class="table table-striped table-bordered">  
        <thead class="text-center">  
            <tr> 
                <th>Vaccine Name</th> 
                <th>Vaccine Category</th>   
                <th>Dose(s)</th> 
                <th>Manufactured Date</th> 
                <th>Expiration Date</th> 
                <th>Description</th>  
                <th>Action</th>   
            </tr>  
        </thead> 
        <tbody >
            <?php  
            $selectAllVaccine = $sqlConn->query("SELECT * FROM vaccine INNER JOIN vaccine_category ON vaccine.vaccine_category_id = vaccine_category.vaccine_category_id;");
            while($row = mysqli_fetch_array($selectAllVaccine )):?>
            <tr>
                <td><?php echo $row['vaccine_name']; ?></td>
                <td><?php echo $row['vaccine_category_name']; ?></td>
                <td><?php echo $row['doses']; ?></td>
                <td><?php echo $row['manufactured_date']; ?></td>
                <td><?php echo $row['expiration_date']; ?></td>
                <td><?php echo $row['description']; ?></td>
                
                <td class="d-flex" style="gap: 10px;">
                    <button class="btn btn-success btn-sm" data-target="#viewVaccineModal<?php echo $row['vaccine_id']; ?>" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-primary btn-sm" data-target="#editVaccineModal<?php echo $row['vaccine_id']; ?>" data-toggle="modal">
                    <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-danger btn-sm" data-target="#deleteVaccineModal<?php echo $row['vaccine_id']; ?>" data-toggle="modal">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile;?>  
        </tbody> 
        
        </table>  
        <script>  
        $(document).ready(function(){  
            $('#vaccine_list').DataTable();  
        });  
        </script>
      </div>
    </div>
  </section>

<!-- Modals -->

    <!-- Add Vaccine Modal -->
    <div class="modal fade" id="addVaccineModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">Add Vaccine</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="../crud.php"  method="POST">
                  <div class="container-fluid my-2 mx-2">
                    <div class="row">

                    <div class="col-md-5">
                        <div class="form-group">
                          <label>Vaccine Category</label>
                          <select class="form-control" aria-label="Default select example" name="vaccine_category_name">
                            <option value="Infant">Infant</option>
                            <option value="School Aged Children">School Aged Children</option>
                            <option value="Pregnant">Pregnant</option>
                            <option value="Adult">Adult</option>
                            <option value="Senior Citizen">Senior Citizen</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Vaccine Name</label>
                          <input type="text" class="form-control" name="vaccine_name" required>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Doses</label>
                          <input type="number" class="form-control" name="doses" required>
                        </div>
                      </div>
                      



                    </div>

                    <div class="row mt-2">

                      <div class="col">
                        <div class="form-group">
                          <label>Manufactured Date</label>
                          <?php  
                            $maxDate = date('Y-m-d');
                          ?>
                          <input type="date" class="form-control" name="manufactured_date" required max="<?php echo $maxDate; ?>">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label>Expiration Date</label>
                          <?php  
                            $minDate = date('Y-m-d');
                          ?>
                          <input type="date" class="form-control" name="expiration_date" required min="<?php echo $minDate; ?>">
                        </div>
                      </div>


                    </div>

                    <div class="row mt-2">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" style="resize: none;"></textarea>
                        </div>
                      </div>
                    </div>

                  </div>

                

               
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="add_vaccine">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            
        </div>
      </div>
    </div>

    <!-- Add Vaccine Modal -->

    
    <!-- View Vaccine Modal -->
    <?php 
    $selectAllVaccine = $sqlConn->query("SELECT * FROM vaccine INNER JOIN vaccine_category ON vaccine.vaccine_category_id = vaccine_category.vaccine_category_id;");
    while($row = mysqli_fetch_array($selectAllVaccine )):?>
    <div class="modal fade" id="viewVaccineModal<?php echo $row['vaccine_id']; ?>">
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
                    <div class="row">

                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Vaccine Category</label>
                          <input type="text" class="form-control" name="vaccine_category_name" readonly value="<?php echo $row['vaccine_category_name']; ?>">
                        </div>
                      </div>

                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Vaccine Name</label>
                          <input type="text" class="form-control" name="vaccine_name" readonly value="<?php echo $row['vaccine_name']; ?>">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Dose(s)</label>
                          <input type="text" class="form-control" name="doses" readonly value="<?php echo $row['doses']; ?>">
                        </div>
                      </div>


                      


                    </div>

                    <div class="row mt-2">

                      <div class="col">
                        <div class="form-group">
                          <label>Manufactured Date</label>
                          <?php  
                            $maxDate = date('Y-m-d');
                          ?>
                          <input type="date" class="form-control" name="manufactured_date" readonly max="<?php echo $maxDate; ?>" value="<?php echo $row['manufactured_date']; ?>">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label>Expiration Date</label>
                          <?php  
                            $minDate = date('Y-m-d');
                          ?>
                          <input type="date" class="form-control" name="expiration_date" readonly min="<?php echo $minDate; ?>" value="<?php echo $row['expiration_date']; ?>">
                        </div>
                      </div>


                    </div>

                    <div class="row mt-2">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" style="resize: none;" readonly><?php echo $row['description']; ?></textarea>
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
    <!-- View Vaccine Modal -->

    <!-- Delete Vaccine Modal -->
    <?php 
    $selectAllVaccine = $sqlConn->query("SELECT * FROM vaccine INNER JOIN vaccine_category ON vaccine.vaccine_category_id = vaccine_category.vaccine_category_id;");
    while($row = mysqli_fetch_array($selectAllVaccine )):?>
    <div class="modal fade" id="deleteVaccineModal<?php echo $row['vaccine_id']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
              <h3 class="modal-title font-weight-light">Delete User</h3>
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
                <input type="hidden" name="delete_vaccine_id" value="<?php echo $row['vaccine_id']; ?>">
                <button type="submit" class="btn btn-danger" name="delete_vaccine">Yes</button>
              </form>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- Delete User Modal -->

    <!-- Edit Vaccine Modal -->
    <?php 
    $selectAllVaccine = $sqlConn->query("SELECT * FROM vaccine INNER JOIN vaccine_category ON vaccine.vaccine_category_id = vaccine_category.vaccine_category_id;");
    while($row = mysqli_fetch_array($selectAllVaccine )):?>
    <div class="modal fade" id="editVaccineModal<?php echo $row['vaccine_id']; ?>">
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
                <div class="container-fluid my-2 mx-2">
                    <div class="row">
                      <input type="hidden" name="vaccine_id" value="<?php echo $row['vaccine_id']; ?>">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Vaccine Category</label>
                          <input type="text" class="form-control" name="vaccine_category_name" readonly value="<?php echo $row['vaccine_category_name']; ?>">
                        </div>
                      </div>

                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Vaccine Name</label>
                          <input type="text" class="form-control" name="vaccine_name" required value="<?php echo $row['vaccine_name']; ?>">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Dose(s)</label>
                          <input type="text" class="form-control" name="doses" required value="<?php echo $row['doses']; ?>">
                        </div>
                      </div>


                      


                    </div>

                    <div class="row mt-2">

                      <div class="col">
                        <div class="form-group">
                          <label>Manufactured Date</label>
                          <?php  
                            $maxDate = date('Y-m-d');
                          ?>
                          <input type="date" class="form-control" name="manufactured_date" required max="<?php echo $maxDate; ?>" value="<?php echo $row['manufactured_date']; ?>">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label>Expiration Date</label>
                          <?php  
                            $minDate = date('Y-m-d');
                          ?>
                          <input type="date" class="form-control" name="expiration_date" required min="<?php echo $minDate; ?>" value="<?php echo $row['expiration_date']; ?>">
                        </div>
                      </div>


                    </div>

                    <div class="row mt-2">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" style="resize: none;" required><?php echo $row['description']; ?></textarea>
                        </div>
                      </div>
                    </div>

                  </div>

                

               
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="edit_vaccine">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <!-- Edit Vaccine Modal -->

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
