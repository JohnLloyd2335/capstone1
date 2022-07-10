<?php 
require("../database/database-config.php");
 if (isset($_POST['vaccine_category_id'])) {
 	$query = "SELECT * FROM vaccine where vaccine_category_id=".$_POST['vaccine_category_id'];
 	$result = $sqlConn->query($query);
 	if ($result->num_rows > 0 ) {
 		 while ($row = $result->fetch_assoc()) {
 		 	echo '<option value='.$row['vaccine_id'].'>'.$row['vaccine_name'].'</option>';
 		 }
 	}else{
 		echo '<option>No Vaccine Found</option>';
 	}

 }




?>