<?php
session_start();
  if(isset($_SESSION['myuser']))
  {
      include_once('newheader.php');    
  }
  else
  {
    header("Location: http://localhost/FinalDemo/index2.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD Data SLIM API</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="js/ajaxregcall.js"></script> -->
  <script src="js/custom.js"></script>
 <!--  <script src="js/ajaxcall.js"></script> -->


</head>

<body>
 <div class="loading loadhide">Loading&#8230;</div>
<!--  <div id='loader'>
      <img src="images/reload.gif" width='400px' height='400px'>
 </div> -->
	<!-- Body Start -->
	<div class="container" id="displayDiv">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">		  

				<div class="table-wrapper table-responsive">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-8">
								<h2>Manage <b>TASK's</b></h2>
							</div>
							<div class="col-sm-4">
								<a href="#addTask" class="btn btn-primary btn-sm" data-toggle="modal">
									<span>Add New Task</span></a>
									<a href="JavaScript:void(0);" class="btn btn-danger btn-sm" id="delete_multiple"> <span>Delete</span></a>						
								</div>
							</div>
						</div>

						<div class="form-group">
							<input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
						</div>

						<div class="container" id="dynamicdata">
							<!-- dynamic -->
						</div>

					</div>

				</div>
			</div>  

		</div>

			<!--   Add Modal HTML  -->

			<div id="addTask" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<!--  <form id="user_form"> -->
							<div class="modal-header">						
								<!-- <h4 class="modal-title">Add TASK</h4> -->
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">					

								    <div class="lgcardreg">
								      <div class="row">
								        <div class="col-sm-12">
								          <div class="regTitle"> <h2> Form </h2> </div>
								        </div>
								      </div>

								  <form method="post" name="registrationtsk" id="registrationtsk">
								          <div class="form-group">
								    <div class="row">
								        <div class="col-sm-12">

								            <div class="divMargin">
								          <div class="row">

								          	<div class="col-sm-12"> 
								          		<label for="tname">Task Name:</label><span class="text-danger"> *</span>
								          		<input type="text" name="taskname" class="form-control" id="taskname" placeholder="Task Name" required>
								          		<label for="taskname" id="tname" class="custerr"></label>
								          	</div>

								          </div>
								             </div> 
								        </div>
								    </div>    

								    <div class="divMargin">
								    	<div class="row">
								    		<div class="col-sm-12">
								    			<div class="formSection">  
								    				<label for="stdate">START-date:</label><span class="text-danger"> *</span>
								    				<input type="date" class="form-control" id="startdate" placeholder="startdate" name="startdate" required>
								    				<label for="sdates" id="sdate" class="custerr"></label>
								    			</div>
								    		</div>
								    	</div>    
								    </div>



								    <div class="divMargin">
								    	<div class="row">
								    		<div class="col-sm-12">
								    			<div class="formSection">  
								    				<label for="dudate">DUE-date:</label><span class="text-danger"> *</span>
								    				<input type="date" class="form-control" id="duedate" placeholder="Duedate" name="duedate" required>
								    				<label for="duates" id="duedate" class="custerr"></label>
								    			</div>
								    		</div>
								    	</div>    
								    </div>

								    <div class="divMargin">
								    	<div class="row">
								    		<div class="col-sm-12">
								    			<div class="form-group"> 
								    			<label for="priority">Priority: </label>
								    			<select name="priority" class="form-control" id="priority">
								    				<option value="">Select Priority</option>
								    				<option value="Low">Low</option>
								    				<option value="Medium">Medium</option>
								    				<option value="High">High</option>     
								    			</select> 
								    			</div>               
								    		</div>
								    	</div>
								    </div>

								    <div class="divMargin">
								    	<div class="row">
								    		<div class="col-sm-12">
								    			<div class="form-group">
								    		<label for="assignppl">Assign Peoples:</label>
								    				<select multiple class="form-control" name="assignppl[]" id="assignppl">
								    					<option value="Ajay">Ajay</option>
								    					<option value="Devam">Devam</option>
								    					<option value="Jay">Jay</option>
								    					<option value="Milan">Milan</option>
								    				</select>
								    			</div>
								    		</div>
								    	</div>
								    </div>
								   							


								    <div class="divMargin">
								    	<div class="row">
								    		<div class="col-sm-12">
								    			<label for="statuslbl">Status: </label>
								    			<select name="statussel" class="form-control" id="statusel">
								    				<option value="">Select Status</option>
								    				<option value="Pending">Pending</option>
								    			<option value="Processing">Processing</option>
								    				<option value="Completed">Completed</option>     
								    			</select>                
								    		</div>
								    	</div>
								    </div>

							

								    <div class="lastButtons">

								    	<div class="row">
								    		<div class="col-sm-12">
								    			<input type="hidden" id="hdbtn" value="1" name="type">
								    			<input type="hidden" id="id_d" name="id" class="form-control">	
								    			<button type="submit" value="submit" name="InsertTask" id="subbtn" class="btn btn-success buttonFull">Submit</button>                   
								    		</div>

								    		<div class="col-sm-12">
								    			<button type="reset" name="reset" class="btn btn-primary buttonFull">Reset</button> 

								    		</div>

								    	</div>
								    </div>


								</div>
							</form>
						</div> 


						
							</div>

							<div class="modal-footer">
							<!--     <input type="hidden" value="1" name="type">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
								<button type="button" class="btn btn-success" id="btn-add">Add</button> -->
							</div>
						<!-- </form> -->
					</div>
				</div>
			</div>
				




			<!-- edit over here -->

			<!-- Delete Modal HTML -->
			<div id="deleteEmployeeModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form>
								
							<div class="modal-header">						
								<h4 class="modal-title">Delete User</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<input type="hidden" id="id_d" name="id" class="form-control">					
								<p>Are you sure you want to delete these Records?</p>
								<p class="text-warning"><small>This action cannot be undone.</small></p>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
								<button type="button" class="btn btn-danger" id="delete">Delete</button>
							</div>
						</form>
					</div>
				</div>
					
			</div>
			
			<?php
			include('newfooter.php');
			?>	
	<!-- body end -->
	</body>
	</html>