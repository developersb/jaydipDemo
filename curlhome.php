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
<html>
<head>
	<title>Test CURL</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ajaxcall.js"></script>
	<script src="js/ajaxregcall.js"></script>
</head>

<body>
	<div class="container-fluid">
		<!-- add content -->
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<!-- <img src="" id="myimage" width="500" height="500"/> -->
				<div class="centerbutton">

					<img src="dark.jpg" alt="Responsive image" id="myimage">

					<form name="f1" method="POST">

			<input type="button" class="btn btn-primary mrTop" value="Click for new Image" name="imgbtn" id="imgbtn">
					

					</form>
					<footer class="footer" id="homefooter">
						<div class="container-sm pt-3 my-3 border">
							<span class="text-muted">CURRENT WEATHER</span>
							<div class="row">

								<div class="col-sm-3 bg-dark text-white">
									City: <p id="citywt"></p>
								</div>
								<div class="col-sm-3 bg-secondary text-white">
									Temp: <p id="temp"></p>
								</div>
								<div class="col-sm-3 bg-dark text-white">
									Weather Description:<p id="desc"></p>
								</div>
								<div class="col-sm-3 bg-secondary text-white">
									Wind Speed: <p id="wspd"></p>
								</div>

							</div>

						</div>
					</footer>

				</div>
				<?php
				include_once('newfooter.php');
				?>
			</div>

		</div>

	</div>


</body>


</html>
<!-- 	<div class="report-container">
	      <h2><?php //echo $data->name; ?> Weather Status</h2>
	      <div class="time">
	          <div><?php //echo date("l g:i a", $currentTime); ?></div>
	          <div><?php //echo date("jS F, Y",$currentTime); ?></div>
	          <div><?php //echo ucwords($data->weather[0]->description); ?></div>
	      </div>
	      <div class="weather-forecast">
	          <img
	              src="http://openweathermap.org/img/w/<?php //echo $data->weather[0]->icon; ?>.png"
	              class="weather-icon" /> <?php //echo $data->main->temp_max; ?>°C<span
	              class="min-temperature"><?php //echo $data->main->temp_min; ?>°C</span>
	      </div>
	      <div class="time">
	          <div>Humidity: <?php //echo $data->main->humidity; ?> %</div>
	          <div>Wind: <?php //echo $data->wind->speed; ?> km/h</div>
	      </div>
	  </div> -->

