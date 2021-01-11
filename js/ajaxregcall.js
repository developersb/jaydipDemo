
$(document).ready(function(){   

	function getall()
	{

		$.ajax({
			
			data:{page:"select"},
			dataType: "json",
			type:"POST",
			url: "backend/controller.php",
			beforeSend: function()
			{
				console.log("loader before");
				$(".loadhide").css("display", "block");
				//return false;
			},
			success: function(dataResult){
						
					//console.log("dataResult");
					var shtm="";
					var response=dataResult;

							for(i=0;i<response.length;i++)
							{	
								
								shtm+="<tr>";
								shtm+="<td>"+response[i]['id']+"</td>";
								shtm+="<td>"+response[i]['firstname']+"</td>";
								shtm+="<td>"+response[i]['lastname']+"</td>";
								shtm+="<td>"+response[i]['username']+"</td>";
								shtm+="<td>"+response[i]['birthdate']+"</td>";
								shtm+="<td>"+response[i]['gender']+"</td>";
								shtm+="<td>"+response[i]['email']+"</td>";
								shtm+="<td>"+response[i]['password']+"</td>";
								shtm+="<td>"+response[i]['confirmpass']+"</td>";
								shtm+="<td>"+response[i]['country']+"</td>";
								shtm+="<td>"+response[i]['city']+"</td>";

								shtm+= "<td><a href='#addEmployeeModal' class='edit' data-toggle='modal'>";
								shtm+= "<i class='material-icons update' data-toggle='tooltip' ";
								shtm+="data-id="+response[i]['id']+" data-fname="+response[i]['firstname']+" data-lname="+response[i]['lastname']+" data-uname="+response[i]['username']+" data-bdate="+response[i]['birthdate']+" data-gender="+response[i]['gender']+" data-email="+response[i]['email']+" data-pass="+response[i]['password']+" data-cpass="+response[i]['confirmpass']+" data-country="+response[i]['country']+" data-city="+response[i]['city']+" title='Edit'></i> </a> </td>";
								shtm+="<td> <a href='#deleteEmployeeModal' class='delete' data-id="+response[i]['id']+" data-toggle='modal'><i class='material-icons' data-toggle='tooltip' "; 
								shtm+= "title='Delete'></i></a></td></tr>";

							}
							/*
								setTimeout(function() 
      		      					{ 
      		      						$("#displaydiv").load(" #displaydiv");
      		      					},1500);*/
      		      					setTimeout(function() 
      		      					{ 
      		      						//getmytemp();
      		      						$("#tabledata").html(shtm); 
      		      					},500);
			},
			complete:function(dataResult){
			    console.log("loader hide");
			    //$("#loader").css("display", "none");
			    $(".loadhide").css("display", "none");
			    //$("#loader").hide();
			   }
			
		});
	}


	function getmytemp()
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
	}

	// getmytemp();

	
	 $('#homemenu').on('click', function (e) 
    {
    	getall();
    });
	getall();

    //$("#menutodo").attr("href", "#");
 
    $('#formclose').on('click', function (e) 
    {
    	$('#loginform').trigger("reset");
    });

    $('#regclsform').on('click', function (e) 
    {
    	//$(this).find('#registration').reset();
    	 //$(this).find('#registration').trigger('reset');
    	//$("#registraion").reset();	
    	$("#registration").trigger("reset");
    });

     $("form[name='loginform']").validate({

			    rules: {

			      username: "required",
			      password: {
			        required: true,
			        minlength: 4
			      }
			    },
			 
			    messages: {
			      username: "Please enter username",
			      password: {
			        required: "Please provide a password",
			        minlength: "Your password must be at least 5 characters long"
			      }
      
    },
    submitHandler: function(form){
      //form.submit();
      			var logindata = $("#loginform").serialize();
      		    
      		      $.ajax({
      		      	
      		      	data:logindata,
      		      	type:4,
      		      	type: "POST",
      		      	dataType: "json",
      		      	url: "backend/controller.php",
      		      	success: function(dataResult){

      		      			//var htm="";
      		      			var lghtm="";
      		      			var response=dataResult;
      		      			if(response['invl']=="InvalidUser")
      		      			{
      		      				lghtm+="<p style='color:red'>Invalid Username or Password </p>";
      		      				$("#loginerr").html(lghtm);
      		      			}
      		      			else
      		      			{
      		      				 window.location="http://localhost/FinalDemo/index2.php";	
      		      			}		

      		      	}
      		      });


    }

  });


   


	$(document).on('click','.update',function(e) {
		
		$("#hdbtn").attr('value','2');
		$("#subbtn").attr('id', 'update'); 
		
		var id=$(this).attr("data-id");
		$('#id_d').val(id);

		/*	var id=$(this).attr("data-id");
		$('#id_d').val(id);*/
		var fname=$(this).attr("data-fname");
		var lname=$(this).attr("data-lname");
		var uname=$(this).attr("data-uname");
		var bdate=$(this).attr("data-bdate");
		var gend=$(this).attr("data-gender");
		var eml=$(this).attr("data-email");
		var pas=$(this).attr("data-pass");
		var cpas=$(this).attr("data-cpass");
		var cntr=$(this).attr("data-country");
		var cty=$(this).attr("data-city");
		


			$('#firstname').val(fname);
			$('#lastname').val(lname);
			$('#username').val(uname);
			$('#birthday').val(bdate);
			if(gend=='Male')
			{

				$("#mgender").prop("checked", true); 
			}
			else
			{
				/*console.log("selected female");*/
				$("#fgender").prop('checked', true); 
			}

			$("#country").val(cntr);
			$("#city").val(cty);
			$('#email').val(eml);
			$('#password').val(pas);
			$('#cpassword').val(cpas);

});
	
$(document).on('click','#loginbtn11',function(e)
{
	
});



	$(document).on('click','#update',function(e) {
		
		e.preventDefault();
		/*$("#update").attr('id','subbtn');*/
		var udata = $("#registration").serialize();
		$.ajax({
			
			data:udata,
			type:2,
			dataType:"json",
			id:$("#id_d").val(),
			type: "POST",
			url: "backend/controller.php",
			
			success: function(dataResult){
				
				var response=dataResult;
				/*console.log(response);*/
				//var nid=response['id'];
				var htm="";
				htm+="<tr class='tblrow' id="+response['id']+">";
				htm+="<td>"+response['id']+"</td>";
				htm+="<td>"+response['firstname']+"</td>";
				htm+="<td>"+response['lastname']+"</td>";
				htm+="<td>"+response['username']+"</td>";
				htm+="<td>"+response['birthdate']+"</td>";
				htm+="<td>"+response['gender']+"</td>";
				htm+="<td>"+response['email']+"</td>";
				htm+="<td>"+response['password']+"</td>";
				htm+="<td>"+response['confirmpass']+"</td>";
				htm+="<td>"+response['country']+"</td>";
				htm+="<td>"+response['city']+"</td>";

				htm+= "<td> <a href='#addEmployeeModal' class='edit' data-toggle='modal'>";
				htm+= "<i class='material-icons update' data-toggle='tooltip' ";
				htm+="data-id="+response['id']+" data-fname="+response['firstname']+" data-lname="+response['lastname']+" data-uname="+response['username']+" data-bdate="+response['birthdate']+" data-gender="+response['gender']+" data-email="+response['email']+" data-pass="+response['password']+" data-cpass="+response['confirmpass']+" data-country="+response['country']+" data-city="+response['city']+" title='Edit'></i> </a>";
				htm+="<a href='#deleteEmployeeModal' class='delete' data-id="+response['id']+" data-toggle='modal'><i class='material-icons' data-toggle='tooltip' "; 
				htm+= "title='Delete'></i></a> </td> </tr>";

				setTimeout(function() 
				{ 
						$(this).parent().remove();
						$(this).parent().replaceWith(htm);
						$('#addEmployeeModal').modal('hide');
						getall();
						//getmytemp();

						//$("#lgdisplayTable").load(" #lgdisplayTable");
						//$("#displayDiv").load(" #displayDiv");
						//$('#displaydiv').load(' #displaydiv');
						
				},600); 

					//getall();
			}	
		});
	});

	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
	});

	$(document).on("click", "#delete", function(e) { 
		e.preventDefault();
		var c_obj = $(this).parents("tr");
		$.ajax({
			url: "backend/controller.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){

					$(this).parent().remove();
					
					setTimeout(function() 
					{ 
						//getmytemp();
						$('#deleteEmployeeModal').modal('hide');
						getall();
					 //$("#displaydiv").load(" #displaydiv");
					 		//$("#tabledata").load(" #tabledata");
					},1000); 
					/*$('#displayTable').html(dataResult);
					*/
					/*$("#displayDiv").load("#displayDiv");*/
					/*$("#"+dataResult).remove();*/

				}
			});
	});

	
	$(document).on("click", "#logoutbtn", function() { 
		
		$.ajax({
			
			url: "backend/controller.php",
			type: "POST",
			data:{
				type:5,
			},
			success: function(dataResult){
					//setTimeout(function() 
					//{ 
					 	window.location="http://localhost/FinalDemo/index2.php";
					 	return false;
					 	//location.reload();

					//},1500); 

									//$('#loginModal').modal('hide');
				//getmytemp();	
				//$("#logoutbtn").attr("id", "menulogin");
				//$("#menulogin").attr("href", "#loginModal");
				//$("#menulogin").text('Login');
				//$("body").load(" index.php");
				//$("#displaydiv").load(" #displaydiv");
				
			}

			});

	});

		/*  $(document).ajaxStart(function(){
		    $("#loader").css("display", "block");
		  });

		  $(document).ajaxComplete(function(){
		    $("#loader").css("display", "none");
		  });*/
			

		        	 $('#btn').on('click', function (e) 
		            {
		            					     $(".loading").css("display", "block");
						        setTimeout(function () {
						          $(".loading").css("display", "none");
						        }, 6000);
		/*				     $("#loader").css("display", "block");
						        setTimeout(function () {
						          $("#loader").css("display", "none");
						        }, 6000);*/
		            });



	});