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

$date = date('Y-m-d');

$selectAllVaccine = $sqlConn->query("SELECT * FROM vaccine");
$vaccineRows = $selectAllVaccine->num_rows;

$selectAllImmunization = $sqlConn->query("SELECT * FROM immunization");
$immunizationRows = $selectAllImmunization->num_rows;

$selectAllIUsers = $sqlConn->query("SELECT * FROM users");
$UsersRows = $selectAllIUsers->num_rows;

$select1DosesCompleted = $sqlConn->query("SELECT * FROM immunization WHERE doses=1 AND doses_received=1");
$Doses1Completed = $select1DosesCompleted->num_rows;

$select2DosesCompleted = $sqlConn->query("SELECT * FROM immunization WHERE doses=2 AND doses_received=2");
$Doses2Completed = $select2DosesCompleted->num_rows;

$select3DosesCompleted = $sqlConn->query("SELECT * FROM immunization WHERE doses=3 AND doses_received=3");
$Doses3Completed = $select3DosesCompleted->num_rows;

$dosesCompleted = $Doses1Completed  + $Doses2Completed + $Doses3Completed;



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
    <title>E-TUROK | DASHBOARD</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons CDN Link -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/89863904a8.js" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    
    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Google Chart -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar d-flex flex-column">
    <div class="logo-details d-flex flex-column py-4 mb-5">
      <img src="../images/pila_logo.png" alt="" height="80" width="80">
      <span class="logo_name mt-3">E - TUROK MO</span>
    </div>
      <ul class="nav-links py-5 sidenav">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>

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
        <span class="dashboard">Dashboard</span>
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
          <img src="<?php echo $activeUserImg; ?>"  class="dropdown-toggle border border-info rounded-circle border-5 " alt="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="profile.php">Profile</a>
          <form action="../crud.php" method="POST">
            <button type="submit" name="admin_log_out" class="dropdown-item" href="#" style="cursor: pointer; border:none; outline: none;">Logout</button>
          </form>
        </div>
      </div>
      </div>
    </nav>

    <div class="main-content">
      <div class="overview-boxes py-2">
        <div class="box bg-info text-light">
          <div class="right-side">
            <div class="box-topic">Vaccine</div>
            <div class="number"><?php echo $vaccineRows; ?></div>
            <div class="indicator">
              <span class="text"><?php echo "As of ". $date; ?></span>
            </div>
          </div>
          <i class="fas fa-syringe cart ml-4"></i>
        </div>
        <div class="box bg-success text-light ">
          <div class="right-side">
            <div class="box-topic">Immunization</div>
            <div class="number"><?php echo $immunizationRows; ?></div>
            <div class="indicator">

              <span class="text"><?php echo "As of ". $date; ?></span>
            </div>
          </div>
          <i class="fa fa-shield cart ml-4"></i>
        </div>
        <div class="box bg-dark text-light ">
          <div class="right-side">
            <div class="box-topic">Users</div>
            <div class="number"><?php echo $UsersRows; ?></div>
            <div class="indicator">
              
              <span class="text"><?php echo "As of ". $date; ?></span>
            </div>
          </div>
          <i class="fas fa-users cart ml-4"></i>
        </div>
        <div class="box bg-secondary text-light ">
          <div class="right-side">
            <div class="box-topic">Doses Completed</div>
            <div class="number"><?php echo strval($dosesCompleted); ?></div>
            <div class="indicator">
             
              <span class="text"><?php echo "As of ". $date; ?></span>
            </div>
          </div>
          <i class="fas fa-clipboard-check cart ml-4"></i>
        </div>
      </div>

      <div class="container-fluid p-2 d-flex flex-wrap  h-100 w-100 align-items-center justify-content-center">
            <div class="row h-100 w-100">
              <div class="col-md-12 h-100 w-100">
                <span id="monthlyImmunization" style="width: 100%; height: 100%; display:flex; align-items: center; justify-content: center;">

                </span>
              </div>
            </div>
      </div>

      <div class="container-fluid p-2 d-flex flex-wrap  h-100 w-100 align-items-center justify-content-center">
          <div class="row h-100 w-100 ">
            <div class="col  w-100 h-100 ">
                <span id="immunizationCategory" style="width: 100%; height: 100%; display:flex; align-items: center; justify-content: center;"></span>
            </div>
            <div class="col w-100 h-100 ">
              <span id="vaccineCategory" style="width: 100%; height: 100%; display:flex; align-items: center; justify-content: center;"></span>
            </div>
          </div>
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
<!-- Graphs and Charts -->
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

