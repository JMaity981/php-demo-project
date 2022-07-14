<?php
	require_once('db/connection.php');
    if(!isset($_SESSION['a_id'])){
		header('Location: ./admin.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <a class="btn btn-primary form" href="registration.php">Student Registration</a>
    <a href="controller/Admin_logoutCtrl.php" class="btn btn-warning">Log Out</a>
    <a class="btn btn-primary form" href="register_students.php">View all Resister Students</a>
    <div class="row">
        <div class="col-md-5 form-section">
            <h2>
                <center>Add Question Set</center>
            </h2>
            <form method="POST" id="question" action="controller/Add_questionCtrl.php">
                <label for="class_id"><strong>Class:</strong></label>
                <div class="input-group mb-3">
                    <?php
                        $qry = mysqli_query($conn,"SELECT * FROM class");
                    ?>
                    <select name="class_id" class="form-control" onChange="classChange(this.value, 'F')">
                        <option value="" disabled selected>Choose Class</option>
                        <?php
                            while ($data = mysqli_fetch_assoc($qry)) {
                        ?>
                        <option value="<?php echo $data['id'];?>"><?php echo $data['class'];?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <label for="set_id"><strong>Question Set:</strong></label>
                <div class="input-group mb-3">
                    <select class="form-control" name="set_id" id="set_id">
                        <option value='' disabled selected>Select set</option>
                    </select>
                </div>
                <label for="question"><strong>Question:</strong></label>
                <textarea class="form-control value_reset" rows="3" name="question" id="question"></textarea>
                <label for="a"><strong>Option a:</strong></label>
                <input type="text" name="a" class="form-control value_reset" id="a">
                <label for="b"><strong>Option b:</strong></label>
                <input type="text" name="b" class="form-control value_reset" id="b">
                <label for="c"><strong>Option c:</strong></label>
                <input type="text" name="c" class="form-control value_reset" id="c">
                <label for="d"><strong>Option d:</strong></label>
                <input type="text" name="d" class="form-control value_reset" id="d">
                <label for="answer"><strong>Answer:</strong></label>
                <select class="custom-select value_reset" id="answer" name="answer">
                    <option value="" disabled selected>Select Answer</option>
                    <option value="a">Option a</option>
                    <option value="b">Option b</option>
                    <option value="c">Option c</option>
                    <option value="d">Option d</option>
                </select>
                <div style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="btn btn-warning">SUBMIT</button>
                </div>
            </form>
        </div>
        <div class="col-md-7 form-section">
            <h2>
                <center>Question Table</center>
            </h2>
            <form method="POST" id="question_search" action="controller/Question_viewCtrl.php">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="class_id"><strong>Class:</strong></label>
                            <?php
                                $qry = mysqli_query($conn,"SELECT * FROM class");
                            ?>
                            <select name="class_id" class="form-control" onChange="classChange(this.value, 'T')">
                                <option value="" disabled selected>Choose Class</option>
                                <?php
                                    while ($data = mysqli_fetch_assoc($qry)) {
                                ?>
                                <option value="<?php echo $data['id'];?>"><?php echo $data['class'];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="set_id2"><strong>Question Set:</strong></label>
                            <select class="form-control" name="set_id" id="set_id2">
                                <option value='' disabled selected>Select set</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <table id="question_table" class="display table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Question</th>
                        <th>Option a</th>
                        <th>Option b</Option></th>
                        <th>Option c</th>
                        <th>Option d</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody class="question_table_body">
                    
                </tbody>

            </table>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        //question_set
        //core_java_code
        function classChange(class_id, type){
			$.ajax({
				url: "controller/get_question_set_data.php",
				type: "POST",
				data:{class_id:class_id},
                dataType: 'json',
				success: function(res){
					//console.log(res);
                    if(type == 'F'){
                        $('#set_id').html('');
                        $('#set_id').html("<option value='' disabled>Select set</option>");
                        $.each(res, function (i, item) {
                            $('#set_id').append($('<option>', { 
                                value: item.id,
                                text : item.name 
                            }));
                        });
                    }else{
                        $('#set_id2').html('');
                        $('#set_id2').html("<option value='' disabled>Select set</option>");
                        $.each(res, function (i, item) {
                            $('#set_id2').append($('<option>', { 
                                value: item.id,
                                text : item.name 
                            }));
                        });
                    }
				}
			});
		}
        $("#question").validate({
			rules: {
				class_id: {
					required: true
				},
				set_id: {
					required: true
				},
				question:{
					required: true
				},
				a:{
					required: true
				},
				b:{
					required: true
                },
                c:{
					required: true
				},
				d:{
					required: true
                },
                answer:{
					required: true
                }
			},

			highlight:function(element,errorClass){
				$(element).parent().addClass('has-error');
				$(element).addClass('has-error');
			},
			unhighlight:function(element,errorClass,validClass){
				$(element).parent().removeClass('has-error');
				$(element).removeClass('has-error');
			},
			submitHandler: function (form){
				var data = $('form').serialize();//no file in the form
				var action = $("#question").attr('action');
				console.log(data);
				$.ajax({
					url: action ,
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							//$("textarea[name=question]").val('');
                            $(".value_reset").val('');
                            //$("input[name=b]").val('');
						}else if(data.key== 'E'){
							toastr.error(data.msg);
						}
						else{
							toastr.error('error');
						}
					},
					error: function(error){
						console.log(error.responseText);
						// console.log(error);
					},
				});
			},
		});
        $("#question_search").validate({
			rules: {
				class_id: {
					required: true
				},
				set_id: {
					required: true
				}
			},
			highlight:function(element,errorClass){
				$(element).parent().addClass('has-error');
				$(element).addClass('has-error');
			},
			unhighlight:function(element,errorClass,validClass){
				$(element).parent().removeClass('has-error');
				$(element).removeClass('has-error');
			},
			submitHandler: function (form){
				var data = $('form').serialize();//no file in the form
				var action = $("#question_search").attr('action');
				console.log(data);
				$.ajax({
					url: action ,
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						console.log(data);
                        var tbody = '';
                        var no=0;
                        $.each(data, function( index, value ) {
                            ++no;
                            tbody += '<tr><td>'+no+'</td><td>'+value.question+'</td><td>'+value.a+'</td><td>'+value.b+'</td><td>'+value.c+'</td><td>'+value.d+'</td><td>'+value.answer+'</td></tr>';
                            console.log(value);
                            //$(this).value('question')
                        });
                        $('.question_table_body').html(tbody);
					},
					error: function(error){
						console.log(error.responseText);
						// console.log(error);
					},
				});
			},
		});
        //logout
        // $('#log_out').on('click',function(){
        //     $.ajax({
        //         url: 'controller/logoutCtrl.php',
        //         type: "GET",
        //         dataType: 'json',
        //         success:function(data){
        //             console.log(data);
        //             if(data.key == 'S'){
        //                 toastr.success(data.msg);
        //                 setTimeout(function(){ 
        //                     window.location.href = "./admin.php"; 
        //                 }, 3000);
        //             }
        //         },
        //         error: function(error){
        //             console.log(error.responseText); 
        //         },
        //     });
        // });
        // $(document).ready(function() {
        //     $('#question_table').DataTable( {

        //     });
        // });
    </script>
</body>
</html>