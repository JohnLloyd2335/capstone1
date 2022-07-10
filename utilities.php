<?php
require("database/database-config.php");
function alert($message,$location){
    echo "
        <script type='text/javascript'>
            alert('$message');
            window.location='$location'
        </script>
    ";
}
function getActiveUserInfo($user_name){
    require("database/database-config.php");
    $selectActiveUser = $sqlConn->query("SELECT * FROM users INNER JOIN user_category ON users.user_id = user_category.user_id WHERE user_name='$user_name' LIMIT 1;");
    while($activeUserInfo = $selectActiveUser->fetch_assoc()):
        $activeUserId = $activeUserInfo['user_id'];
        $activeUserName = $activeUserInfo['user_name'];
        $activeUserFirstName = $activeUserInfo['first_name'];
        $activeUserMiddleName = $activeUserInfo['middle_name'];
        $activeUserLastName = $activeUserInfo['last_name'];
        $activeUserDOB = $activeUserInfo['dob'];
        $activeUserAge = $activeUserInfo['age'];
        $activeUserGender = $activeUserInfo['gender'];
        $activeUserImg = $activeUserInfo['profile_img'];
        $activeUserCategory = $activeUserInfo['user_type'];
        return array('activeUserId'=>$activeUserId,'activeUserName'=>$activeUserName,'activeUserFirstName'=>$activeUserFirstName,'activeUserMiddleName'=>$activeUserMiddleName,'activeUserLastName'=>$activeUserLastName,'activeUserDOB'=>$activeUserDOB,'activeUserAge'=>$activeUserAge,'activeUserGender'=>$activeUserGender,'activeUserImg'=>$activeUserImg,'activeUserCategory'=>$activeUserCategory);
    endwhile;

}
function AdminDestroySession(){
    session_start();
    unset($_SESSION["admin-logged-in-user"]);
    unset($_SESSION["admin-logged-in-password"]);
    header("Location: index.php");
}
function AdminCheckSession(){
    session_start();
    if(isset($_SESSION["admin-logged-in-user"]) && $_SESSION["admin-logged-in-user"] == 1) {

    } else if(!isset($_SESSION["admin-logged-in-user"]) || (isset($_SESION['admin-logged-in-user']) && $_SESSION["admin-logged-in-user"] == 0)){
       
        alert("Session Expired","../index.php");
    }
}

function NurseDestroySession(){
    session_start();
    unset($_SESSION["nurse-logged-in-user"]);
    unset($_SESSION["nurse-logged-in-password"]);
    header("Location: index.php");
}
function NurseCheckSession(){
    session_start();
    if(isset($_SESSION["nurse-logged-in-user"]) && $_SESSION["nurse-logged-in-user"] == 1) {

    } else if(!isset($_SESSION["nurse-logged-in-user"]) || (isset($_SESION['nurse-logged-in-user']) && $_SESSION["nurse-logged-in-user"] == 0)){
       
        alert("Session Expired","../index.php");
    }
}

function BHWDestroySession(){
    session_start();
    unset($_SESSION["bhw-logged-in-user"]);
    unset($_SESSION["bhw-logged-in-password"]);
    header("Location: index.php");
}
function BHWCheckSession(){
    session_start();
    if(isset($_SESSION["bhw-logged-in-user"]) && $_SESSION["bhw-logged-in-user"] == 1) {

    } else if(!isset($_SESSION["bhw-logged-in-user"]) || (isset($_SESION['bhw-logged-in-user']) && $_SESSION["bhw-logged-in-user"] == 0)){
       
        alert("Session Expired","../index.php");
    }
}
function getLastId($sql_db_name,$table){
    require("database/database-config.php");
    $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$sql_db_name' AND TABLE_NAME = '$table'";
    $results = $sqlConn->query($sql);
    while($row = $results->fetch_assoc()) {
        $next_increment = $row['AUTO_INCREMENT'];
    }
    return $next_increment;
}

