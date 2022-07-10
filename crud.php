<?php 
require_once("database/database-config.php");
require_once("utilities.php");

/* Admin */
if(isset($_POST['add_nurse_user'])){
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $user_type = $_POST['user_category'];
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];
  $password = password_hash($password,PASSWORD_DEFAULT);

  $checkIfExisitingUser = "SELECT * FROM users WHERE user_name='$user_name';";
  $checkIfExisitingUserRun = mysqli_query($sqlConn,$checkIfExisitingUser);
  $rows = mysqli_num_rows($checkIfExisitingUserRun);

  if($rows > 0){
    alert("User Already Exist!","admin/manage_user.php");
  }
  else{
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {

      if($fileError === 0) {
        if($fileSize < 100000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'user_profile_img/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);

          $insertUserRun = mysqli_query($sqlConn, "INSERT INTO users (first_name,middle_name,last_name,dob,age,gender, user_name,password, profile_img) VALUES('$first_name','$middle_name','$last_name','$dob','$age','$gender','$user_name','$password','$fileNameNew')");
          if($insertUserRun){
            $selectLastRow = "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1;";
            $runQuery = mysqli_query($sqlConn,$selectLastRow);
            $lastRow = mysqli_fetch_assoc($runQuery);
            $lastRow = $lastRow['user_id'];
            $insertUserType = mysqli_query($sqlConn,"INSERT INTO user_category(user_id,user_type) VALUES ('$lastRow','$user_type')");
            if($insertUserType){
              alert("User Added","admin/manage_user.php");
            }
            else{
              alert("There was an error uploading your file","admin/manage_user.php");
            }
          }
          
        }else {
          alert("Your file is too big","admin/manage_user.php");
        }

      }else {
        alert("There was an error uploading your file","admin/manage_user.php");
      }
    }else {
      alert("File not allowed","admin/manage_user.php");
    }

  }
}
elseif(isset($_POST['delete_nurse_user'])){
  $delete_id = $_POST['delete_user_id'];

  $deleteUserQuery = $sqlConn->query("DELETE FROM users WHERE user_id='$delete_id';");

  if($deleteUserQuery){
    $deleteUserCategoryQuery = $sqlConn->query("DELETE FROM user_category WHERE user_id='$delete_id';");
    if($deleteUserCategoryQuery){
      alert("User Successfully Deleted","admin/manage_user.php");
    }
    else{
      alert("User failed to delete","admin/manage_user.php");
    }
  }
  else{
    alert("User failed to delete","admin/manage_user.php");
  }

}
elseif(isset($_POST['edit_nurse_user'])){
  $edit_id = $_POST['edit_id'];
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];

  $editUserQuery = $sqlConn->query("UPDATE users SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', dob='$dob', age='$age', gender='$gender' WHERE user_id ='$edit_id';");

  if($editUserQuery){
    alert("User Successfully Edited","admin/manage_user.php");
  }
  else{
    alert("User failed to delete","admin/manage_user.php");
  }

}
elseif(isset($_POST['edit_profile_admin'])){
  $profile_id = $_POST['profile_id'];
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $user_name = $_POST['user_name'];
  $passwordUnhashed = $_POST['password'];
  $editedUserName = $user_name;
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

  $file = $_FILES['file'];

  
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  

  $checkIfExisitingUser = "SELECT * FROM users WHERE user_name='$user_name' AND user_id!='$profile_id';";
  $checkIfExisitingUserRun = mysqli_query($sqlConn,$checkIfExisitingUser);
  $rows = mysqli_num_rows($checkIfExisitingUserRun);

  

  if($rows > 0){
    alert("User Already Exist!","admin/profile.php");
  }
  else{
    if($fileSize==0){
      $editProfile = $sqlConn->query("UPDATE users SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',dob='$dob',age='$age',gender='$gender',user_name='$user_name',password='$password' WHERE user_id='$profile_id'");

      if($editProfile){
        session_start();
        $_SESSION["admin-logged-in-user"] = $editedUserName;
        $_SESSION["admin-logged-in-password"] = $passwordUnhashed;
        alert("Profile Successfuly Edited","admin/profile.php");
      }
      else{
        alert("There was an error try again","admin/profile.php");
      }
    }else{
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {
          if($fileSize < 100000000) {
            $selectUser = $sqlConn->query("SELECT * FROM users WHERE user_id='$profile_id' LIMIT 1");
            $rowImg = $selectUser->fetch_assoc();
            if(!empty($rowImg['profile_img'])){
              $deleteImgDestination = "user_profile_img/".$rowImg['profile_img'];
              unlink($deleteImgDestination);
            }
            
            

          
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = 'user_profile_img/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);

            
              $editProfile = $sqlConn->query("UPDATE users SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',dob='$dob',age='$age',gender='$gender',user_name='$user_name',password='$password', profile_img='$fileNameNew' WHERE user_id='$profile_id'");



              if($editProfile){
                session_start();
                $_SESSION["admin-logged-in-user"] = $editedUserName;
                $_SESSION["admin-logged-in-password"] = $passwordUnhashed;
                alert("Profile Successfuly Edited","admin/profile.php");
              }
              else{
                alert("There was an error try again","admin/profile.php");
              }
            }
            
          }else {
            alert("File is too big","admin/profile.php");
          }

        }else {
          alert("There was an error uploading your file","admin/profile.php");
        }
      }
      
  }

}
/* Admin */


