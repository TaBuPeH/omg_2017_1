var iztegleni = Array();


$(document).ready(function(){
	console.log(iztegleni);
	
	console.log(iztegleni.indexOf('test'));
	$('#draw').on('click', function(){
		
		if(iztegleni.length < 6)
		{
			var num = Math.floor(Math.random()*49) + 1 ;///  0 - 48.9999999; 1 - 49   0-48 // ceil// floor// round
			
			if(iztegleni.indexOf(num)< 0)
			{
				iztegleni.push(num);
				console.log(iztegleni);
				
				var currentIndex = iztegleni.indexOf(num);
				
				$('.number').eq(currentIndex).find('.content').html(num);
			}
			else
			{
				$('#draw').click();
			}
		}
	});
});



setInterval(function(){
	
	$('#draw').click();
	
},2000 );