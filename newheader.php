
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index2.php">
    <img src="images/demologo.png" class="logoset">
      <?php 
      
      if(isset($_SESSION['myuser']))
        {
           echo "Welcome, ".$_SESSION['myuser']; 
        }
        else
        {
          echo "Welcome, Guest";
        }

      ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index2.php"><h5>Home</h5></a>
      </li>
   <?php
      if(isset($_SESSION['myuser']))
        { ?>
          

          <li class="nav-item dropdown"><h5>
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">HTMLLayouts</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="LayoutOne/Webpageone.php">Layout One</a>
              <a class="dropdown-item" href="LayoutTwo/Second.php">Layout Two</a>
              <a class="dropdown-item" href="LayoutThree/Struct.php">Layout Three</a>
              <a class="dropdown-item" href="LayoutFour/newstruct.php">Layout Four</a>
            </div></h5>
          </li>
          
          <li class="nav-item">
           <a class="nav-link" href="Manageusers.php"><h5>ManageUsers</h5></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="slimcrud.php"><h5>TodoWithSlim</h5></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="curlhome.php"><h5>cURLDemo</h5></a>
         </li>
         <li class="nav-item">
          <a href="#" class="nav-link" id="logoutbtn"><h5>Logout</h5></a>  
        </li>

        <?php 
      }
      else
      {

        ?>

        <li class="nav-item">
          <a href="#addEmployeeModal" id="menureg" class="nav-link" data-toggle="modal">
            <h5>Registration</h5></a>
          </li>
        </li>
        <li class="nav-item">
          <a href="#loginModal" id="" class="nav-link"  data-toggle="modal"><h5>Login</h5></a>  
        </li>

        <?php
      }
      ?>
    </ul>
  </div>
</nav>