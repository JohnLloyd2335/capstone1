<?php 
require("database/database-config.php");
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
?>