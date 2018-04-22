			$(window).load(function () { 			
			var a = document.getElementById("imap");
			
			var svgDoc = a.contentDocument;
			for (var i = 0; i < num.length; i++)
				{	
					var c= num[i];
					
					var choise=svgDoc.getElementById(c);
				choise.setAttribute("class", "st1");
				};
				
			$(svgDoc).click(function(event) {
				for (var i = 0; i < num.length; i++)
				{	
					var c= num[i];
					
					var choise=svgDoc.getElementById(c);
					choise.setAttribute("class", "st1");										
				};
				var evid= event.target.id;
				var b=parseInt(evid);
				//console.log(typeof(b));
				console.log(evid);
				
				var choise=svgDoc.getElementById(b); //get the inner element by id 
				//console.log(choise);	
				choise.setAttribute("class", "st0 choise");				
				//$(choise).css('fill', 'yellow');
				
				var spotInfo= document.getElementById("spotInfo");
				spotInfo.innerHTML="Выбрано место "+ b;
				
				
				window.location.href = 'http://triumph-parking.ru/php/thirdBui.php?b='+b;
			});				
			});
			
