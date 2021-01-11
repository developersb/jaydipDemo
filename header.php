
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><b>All Demo</b></a>by Jaydip
    </div>
        
          <ul class="navbar-nav">

                          <li class="nav-item">
                              <a class="nav-link" id="homemenu" href="index.php">Homepage</a>
                          </li>
          <?php
                if(isset($_SESSION['myuser']))
                    { ?>
                              <li class="nav-item">
                                <a class="nav-link" id="menutodo" href="slimcrud.php">ToDoDemoSlim</a>
                             </li>

                              
                              <li class="nav-item">
                                <a href="#" id="logoutbtn" class="nav-link"  data-toggle="modal"><span>Logout</span></a>  
                             </li>
                <?php 
                  }
                   else
                   {
                   
                ?>
                <li class="nav-item">
                  <a href="#addEmployeeModal" id="menureg" class="nav-link" data-toggle="modal">
                    <span>Registration</span></a>
                  </li>
                  <li class="nav-item">
                   <a href="#loginModal" id="" class="nav-link"  data-toggle="modal"><span>Login</span></a>  
                 </li>

                    <?php
                      }
                      ?>

      </ul>
  </div>
</nav>