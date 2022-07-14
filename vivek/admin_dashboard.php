<?php
	require_once 'db/connection.php';
	if(empty($_SESSION['login_id'])){
		header("Location:".site_url());
	}
	$quy = "SELECT * FROM `registration` ORDER BY `id` DESC ";
	$data = mysqli_query($conn, $quy);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vivekananda Mission Mahavidyalaya</title>

    <!-- Bootstrap core CSS -->
    <link rel="shortcut icon" type="image/png" href="view/public/img/collage_logo.png"/>
    <link href="view/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/public/css/agency.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <!--<link href="view/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> -->

    <link href='view/public/vendor/datatable/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="view/public/css/agency.css" rel="stylesheet">
	<style>
		table.dataTable {
			margin: 0 auto;
			clear: both;
			border-spacing: 0;
		}
		.badge-gradient-primary {
			color: #ffffff;
			background-color: #24d5d8;
		}
		.badge-gradient-denger {
			color: #ffffff;
			background-color: #fd3259;
		}
		.badge {
			padding: 5px 7px;
			font-size: 110%;
			font-weight: 500;
			line-height: 1;
		}
		.change_again{
			cursor: pointer;
		}
	</style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <?php
		include('admin_nav.php');
	?>
	
	<section id="registration" class="reg-pd">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>District</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Application No</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($row = mysqli_fetch_assoc($data)){
					?>
					<tr>
						<td><?php echo $row['candidate_name']; ?></td>
						<td><?php echo $row['district']; ?></td>
						<td><?php echo $row['mobile']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['application_no']; ?></td>
						<td class="show_status<?php echo $row['id']; ?>"><?php 
								if($row['verify_status'] == null){
							?>
								<select name="status1" class="form-control status" data-id="<?php echo $row['id']; ?>" id="status1"><option value="">Select</option><option value="1">Verify</option><option value="0">Rejected</option></select>
							<?php }else if($row['verify_status'] == 1){ ?>
								<span class="badge badge-gradient-primary change_again" data-id="<?php echo $row['id']; ?>">Verified</span>
							<?php }else{?>
								<span class="badge badge-gradient-denger change_again" data-id="<?php echo $row['id']; ?>">Rejected</span>
							<?php } ?>
						</td>
						<td><a href="#" data-id="<?php echo base64_encode($row['id']); ?>" class="btn btn-icon-only blue-btn tooltips view">View</a></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
          </div>
        </div>
      </div>
    </section>
	
	

    
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
	<script src="view/public/vendor/datatable/jquery.dataTables.min.js"></script>
	<script src="view/public/vendor/toastr/toastr.min.js"></script>

	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>-->
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
		$(document).on('change', '.status', function(){
			var value = $(this).val();
			//console.log(value);
			var rowid = $(this).data('id');
			var action = base_url+"admin/controller/Dashboard_controller.php";
			$.ajax({
				url: action,
				type: 'POST',
				data: {value:value,rowid:rowid},
				dataType: 'json',
				success:function(result){
					console.log(result);
					if(result.res == 1){
						if(result.status == 1){
							var span = '<span class="badge badge-gradient-primary change_again" data-id='+rowid+'>Verified</span>';
						}else if(result.status == 0){
							var span = '<span class="badge badge-gradient-denger change_again" data-id='+rowid+'>Rejected</span>';
						}
						toastr.success("Varify successfully");
						$(".show_status"+rowid).html(span);
					}else{
						toastr.error("Internal server error");
					}

				},
				error:function(error){
					console.log(error.responseText);
				}
			});
		});
		$(document).on('click', '.change_again', function(){
			var id = $(this).data('id');
			$(".show_status"+id).html('<select name="status1" id="status1" class="form-control status" data-id='+id+'><option value="">Select</option><option value="1">Verify</option><option value="0">Rejected</option></select>');
		});
		$(".view").on('click', function(){
			var id = $(this).data('id');
			window.location.href = base_url+"view.php?id="+id;
		});
	</script>

  </body>

</html>
