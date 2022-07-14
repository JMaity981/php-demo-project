<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
</head>
<body>
	<div class="container" style="width: 100%"> 
  		<div id="myCarousel" class="carousel slide" data-ride="carousel">
    		<!-- Indicators -->
    		<ol class="carousel-indicators">
      			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  				<li data-target="#myCarousel" data-slide-to="1"></li>
  				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
    		<!-- Wrapper for slides -->
			<div class="carousel-inner">
      			<div class="item active"><img src="images/f1.jpg" style="width:100%;"></div>
				<div class="item"><img src="images/f2.jpg" style="width:100%;"></div>
				<div class="item"><img src="images/f3.jpg" style="width:100%;"></div>
    		</div>
			<!-- Left and right controls -->
    		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
  				<span class="glyphicon glyphicon-chevron-left"></span>
  				<span class="sr-only">Previous</span>
    		</a>
    		<a class="right carousel-control" href="#myCarousel" data-slide="next">
  				<span class="glyphicon glyphicon-chevron-right"></span>
      			<span class="sr-only">Next</span>
    		</a>
  		</div>
	</div>
	<div class="container">
		<div class="row" class="menu-btn-row">
    		<div class="col-sm-4">
			</div>	
			<div class="col-sm-4">
				<p style="text-align: center;"><a href="student_insert.php" class="btn btn-success">Add a STUDENT</a></p>
				<p style="text-align: center;"><a href="all_student.php" class="btn btn-success">All Students</a></p>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</body>
</html>