function ExportImmunizationAsExcel(){
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d h:i:sa");
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=immunization_list.$date.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require("database/database-config.php");
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					<th>Immunization ID</th>
					<th>Immunization Category ID</th>
					<th>Vaccine Category ID</th>
					<th>Vaccine ID</th>
					<th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Mothers Name</th>
                    <th>Fathers Name</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>Sex</th>
                    <th>Vaccine</th>
                    <th>Dose(s)</th>
                    <th>Dose(s) Received</th>
                    <th>Remarks</th>
                    <th>Date Recorded</th>
				</tr>
			<tbody>
	";
 
	$query = $sqlConn->query("SELECT * FROM immunization");
	while($fetch = $query->fetch_array()){
 
	$output .= "
				<tr>
					<td>".$fetch['immunization_id']."</td>
					<td>".$fetch['immunization_category_id']."</td>
					<td>".$fetch['vaccine_category_id']."</td>
					<td>".$fetch['vaccine_id']."</td>
					<td>".$fetch['first_name']."</td>
                    <td>".$fetch['middle_name']."</td>
                    <td>".$fetch['last_name']."</td>
                    <td>".$fetch['age']."</td>
                    <td>".$fetch['dob']."</td>
                    <td>".$fetch['pob']."</td>
                    <td>".$fetch['address']."</td>
                    <td>".$fetch['contact_no']."</td>
                    <td>".$fetch['m_full_name']."</td>
                    <td>".$fetch['f_full_name']."</td>
                    <td>".$fetch['weight']."</td>
                    <td>".$fetch['height']."</td>
                    <td>".$fetch['sex']."</td>
                    <td>".$fetch['vaccine']."</td>
                    <td>".$fetch['doses']."</td>
                    <td>".$fetch['doses_received']."</td>
                    <td>".$fetch['remarks']."</td>
                    <td>".$fetch['date_recorded']."</td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
}

function ExportArchiveImmunizationAsExcel(){
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d h:i:sa");
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=immunization_archive_list.$date.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require("database/database-config.php");
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
                    <th>Archive ID</th>
					<th>Immunization Category ID</th>
                    <th>Immunization ID</th>
					<th>Vaccine Category ID</th>
					<th>Vaccine ID</th>
					<th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Mothers Name</th>
                    <th>Fathers Name</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>Sex</th>
                    <th>Vaccine</th>
                    <th>Dose(s)</th>
                    <th>Dose(s) Received</th>
                    <th>Remarks</th>
                    <th>Date Recorded</th>
				</tr>
			<tbody>
	";
 
	$query = $sqlConn->query("SELECT * FROM archive");
	while($fetch = $query->fetch_array()){
 
	$output .= "
				<tr>
                    <td>".$fetch['archive_id']."</td>
					<td>".$fetch['immunization_category_id']."</td>
                    <td>".$fetch['immunization_id']."</td>
					<td>".$fetch['vaccine_category_id']."</td>
					<td>".$fetch['vaccine_id']."</td>
					<td>".$fetch['first_name']."</td>
                    <td>".$fetch['middle_name']."</td>
                    <td>".$fetch['last_name']."</td>
                    <td>".$fetch['age']."</td>
                    <td>".$fetch['dob']."</td>
                    <td>".$fetch['pob']."</td>
                    <td>".$fetch['address']."</td>
                    <td>".$fetch['contact_no']."</td>
                    <td>".$fetch['m_full_name']."</td>
                    <td>".$fetch['f_full_name']."</td>
                    <td>".$fetch['weight']."</td>
                    <td>".$fetch['height']."</td>
                    <td>".$fetch['sex']."</td>
                    <td>".$fetch['vaccine']."</td>
                    <td>".$fetch['doses']."</td>
                    <td>".$fetch['doses_received']."</td>
                    <td>".$fetch['remarks']."</td>
                    <td>".$fetch['date_recorded']."</td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
}


  

  //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables
  function Export_Database($host,$user,$pass,$name,  $tables=false,$backup_name,$db_name)
  {
    //ENTER THE RELEVANT INFO BELOW
  

      $mysqli = new mysqli($host,$user,$pass,$name);
      $mysqli->select_db($name);
      $mysqli->query("SET NAMES 'utf8'");

      $queryTables    = $mysqli->query('SHOW TABLES');
      while($row = $queryTables->fetch_row())
      {
          $target_tables[] = $row[0];
      }
      if($tables !== false)
      {
          $target_tables = array_intersect( $target_tables, $tables);
      }
      foreach($target_tables as $table)
      {
          $result         =   $mysqli->query('SELECT * FROM '.$table);
          $fields_amount  =   $result->field_count;
          $rows_num=$mysqli->affected_rows;
          $res            =   $mysqli->query('SHOW CREATE TABLE '.$table);
          $TableMLine     =   $res->fetch_row();
          $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

          for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0)
          {
              while($row = $result->fetch_row())
              { //when started (and every after 100 command cycle):
                  if ($st_counter%100 == 0 || $st_counter == 0 )
                  {
                          $content .= "\nINSERT INTO ".$table." VALUES";
                  }
                  $content .= "\n(";
                  for($j=0; $j<$fields_amount; $j++)
                  {
                      $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) );
                      if (isset($row[$j]))
                      {
                          $content .= '"'.$row[$j].'"' ;
                      }
                      else
                      {
                          $content .= '""';
                      }
                      if ($j<($fields_amount-1))
                      {
                              $content.= ',';
                      }
                  }
                  $content .=")";
                  //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                  if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num)
                  {
                      $content .= ";";
                  }
                  else
                  {
                      $content .= ",";
                  }
                  $st_counter=$st_counter+1;
              }
          } $content .="\n\n\n";
      }
      //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
      
      header('Content-Type: application/octet-stream');
      header("Content-Transfer-Encoding: Binary");
      header("Content-disposition: attachment; filename=\"".$backup_name."\"");
      echo $content; exit;
  }



    //Monthly Infant Immunization 2022
    $InfantqueryJan2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=1 AND immunization_category_id=1");

    $InfantJan2022Rows = $InfantqueryJan2022->num_rows;
    


    $InfantqueryFeb2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=2 AND immunization_category_id=1");

    $InfantFeb2022Rows = $InfantqueryFeb2022 ->num_rows;
    


    $InfantqueryMar2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=3 AND immunization_category_id=1");

    $InfantMar2022Rows = $InfantqueryMar2022->num_rows;
    

    $InfantqueryApr2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=4 AND immunization_category_id=1");

    $InfantApr2022Rows = $InfantqueryApr2022->num_rows;
    

    $InfantqueryMay2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=5 AND immunization_category_id=1");

    $InfantMay2022Rows = $InfantqueryMay2022->num_rows;
    

    $InfantqueryJun2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=6 AND immunization_category_id=1");

    $InfantJun2022Rows = $InfantqueryJun2022->num_rows;
    

    $InfantqueryJul2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=7 AND immunization_category_id=1");

    $InfantJul2022Rows = $InfantqueryJul2022->num_rows;
    

    $InfantqueryAug2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=8 AND immunization_category_id=1");

    $InfantAug2022Rows = $InfantqueryAug2022->num_rows;
    

    $InfantquerySep2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=9 AND immunization_category_id=1");

    $InfantSep2022Rows = $InfantquerySep2022->num_rows;
    

    $InfantqueryOct2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=10 AND immunization_category_id=1");

    $InfantOct2022Rows = $InfantqueryOct2022->num_rows;
    

    $InfantqueryNov2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=11 AND immunization_category_id=1");

    $InfantNov2022Rows = $InfantqueryNov2022->num_rows;
    

    $InfantqueryDec2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=12 AND immunization_category_id=1");

    $InfantDec2022Rows = $InfantqueryDec2022->num_rows;
    //

    //Monthly School Aged Children Immunization 2022
    $SchoolAgedChildrenqueryJan2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=1 AND immunization_category_id=2");

    $SchoolAgedChildrenJan2022Rows = $SchoolAgedChildrenqueryJan2022->num_rows;
    
   
   
    $SchoolAgedChildrenqueryFeb2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=2 AND immunization_category_id=2");
   
    $SchoolAgedChildrenFeb2022Rows = $SchoolAgedChildrenqueryFeb2022 ->num_rows;
    
   
   
    $SchoolAgedChildrenqueryMar2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=3 AND immunization_category_id=2");
   
    $SchoolAgedChildrenMar2022Rows = $SchoolAgedChildrenqueryMar2022->num_rows;
    
   
    $SchoolAgedChildrenqueryApr2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=4 AND immunization_category_id=2");
   
    $SchoolAgedChildrenApr2022Rows = $SchoolAgedChildrenqueryApr2022->num_rows;
    
   
    $SchoolAgedChildrenqueryMay2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=5 AND immunization_category_id=2");
   
    $SchoolAgedChildrenMay2022Rows = $SchoolAgedChildrenqueryMay2022->num_rows;
    
   
    $SchoolAgedChildrenqueryJun2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=6 AND immunization_category_id=2");
   
    $SchoolAgedChildrenJun2022Rows = $SchoolAgedChildrenqueryJun2022->num_rows;
    
   
    $SchoolAgedChildrenqueryJul2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=7 AND immunization_category_id=2");
   
    $SchoolAgedChildrenJul2022Rows = $SchoolAgedChildrenqueryJul2022->num_rows;
    
   
    $SchoolAgedChildrenqueryAug2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=8 AND immunization_category_id=2");
   
    $SchoolAgedChildrenAug2022Rows = $SchoolAgedChildrenqueryAug2022->num_rows;
    
   
    $SchoolAgedChildrenquerySep2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=9 AND immunization_category_id=2");
   
    $SchoolAgedChildrenSep2022Rows = $SchoolAgedChildrenquerySep2022->num_rows;
    
   
    $SchoolAgedChildrenqueryOct2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=10 AND immunization_category_id=2");
   
    $SchoolAgedChildrenOct2022Rows = $SchoolAgedChildrenqueryOct2022->num_rows;
    
   
    $SchoolAgedChildrenqueryNov2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=11 AND immunization_category_id=2");
   
    $SchoolAgedChildrenNov2022Rows = $SchoolAgedChildrenqueryNov2022->num_rows;
    
   
    $SchoolAgedChildrenqueryDec2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=12 AND immunization_category_id=2");
   
    $SchoolAgedChildrenDec2022Rows = $SchoolAgedChildrenqueryDec2022->num_rows;
    //
    
    //Monthly Pregnant Immunization 2022
    $PregnantqueryJan2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=1 AND immunization_category_id=3");

    $PregnantJan2022Rows = $PregnantqueryJan2022->num_rows;
    


    $PregnantqueryFeb2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=2 AND immunization_category_id=3");

    $PregnantFeb2022Rows = $PregnantqueryFeb2022 ->num_rows;
    


    $PregnantqueryMar2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=3 AND immunization_category_id=3");

    $PregnantMar2022Rows = $PregnantqueryMar2022->num_rows;
    

    $PregnantqueryApr2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=4 AND immunization_category_id=3");

    $PregnantApr2022Rows = $PregnantqueryApr2022->num_rows;
    

    $PregnantqueryMay2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=5 AND immunization_category_id=3");

    $PregnantMay2022Rows = $PregnantqueryMay2022->num_rows;
    

    $PregnantqueryJun2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=6 AND immunization_category_id=3");

    $PregnantJun2022Rows = $PregnantqueryJun2022->num_rows;
    

    $PregnantqueryJul2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=7 AND immunization_category_id=3");

    $PregnantJul2022Rows = $PregnantqueryJul2022->num_rows;
    

    $PregnantqueryAug2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=8 AND immunization_category_id=3");

    $PregnantAug2022Rows = $PregnantqueryAug2022->num_rows;
    

    $PregnantquerySep2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=9 AND immunization_category_id=3");

    $PregnantSep2022Rows = $PregnantquerySep2022->num_rows;
    

    $PregnantqueryOct2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=10 AND immunization_category_id=3");

    $PregnantOct2022Rows = $PregnantqueryOct2022->num_rows;
    

    $PregnantqueryNov2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=11 AND immunization_category_id=3");

    $PregnantNov2022Rows = $PregnantqueryNov2022->num_rows;
    

    $PregnantqueryDec2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=12 AND immunization_category_id=3");

    $PregnantDec2022Rows = $PregnantqueryDec2022->num_rows;
    //

    //Monthly Adult Immunization 2022
    $AdultqueryJan2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=1 AND immunization_category_id=4");

    $AdultJan2022Rows = $AdultqueryJan2022->num_rows;
    


    $AdultqueryFeb2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=2 AND immunization_category_id=4");

    $AdultFeb2022Rows = $AdultqueryFeb2022 ->num_rows;
    


    $AdultqueryMar2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=3 AND immunization_category_id=4");

    $AdultMar2022Rows = $AdultqueryMar2022->num_rows;
    

    $AdultqueryApr2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=4 AND immunization_category_id=4");

    $AdultApr2022Rows = $AdultqueryApr2022->num_rows;
    

    $AdultqueryMay2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=5 AND immunization_category_id=4");

    $AdultMay2022Rows = $AdultqueryMay2022->num_rows;
    

    $AdultqueryJun2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=6 AND immunization_category_id=4");

    $AdultJun2022Rows = $AdultqueryJun2022->num_rows;
    

    $AdultqueryJul2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=7 AND immunization_category_id=4");

    $AdultJul2022Rows = $AdultqueryJul2022->num_rows;
    

    $AdultqueryAug2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=8 AND immunization_category_id=4");

    $AdultAug2022Rows = $AdultqueryAug2022->num_rows;
    

    $AdultquerySep2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=9 AND immunization_category_id=4");

    $AdultSep2022Rows = $AdultquerySep2022->num_rows;
    

    $AdultqueryOct2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=10 AND immunization_category_id=4");

    $AdultOct2022Rows = $AdultqueryOct2022->num_rows;
    

    $AdultqueryNov2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=11 AND immunization_category_id=4");

    $AdultNov2022Rows = $AdultqueryNov2022->num_rows;
    

    $AdultqueryDec2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=12 AND immunization_category_id=4");

    $AdultDec2022Rows = $AdultqueryDec2022->num_rows;
    //

    //Monthly Senior Citizen Immunization 2022
    $SeniorqueryJan2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=1 AND immunization_category_id=5");

    $SeniorJan2022Rows = $SeniorqueryJan2022->num_rows;
    
   
   
    $SeniorqueryFeb2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=2 AND immunization_category_id=5");
   
    $SeniorFeb2022Rows = $SeniorqueryFeb2022 ->num_rows;
    
   
   
    $SeniorqueryMar2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=3 AND immunization_category_id=5");
   
    $SeniorMar2022Rows = $SeniorqueryMar2022->num_rows;
    
   
    $SeniorqueryApr2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=4 AND immunization_category_id=5");
   
    $SeniorApr2022Rows = $SeniorqueryApr2022->num_rows;
    
   
    $SeniorqueryMay2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=5 AND immunization_category_id=5");
   
    $SeniorMay2022Rows = $SeniorqueryMay2022->num_rows;
    
   
    $SeniorqueryJun2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=6 AND immunization_category_id=5");
   
    $SeniorJun2022Rows = $SeniorqueryJun2022->num_rows;
    
   
    $SeniorqueryJul2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=7 AND immunization_category_id=5");
   
    $SeniorJul2022Rows = $SeniorqueryJul2022->num_rows;
    
   
    $SeniorqueryAug2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=8 AND immunization_category_id=5");
   
    $SeniorAug2022Rows = $SeniorqueryAug2022->num_rows;
    
   
    $SeniorquerySep2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=9 AND immunization_category_id=5");
   
    $SeniorSep2022Rows = $SeniorquerySep2022->num_rows;
    
   
    $SeniorqueryOct2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=10 AND immunization_category_id=5");
   
    $SeniorOct2022Rows = $SeniorqueryOct2022->num_rows;
    
   
    $SeniorqueryNov2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=11 AND immunization_category_id=5");
   
    $SeniorNov2022Rows = $SeniorqueryNov2022->num_rows;
    
   
    $SeniorqueryDec2022 = $sqlConn->query("SELECT * FROM immunization WHERE YEAR(date_recorded)=2022 AND MONTH(date_recorded)=12 AND immunization_category_id=5");
   
    $SeniorDec2022Rows = $SeniorqueryDec2022->num_rows;
    //


    