/* Nurse/Midwife */
if(isset($_POST['add_bhw_user'])){
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $user_type = $_POST['user_category'];
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];
  $password = password_hash($password,PASSWORD_DEFAULT);

  $checkIfExisitingUser = "SELECT * FROM users WHERE user_name='$user_name';";
  $checkIfExisitingUserRun = mysqli_query($sqlConn,$checkIfExisitingUser);
  $rows = mysqli_num_rows($checkIfExisitingUserRun);

  if($rows > 0){
    alert("User Already Exist!","nurse/manage_user.php");
  }
  else{
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {

      if($fileError === 0) {
        if($fileSize < 100000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'user_profile_img/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);

          $insertUserRun = mysqli_query($sqlConn, "INSERT INTO users (first_name,middle_name,last_name,dob,age,gender, user_name,password, profile_img) VALUES('$first_name','$middle_name','$last_name','$dob','$age','$gender','$user_name','$password','$fileNameNew')");
          if($insertUserRun){
            $selectLastRow = "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1;";
            $runQuery = mysqli_query($sqlConn,$selectLastRow);
            $lastRow = mysqli_fetch_assoc($runQuery);
            $lastRow = $lastRow['user_id'];
            $insertUserType = mysqli_query($sqlConn,"INSERT INTO user_category(user_id,user_type) VALUES ('$lastRow','$user_type')");
            if($insertUserType){
              alert("User Added","nurse/manage_user.php");
            }
            else{
              alert("There was an error uploading your file","nurse/manage_user.php");
            }
          }
          
        }else {
          alert("Your file is too big","nurse/manage_user.php");
        }

      }else {
        alert("There was an error uploading your file","nurse/manage_user.php");
      }
    }else {
      alert("File not allowed","nurse/manage_user.php");
    }

  }
}
elseif(isset($_POST['delete_bhw_user'])){
  $delete_id = $_POST['delete_user_id'];

  $deleteUserQuery = $sqlConn->query("DELETE FROM users WHERE user_id='$delete_id';");

  if($deleteUserQuery){
    $deleteUserCategoryQuery = $sqlConn->query("DELETE FROM user_category WHERE user_id='$delete_id';");
    if($deleteUserCategoryQuery){
      alert("User Successfully Deleted","nurse/manage_user.php");
    }
    else{
      alert("User failed to delete","nurse/manage_user.php");
    }
  }
  else{
    alert("User failed to delete","nurse/manage_user.php");
  }

}
elseif(isset($_POST['edit_bhw_user'])){
  $edit_id = $_POST['edit_id'];
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];

  $editUserQuery = $sqlConn->query("UPDATE users SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', dob='$dob', age='$age', gender='$gender' WHERE user_id ='$edit_id';");

  if($editUserQuery){
    alert("User Successfully Edited","nurse/manage_user.php");
  }
  else{
    alert("User failed to delete","nurse/manage_user.php");
  }

}
elseif(isset($_POST['edit_profile_nurse'])){
  $profile_id = $_POST['profile_id'];
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $user_name = $_POST['user_name'];
  $passwordUnhashed = $_POST['password'];
  $editedUserName = $user_name;
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

  $file = $_FILES['file'];

  
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  

  $checkIfExisitingUser = "SELECT * FROM users WHERE user_name='$user_name' AND user_id!='$profile_id';";
  $checkIfExisitingUserRun = mysqli_query($sqlConn,$checkIfExisitingUser);
  $rows = mysqli_num_rows($checkIfExisitingUserRun);

  

  if($rows > 0){
    alert("User Already Exist!","nurse/profile.php");
  }
  else{
    if($fileSize==0){
      $editProfile = $sqlConn->query("UPDATE users SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',dob='$dob',age='$age',gender='$gender',user_name='$user_name',password='$password' WHERE user_id='$profile_id'");

      if($editProfile){
        session_start();
        $_SESSION["nurse-logged-in-user"] = $editedUserName;
        $_SESSION["nurse-logged-in-password"] = $passwordUnhashed;
        alert("Profile Successfuly Edited","nurse/profile.php");
      }
      else{
        alert("There was an error try again","nurse/profile.php");
      }
    }else{
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {
          if($fileSize < 100000000) {
            $selectUser = $sqlConn->query("SELECT * FROM users WHERE user_id='$profile_id' LIMIT 1");
            $rowImg = $selectUser->fetch_assoc();
            if(!empty($rowImg['profile_img'])){
              $deleteImgDestination = "user_profile_img/".$rowImg['profile_img'];
              unlink($deleteImgDestination);
            }
            
            

          
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = 'user_profile_img/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);

            
              $editProfile = $sqlConn->query("UPDATE users SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',dob='$dob',age='$age',gender='$gender',user_name='$user_name',password='$password', profile_img='$fileNameNew' WHERE user_id='$profile_id'");



              if($editProfile){
                session_start();
                $_SESSION["nurse-logged-in-user"] = $editedUserName;
                $_SESSION["nurse-logged-in-password"] = $passwordUnhashed;
                alert("Profile Successfuly Edited","nurse/profile.php");
              }
              else{
                alert("There was an error try again","nurse/profile.php");
              }
            }
            
          }else {
            alert("File is too big","nurse/profile.php");
          }

        }else {
          alert("There was an error uploading your file","nurse/profile.php");
        }
      }
      
  }

}
/* Nurse */

