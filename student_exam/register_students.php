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
    <title>All Resistration Student</title>
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css">
    <link href="assets/css-cdn/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <a href="controller/Admin_logoutCtrl.php" class="btn btn-warning">Log Out</a>
        <h3><u><center>Resstration Students</center></u></h3>
        <table style="width: 100%;">
            <tr>
                <th>Sl no.</th>
                <th>Name</th>
                <th>Class</th>
                <th>Roll No.</th>
                <th>Result</th>
            </tr>
            <?php
                $sl_no=0;
                $qry=mysqli_query($conn,"SELECT exam_registration.*,exam_class.class FROM exam_registration INNER JOIN exam_class ON exam_registration.class_id=exam_class.id");
                while($data=mysqli_fetch_assoc($qry)){
                    $sl_no++;
            ?>
            <tr>
                <td><?=$sl_no?></td>
                <td><?=$data["name"]?></td>
                <td><?=$data["class"]?></td>
                <td><?=$data["roll_no"]?></td>
                <td><button type="button" class="btn btn-primary result" id="result" data-id="<?=$data["id"]?>">VIEW</button></td>
            </tr>
        <?php
            }
        ?>
        </table>
        <!-- RESULT MODAL Start -->
        <div class="modal fade" id="result_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Result</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width: 100%;" class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Srl. No.</th>
                                    <th>Question Set</th>
                                    <th>Right Ans.</th>
                                    <th>Wrong Ans.</th>
                                    <th>Blank Ans.</th>
                                    <th>Full Marks</th>
                                    <th>Your Marks</th>
                                    <th>Parsentage</th>
                                    <th>Date and Time</th>
                                </tr>
                            </thead>
                            <tbody class="result_tbody">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- RESULT MODAL Closes -->
    </div>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
    <script src="assets/js-cdn/jquery.dataTables.min.js"></script>
    <script>
        $(".result").on('click', function() {
            $('#result_modal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "controller/ResultValueSetCtrl.php",
                data: {
                    s_id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    var tbody='';
                    jQuery.each( response, function( i, array ) {
                        tbody += '<tr><td>'+array.srl_no+'</td>'+
                                '<td>'+array.question_set+'</td>'+
                                '<td>'+array.right_ans+'</td>'+
                                '<td>'+array.wrong_ans+'</td>'+
                                '<td>'+array.blank_ans+'</td>'+
                                '<td>'+array.full_marks+'</td>'+
                                '<td>'+array.your_marks+'</td>'+
                                '<td>'+array.parsentage+'</td>'+
                                '<td>'+array.date_and_time+'</td></tr>'
                    });
                    $('.result_tbody').html(tbody);
                },
                error: function(error) {
                    console.log(error.responseText);
                },
            });
        });
    </script>
</body>
</html>