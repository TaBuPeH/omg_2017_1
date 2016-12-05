/*document.addEventListener('DOMContentLoaded', function(){
	


	var ourDivs = document.querySelectorAll(".redDivCls");
	
	console.log(ourDivs);

	
	for(i=0; i<ourDivs.length; i++)
	{
		ourDivs[i].addEventListener('mouseenter',  function(){
			
			this.style.backgroundColor = 'blue';
			
		}  );

		ourDivs[i].addEventListener('mouseout',  function() {
			
			this.style.backgroundColor = 'green';
			
		}  );
	}

	
});*/

/*
$(document).ready(function(){
	
	
	var ourDivs = $('.redDivCls');
	
	ourDivs.on('mouseenter',function(){
		$(this).css({backgroundColor: 'blue'});
		$(this).animate({   
			opacity: 1,
		    width:100,
		    height: 100
		    }, 1000);
	});
	
	ourDivs.on('mouseout',function(){
		$(this).css({backgroundColor: 'green'});
		
		$(this).animate({   
			opacity: 0.25,
		    width:400,
		    height: 400
		    }, 1000);
	});
	
	
	
});*/


$(document).ready(function(){
	
	
	var ourDivs = $('.redDivCls');
	
	ourDivs.on('click',function(){
		
		$.get("terms.html",function(info){
			
			$('#terms').html(info);
			
		},'html');
		

		$(this).animate({   
			opacity: 0.25,
		    width:400,
		    height: 400
		    }, 1000,function(){ alert('s')});
		
	});
	
	
	
	
});