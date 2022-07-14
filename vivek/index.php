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

    <title>Vivekananda Mission Mahavidyalaya</title>
    <link rel="shortcut icon" type="image/png" href="view/public/img/collage_logo.png"/>
    <!-- Bootstrap core CSS -->
    <link href="view/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/public/vendor/toastr/toastr.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="view/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="view/public/css/agency.css" rel="stylesheet">
    <style type="text/css">
      .btn-xll {
        font-size: 16px;
        padding: 8px 9px !important;
      }
      .modal-contentt {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 150%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: .3rem;
        outline: 0;
      }
      .center_show {
        padding-right: 205px !important;
      }
    </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <?php 
      include('headerfooter/header.php');
    ?>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome to Vivekananda Mission Mahavidyalaya</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger search" href="#">Search</a>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <img style="border-radius: 50%;height: 80%;width: 100%" src="view/public/img/principal_desk.jpg" class="img-responsive img-circle" alt="Cinque Terre" style="width:204px;height:auto;">
            </span>
            <p class="text-muted">Welcome, all of you, to the official Vivekananda Mission Mahavidyalaya site. The Mission Mahavidyalaya, located in the Haldia subdivision of Purba Medinipur, aspires to provide quality education to the students of this rural outlying area.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <img style="border-radius: 50%;height: 80%;width: 100%" src="view/public/img/principal_desk.jpg" class="img-responsive img-circle" alt="Cinque Terre" style="width:204px;height:auto;">
            </span>
            <p class="text-muted">Established on 9th August 1968, Vivekananda Mission Mahavidyalaya has emerged as an educational institution of repute in the district of Purba Medinipur in the state of West Bengal. A result of the dreams of the monks, brahmacharies and philanthropists of the Vivekananda Mission Ashram who felt the need to set up a college in this outlying area of Haldia subdivision to cater to the urge of the locals for higher education, it has today firmly stamped its imprint in the educational map of Purba Medinipur.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <img style="border-radius: 50%;height: 80%;width: 100%" src="view/public/img/principal_desk.jpg" class="img-responsive img-circle" alt="Cinque Terre" style="width:204px;height:auto;">
            </span>
            <p class="text-muted">Students from this college have been doing well in University examinations, topping the undergraduate examination and bagging the gold medals. The success-rate has also of late taken an upward swing, especially in humanities and commerce our performance has been quite creditable. Students have consistently scored first class marks in these disciplines. The extra-curricular activities of the college are also strong. Along with four units of NSS, we also have regular sports and cultural competitions. Our students have performed creditably over the years in University and DPI Meets. The college Kabaddi team is the reigning University champions.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">vision</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 portfolio-item">
            <p>Vivekananda Mission Mahavidyalaya takes upon itself the responsibility to impart quality higher education in the Haldia subdivision of Purba Medinipur district. We are committed to motivate and equip the students from this rural area to compete and survive with their urban counterparts on equal terms. At the same time, we take care to instill in our students the right values and a feeling of responsibility towards society. The students are encouraged to develop themselves through value based education after the ideology of Swami Vivekananda. “Esho Manush Hao”, the immortal words of Swami Vivekananda that enjoins us to become and help others to become right thinking human beings “Be Man & Make Man” remains the abiding ideal of the institution.</p>
            <p>The mission statement reflects the distinctive nature of the college as it seeks to provide value based quality education to the students belonging to this rather impoverished area of Purba Medinipur. The institution guarantees this by inspiring the students to the ideals of Swami Vivekananda keeping it not only limited to adorning the portals of the institution but making it a part of our life here. Institutional efforts like observing the birth anniversary of Swami Vivekananda, organizing seminars on such occasions and inviting renowned Swami Vivekananda scholars to instill his teachings into students are some of the initiatives towards that direction. Playing out the immortal speeches of Swami Vivekananda and other great people through the public address system just before the commencement of the college, earmarking a class in the College routine for value education are other such steps towards providing holistic education to our students.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" style="">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About</h2>
          </div>
        </div>
        <div class="row" >
          <div class="col-md-6">
              <img src="view/public/img/79216252.jpg" class="" alt="Cinque Terre" style="width:100%;height:100%;">
          </div>
          <div class="col-md-6 col-sm-12 portfolio-item">
            <p>Vivekananda Mission Mahavidyalaya has an illustrious history of continuous development since its inception. Established on 9th August, 1968, at present, the college has emerged as a distinguished educational institution in the district of Purba Medinipur in the state of West Bengal.</p>

            <p>Realizing the difficulties of the sons and daughters of the soil to receive higher education in distant institutions, an urge was felt by the monks, brahmacharies and philanthropists of the Vivekananda Mission Ashram to set up a college in the serene atmosphere of the rural area, away from the din and bustle of the city life. The idea was to provide value based quality education to all sections of society especially to people belonging to backward communities. The thinking finally materialized in the establishment of the Mission Mahavidyalaya in 1968.</p>

            <p>In the beginning, classes of the Mahavidyalaya were held at two neighbouring institutions set up by the Vivekananda Mission Ashram namely Rampur Vivekananda Mission Vidyamandir and Bajitpur Saradamani Balika Vidyalaya. However, in the year 1970 classes and the office shifted to its own building.</p>
          </div>
        </div>
      </div>
    </section>  
    <!-- Location -->
    <section id="location"  style="padding: 10px 0 !important; margin-top: 0px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Location</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-12 portfolio-item">
            <p>The location of the Mahavidyalaya is a convenient one as it stands just beside the Haldia- Kukrahati Road and is adjacent to Vivekananda Mission Ashram. It is only a few kilometres away from the Haldia Industrial Township and is well connected by rail and bus routes. The nearest railway station is Barada railway station on the Haldia - Panskura route. Moreover, the college is only a few minutes’ walk from Chaitanyapur crossing.</p>
          </div>
          <div class="col-md-4">
              <img src="view/public/img/15298.png" class="" alt="Cinque Terre" style="width:100%;height:100%;">
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php
		include('headerfooter/footer.php');
	?>
	<!-- cheack status modal ---->
	<div class="modal fade show" id="applicationModal" style="padding-right: 17px; ">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Check status</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alli_no">Application No: </label>
						<input type="number" class="form-control dob" id="alli_no" name="alli_no">
					</div>
					<div class="form-group" style="float: right;">
						<button type="submit" class="btn btn-primary text-uppercase js-scroll-trigger pull-right cheack">Check</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- show status modal -->
	<div class="modal fade show" id="applicationShow" style="padding-right: 17px; ">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="color: #fec810;">
					<p style="text-align: center;"><h4 id="show_status"></h4></p>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6" style="float: left">
								<div class='list-group gallery'>
									<a class="thumbnail fancybox" rel="ligthbox" href="#">
										<img class="img-fluid profile_photo" alt="" src="<?php echo site_url().'view/public/uploaded_img/20180614_115654.jpg'; ?>" />
									</a>
								</div>
							</div>
							<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6" style="float: right">
								<label for="photo">Hi,<p id="can_name"></p> Your Application No. </label>
								<input type="text" class="form-control dob" id="application_no" name="application_no" disabled>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer no-border">
					<div class="text-right">
						<button class="btn btn-primary btn-success" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	//----- Url ----------------
	var base_url = "<?php echo site_url();?>";
	</script>
    <!-- Bootstrap core JavaScript -->
    <script src="view/public/vendor/jquery/jquery.min.js"></script>
    <script src="view/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="view/public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="view/public/js/jqBootstrapValidation.js"></script>
    <script src="view/public/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="view/public/js/agency.js"></script>
    <script src="view/public/vendor/toastr/toastr.min.js"></script>

	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->
	<script>
		$(".search").on('click', function(){
			$("#applicationModal").modal('show');
		});
		$(".cheack").on('click', function(){
			var appli_no = $("input[name=alli_no]").val();
			if(appli_no != ''){
        var action = base_url+"controller/Cheack_status.php";
        $.ajax({
          url: action,
          type: 'POST',
          data: {appli_no:appli_no},
          dataType: 'json',
          success:function(result){
            console.log(result);
            if(result.res == 0){
              $("#applicationModal").modal('hide');
              $("#applicationShow").modal('show');
              $("#show_status").html(result.msg);
              $("#can_name").text(result.name);
              $("#application_no").val(result.appli_no);
              $(".profile_photo").attr('src',base_url+"view/public/uploaded_img/"+result.photo);
            }else{
              toastr.error("Invalied application no.");
            }
            $("#applicationModal").modal('hide');
            
          },
          error:function(error){
            console.log(error.responseText);
          }
        });
      }
		});
		$("#studentcreditcardservice").on('click', function(){
      $("#studentcreditcardservicemodel").modal('show');
    });
	</script>

  </body>

</html>