/* BHW */
if(isset($_POST['edit_profile_bhw'])){
  $profile_id = $_POST['profile_id'];
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $user_name = $_POST['user_name'];
  $passwordUnhashed = $_POST['password'];
  $editedUserName = $user_name;
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

  $file = $_FILES['file'];

  
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  

  $checkIfExisitingUser = "SELECT * FROM users WHERE user_name='$user_name' AND user_id!='$profile_id';";
  $checkIfExisitingUserRun = mysqli_query($sqlConn,$checkIfExisitingUser);
  $rows = mysqli_num_rows($checkIfExisitingUserRun);

  

  if($rows > 0){
    alert("User Already Exist!","barangay health worker/profile.php");
  }
  else{
    if($fileSize==0){
      $editProfile = $sqlConn->query("UPDATE users SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',dob='$dob',age='$age',gender='$gender',user_name='$user_name',password='$password' WHERE user_id='$profile_id'");

      if($editProfile){
        session_start();
        $_SESSION["health-worker-logged-in-user"] = $editedUserName;
        $_SESSION["health-worker-logged-in-password"] = $passwordUnhashed;
        alert("Profile Successfuly Edited","barangay health worker/profile.php");
      }
      else{
        alert("There was an error try again","barangay health worker/profile.php");
      }
    }else{
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {
          if($fileSize < 100000000) {
            $selectUser = $sqlConn->query("SELECT * FROM users WHERE user_id='$profile_id' LIMIT 1");
            $rowImg = $selectUser->fetch_assoc();
            if(!empty($rowImg['profile_img'])){
              $deleteImgDestination = "user_profile_img/".$rowImg['profile_img'];
              unlink($deleteImgDestination);
            }
            
            

          
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = 'user_profile_img/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);

            
              $editProfile = $sqlConn->query("UPDATE users SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',dob='$dob',age='$age',gender='$gender',user_name='$user_name',password='$password', profile_img='$fileNameNew' WHERE user_id='$profile_id'");



              if($editProfile){
                session_start();
                $_SESSION["health-worker-logged-in-user"] = $editedUserName;
                $_SESSION["health-worker-logged-in-password"] = $passwordUnhashed;
                alert("Profile Successfuly Edited","barangay health worker/profile.php");
              }
              else{
                alert("There was an error try again","barangay health worker/profile.php");
              }
            }
            
          }else {
            alert("File is too big","barangay health worker/profile.php");
          }

        }else {
          alert("There was an error uploading your file","barangay health worker/profile.php");
        }
      }
      
  }

}
/* BHW */
elseif(isset($_POST['admin_log_out'])){
  AdminDestroySession();
}
elseif(isset($_POST['nurse_log_out'])){
  NurseDestroySession();
}
elseif(isset($_POST['bhw_log_out'])){
  BHWDestroySession();
}

/* Add Vaccine */
if(isset($_POST['add_vaccine'])){
  $vaccine_category_name = $_POST['vaccine_category_name'];
  $vaccine_name = $_POST['vaccine_name'];
  $doses = $_POST['doses'];
  $manufactured_date = $_POST['manufactured_date'];
  $expiration_date = $_POST['expiration_date'];
  $description = $_POST['description'];

  switch($vaccine_category_name){
    case "Infant": $vaccine_category_id = 1; break; 
    case "School Aged Children": $vaccine_category_id = 2; break; 
    case "Pregnant": $vaccine_category_id = 3; break; 
    case "Adult": $vaccine_category_id = 4; break; 
    case "Senior Citizen": $vaccine_category_id = 5; break;
    default : alert("Please try again","nurse/vaccine.php");
  }

  $checkVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_name='$vaccine_name' LIMIT 1");
  if($checkVaccine->num_rows > 0){
    alert("Vaccine Already Exist", "nurse/vaccine.php");
  }
  else{
    $addVaccineQuery = $sqlConn->query("INSERT INTO vaccine(vaccine_category_id,vaccine_name,doses,manufactured_date,expiration_date,description) VALUES('$vaccine_category_id','$vaccine_name','$doses','$manufactured_date','$expiration_date','$description')");

    if($addVaccineQuery){
      alert("Vaccine Successfully Added","nurse/vaccine.php");
    }
    else{
      alert("There was an error please try again","nurse/vaccine.php");
    }
  }

  

}
/* Add Vaccine */

/* Delete Vaccine */
elseif(isset($_POST['delete_vaccine'])){
  $delete_id = $_POST['delete_vaccine_id'];

  $deleteVaccineQuery = $sqlConn->query("DELETE FROM vaccine WHERE vaccine_id='$delete_id';");

  if($deleteVaccineQuery){
    alert("Vaccine Successfully Deleted","nurse/vaccine.php");
  }
  else{
    alert("Vaccine failed to delete","nurse/vaccine.php");
  }

}
/* Delete Vaccine */

/* Edit Vaccine */  
if(isset($_POST['edit_vaccine'])){
  $vaccine_id = $_POST['vaccine_id'];
  $vaccine_name = $_POST['vaccine_name'];
  $doses = $_POST['doses'];
  $manufactured_date = $_POST['manufactured_date'];
  $expiration_date = $_POST['expiration_date'];
  $description = $_POST['description'];
  

  $checkVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_name='$vaccine_name' AND vaccine_id!='$vaccine_id'");
  if($checkVaccine->num_rows > 0){
    alert("Vaccine Already Exist", "nurse/vaccine.php");
  }
  else{
    $editVaccineQuery = $sqlConn->query("UPDATE vaccine set vaccine_name='$vaccine_name', doses='$doses',  manufactured_date='$manufactured_date', expiration_date='$expiration_date', description='$description' WHERE vaccine_id='$vaccine_id'");

    if($editVaccineQuery){
      alert("Vaccine Successfully Edited","nurse/vaccine.php");
    }
    else{
      alert("There was an error please try again","nurse/vaccine.php");
    }
  }
}
/* Edit Vaccine */ 

