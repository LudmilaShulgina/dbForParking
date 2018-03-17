<html>
    <head>
        <title>Заявки</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/parking.css">  
        <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		<script src="http://yandex.st/jquery/1.5.0/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<div class="menu">
                            <button class="bmenu"><a href="../index.php">Главная страница</a></button>                       
			</div> 
		</header>
		<br>
		<table id="tableinfo">
		  <caption><h2>Заявки на бронирование парковочного места<h2></caption> 
		  <tr>
			<th colspan="2">Парковочное место</th>
			<th colspan="3">Контактные данные</th>
			<th colspan="3">Оплата</th>
			<th rowspan="2">Подписка на новости</th>
			<th rowspan="2">Действия</th>
		  </tr>
		  <tr>
			<th>Место</th>
			<th>Стоимость</th>
			
			<th>Имя</th>
			<th>Телефон</th>
			<th>E-mail</th>
			
			<th>Способ оплаты</th>
			<th>Повторная покупка</th>
			<th>Скидка</th>
		  </tr>
		  
		  
	
<?php
require_once("../php/MySiteDB.php");


$query_zayavki = "SELECT * FROM zayavki";   
         $select_zayavki=mysqli_query($link,$query_zayavki);
          while($zayavki=mysqli_fetch_array($select_zayavki))
                    {	
						//Вывести номер места, номер стоянки и адрес помещения.				
						//echo "<tr><td>",$zayavki['spot_id'],"</td><td></td>"; 
						$spotch=$zayavki['spot_id'];
						$query_spot = "SELECT number, section,building_id,price, status FROM spot WHERE id=$spotch";   
						$select_spot=mysqli_query($link,$query_spot);
						$spot=mysqli_fetch_array($select_spot);						
						//Вытаскиваем адрес объекта
						$buich=$spot['building_id'];
						$query_bui = "SELECT title FROM building WHERE id=$buich";   
						$select_bui=mysqli_query($link,$query_bui);
						$bui=mysqli_fetch_array($select_bui);
						echo "<tr class=\"bronch\"><td>мм №",$spot['number'],", секция ",$spot['section'],"<br>",$bui['title'],"</td><td>",$spot['price']," руб.</td>";
						
						echo "<td>",$zayavki['name'],"</td>";        
                        echo "<td id=\"tel\">",$zayavki['phone'],"</td>";
						echo "<td id=\"mail\">",$zayavki['mail'],"</td>";
						
						//echo $zayavki['how_call'] //Предпочтительный способ связи
						
                        if($zayavki['oplata']=='one')
						{
							//echo "<td>",$zayavki['oplata'],"</td>"; //Вывесли тип оплаты
							echo "<td>Единовременная</td>";
						}
						elseif($zayavki['oplata']=='ras')
						{
							echo "<td>Рассрочка до конца 2019 года</td>";
						}
						
						//Вывесли информацию повторная ли покупка
						if($zayavki['sec_buy']=='1')
						{
							//echo "<td>",$zayavki['sec_buy'],"</td>"; 
							echo "<td>Повторная покупка</td>";
						}
						else
						{
							echo "<td>-</td>";
						}
						
						//Вывесли % скидки
						//echo "<td>",$zayavki['sale_id'],"</td>";
						$salech=$zayavki['sale_id'];
						$query_sale = "SELECT saleName, saleValue FROM sale WHERE id = $salech";   
						$select_sale=mysqli_query($link,$query_sale);
						$sale=mysqli_fetch_array($select_sale);
						echo "<td>",$sale['saleValue'],"% </td>";
						
						//Вывесли подписку на новости
						//echo "<td>",$zayavki['news'],"</td>"; 
						if($zayavki['news']=='1')
						{
							//echo "<td>",$zayavki['sec_buy'],"</td>"; 
							echo "<td>Да</td>";
						}
						elseif($zayavki['news']=='')
						{
							echo "<td>Нет</td>";
						};
						$zayavka= $zayavki['id'];
						$status=$spot['status'];
						if($status=='s')
							{
								echo "<td>Бронь подтверждена<br><button class=\"red\"><a href=\"delete_zay.php?zayavka='$zayavka'\">Удалить заявку</a></button></td>";
								
							}
						else
							{
								echo "<td><button class=\"green\"><a href=\"edit_zay.php?zayavka='$zayavka'\">Подтвердить бронь</a></button><br><button class=\"red\" ><a href=\"delete_zay.php?zayavka='$zayavka'\">Удалить заявку</a></button></td>";
							}
						?>
               
			   <script type="text/javascript">
			   $(window).load(function () 
			   { 
			   var status='<?=$status?>';
			   console.log(status);
			   var zayavka='<?=$zayavka?>';
			   var bronch= document.getElementById('bronch');
			   if(status=='s')
			   {
				   
				   //bronch.innerHTML+=
				   "<td>Бронь подтверждена<br><button><a href=\"delete_zay.php?zayavka="+zayavka+"\">Удалить заявку</a></button></td></tr>";
			   }
			   else if(status=='v')
			   {
				   bronch.innerHTML+="<td><button><a href=\"edit_zay.php?zayavka="+zayavka+"\">Подтвердить бронь</a></button><br>"+
			   "<button><a href=\"delete_zay.php?zayavka="+zayavka+"\">Удалить заявку</a></button></td></tr>";
			   }
			   
			   });
			   </script>
			   
			 
<?php
};
?>
</table>
</body>
</html>