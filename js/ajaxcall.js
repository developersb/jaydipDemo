
$(document).ready(function()
{  
	
	$.ajax({  	     
		type: "GET",
		url:"gettemp.php",
		success: function(dataResult)
		{	
			$("#citywt").html(dataResult['mydatas'].name);
			$("#temp").html(dataResult['mydatas']['main'].temp);
			$("#desc").html(dataResult['mydatas'].weather[0].description);
			$("#wspd").html(dataResult['mydatas'].wind.speed);
		}
	});

	$(document).on('click', '#imgbtn', function() {

		$.ajax({  	     

			type:"POST",
			url:"getimage.php",

			success: function(dataResult)
			{	
	       	//console.log(dataResult);
	       	$("#myimage").attr("src",dataResult);
	       }

	   });
	});
});