<?php 
$selectInfantImmunization = $sqlConn->query("SELECT * FROM immunization WHERE immunization_category_id=1");
$infantImmunizationRows = $selectInfantImmunization->num_rows;

$selectSchoolAgedImmunization = $sqlConn->query("SELECT * FROM immunization WHERE immunization_category_id='2'");
$schoolAgedImmunizationRows = $selectSchoolAgedImmunization->num_rows;

$selectPregnantImmunization = $sqlConn->query("SELECT * FROM immunization WHERE immunization_category_id=3");
$pregnantImmunizationRows = $selectPregnantImmunization->num_rows;

$selectAdultImmunization = $sqlConn->query("SELECT * FROM immunization WHERE immunization_category_id=4");
$adultImmunizationRows = $selectAdultImmunization->num_rows;

$selectSeniorImmunization = $sqlConn->query("SELECT * FROM immunization WHERE immunization_category_id=5");
$seniorImmunizationRows = $selectSeniorImmunization->num_rows;


?>

function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Immunization Category', 'Recorded Rows'],
    ['Infant',     <?php echo $infantImmunizationRows ?>],
    ['School Aged Children',<?php echo $schoolAgedImmunizationRows ?>],
    ['Pregnant',  <?php echo $pregnantImmunizationRows ?>],
    ['Adult', <?php echo $adultImmunizationRows ?>],
    ['Senior Citizen',    <?php echo $seniorImmunizationRows ?>]
  ]);

  var options = {'title':'Immunization Category',
                      'is3D':true,
                     'width':500,
                     'height':400};

  var chart = new google.visualization.PieChart(document.getElementById('immunizationCategory'));

  chart.draw(data, options);
}
</script>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

<?php 
$selectInfantVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_category_id=1");
$infantVaccineRows = $selectInfantVaccine->num_rows;

$selectSchoolAgedVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_category_id=2");
$schoolAgedVaccineRows = $selectSchoolAgedVaccine->num_rows;

$selectPregnantVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_category_id=3");
$pregnantVaccineRows = $selectPregnantVaccine->num_rows;

$selectAdultVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_category_id=4");
$adultVaccineRows = $selectAdultVaccine->num_rows;

$selectSeniorVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_category_id=5");
$seniorVaccineRows = $selectSeniorVaccine->num_rows;


?>

