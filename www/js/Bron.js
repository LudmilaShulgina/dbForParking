//$(window).load(function () { 
//$(bron).click(function() {
	


	
	$(document).ready(function() { 
	  $("#bron").click(function() { 
		// Отображаем скрытый блок 
		$("#overlay").fadeIn(); // fadeIn - плавное появление
		return false; // не производить переход по ссылке
		
		
	  }               
	); // end of ready() 
                
	

	//});	
$(sale).click(function() {
	
	console.log("nice");
	display = document.getElementById("saleInfo").style.display;

    if(display=='none'){
       document.getElementById("saleInfo").style.display='block';
    }
	else{
       document.getElementById("saleInfo").style.display='none';
    }

			});				
});
		function Closeform() {  
	  $("#email, #tel, #firstname").removeAttr("required");
	  document.getElementById('overlay').style.display='none';
	 
		};