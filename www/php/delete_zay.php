<?php
			require_once("../php/MySiteDB.php");
            require_once("./php/mysitedb.php");
            $zayavka_id = $_GET['zayavka'];
			//echo $zayavka_id;
            mysqli_select_db($link, $db);
            $query = "DELETE FROM zayavki WHERE id = $zayavka_id";
            $res = mysqli_query($link, $query);
			
		$backurl="../php/zayavki.php ";
		print "<script language='Javascript'><!-- 
					function reload() {location = \"$backurl\"}; setTimeout('reload()', 500); 
					//--></script> 					 
					$msg 					 
					<p>Заявка удалена! Подождите, сейчас вы будете перенаправлены обратно на страницу</p>";  
					exit; 	
			
			
			?>