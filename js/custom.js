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


	   load_data(1);

	   function load_data(page, query = '')
	   {
	     $.ajax({
      	      
	       data: {page:page, query:query},
	       dataType: "json",
	       type: "POST",
	  	   url: "api/index.php/fetchalldata",
	  	   beforeSend: function()
			{
				console.log("loader before cust");
				$(".loadhide").css("display", "block");
								//return false;
			},
	       success: function(dataResult)
	       {	
	       		var html="";
	       		html=dataResult["output"];
	       		//console.log(dataResult);		
	       		setTimeout(function() 
				{ 
					$("#dynamicdata").html(html);
					//$("#displayDiv").load(" #displayDiv");
				},1000); 
				$(".loadhide").css("display", "none");	
	       },
			complete:function(dataResult){
			    console.log("loader hide cust");
				
			    //$("#loader").hide();
			   }

	     });
	   }

	

	   $(document).on('click', '.page-link', function(){
	     var page = $(this).data('page_number');
	     var query = $('#search_box').val();
	     load_data(page, query);
	   });

	   $('#search_box').keyup(function(){
	     var query = $('#search_box').val();
	     load_data(1, query);
	   });

		$(document).on('click', '#select_all', function() {          	
			$(".emp_checkbox").prop("checked", this.checked);
		});


		$(document).on("click", "#logoutbtn", function() { 
		
		$.ajax({
			
			url: "backend/controller.php",
			type: "POST",
			data:{
				type:5,
			},
			success: function(dataResult){

				
				//$('#loginModal').modal('hide');	
				//$("#logoutbtn").attr("id", "menulogin");
				//$("#menulogin").attr("href", "#loginModal");
				//$("#menulogin").text('Login');
				$("#dynamicdata").html('');
				// setTimeout(function() 
				//	{ 
					 	window.location="http://localhost/FinalDemo/index2.php";
					 	return false;
					 	//location.reload();

					//},1500); 
				//$("html").load("index.php");
				//$("#displayDiv").load(" #displayDiv");
				
			}

			});

		});



/*		$('#addEmployeeModal').on('.close', function () {
		    $(this).find('form').trigger('reset');
		})*/
/*	$('#addEmployeeModal').on('hidden.bs.modal', function () {
	    $('#addEmployeeModal form')[0].reset();
	});*/

