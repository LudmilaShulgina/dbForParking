<html>
    <head>
        <title>1 и 2 очереди</title>
        <?php require_once("../php/MySiteDB.php");?>
		<link rel="stylesheet" type="text/css" href="../css/blog.css"> 
				
    </head>
    <body>
        <div class="menu">
            <button class="bmenu"><a href="../index.php">Главная страница</a></button>
            <button class="bmenu"><a href="../php/thirdBui.php">3 очередь</a></button>
            <button class="bmenu"><a href="../php/fothBui.php">4 очередь</a></button>            
        </div>    
        <h3>Парковочные места на стоянке по адресу Дунайский 7 к 7</h3>
        
        <?php
			$query="SELECT*FROM spot WHERE building_id=1 AND status='v'";
             $select_spot=mysqli_query($link,$query);
             while($spot=mysqli_fetch_array($select_spot))
		{
			echo $spot['number'],"<br>";
            echo $spot ['section'], "<br>";            
			echo $spot['price'],"<br>";
			echo $spot['status'],"<br>";
		}
		?>
    </body>
</html>