// elseif(isset($_POST['add_adult_immunization'])){
//   $patient_full_name = $_POST['patient_full_name'];
//   $address = $_POST['address'];
//   $age = $_POST['age'];
//   $sex = $_POST['sex'];
//   $patient_occupation = $_POST['patient_occupation'];
//   $doma = $_POST['doma'];
//   $patient_weight = strval($_POST['patient_weight']). " kg";
//   $patient_temperature = strval($_POST['patient_temperature']). " Celcius";
//   $patient_bp = strval($_POST['patient_bp']). " MMHG";
//   $patient_pr = strval($_POST['patient_pr']). " BPM";
//   $patient_rr = strval($_POST['patient_rr']). " CPM";
//   $chief_complain = $_POST['chief_complain'];
//   $signs_and_symptoms = $_POST['signs_and_symptoms'];
//   $probable_diagnosis = $_POST['probable_diagnosis'];
//   $signs_and_symptoms_duration = $_POST['signs_and_symptoms_start_date']. " to " .$_POST['signs_and_symptoms_end_date']; 

//   $vaccine = $_POST['vaccine'];

//   $vaccine_dosage_number = $_POST['vaccine_dosage_number'];
//   $vaccine_dosage_weight = $_POST['vaccine_dosage_weight'];
//   $vaccine_dose = strval($vaccine_dosage_number). " $vaccine_dosage_weight";

//   $prescription = $_POST['prescription'];

//   $prescription_dosage_number = $_POST['prescription_dosage_number'];
//   $prescription_dosage_weight = $_POST['prescription_dosage_weight'];
//   $prescription_dose = strval($prescription_dosage_number). " $prescription_dosage_weight";

//   $prescription_duration = $_POST['prescription_start_date']. " to " .$_POST['prescription_end_date']; 
//   $advised = $_POST['advised'];

//   $insertImmunization = $sqlConn->query("INSERT INTO adult_immunization(patient_full_name, address, age, sex, patient_occupation, doma, patient_weight, patient_temperature, patient_bp, patient_pr, patient_rr, chief_complain, signs_and_symptoms, signs_and_symptoms_duration, probable_diagnosis, vaccine, vaccine_dose, prescription, prescription_dose, prescription_duration, advised) VALUES('$patient_full_name','$address','$age','$sex','$patient_occupation','$doma','$patient_weight','$patient_temperature','$patient_bp','$patient_pr','$patient_rr','$chief_complain','$signs_and_symptoms','$signs_and_symptoms_duration','$probable_diagnosis','$vaccine','$vaccine_dose','$prescription','$prescription_dose','$prescription_duration','$advised')");

//   if($insertImmunization){
//     alert("Immunization Successfully Added","barangay health worker/adult_immunization.php");
//   }
//   else{
//     alert("Immunization Failed to Add","barangay health worker/adult_immunization.php");
//   }

