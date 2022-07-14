<?php
require_once 'db/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VMM | Everything is possible</title>

    <!-- Bootstrap core CSS -->
    <link href="view/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/public/vendor/bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="view/public/vendor/toastr/toastr.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="view/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="view/public/css/agency.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
  	<style>
  		.error {
  			color: #e90000;
  			font-size: 13px;
  			margin-top: 7.5px;
  			border-color: #e90000 !important;
  		}
  	</style>

  </head>

  <body id="page-top">
	
    <!-- Navigation -->
    <?php 
      include('headerfooter/header.php');
    ?>

    <!-- Contact -->
    <section id="registration" class="reg-pd">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Registration Form</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form  class="registration" method="POST" id="form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
              <label for="candidatename">Name of Candidate</label>
              <input type="text" class="form-control" id="candidatename" placeholder="Name of Candidate" name="candidatename">
            </div>
					</div>	
					<div class="col-md-6">	
						<div class="form-group">
							<label for="photo">Upload your photo</label>
							<input type="file" class="form-control-file" id="photo" name="photo">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="state">State</label>
							<select class="form-control" id="state" name="state">
								<option value="">Select State</option>
								<option value="0" >West bengal</option>
							</select>
						</div>
					</div>	
					<div class="col-md-6">	
						<div class="form-group">
							<label for="district">District</label>
							<select class="form-control" id="district" name="district">
								<option value="">Select district</option>
							<?php
								$district = ['Malda','Uttar Dinajpur','Dakshin Dinajpur','Murshidabad','Birbhum','Hooghly','Paschim Bardhaman','Purba Bardhaman','Alipurduar','Cooch Behar','Darjeeling','Jalpaiguri','Kalimpong','Howrah','Kolkata','Nadia','North 24 Parganas','South 24 Parganas','Bankura','Jhargram','Purulia','Purba Medinipur','Paschim Medinipur'];
				
								$lenght = count($district);
								for($i=0; $i<$lenght; $i++){
							?>
									<option value="<?php echo $district[$i]; ?>" ><?php echo $district[$i]; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="fathername">Father's Name</label>
							<input type="text" class="form-control" id="fathername" placeholder="Father's name of Candidate" name="fathername">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="fathername">Date of Birth</label>
							<input type="text" class="form-control dob" id="dob" name="dob">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="permanentaddress">Permanent Address</label>
							<textarea class="form-control" id="permanentaddress" rows="3" name="permanentaddress"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="officeaddress">Address</label>
							<textarea class="form-control" id="officeaddress" rows="3" name="officeaddress"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="pincode">Pin Code</label>
							<input type="text" class="form-control" id="pincode" placeholder="Pin Code" name="pincode">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mobile">Mobile Number</label>
							<input type="number" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">E-mail Address</label>
							<input type="email" class="form-control" id="email" placeholder="E-mail Address" name="email">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="aadhaar">Aadhaar No</label>
              <input type="number" class="form-control" id="aadhaar" name="aadhaar">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-6">
						<div class="form-group" style="float: right;">
							<button type="submit" class="btn btn-primary text-uppercase js-scroll-trigger pull-right">Submit</button>
						</div>
					</div>
				</div>
			</form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php
		include('headerfooter/footer.php');
	?>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo site_url().'view/public/img/portfolio/01-full.jpg'?>" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo site_url().'view/public/img/portfolio/02-full.jpg'?>" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Explore</li>
                    <li>Category: Graphic Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo site_url().'view/public/img/portfolio/03-full.jpg'?>" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Finish</li>
                    <li>Category: Identity</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo site_url().'view/public/img/portfolio/04-full.jpg'?>" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Lines</li>
                    <li>Category: Branding</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo site_url().'view/public/img/portfolio/05-full.jpg'?>" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Southwest</li>
                    <li>Category: Website Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo site_url().'view/public/img/portfolio/06-full.jpg'?>" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Window</li>
                    <li>Category: Photography</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<!-- application modal -->
	<div class="modal fade show" id="applicationModal" style="padding-right: 17px; ">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4></h4>
				</div>
				<div class="modal-body">
					<p>Your registration successful. Your registration no is <h5 class="no"> </h5> . You can track use this no.</p>
				</div>
				<div class="modal-footer no-border">
					<div class="text-right">
						<button class="btn btn-success" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		var base_url = "<?php echo site_url();?>";
	</script>
    <!-- Bootstrap core JavaScript -->
    <script src="view/public/vendor/jquery/jquery.min.js"></script>
    <script src="view/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="view/public/vendor/jquery-validation/jquery.validate.min.js"></script> 

    <!-- Plugin JavaScript -->
    <script src="view/public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="view/public/vendor/bootstrap/js/bootstrap-datepicker.js"></script> 
    <script src="view/public/vendor/toastr/toastr.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="view/public/js/jqBootstrapValidation.js"></script>
    <script src="view/public/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="view/public/js/agency.js"></script>
	  <script src="view/public/js/registration.js"></script>

  </body>

</html>
