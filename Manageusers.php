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
  <title>All in One Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/validationReg.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/ajaxregcall.js"></script>
  <script src="js/ajaxcall.js"></script>

</head>

<body>

 <div class="loading loadhide">Loading&#8230;</div>

 <!-- <div id='loader'>
      <img src="images/reload.gif" width='400px' height='400px'>
 </div> -->

 <!-- <button id="btn">Loading</button> -->


  <div class="container-fluid" id="displaydiv">

    <!-- add content -->
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">

      <div class="table-wrapper table-responsive" id="tablewrp">
        <div class="table-title">

          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">      
             <h2>Manage Users</h2>
           </div>
                   <!-- <div class="col-sm-2"> 

                   </div> -->
                 </div>
               </div>

                  <table class="table table-sm table-striped table-hover" class="lgtable" id="lgtable">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Username</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>E-mail</th>
                        <th>Password</th>
                        <th>ConfirmPass</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
<!--                     <tbody id="lgtabledata" >
                      <tr id="logintr" class="logintr">
                      </tr> 
                    </tbody> -->
                    <tbody id="tabledata">
                                         
                    </tbody>

                  </table>

                               
                  </div>  
         </div>
    </div>           

</div>
                
                
             
          <!--   Add Modal HTML  -->

            <div id="addEmployeeModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">            
                        <!-- <h4 class="modal-title">Add TASK</h4> -->
                        <button type="button" class="close" id="regclsform" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
              <div class="modal-body">          

                <div class="lgcardreg">


                  <div class="row">
                    <div class="col-sm-12">
                      <div class="regTitle"> <h2> Form </h2> </div>
                    </div>
                  </div>

                  <form method="post" name="registration" id="registration">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">

                          <div class="divMargin">
                            <div class="row">

                              <div class="col-sm-12"> 
                                <label for="fname">First Name:</label><span class="text-danger"> *</span>
                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                                <label for="firstname" id="fname" class="custerr"></label>
                              </div>
                              <div class="col-sm-12">
                                <label for="fname">Last Name:</label><span class="text-danger"> *</span>
                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                                <label for="lastname" id="lname" class="custerr"></label>
                              </div>
                            </div>
                          </div> 
                        </div>
                      </div>    

                      <div class="divMargin">
                        <div class="row">

                          <div class="col-sm-12">                   
                            <label for="fname">Username:</label><span class="text-danger"> *</span>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                            <label for="username" id="uname" class="custerr"></label>
                          </div>

                        </div>
                      </div>


                      <div class="divMargin">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="formSection">  
                              <label for="fname">Birthdate:</label><span class="text-danger"> *</span>
                              <input type="date" class="form-control" id="birthday" placeholder="BIRTHDATE" name="birthday" >
                              <label for="dates" id="bdate" class="custerr"></label>
                            </div>
                          </div>
                        </div>    
                      </div>


                      <div class="divMargin">
                        <div class="row">
                          <div class="col-sm-12">
                            <label for="fname">Gender:</label><span class="text-danger"> *</span>
                            <div class="formSection">         
                              <label class="radio-inline">
                                <input type="radio" name="gender[]" id="mgender" value="Male" checked="">  <label> Male </label>
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="gender[]" id="fgender" value="Female" checked="">  <label> Female </label>
                              </label>  
                            </div>
                            <label for="gender[]" class="error" style="display:none;">Please choose one.</label>
                          </div>
                        </div>    
                      </div>        

                      <div class="divMargin">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="formSection">  
                              <label for="fname">E-mail:</label><span class="text-danger"> *</span>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Email-id">
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="divMargin">

                        <div class="row">

                          <div class="col-sm-12"> 
                            <label for="fname">Password:</label> <span class="text-danger"> *</span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <label for="passwd" id="passw" class="custerr"></label>
                          </div>
                          <div class="col-sm-12">
                            <label for="fname">Confirm Password: </label> <span class="text-danger"> *</span>
                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password">
                            <label for="cpasswd" id="cpass" class="custerr"></label>
                            <label for="cpasswderr" id="cerpass" class="custerr"></label>
                          </div>
                        </div>
                      </div>


                      <div class="divMargin">
                        <div class="row">
                          <div class="col-sm-12">
                            <label for="fname">Country: </label>
                            <select name="country" class="form-control" id="country">
                              <option value="">Select Country</option>
                              <option value="india">India</option>
                              <option value="usa">USA</option>
                              <option value="uk">UK</option>                              
                            </select>                
                          </div>
                        </div>
                      </div>


                      <div class="divMargin">
                        <div class="row">
                          <div class="col-sm-12">
                            <label for="fname">City: </label>
                            <select class="form-control" name="city" id="city">
                              <option value="">Select City</option>
                              <option value="ahmedabad">Ahmedabad</option>
                              <option value="baroda">Baroda</option>
                              <option value="rajkot">Rajkot</option>
                            </select>                

                          </div>
                        </div>

                      </div>

                      <div class="lastButtons">

                        <div class="row">
                          <div class="col-sm-12">
                            <input type="hidden" id="hdbtn" value="1" name="type">
                            <input type="hidden" id="id_d" name="id" class="form-control">  
                            <button type="submit" value="submit" name="submit" id="subbtn" class="btn btn-success buttonFull">Submit</button>
                            <!-- <button type="submit" value="submit" name="submit" id="subbtn" class="btn btn-success buttonFull">Submit</button>  -->                      
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
        


        <!-- add modal over here -->

        <!-- Login Modal HTML  -->

        <div id="loginModal22" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">            
                <h4 class="modal-title">Login User</h4>
                  <button type="button" class="close" id="formclose" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">
                <!-- LOGIN Start -->

                <!--  <div class="container"> -->

                  <div class="lgcard">
                    <div class="row">

                      <div class="col-sm-12">
                        <div class="headerText">
                          <img class="imgRound" src="images/profilepic.png">
                          <p> <h3>Log-in</h3> </p>
                        </div>
                      </div>
                    </div>

                    <form method="POST" name="loginform" id="loginform">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="formSection">

                            <!--  <input type="text" placeholder="Enter Username"> -->
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <span class="fa fa-user"></span>
                                  </span>                    
                                </div>
                                <input type="text" id="username" class="form-control" name="username" placeholder="Username" required="required">
                              </div>
                            </div>                                       
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <!--                                       <input type="password" placeholder="Password"> -->

                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fa fa-lock"></i>
                                </span>                    
                              </div>
                              <input type="password" id="password" class="form-control" name="password" placeholder="Password" required="required">
                            </div>
                          </div>


                          <div class="divCls">
                            <input type="checkbox"> Remember me 
                            <a href="#">Forgot Password? </a>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <input type="hidden" id="hdbtn" value="4" name="type">
                          <input type="submit" id="loginbtn" name="submit" class="loginbtn" value="Login">                       

                        </div>
                      </div>

                      <div class="row">

                        <div class="col-sm-12">
                          <div id="loginerr">
                            
                          </div>
                        </div>
                      </div>

                    </form>

                  </div>

                </div>

                <div class="modal-footer">

                </div>

              </div>
            </div>
          </div>


          <!-- Login over here -->

          <!-- Delete Modal HTML -->
          <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form>

                  <div class="modal-header">            
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" id="formclose" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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

          <!-- end delete modal  -->
     <!-- over content --> 
     </div>

<?php
include('newfooter.php');
?>
</body>

<!-- <?php //include 'footer.php'?> -->
</html>