// }
elseif(isset($_POST['add_immunization_nurse'])){
  $patient_first_name = $_POST['patient_first_name'];
  $patient_middle_name = $_POST['patient_middle_name'];
  $patient_last_name = $_POST['patient_last_name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $m_full_name = $_POST['m_full_name'];
  $f_full_name = $_POST['f_full_name'];
  $weight = $_POST['weight'];
  $weight = strval($weight). ' kg';
  $height = mysqli_real_escape_string($sqlConn, $_POST["height"]);
  $height = $height. ' cm';
  $sex = $_POST['sex'];

  $vaccine_category_id = $_POST['immunization_category_id'];
  $immunization_category_id = $_POST['immunization_category_id'];
  $vaccine_id = $_POST['vaccine_id'];
  $selectVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_id='$vaccine_id' LIMIT 1");
  while($row = $selectVaccine->fetch_assoc()):
    $vaccine = $row['vaccine_name'];
    $doses = $row['doses'];
  endwhile;

  $doses_received = 1;
  $remarks = $_POST['remarks'];

  $date_recorded = date('Y-m-d');


  $addImmunization = $sqlConn->query("INSERT INTO immunization(immunization_category_id, vaccine_category_id, vaccine_id,first_name,middle_name,last_name,age,dob, pob, address, contact_no, m_full_name, f_full_name, weight, height, sex, vaccine, doses, doses_received, remarks, date_recorded) VALUES($immunization_category_id,$vaccine_category_id,$vaccine_id,'$patient_first_name','$patient_middle_name','$patient_last_name','$age','$dob','$pob','$address','$contact_no','$m_full_name','$f_full_name','$weight','$height','$sex','$vaccine','$doses','$doses_received','$remarks','$date_recorded')");

  if($addImmunization){
    if($_POST['immunization_category_id'] == 1){
      alert("Immunization Added Successfully","nurse/infant_immunization.php");
    }
    elseif($_POST['immunization_category_id'] == 2){
      alert("Immunization Added Successfully","nurse/school_age_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == 3){
      alert("Immunization Added Successfully","nurse/pregnant_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == 4){
      alert("Immunization Added Successfully","nurse/adult_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == 5){
      alert("Immunization Added Successfully","nurse/senior_citizen_immunization.php");
    } 
  }
  else{
    if($vaccine_category_id == "1"){
      alert("Immunization Failed to Add","nurse/infant_immunization.php");;
    }
    elseif($vaccine_category_id == "2"){
      alert("Immunization Failed to Add","nurse/school_age_immunization.php");
    } 
    elseif($vaccine_category_id == "3"){
      alert("Immunization Failed to Add","nurse/pregnant_immunization.php");
    } 
    elseif($vaccine_category_id == "4"){
      alert("Immunization Failed to Add","nurse/adult_immunization.php");
    } 
    elseif($vaccine_category_id == "5"){
      alert("Immunization Failed to Add","nurse/senior_citizen_immunization.php");
    } 
  }



}
elseif(isset($_POST['archive_immunization_nurse'])){
  $immunization_category_id = $_POST['immunization_category_id'];
  $archive_immunization_id = $_POST['archive_immunization_id'];
  $vaccine_category_id = $_POST['immunization_category_id'];
  $vaccine_id = $_POST['vaccine_id'];
  $patient_first_name = $_POST['patient_first_name'];
  $patient_middle_name = $_POST['patient_middle_name'];
  $patient_last_name = $_POST['patient_last_name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $m_full_name = $_POST['m_full_name'];
  $f_full_name = $_POST['f_full_name'];
  $weight = $_POST['weight'];
  $height =  mysqli_real_escape_string($sqlConn, $_POST["height"]);
  $sex = $_POST['sex'];
  $vaccine = $_POST['vaccine'];
  $doses = $_POST['doses'];
  $doses_received = $_POST['doses_received'];
  $remarks = $_POST['remarks'];
  $date_recorded =  $_POST['date_recorded'];


 $insertToArchive = $sqlConn->query("INSERT INTO archive(immunization_category_id, immunization_id, vaccine_category_id, vaccine_id, first_name, middle_name, last_name, age, dob, pob, address, contact_no, m_full_name, f_full_name, weight, height, sex, vaccine, doses, doses_received, remarks, date_recorded) VALUES ('$immunization_category_id','$archive_immunization_id','$vaccine_category_id','$vaccine_id','$patient_first_name','$patient_middle_name','$patient_last_name','$age','$dob','$pob','$address','$contact_no','$m_full_name','$f_full_name','$weight','$height','$sex','$vaccine','$doses','$doses_received','$remarks','$date_recorded')");

 if($insertToArchive){
  $deleteImmunization = $sqlConn->query("DELETE FROM immunization WHERE immunization_id='$archive_immunization_id'");
  
  if($vaccine_category_id == "1"){
    alert("Immunization Moved to Archive","nurse/infant_immunization.php");;
  }
  elseif($vaccine_category_id == "2"){
    alert("Immunization Moved to Archive","nurse/school_age_immunization.php");
  } 
  elseif($vaccine_category_id == "3"){
    alert("Immunization Moved to Archive","nurse/pregnant_immunization.php");
  } 
  elseif($vaccine_category_id == "4"){
    alert("Immunization Moved to Archive","nurse/adult_immunization.php");
  } 
  elseif($vaccine_category_id == "5"){
    alert("Immunization Moved to Archive","nurse/senior_citizen_immunization.php");
  } 

}
else{
if($vaccine_category_id == "1"){
  alert("Unable to move immunization in Archive","nurse/infant_immunization.php");;
}
elseif($vaccine_category_id == "2"){
  alert("Unable to move immunization in Archive","nurse/school_age_immunization.php");
} 
elseif($vaccine_category_id == "3"){
  alert("Unable to move immunization in Archive","nurse/pregnant_immunization.php");
} 
elseif($vaccine_category_id == "4"){
  alert("Unable to move immunization in Archive","nurse/adult_immunization.php");
} 
elseif($vaccine_category_id == "5"){
  alert("Unable to move immunization in Archive","nurse/senior_citizen_immunization.php");
} 
}



  
}

elseif(isset($_POST['unarchive_immunization_nurse'])){
  $archive_id = $_POST['archive_id'];
  $immunization_id = $_POST['immunization_id'];
  $immunization_category_id = $_POST['immunization_category_id'];
  $vaccine_category_id = $_POST['immunization_category_id'];
  $vaccine_id = $_POST['vaccine_id'];
  $patient_first_name = $_POST['patient_first_name'];
  $patient_middle_name = $_POST['patient_middle_name'];
  $patient_last_name = $_POST['patient_last_name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $m_full_name = $_POST['m_full_name'];
  $f_full_name = $_POST['f_full_name'];
  $weight = $_POST['weight'];
  $height =  mysqli_real_escape_string($sqlConn, $_POST["height"]);
  $sex = $_POST['sex'];
  $vaccine = $_POST['vaccine'];
  $doses = $_POST['doses'];
  $doses_received = $_POST['doses_received'];
  $remarks = $_POST['remarks'];
  $date_recorded =  $_POST['date_recorded'];


 $insertToImmunization = $sqlConn->query("INSERT INTO immunization(immunization_id,immunization_category_id, vaccine_category_id, vaccine_id, first_name, middle_name, last_name, age, dob, pob, address, contact_no, m_full_name, f_full_name, weight, height, sex, vaccine, doses, doses_received, remarks, date_recorded) VALUES ('$immunization_id','$immunization_category_id','$vaccine_category_id','$vaccine_id','$patient_first_name','$patient_middle_name','$patient_last_name','$age','$dob','$pob','$address','$contact_no','$m_full_name','$f_full_name','$weight','$height','$sex','$vaccine','$doses','$doses_received','$remarks','$date_recorded')");

 if($insertToImmunization){
    $deleteArchiveImmunization = $sqlConn->query("DELETE FROM archive WHERE archive_id='$archive_id'");
    alert("Immunization Successfully Move to Archived","nurse/archive.php");
 }
 else{
  alert("Unable to move immunization in Archive","nurse/archive.php");
 }
 
}

elseif(isset($_POST['delete_immunization_nurse'])){
  $archive_id = $_POST['archive_id'];

  $deleteImmunization = $sqlConn->query("DELETE FROM archive WHERE archive_id ='$archive_id'");

  if($deleteImmunization){
    alert("Immunization Permanently Deleted","nurse/archive.php");
  }
  else{
    alert("Immunization Failed to Delete","nurse/archive.php");
  }
}


  

elseif(isset($_POST['add_immunization_bhw'])){
  $patient_first_name = $_POST['patient_first_name'];
  $patient_middle_name = $_POST['patient_middle_name'];
  $patient_last_name = $_POST['patient_last_name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $m_full_name = $_POST['m_full_name'];
  $f_full_name = $_POST['f_full_name'];
  $weight = $_POST['weight'];
  $weight = strval($weight). ' kg';
  $height = mysqli_real_escape_string($sqlConn, $_POST["height"]);
  $height = $height. ' cm';
  $sex = $_POST['sex'];

  $vaccine_category_id = $_POST['immunization_category_id'];
  $immunization_category_id = $_POST['immunization_category_id'];
  $vaccine_id = $_POST['vaccine_id'];
  $selectVaccine = $sqlConn->query("SELECT * FROM vaccine WHERE vaccine_id='$vaccine_id' LIMIT 1");
  while($row = $selectVaccine->fetch_assoc()):
    $vaccine = $row['vaccine_name'];
    $doses = $row['doses'];
  endwhile;

  $doses_received = 1;
  $remarks = $_POST['remarks'];

  $date_recorded = date('Y-m-d');




  $addImmunization = $sqlConn->query("INSERT INTO immunization(immunization_category_id, vaccine_category_id, vaccine_id,first_name,middle_name,last_name,age,dob, pob, address, contact_no, m_full_name, f_full_name, weight, height, sex, vaccine, doses, doses_received, remarks, date_recorded) VALUES($immunization_category_id,$vaccine_category_id,$vaccine_id,'$patient_first_name','$patient_middle_name','$patient_last_name','$age','$dob','$pob','$address','$contact_no','$m_full_name','$f_full_name','$weight','$height','$sex','$vaccine','$doses','$doses_received','$remarks','$date_recorded')");

  if($addImmunization){
    if($_POST['immunization_category_id'] == 1){
      alert("Immunization Added Successfully","barangay health worker/infant_immunization.php");
    }
    elseif($_POST['immunization_category_id'] == 2){
      alert("Immunization Added Successfully","barangay health worker/school_age_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == 3){
      alert("Immunization Added Successfully","barangay health worker/pregnant_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == 4){
      alert("Immunization Added Successfully","barangay health worker/adult_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == 5){
      alert("Immunization Added Successfully","barangay health worker/senior_citizen_immunization.php");
    } 
  }
  else{
    

    if($vaccine_category_id == "1"){
      alert("Immunization Failed to Add","barangay health worker/infant_immunization.php");;
    }
    elseif($vaccine_category_id == "2"){
      alert("Immunization Failed to Add","barangay health worker/school_age_immunization.php");
    } 
    elseif($vaccine_category_id == "3"){
      alert("Immunization Failed to Add","barangay health worker/pregnant_immunization.php");
    } 
    elseif($vaccine_category_id == "4"){
      alert("Immunization Failed to Add","barangay health worker/adult_immunization.php");
    } 
    elseif($vaccine_category_id == "5"){
      alert("Immunization Failed to Add","barangay health worker/senior_citizen_immunization.php");
    } 
  }




}
elseif(isset($_POST['archive_immunization_bhw'])){
  $immunization_category_id = $_POST['immunization_category_id'];
  $archive_immunization_id = $_POST['archive_immunization_id'];
  $vaccine_category_id = $_POST['immunization_category_id'];
  $vaccine_id = $_POST['vaccine_id'];
  $patient_first_name = $_POST['patient_first_name'];
  $patient_middle_name = $_POST['patient_middle_name'];
  $patient_last_name = $_POST['patient_last_name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $m_full_name = $_POST['m_full_name'];
  $f_full_name = $_POST['f_full_name'];
  $weight = $_POST['weight'];
  $height =  mysqli_real_escape_string($sqlConn, $_POST["height"]);
  $sex = $_POST['sex'];
  $vaccine = $_POST['vaccine'];
  $doses = $_POST['doses'];
  $doses_received = $_POST['doses_received'];
  $remarks = $_POST['remarks'];
  $date_recorded =  $_POST['date_recorded'];


 $insertToArchive = $sqlConn->query("INSERT INTO archive(immunization_category_id, immunization_id, vaccine_category_id, vaccine_id, first_name, middle_name, last_name, age, dob, pob, address, contact_no, m_full_name, f_full_name, weight, height, sex, vaccine, doses, doses_received, remarks, date_recorded) VALUES ('$immunization_category_id','$archive_immunization_id','$vaccine_category_id','$vaccine_id','$patient_first_name','$patient_middle_name','$patient_last_name','$age','$dob','$pob','$address','$contact_no','$m_full_name','$f_full_name','$weight','$height','$sex','$vaccine','$doses','$doses_received','$remarks','$date_recorded')");

 if($insertToArchive){
    $deleteImmunization = $sqlConn->query("DELETE FROM immunization WHERE immunization_id='$archive_immunization_id'");
    
    if($vaccine_category_id == "1"){
      alert("Immunization Moved to Archive","barangay health worker/infant_immunization.php");;
    }
    elseif($vaccine_category_id == "2"){
      alert("Immunization Moved to Archive","barangay health worker/school_age_immunization.php");
    } 
    elseif($vaccine_category_id == "3"){
      alert("Immunization Moved to Archive","barangay health worker/pregnant_immunization.php");
    } 
    elseif($vaccine_category_id == "4"){
      alert("Immunization Moved to Archive","barangay health worker/adult_immunization.php");
    } 
    elseif($vaccine_category_id == "5"){
      alert("Immunization Moved to Archive","barangay health worker/senior_citizen_immunization.php");
    } 

 }
 else{
  if($vaccine_category_id == "1"){
    alert("Unable to move immunization in Archive","barangay health worker/infant_immunization.php");;
  }
  elseif($vaccine_category_id == "2"){
    alert("Unable to move immunization in Archive","barangay health worker/school_age_immunization.php");
  } 
  elseif($vaccine_category_id == "3"){
    alert("Unable to move immunization in Archive","barangay health worker/pregnant_immunization.php");
  } 
  elseif($vaccine_category_id == "4"){
    alert("Unable to move immunization in Archive","barangay health worker/adult_immunization.php");
  } 
  elseif($vaccine_category_id == "5"){
    alert("Unable to move immunization in Archive","barangay health worker/senior_citizen_immunization.php");
  } 
 }

}

elseif(isset($_POST['unarchive_immunization_bhw'])){
  $archive_id = $_POST['archive_id'];
  $immunization_id = $_POST['immunization_id'];
  $immunization_category_id = $_POST['immunization_category_id'];
  $vaccine_category_id = $_POST['immunization_category_id'];
  $vaccine_id = $_POST['vaccine_id'];
  $patient_first_name = $_POST['patient_first_name'];
  $patient_middle_name = $_POST['patient_middle_name'];
  $patient_last_name = $_POST['patient_last_name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $m_full_name = $_POST['m_full_name'];
  $f_full_name = $_POST['f_full_name'];
  $weight = $_POST['weight'];
  $height =  mysqli_real_escape_string($sqlConn, $_POST["height"]);
  $sex = $_POST['sex'];
  $vaccine = $_POST['vaccine'];
  $doses = $_POST['doses'];
  $doses_received = $_POST['doses_received'];
  $remarks = $_POST['remarks'];
  $date_recorded =  $_POST['date_recorded'];


 $insertToImmunization = $sqlConn->query("INSERT INTO immunization(immunization_id,immunization_category_id, vaccine_category_id, vaccine_id, first_name, middle_name, last_name, age, dob, pob, address, contact_no, m_full_name, f_full_name, weight, height, sex, vaccine, doses, doses_received, remarks, date_recorded) VALUES ('$immunization_id','$immunization_category_id','$vaccine_category_id','$vaccine_id','$patient_first_name','$patient_middle_name','$patient_last_name','$age','$dob','$pob','$address','$contact_no','$m_full_name','$f_full_name','$weight','$height','$sex','$vaccine','$doses','$doses_received','$remarks','$date_recorded')");

 if($insertToImmunization){
    $deleteArchiveImmunization = $sqlConn->query("DELETE FROM archive WHERE archive_id='$archive_id'");
    alert("Immunization Successfully Move to Archived","barangay health worker/archive.php");
 }
 else{
  alert("Unable to move immunization in Archive","barangay health worker/archive.php");
 }
 
}

elseif(isset($_POST['delete_immunization_bhw'])){
  $archive_id = $_POST['archive_id'];

  $deleteImmunization = $sqlConn->query("DELETE FROM archive WHERE archive_id ='$archive_id'");

  if($deleteImmunization){
    alert("Immunization Permanently Deleted","barangay health worker/archive.php");
  }
  else{
    alert("Immunization Failed to Delete","barangay health worker/archive.php");
  }
}


elseif(isset($_POST['backup_database_admin'])){
  $db_name = $_POST['db_name'];
  $correct_password = $_POST['correct_password'];
  $entered_password = $_POST['entered_password'];

  $mysqlUserName      = "root";
  $mysqlPassword      = "";
  $mysqlHostName      = "localhost";
  $DbName             = "e_turok";
  $backup_name        =  $db_name;
  $tables             = array("immunization", "immunization_category", "users", "user_category", "vaccine", "vaccine_category","archive");

  if($_POST['correct_password'] !==  $_POST['entered_password']){
    alert("Password is incorrect","admin/database_backup.php");
  }
  else{
      date_default_timezone_set('Asia/Manila');
      $todays_date = date("y-m-d h:i:sa");
      $today = strtotime($todays_date);
      $date = date("Y-m-d h:i:sa", $today);
      $backup_name = $backup_name.".$date.sql";
    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false,$backup_name,$db_name);
  }
 
}

elseif(isset($_POST['backup_database_nurse'])){
  $db_name = $_POST['db_name'];
  $correct_password = $_POST['correct_password'];
  $entered_password = $_POST['entered_password'];

  $mysqlUserName      = "root";
  $mysqlPassword      = "";
  $mysqlHostName      = "localhost";
  $DbName             = "e_turok";
  $backup_name        =  $db_name;
  $tables             = array("immunization", "immunization_category", "users", "user_category", "vaccine", "vaccine_category","archive");

  if($_POST['correct_password'] !==  $_POST['entered_password']){
    alert("Password is incorrect","nurse/database_backup.php");
  }
  else{
      date_default_timezone_set('Asia/Manila');
      $todays_date = date("y-m-d h:i:sa");
      $today = strtotime($todays_date);
      $date = date("Y-m-d h:i:sa", $today);
      $backup_name = $backup_name.".$date.sql";
    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false,$backup_name,$db_name);
  }
}

elseif(isset($_POST['edit_immunization_nurse'])){
  $update_id = $_POST['immunization_id'];
  $patient_first_name = $_POST['patient_first_name'];
  $patient_middle_name = $_POST['patient_middle_name'];
  $patient_last_name = $_POST['patient_last_name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $m_full_name = $_POST['m_full_name'];
  $f_full_name = $_POST['f_full_name'];
  $weight = $_POST['weight'];
  $weight = strval($weight). ' kg';
  $height = mysqli_real_escape_string($sqlConn, $_POST["height"]);
  $height = $height. ' cm';
  $sex = $_POST['sex'];



  $doses_received = $_POST['doses_received'];
  $remarks = $_POST['remarks'];

  $date_recorded = date('Y-m-d');

  $editImmunization = $sqlConn->query("UPDATE immunization SET first_name='$patient_first_name',middle_name='$patient_middle_name',last_name='$patient_last_name',age='$age',dob='$dob',pob='$pob',address='$address',contact_no='$contact_no',m_full_name='$m_full_name',f_full_name='$f_full_name',weight='$weight',height='$height',sex='$sex',doses_received='$doses_received',remarks='$remarks' WHERE immunization_id='$update_id'");

  if($editImmunization){
    if($_POST['immunization_category_id'] == "Infant"){
      alert("Immunization Edited Successfully","nurse/infant_immunization.php");
    }
    elseif($_POST['immunization_category_id'] == "School Aged Children"){
      alert("Immunization Edited Successfully","nurse/school_age_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Pregnant"){
      alert("Immunization Edited Successfully","nurse/pregnant_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Adult"){
      alert("Immunization Edited Successfully","nurse/adult_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Senior Citizen"){
      alert("Immunization Edited Successfully","nurse/senior_citizen_immunization.php");
    } 
    
  }
  else{
   
    if($_POST['immunization_category_id'] == "Infant"){
      alert("Immunization Failed to Edit","nurse/infant_immunization.php");
    }
    elseif($_POST['immunization_category_id'] == "School Aged Children"){
      alert("Immunization Failed to Edit","nurse/school_age_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Pregnant"){
      alert("Immunization Failed to Edit","nurse/pregnant_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Adult"){
      alert("Immunization Failed to Edit","nurse/adult_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Senior Citizen"){
      alert("Immunization Failed to Edit","nurse/senior_citizen_immunization.php");
    } 
  }
}

elseif(isset($_POST['edit_immunization_bhw'])){
  $update_id = $_POST['immunization_id'];
  $immunization_category_id = $_POST['immunization_category_id'];
  $patient_first_name = $_POST['patient_first_name'];
  $patient_middle_name = $_POST['patient_middle_name'];
  $patient_last_name = $_POST['patient_last_name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $m_full_name = $_POST['m_full_name'];
  $f_full_name = $_POST['f_full_name'];
  $weight = $_POST['weight'];
  $weight = strval($weight). ' kg';
  $height = mysqli_real_escape_string($sqlConn, $_POST["height"]);
  $height = $height. ' cm';
  $sex = $_POST['sex'];



  $doses_received = $_POST['doses_received'];
  $remarks = $_POST['remarks'];

  $date_recorded = date('Y-m-d');

  $editImmunization = $sqlConn->query("UPDATE immunization SET first_name='$patient_first_name',middle_name='$patient_middle_name',last_name='$patient_last_name',age='$age',dob='$dob',pob='$pob',address='$address',contact_no='$contact_no',m_full_name='$m_full_name',f_full_name='$f_full_name',weight='$weight',height='$height',sex='$sex',doses_received='$doses_received',remarks='$remarks' WHERE immunization_id='$update_id'");


  if($editImmunization){
    if($_POST['immunization_category_id'] == "Infant"){
      alert("Immunization Edited Successfully","barangay health worker/infant_immunization.php");
    }
    elseif($_POST['immunization_category_id'] == "School Aged Children"){
      alert("Immunization Edited Successfully","barangay health worker/school_age_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Pregnant"){
      alert("Immunization Edited Successfully","barangay health worker/pregnant_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Adult"){
      alert("Immunization Edited Successfully","barangay health worker/adult_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Senior Citizen"){
      alert("Immunization Edited Successfully","barangay health worker/senior_citizen_immunization.php");
    } 
    
  }
  else{
   
    if($_POST['immunization_category_id'] == "Infant"){
      alert("Immunization Failed to Edit","barangay health worker/infant_immunization.php");
    }
    elseif($_POST['immunization_category_id'] == "School Aged Children"){
      alert("Immunization Failed to Edit","barangay health worker/school_age_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Pregnant"){
      alert("Immunization Failed to Edit","barangay health worker/pregnant_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Adult"){
      alert("Immunization Failed to Edit","barangay health worker/adult_immunization.php");
    } 
    elseif($_POST['immunization_category_id'] == "Senior Citizen"){
      alert("Immunization Failed to Edit","barangay health worker/senior_citizen_immunization.php");
    } 
  }
}

elseif(isset($_POST['export_immunization_as_excel_admin'])){
  $correct_password = $_POST['correct_password'];
  $entered_password = $_POST['entered_password'];

 

  if($_POST['correct_password'] !==  $_POST['entered_password']){
    alert("Password is incorrect","admin/immunization.php");
  }
  else{
    ExportImmunizationAsExcel();
  }
  
}

// elseif(isset($_POST['export_archive_immunization_as_excel_admin'])){
//   ExportArchiveImmunizationAsExcel();
// }

elseif(isset($_POST['export_immunization_as_excel_nurse'])){
  $correct_password = $_POST['correct_password'];
  $entered_password = $_POST['entered_password'];

 

  if($_POST['correct_password'] !==  $_POST['entered_password']){
    alert("Password is incorrect","nurse/immunization.php");
  }
  else{
    ExportImmunizationAsExcel();
  }
}

elseif(isset($_POST['export_archive_immunization_as_excel_nurse'])){
  $correct_password = $_POST['correct_password'];
  $entered_password = $_POST['entered_password'];

 

  if($_POST['correct_password'] !==  $_POST['entered_password']){
    alert("Password is incorrect","nurse/archive.php");
  }
  else{
    ExportArchiveImmunizationAsExcel();
  }
}




?>