/*	$(document).on('click','#subbtn',function(e) {
		
		var data = $("#registration").serialize();
		$.ajax({
			url:"api/index.php/insertdata",
			type:"POST",
			data:data,

			success: function(dataResult){
				$('#addTask').modal('hide');

				//$("#registration").reset();
				setTimeout(function() 
				{ 
					load_data(1);
				    //$("#displayDiv").load(" #displayDiv");
				},1000); 	
			}
		});  
	});
*/

	        $("#taskname").on("keydown keyup change", function(){
          var value = $(this).val();
          if (value.length > 20)
            $("#tname").text("Firstname is too long!");
          else
            $("#tname").text("");
        });


	        /*var startDt=$("#startdate").value;
	        var endDt=$("#duedate").value;

	        if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
	        {
	        		return false;
	        }*/



        $.validator.addMethod("checkdate", function(value, element) 
        {
        	var startDt=$("#startdate").val();
        	var endDt=$("#duedate").val();

        	//console.log(startdate);
          	        if(new Date(startDt) >= new Date(endDt))
          	        {
          	        	//console.log("okkk");
          	        		return false;
          	        }
          	        else
          	        {
          	        	return true;
          	        		//console.log("noo ok");
          	        }
        });

        /*$("form[name='registration']").validate({*/

          //$("#registration").submit(function(e) {
          
          $("form[name='registrationtsk']").submit(function(e) {
              e.preventDefault();
          }).validate({

          rules:
          {

            taskname:"required", 
            startdate:"required",
            duedate:{required:true, checkdate:true},
            priority:"required",
            statussel:"required",
            'assignppl[]':{ required:true },
          },

          messages: 
          {
            taskname:{
                 required: "Please enter your Task"
            },
            startdate:{
              required:"Please enter startdate",
              /*checkYear: "Check valid year 2000-Current Year"*/
            },
            duedate:{
              required:"Please enter duedate",
              checkdate: "Enter Valid-date"
            },
            priority:{
              required:"Please enter duedate",
              /*checkYear: "Check valid year 2000-Current Year"*/
            },
             statussel:{
              required:"Please enter status",
              /*checkYear: "Check valid year 2000-Current Year"*/
            },
            'assignppl[]':"Please Assign People",

          },


          submitHandler: function(form) 
          { 
       
           var data = $("#registrationtsk").serialize();
           		$.ajax({
           			url:"api/index.php/insertdata",
           			type:"POST",
           			data:data,

           			success: function(dataResult){
           				$('#addTask').modal('hide');

           				//$("#registration").reset();
           				setTimeout(function() 
           				{ 
           					load_data(1);
           				    //$("#displayDiv").load(" #displayDiv");
           				},1000); 	
           			}
           		});  

            }


        });  




	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
	});

	$(document).on("click", "#delete", function() { 
		/*e.preventDefault();*/
		//var c_obj = $(this).parents("tr");
		$.ajax({
			url: "api/index.php/deletedata",
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
						$('#deleteEmployeeModal').modal('hide');
						load_data(1);
						//getalldata();
					    //$("#displayDiv").load(" #displayDiv");
					 
					},1000); 
					/*$('#displayTable').html(dataResult);
					*/
					/*$("#displayDiv").load("#displayDiv");*/
					/*$("#"+dataResult).remove();*/

				}
			});
	});

	$(document).on('click','.update',function(e) {
		
		$("#hdbtn").attr('value','2');
		$("#subbtn").attr('id', 'update'); 
		
		var id=$(this).attr("data-id");
		$('#id_d').val(id);

		/*	var id=$(this).attr("data-id");
		$('#id_d').val(id);*/
		//var tname=$(this).attr("data-tname");
		var tname=$(this).attr("data-tname");
		var sdate=$(this).attr("data-sdate");
		var ddate=$(this).attr("data-duedate");
		var priot=$(this).attr("data-prt");
		var asppl=$(this).attr("data-asgnpl");
		var stats=$(this).attr("data-sts");	

		var str =tname;
		console.log(tname);
		var replaced = str.split('_').join(' ');
		console.log(replaced);
		//console.log(asppl);
		var test=asppl;
		var testArray = test.split(',');
		

		$('#taskname').val(replaced);
		$('#startdate').val(sdate);
		$('#duedate').val(ddate);
		$('#priority').val(priot);
		$('#assignppl').val(testArray);
		$('#statusel').val(stats);
		
	});

	$(document).on('click','#update',function(e) {
		
		/*$("#update").attr('id','subbtn');*/
		var udata = $("#registration").serialize();
		$.ajax({
			
			data:{
				type:2,
				id:$("#id_d").val()
			},
			data:udata,
			dataType: "json",
			type: "POST",
			url: "api/index.php/updatedata",
			
			success: function(dataResult){
				//$("#registration").reset();
				var response=dataResult;
					var html="";
					html+="<tr class='tblrow' id="+response['id']+">";
					html+="<td>"+response['id']+"</td>";
					html+="<td>"+response['taskname']+"</td>";
					html+="<td>"+response['startdate']+"</td>";
					html+="<td>"+response['duedate']+"</td>";
					html+="<td>"+response['priority']+"</td>";
					html+="<td>"+response['asignpeople']+"</td>";
					html+="<td>"+response['status']+"</td>";

					html+= "<td> <a href='#addTask' class='edit' data-toggle='modal'>";
					html+= "<i class='material-icons update' data-toggle='tooltip' ";
					html+="data-id="+response['id']+" data-tname="+response['taskname']+" data-sdate="+response['startdate']+" data-duedate="+response['duedate']+" data-prt="+response['priority']+" data-asgnpl="+response['asignpeople']+" data-sts="+response['status']+" title='Edit'></i> </a> </td>";
					html+="<td> <a href='#deleteEmployeeModal' class='delete' data-id="+response['id']+" data-toggle='modal'><i class='material-icons' data-toggle='tooltip' "; 
					html+= "title='Delete'></i></a> </td> </tr>";


				setTimeout(function() 
				{ 
						$(this).parent().remove();
						$(this).parent().replaceWith(html);
						//$("#displayDiv").load(" #displayDiv");
						$('#addTask').modal('hide');	
						//$('#registration')[0].reset();
						//getalldata();
						load_data(1);
				},1000); 
	
			}
		});
	});

	$('#delete_multiple').on('click', function(e)
	{ 
		
		var employee = [];  
		$(".emp_checkbox:checked").each(function() {  
			employee.push($(this).data('id'));
		});	

		if(employee.length <=0)  {  
			alert("Please select records.");  
		}  
		else { 	
			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
			var checked = confirm(WRN_PROFILE_DELETE);  
			if(checked == true) {			
				var selected_values = employee.join(","); 
				//console.log(selected_values);
				$.ajax({ 
					type: "POST",  
					url: "api/index.php/deletemultiple",  
					cache:false,  
					data:'id='+selected_values,  
					success: function(response) {	
					
					setTimeout(function() 
					{ 
						/*var emp_ids = response.split(",");
						for (var i=0; i < emp_ids.length; i++ ) {						
							$("#"+emp_ids[i]).remove();
						}*/
						load_data(1);
					},1000); 	
						
					//getalldata();	


					}   
				});				
			}  
		}  
	});


});


