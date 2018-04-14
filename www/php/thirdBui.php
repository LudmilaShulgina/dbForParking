<html>
    <head>
        <title>3 очередь</title>
        <?php require_once("../php/MySiteDB.php");?>
        
		<link rel="stylesheet" type="text/css" href="../css/parking.css">
		<script src="https://code.jquery.com/jquery-2.1.1.js"></script>
                <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		<script src="http://yandex.st/jquery/1.5.0/jquery.min.js" type="text/javascript"></script>
                <script src="../js/markingSheme.js"></script>
                <script src="../js/Bron.js"></script>
		
    </head>
    <body>
		<!--Всплывающее окно-->
		<div id="overlay">  
		<div id="boxform">		
                    <form class="descr" class="popup" id='box' action="../php/send.php" method="post">
            <fieldset name="mybug">
                <legend>Контактная информация</legend>
                <label>Имя:</label><input type="text" class="box" id="firstname" name="firstname" required><span></span><br>
                <label>E-mail:</label><input type="email" id="email" class="box" name="email" required><span></span><br>
                <label>Телефон(заполняется без пробелов): </label><input type="tel"  class="box" id="tel" name="tel" required pattern="8[0-9]{10}" minlength="11" maxlength="11"><span></span><br>                
			</fieldset><br>
			<fieldset name="mybug">
                <legend>Паркинг</legend>
                <label id="spotnumber">Номер парковочного места:</label><input type="hidden" id="spot_number" name = "spot_number" /><br>
                <label id="spotwidth">Номер парковочного места:</label><br>
                <label id="spotprice">Полная стоимость:</label><br>
                <label>Способ оплаты:</label><br>
                <input type="radio" name="pay" value="Единовременная"><label>Единовременная</label><br>
                <input type="radio" name="pay" value="Рассрочка"><label>Рассрочка</label><br>
                <label>Повторная покупка</label>
                <input type="checkbox" name="sec_buy" value="1" /><br>                
			</fieldset><br>
			<fieldset name="mybug">
                <legend>Настройки уведомлений</legend>
                <label>Предпочтительный способ связи:</label><br>
                <input type="radio" name="call" value="Телефон"><label>Телефон:</label><br>
                <input type="radio" name="call" value="Email"><label>E-mail:</label><br>
                <label>Подписка на новости:</label>
                <input type="checkbox" name="subscribe" value="1" checked /><br>
			</fieldset>
            
            <input type="submit" class="submit" value="Отправить">            
            </form> 
			<button class="close" title="Закрыть" onclick="Closeform()">Закрыть</button>			
			</div>
						
       </div>
	   
	   <header>
			<div class="menu">
                            <button class="bmenu"><a href="../index.php">Главная страница</a></button>                       
			</div> 
		</header>
		<main>
                    <object data="../img/PK2_1sheme.svg" type="image/svg+xml" id="imap" width="70%" style="float: left"></object>
		<div id="info">
			<h4 style="padding:15px">
			Информация о парковочном месте:
			</h4>
			<div id="spotInfo">
				<p>
				Пожалуйста выберите место на схеме
				</p>
			</div>				
		</div>
		<!-- Эта часть кода принимает значения от БД и вставляет их в блок информации-->
		<?php require '../php/getData.php'; ?>		
			
		</main>
	</body>
</html>		

<?php		
			$query="SELECT*FROM spot WHERE building_id=0 AND section=1 AND status='v'";
             $select_spot=mysqli_query($link,$query);
			 $number = array();
			 $price = array();
			 $status = array();
			 $width = array();
             while($spot=mysqli_fetch_array($select_spot))
			{
				$id=$spot['id']; 
				$number[]=$spot['number'];
				$price[]=$spot ['price'];            
				$status[]=$spot['status'];
				$width[]=$spot['width'];	
			}
?>	
<script type="text/javascript">
			var num = <?php echo json_encode($number) ?>;
			//var number='<?=$number?>';
			//var price='<?=$price?>';
			//var status='<?=$status?>';
			//var width='<?=$width?>';
			//console.log(num);
			
</script>
