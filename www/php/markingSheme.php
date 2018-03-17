<?php		
			$query="SELECT*FROM spot WHERE building_id=2 AND section=1";
             $select_spot=mysqli_query($link,$query);
			 $number = array();
			 $price = array();
			 $status = array();
			 $width = array();
             while($spot=mysqli_fetch_array($select_spot))
			{
				$number=$spot['number'];
				$price=$spot ['price'];            
				$status=$spot['status'];
				$width=$spot['width'];	
			}
?>						

<script type="text/javascript">
			

$(window).load(function () { 

			var number='<?=$number?>';
			var price='<?=$price?>';
			var status='<?=$status?>';
			var width='<?=$width?>';
console.log(number);



var function Availible(){
	//цикл обнуляет все выделения
			for (var i = 1; i < 81; i++)
			{				
				var choise=svgDoc.getElementById(i);
				if
				choise.setAttribute("class", "st0");	
			};	
};
			 
			var a = document.getElementById("imap"); 
			var svgDoc = a.contentDocument;
			//svgDoc.addEventListener("click", modifyText, false);
			console.log(svgDoc);//get the inner DOM of districts.svg 
			Availible();
			$(svgDoc).click(function(event) {
							
                //var evob = event.target;
				//console.log(evob);
                var evid= event.target.id;
				var b=parseInt(evid);
				//console.log(typeof(b));
				//console.log(evid);
				
				var choise=svgDoc.getElementById(b); //get the inner element by id 
				//console.log(choise);	
				choise.setAttribute("class", "st0 choise");				
				//$(choise).css('fill', 'yellow');
				
				var spotInfo= document.getElementById("spotInfo");
				spotInfo.innerHTML="Выбрано место "+ b;
				
				//Передача номера парковочного места на сервер
				//Синхронный метод. Ассинхронный не получился
                                
				window.location.href = "http://triumph-parking.ru/php/thirdBui.php?"+b;
			});	
			});
</script>		 
		