/*function getalldata()
{
	$.ajax({

		type: "POST",
		dataType: "json",
		url: "api/index.php/selectalldata",

		success: function(dataResult){

			var response=dataResult;
			var html="";
			for(i=0;i<dataResult.length;i++)
			{
					html+="<tr class='tblrow' id="+response[i]['id']+">";
					html+="<td> <input type='checkbox' class='emp_checkbox' data-id="+response[i]['id']+"> </td>";
					html+="<td>"+response[i]['id']+"</td>";
					html+="<td>"+response[i]['taskname']+"</td>";
					html+="<td>"+response[i]['startdate']+"</td>";
					html+="<td>"+response[i]['duedate']+"</td>";
					html+="<td>"+response[i]['priority']+"</td>";
					html+="<td>"+response[i]['asignpeople']+"</td>";
					html+="<td>"+response[i]['status']+"</td>";

					var str = response[i]['taskname'];
					var replaced = str.split(' ').join('_');

					html+= "<td> <a href='#addTask' class='edit' data-toggle='modal'>";
					html+= "<i class='material-icons update' data-toggle='tooltip' ";
					html+="data-id="+response[i]['id']+" data-tname="+replaced+" data-sdate="+response[i]['startdate']+" data-duedate="+response[i]['duedate']+" data-prt="+response[i]['priority']+" data-asgnpl="+response[i]['asignpeople']+" data-sts="+response[i]['status']+" title='Edit'></i> </a> </td>";
					html+="<td> <a href='#deleteEmployeeModal' class='delete' data-id="+response[i]['id']+" data-toggle='modal'><i class='material-icons' data-toggle='tooltip' "; 
					html+= "title='Delete'></i></a> </td> </tr>";
			}
			
			setTimeout(function() 
				{ 
					$("#tabledata").html(html);
				},1000); 	
			

		}
	}); 

}
*/
/*function pagecall()
{

		$.ajax({

			type: "POST",
			dataType: "json",
			url: "api/index.php/pagination",

			success: function(dataResult){
				
				var total=JSON.parse(dataResult);
				var html="";
				console.log(total);

				for(i=1;i<=total;i++)
				{
					if(i==1)
					{
						html+="<li class='pageitem active' id="+i+"> <a href='' data-id="+i+" class='page-link'>"+i+"</a></li>";
					}
					else
					{	
						html+="<li class='pageitem' id="+i+"> <a href='' data-id="+i+" class='page-link'>"+i+"</a></li>";
					}
				}
				
				setTimeout(function() 
					{ 
						console.log(html);
						$(".pagination").html(html);
					},1000); 	
			}
		}); 
}
*/