function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Vaccine Category', 'Recorded Rows'],
    ['Infant',     <?php echo $infantVaccineRows ?>],
    ['School Aged Children',<?php echo $schoolAgedVaccineRows ?>],
    ['Pregnant',  <?php echo $pregnantVaccineRows ?>],
    ['Adult', <?php echo $adultVaccineRows ?>],
    ['Senior Citizen',    <?php echo $seniorVaccineRows ?>]
  ]);

  var options = {
    title: 'Vaccine Category',
                     'width':500,
                     'is3D':true,
                     'height':400
  };

  var chart = new google.visualization.PieChart(document.getElementById('vaccineCategory'));

  chart.draw(data, options);
}
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Infant', 'School Aged Children', 'Pregnant','Adult','Senior Citizen'],
          ['January 2022', <?php echo $InfantJan2022Rows; ?>, <?php echo $SchoolAgedChildrenJan2022Rows; ?>, <?php echo $PregnantJan2022Rows; ?>, <?php echo $AdultJan2022Rows; ?>, <?php echo $SeniorJan2022Rows; ?>],
          ['February 2022', <?php echo $InfantFeb2022Rows; ?>, <?php echo $SchoolAgedChildrenFeb2022Rows; ?>, <?php echo $PregnantFeb2022Rows; ?>, <?php echo $AdultFeb2022Rows; ?>, <?php echo $SeniorFeb2022Rows; ?>],
          ['March 2022', <?php echo $InfantMar2022Rows; ?>, <?php echo $SchoolAgedChildrenMar2022Rows; ?>, <?php echo $PregnantMar2022Rows; ?>, <?php echo $AdultMar2022Rows; ?>, <?php echo $SeniorMar2022Rows; ?>],
          ['April 2022', <?php echo $InfantApr2022Rows; ?>, <?php echo $SchoolAgedChildrenApr2022Rows; ?>, <?php echo $PregnantApr2022Rows; ?>, <?php echo $AdultApr2022Rows; ?>, <?php echo $SeniorApr2022Rows; ?>],
          ['May 2022', <?php echo $InfantMay2022Rows; ?>, <?php echo $SchoolAgedChildrenMay2022Rows; ?>, <?php echo $PregnantMay2022Rows; ?>, <?php echo $AdultMay2022Rows; ?>, <?php echo $SeniorMay2022Rows; ?>],
          ['June 2022', <?php echo $InfantJun2022Rows; ?>, <?php echo $SchoolAgedChildrenJun2022Rows; ?>, <?php echo $PregnantJun2022Rows; ?>, <?php echo $AdultJun2022Rows; ?>, <?php echo $SeniorJun2022Rows; ?>],
          ['July 2022', <?php echo $InfantJul2022Rows; ?>, <?php echo $SchoolAgedChildrenJul2022Rows; ?>, <?php echo $PregnantJul2022Rows; ?>, <?php echo $AdultJul2022Rows; ?>, <?php echo $SeniorJul2022Rows; ?>],
          ['August 2022', <?php echo $InfantAug2022Rows; ?>, <?php echo $SchoolAgedChildrenAug2022Rows; ?>, <?php echo $PregnantAug2022Rows; ?>, <?php echo $AdultAug2022Rows; ?>, <?php echo $SeniorAug2022Rows; ?>],
          ['Septemeber 2022', <?php echo $InfantSep2022Rows; ?>, <?php echo $SchoolAgedChildrenSep2022Rows; ?>, <?php echo $PregnantSep2022Rows; ?>, <?php echo $AdultSep2022Rows; ?>, <?php echo $SeniorSep2022Rows; ?>],
          ['October 2022', <?php echo $InfantOct2022Rows; ?>, <?php echo $SchoolAgedChildrenOct2022Rows; ?>, <?php echo $PregnantOct2022Rows; ?>, <?php echo $AdultOct2022Rows; ?>, <?php echo $SeniorOct2022Rows; ?>],
          ['November 2022', <?php echo $InfantNov2022Rows; ?>, <?php echo $SchoolAgedChildrenNov2022Rows; ?>, <?php echo $PregnantNov2022Rows; ?>, <?php echo $AdultNov2022Rows; ?>, <?php echo $SeniorNov2022Rows; ?>],
          ['December 2022', <?php echo $InfantDec2022Rows; ?>, <?php echo $SchoolAgedChildrenDec2022Rows; ?>, <?php echo $PregnantDec2022Rows; ?>, <?php echo $AdultDec2022Rows; ?>, <?php echo $SeniorDec2022Rows; ?>]
        ]);

        var options = {
          width:1000, height: 500,
          chart: {
            title: 'Monthly Immunization',
            
            subtitle: 'Infant, School Aged Children, Pregnant, Adult, Senior Citizen',

          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('monthlyImmunization'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<!-- Graphs and Charts -->

<script>
    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
  </script>