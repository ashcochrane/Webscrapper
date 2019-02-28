<!DOCTYPE html>

<?php
	$myPDO  = new PDO('sqlite:../database.db');
	$result =  $myPDO->query("SELECT * FROM barfoot");


?>

<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Auckland | Housing Directory</title>

		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">

        <!-- animate -->
        <link rel="stylesheet" href="css/animate.min.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- font-awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- google font -->
        <link rel="stylesheet" href="css/style.css">

	</head>
	<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


		<!-- start home -->
		<section id="home" class="text-center">
		  <div class="home_headerimage">
		    <div class="flexslider">
		        	<img src="images/intro-bg-small.png" alt="Slide 1">
		        	<div class="slider-caption">
					    <div class="form-container">
					      <h1>Listery</h1>
					      <h2 class="wow fadeInDown" data-wow-delay="2000">
							<span>Auckland Housing Directory</span>
						</h2>
						<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for a Suburb..." title="Type in a name">
					    </div>
				  	</div>
		    </div>
		  </div>				
		</section>
		<!-- end home -->

		<!-- start service -->
		<div id="service">
			<div class="container">
				<div class="row">

					<?php
						foreach ($result as $row) {
					?>
					<div class="col-md-4 col-sm-4">
						<div class="image-container">
								<img src=<?php print $row["photo"] ?> alt="broken">
						</div>
						<div class="property-details">
							<a href="">
								<div class="address"><?php print $row["address"] ?></div>
								<div class="method-of-sale"><?php print $row["sale_price"] ?></div>
								<div class="details">
									<span class="bed"><?php print $row["details"] ?></span>
								</div>
							</a>
						</div>
					</div>
					<?php
						}
					?>
					<div class="col-md-4 col-sm-4">
						<div class="image-container">
								<img src="/test.jpg" alt="broken">
						</div>
						<div class="property-details">
							<a href="">
								<div class="address">183 Orakei Road, Remuera</div>
								<div class="method-of-sale">For Sale by Auction</div>
								<div class="details">
									<span class="bed">5 beds</span>
									<span class="bath">2 baths</span>
									<span class="car">3 cars</span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="image-container">
								<img src="/test.jpg" alt="broken">
						</div>
						<div class="property-details">
							<a href="">
								<div class="address">183 Orakei Road, Remuera</div>
								<div class="method-of-sale">For Sale by Auction</div>
								<div class="details">
									<span class="bed">5 beds</span>
									<span class="bath">2 baths</span>
									<span class="car">3 cars</span>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="image-container">
								<img src="/test.jpg" alt="broken">
						</div>
						<div class="property-details">
							<a href="">
								<div class="address">183 Orakei Road, Remuera</div>
								<div class="method-of-sale">For Sale by Auction</div>
								<div class="details">
									<span class="bed">5 beds</span>
									<span class="bath">2 baths</span>
									<span class="car">3 cars</span>
								</div>
							</a>
						</div>
					</div>
					


				</div>
			</div>
		</div>
		<!-- end service -->

	

		<!-- start footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-7">
						<p>Auckland House Directory</p>
						<small>Ashton Cochrane</small>
					</div>
				</div>
			</div>
		</footer>
		<!-- end footer -->


		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- isotope -->
		<script src="js/isotope.js"></script>
		<!-- images loaded -->
   		<script src="js/imagesloaded.min.js"></script>
   		<!-- wow -->
		<script src="js/wow.min.js"></script>
		<!-- smoothScroll -->
		<script src="js/smoothscroll.js"></script>
		<!-- custom -->
		<script src="js/custom.js"></script>

	</body>
</html>
