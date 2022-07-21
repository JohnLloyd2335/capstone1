<?php 
require_once("database/database-config.php");
include("utilities.php");
session_start();

if (isset($_POST['login'])) {
  $username  = $_POST['user_name'];
  $password = $_POST['password'];
  $validate_user = mysqli_query($sqlConn,"SELECT * FROM users INNER JOIN user_category ON users.user_id = user_category.user_id WHERE user_name='$username' LIMIT 1;");
  if(intval($validate_user->num_rows) === 0){
    alert("Username can't be found","index.php");
  }
  else{
    while($row = $validate_user->fetch_assoc()){
      $correct_password = $row['password'];
      $userCategory = $row['user_type'];
      if(password_verify($password,$correct_password)) {
          switch($userCategory){
            case "Admin": $_SESSION["admin-logged-in-user"] = $username;
              $_SESSION["admin-logged-in-password"] = $password;
              NurseDestroySession();
              BHWDestroySession();
              header("Location: admin/dashboard.php");
            break;
    
            case "Nurse/Midwife": $_SESSION["nurse-logged-in-user"] = $username;
              $_SESSION["nurse-logged-in-password"] = $password;
              AdminDestroySession();
              BHWDestroySession();
              header("Location: nurse/dashboard.php"); 
            break;
    
            case "Barangay Health Worker": $_SESSION["bhw-logged-in-user"] = $username;
              $_SESSION["bhw-logged-in-password"] = $password;
              AdminDestroySession();
              NurseDestroySession();
              header("Location: barangay health worker/dashboard.php"); 
            break;
    
            default: alert("There was an error try again","index.php");
          }
        }
        else {
          alert("Password is incorrect","index.php");
        }
    }

  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css ?v=<?php echo time(); ?>">
    <title>LOGIN | E-TUROK</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    
</head>
<body>
  <div class="container-fluid h-20 w-100 py-1 ">
    <div class="row">
      <div class="col ml-5 d-flex align-items-center">
          <img src="images/pila_logo.png" alt="" height="75" width="75">
          <h4 class="ml-4 ">Rural Health Unit of Pila Laguna</h4>
      </div>

      <div class="col d-flex align-items-center justify-content-end pr-5">
        <h4 class="">E-TUROK MO</h4>
      </div>
      
    </div>
  </div>
  
    <div class="main-container">
        <div class="container">
            <section class="h-90 gradient-form">
                <div class="container py-5 h-90">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl">
                      <div class="card rounded-3 text-black">
                        <div class="row g-0 ">
                          
                          
                            <div class="col-lg-6 d-flex align-items-center justify-content-center" style="background-image: url(rhubg.jpg)" alt=""width="100" height="100"> <!--  gradient-custom-2"> -->
                            <!-- <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                              <h4 class="mb-4">We are more than just a company</h4>
                              <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div> -->
                            
                            <div class="col-lg-6   align-items-center justify-content-center"  style="color: white;">
                                <div class="row  align-items-left justify-content-left">

                                </div>
                            </div>
                          </div>

                          <div class="col-lg-6  bg-light  border-dark">
                            <div class="card-body p-md-5 mx-md-4">
              
                              <div class="text-center">
                                <img src="images/pila_logo.png"
                                  style="width: 100px;" alt="logo">
                                <p class="pb-1 ">Rural Health Unit of Pila Laguna</p>
                                <h2 class="pb-1 ">Welcome</h2>
                              </div>
              
                              <form action="index.php" method="POST">
                                <center><p class ="text-muted">Login to your account</p></center>
              
                                <div class="form-outline mb-2">
                                  <label class="form-label" for="form2Example11">Username</label>
                                  <input type="text" id="form2Example11" class="form-control"
                                    placeholder="Username"  name="user_name" required/>
                                </div>
              
                                <div class="form-outline mb-4">
                                  <label class="form-label" for="form2Example11">Password</label>
                                  <input type="password" id="form2Example22" class="form-control" placeholder="Password" name="password" required/>
                                </div>
              
                                <div class="text-center pt-1 mb-5 pb-1">
                                  <button class="btn btn-block fa-lg mb-3" name="login" type="submit" style="background-color:#0583d2;">LOGIN
                                    </button>
                                  <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                                </div>
              
                
                              </form>
              
                            </div>
                          </div>
                          
                            </div>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
        
        <!-- Footer -->
        </div>
<footer class="text-center text-lg-start"> 
  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);"> <br>
    <p>The system is belongs to the Rural Health Unit of Pila Laguna only. </p>
    <!-- <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a> -->
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
          </div>
        </nav>
    </div>
    

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>