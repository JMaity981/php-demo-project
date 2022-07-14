<?php
	require_once('./db/connection.php');
    $qry = mysqli_query($conn,"SELECT * FROM stock_in");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Out</title>
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <h2><center>STOCK OUT</center></h2>
        <form method="POST" id="stock_out">
            <label for="p_id"><strong>Product Name:</strong></label>
            <select name="p_id" class="form-control" id="p_id">
                <option value="" disabled selected>Choose the Product</option>
                <?php
                    while ($data = mysqli_fetch_assoc($qry)) {
                ?>
                    <option value="<?php echo $data['id'];?>"><?php echo $data['p_name'];?></option>
                <?php
                    }
                ?>
            </select>
            <label for="quantity"><strong>Quantity:</strong></label>
			<input type="number" name="quantity" class="form-control" id="quantity">
            <label for="date"><strong>Date:</strong></label>
			<input type="date" name="date" class="form-control" id="date">
            <label for="price"><strong>Selling Price(Per pcs.):</strong></label>
			<input type="number" name="price" class="form-control" id="price">
            <button type="submit" class="btn btn-primary">Add Selling Product</button>
        </form>
    </div>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
    <script>
		$("#stock_out").validate({
            submitHandler: function (form){
				var data = $('form').serialize();
				console.log(data);
				$.ajax({
					url: "./controller/OutCtrl.php" ,
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							setTimeout(function(){ 
								location.reload(); 
							}, 3000);
						}else if(data.key== 'E'){
							toastr.error(data.msg);
						}
						else{
							toastr.error('error');
						}
					},
					error: function(error){
						console.log(error.responseText);
					},
				});
			},
        });
    </script>
</body>
</html>