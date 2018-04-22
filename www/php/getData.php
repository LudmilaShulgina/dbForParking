<?php		
		$hello= $_GET[b];
		
		$query="SELECT*FROM spot WHERE building_id=0 AND section=1 AND number='$hello'";
             $select_spot=mysqli_query($link,$query);
             $spot=mysqli_fetch_array($select_spot);
            $id=$spot['id']; 
			$number=$spot['number'];
			$price=$spot ['price'];            
            $status=$spot['status'];
            $width=$spot['width'];			
?>	

		<script type="text/javascript">
			var id='<?=$id?>';
			var number='<?=$number?>';
			var price='<?=$price?>';
			var status='<?=$status?>';
			var width='<?=$width?>';
			var spotInfo= document.getElementById("spotInfo");
			
			
			
				
		if (status=="v")
		{
			//Блок рассчета количества ежемесячного взноса
			
				var d1= new Date(); 
				var d2= new Date(2019, 11, 31);// Декабрь 31
				var months;
				months = (d2.getFullYear() - d1.getFullYear()) * 12;
				
				months -= d1.getMonth() + 1;
				months += d2.getMonth();
				months <= 0 ? 0 : months;
				
				var rassum=((price-150000)/months).toFixed(2);
				console.log("Ежемесячный взнос"+rassum);
				
				spotInfo.innerHTML=
				"Выбрано место: "+ number+"<br>"+
				"Ширина "+width+"<br>"+
				"Цена места "+ price+" pуб.<br>";
				
				var info= document.getElementById("info");
				info.innerHTML= info.innerHTML+"<div class=\"button_wrap\"><div id=\"sale\"><h4>Скидки и акции</h4></div><div id=\"saleInfo\" style=\"display: none\">"+
				"<ul type=\"circle\" id=\"circle\"><li>Скидка 10% при единовременной оплате.<br> Стоимость места составит"+ price*0.9+ "</li>"+
				"<li>Рассрочка до конца 2019 года:<br> 150000 первый взнос, далее по "+rassum+" рублей в месяц</li>"+
				"<li>Дополнительная скидка 5% при повторной покупке</li>"+
				"</ul>"+
				"</div><div id=\"bron\"><h4>Заявка на бронь</h4></div></div>";
				var bron = document.getElementById("bron"); 
				
				$("#spotnumber").text("Номер  парковочного места: "+number);
				$("#spot_number").val(id);
				$("#spotwidth").text("Ширина: "+width);
				$("#spotprice").text("Полная стоимость: "+price);
				
		$(window).load(function () { 		
			var a = document.getElementById("imap"); 
			var svgDoc = a.contentDocument;
			console.log(svgDoc);
			var b=parseInt(number);
			var choise=svgDoc.getElementById(number); //get the inner element by id 
				//console.log(choise);	
				choise.setAttribute("class", "st0 choise");	
		});
		}
		else if(status=="s")
		{
			spotInfo.innerHTML="Место №"+number+" недоступно для покупки";
		}
		else
		{
			spotInfo.innerHTML="Пожалуйста выберите место на схеме";
		}
		</script>	