<?php
			require_once("../php/MySiteDB.php");
            require_once("../php/mysitedb.php");
            $zayavka_id = $_GET['zayavka'];
			echo $zayavka_id;
			
			$query_spot = "SELECT spot_id FROM zayavki WHERE id = $zayavka_id";  
			$select_spot=mysqli_query($link,$query_spot);
			$spot=mysqli_fetch_array($select_spot);
			//echo $spot['spot_id'];
			$spotch= $spot['spot_id'];
			
			$query="SELECT*FROM spot WHERE id=$spotch";
            $result=mysqli_query($link,$query);
            $edit_spot=mysqli_fetch_array($result);
			$update_query="UPDATE spot SET status='s' WHERE id=$spotch";
			$update_result = mysqli_query ($link, $update_query);
			
			$backurl="../php/zayavki.php";
			print "<script language='Javascript'><!-- 
					function reload() {location = \"$backurl\"}; setTimeout('reload()', 2000); 
					//--></script> 					 
					$msg 					 
					<p>Заявка подтверждена! Подождите, сейчас вы будете перенаправлены обратно на страницу</p>";  
					exit; 	
			
?>