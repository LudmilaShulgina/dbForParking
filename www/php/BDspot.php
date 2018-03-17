<html>
    <head>
        <title>Добавление в базу новых мест</title>
        <?php ?>		      
    </head>
	<body>
	</body>
</html>
         <?php
		 require_once("../php/MySiteDB.php");
		 
		/* $query= "INSERT INTO spot (id, number, section, building_id, price, status)
		VALUES(NULL, '$number', 1, 2, '$price', '$status')";
		*/
		$query= "INSERT INTO spot (id, number, section, building_id, price, status)
		VALUES(NULL, 1, 1, 2, 1500000, 'v')";
		$result=mysqli_query($link,$query);
		
		$query= "INSERT INTO spot (id, number, section, building_id, price, status)
		VALUES(NULL, 2, 1, 2, 1500000, 'v')";
		$result=mysqli_query($link,$query);
		
		
		
		?> 
    