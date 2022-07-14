<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MUSI tickite</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
  <style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;      
    font-size: 20px;
    color: #111;
  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #555;
  }
  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }
  .modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #777;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }  
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  footer {
    background-color: #2d2d30;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="#myPage">
	        <img src="images\logo.jpg">
	      </a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#myPage">HOME</a></li>
	        <li><a href="#band">BAND</a></li>
	        <li><a href="#tour">TOUR</a></li>
	        <li><a href="#contact">CONTACT</a></li>
          <?php 
              if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
          ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  echo "$username"; ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php">Profile</a></li>
              <li><a href="log_out.php">Log Out</a></li>
            </ul>
          </li>
            <?php
              }else{
            ?>
              <li><a href="login.php">LOGIN</a></li>
            <?php
              }
            ?>
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
	          <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="sign_up.php">Sign Up</a></li>
	            <li><a href="#">Merchandise</a></li>
	            <li><a href="#">Media</a></li> 
              <li><a href="#">Extras</a></li>
	          </ul>
	        </li>
	        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">
	      <div class="item active">
	        <img src="images/n.jpg" alt="NEUCLEYA">
	        <div class="carousel-caption">
	          <h3>NEUCLEYA</h3>
	          <p>DJ Nucleya Is All Set To Launch His New Album Raja Baja</p>
	        </div>     
	      </div>

	      <div class="item">
	        <img src="images/g.jpg" alt="GURU RANDHAWA">
	        <div class="carousel-caption">
	          <h3>GURU RANDHAWA</h3>
	          <p>Guru Randhawa Becomes the Most Viewed Indian Singer on YouTube</p>
	        </div>     
	      </div>
	    
	      <div class="item">
	        <img src="images/b.jpg" alt="BADSHAH">
	        <div class="carousel-caption">
	          <h3>BADSHAH</h3>
	          <p>Hip Hop Has Revolutionised the Music Industry Globally: Badshah</p>
	        </div>   
	      </div>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	</div>

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3>A GROUP MUSIC PROGRAM</h3>
  <p><em>We love music!</em></p>
  <p>We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
          <p>
            <strong>
              BADSHAH (rapper)
            </strong>
          </p>
          <br>
          <a href="#demo" data-toggle="collapse" >
            <img src="images/badshah.jpg" style="width: 212px; height:212px" class="img-circle" alt="Badshah">
          </a>
          <div id="demo" class="collapse">
            <p>
              <b>Aditya Prateek Singh Sisodia</b>
            <p>
              Rap-Music composer, Co-singer, Rapper, Rap lyricist
            </p>
            <p>
              Member since 2006
            </p>
          </div>
    </div>
    <div class="col-sm-4">
      <p><strong>NEUCLEYA (DJ's producer)</strong></p>
      <br>
      <a href="#demo1" data-toggle="collapse">
        <img src="images/neucleya.jpg" style="width: 212px; height:212px" class="img-circle" alt="NEUCLEYA">
      </a>
      <div id="demo1" class="collapse">
            <p>
              <b>Udyan Sagar</b>
            </p>
            <p>
              Musician, DJ, Remixer, Record Producer
            </p>
            <p>
              Member since 1998
            </p>
      </div>
    </div>
    <div class="col-sm-4">
      <p><strong>GURU (Panjabi Singar)</strong></p>
      <br>
      <a href="#demo2" data-toggle="collapse">
        <img src="images/guru.jpg" style="width: 212px; height:212px" class="img-circle" alt="Guru Randhawa">
      </a>
      <div id="demo2" class="collapse">
            <p>
              <b>Guru Randhawa</b>
            </p>
            <p>
              Singer, Lyricist, Musician, Composer, Song writer
            </p>
            <p>
              Member since 2013
            </p>
      </div>
    </div>
  </div>
</div>

<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">TOUR DATES</h3>
    <p class="text-center">Lorem ipsum we'll play you some music.<br> Remember to book your tickets!</p>
    <ul class="list-group">
      <li class="list-group-item">January <span class="label label-danger">Sold Out!</span></li>
      <li class="list-group-item">February <span class="label label-danger">Sold Out!</span></li> 
      <li class="list-group-item">March <span class="badge">3</span></li> 
    </ul>
    
    <div class="row text-center">
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images\mumbai.jpg" alt="mumbai" width="400" height="300">
          <p><strong>MUMBAI</strong></p>
          <p>Sunday 3 March 2020</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">Buy Tickets</button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images\kolkata.jpg" alt="kolkata" width="400" height="300">
          <p><strong>KOLKATA</strong></p>
          <p>Saturday 16 March 2020</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">Buy Tickets</button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images\goa.jpg" alt="goa" width="400" height="300">
          <p><strong>GOA</strong></p>
          <p>Sunday 31 March 2020</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">Buy Tickets</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
	<?php
	
	
	if(isset($_SESSION['username'])){
		    echo'<div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">×</button>
					  <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
					  <p><b><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, Rs.1200/-</b></p>
					</div>
					<div class="modal-body">
					  <form role="form"  method="POST" action="pay.php">
						<div class="form-group">
						  <label for="name"><span class="glyphicon glyphicon-user"></span> Name</label>
						  <input type="text"  name="name" class="form-control" id="name" placeholder="Enter your name">
						</div>
						<div class="form-group">
						  <label for="mobile"><span class="glyphicon glyphicon-earphone"></span> Mobile No.</label>
						  <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter your mobile no.">
						</div>
						<div class="form-group">
						  <label for="usrname"><samp class="glyphicon glyphicon-envelope"></samp> Send To</label>
						  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
						</div>
						  <button type="submit" class="btn btn-block">Pay 
							<span class="glyphicon glyphicon-ok"></span>
						  </button>
					  </form>
					</div>
					<div class="modal-footer">
					  <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
						<span class="glyphicon glyphicon-remove"></span> Cancel
					  </button>
					  <p>Need <a href="#">help?</a></p>
					</div>
				  </div>
				</div>';
		} else{
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		}
	?>

  </div>
</div>
<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our fans!</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>TAMLUK, West Bengal</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +91 7866955855</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: jayantamaity981@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <h3 class="text-center">From The Blog</h3>  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Mike</a></li>
    <li><a data-toggle="tab" href="#menu1">Chandler</a></li>
    <li><a data-toggle="tab" href="#menu2">Peter</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Mike Ross, Manager</h2>
      <p>Man, we've been on the road for some time now. Looking forward to lorem ipsum.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2>Chandler Bing, Guitarist</h2>
      <p>Always a pleasure people! Hope you enjoyed it as much as I did. Could I BE.. any more pleased?</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h2>Peter Griffin, Bass player</h2>
      <p>I mean, sometimes I enjoy the show, but other times I enjoy other things.</p>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="map.jpg" class="img-responsive" style="width:100%">

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>This Template  page Made By <b>Jayanta Maity</b></p> 
</footer>

<script>
	$(document).ready(function(){
	  // Initialize Tooltip
	  $('[data-toggle="tooltip"]').tooltip(); 
	  
	  // Add smooth scrolling to all links in navbar + footer link
	  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {

	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 900, function(){
	   
	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    } // End if
	  });
	})
</script>
</body>
</html>
