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
                $qry=mysqli_query($conn,"SELECT registration.*,class.class FROM registration INNER JOIN class ON registration.class_id=class.id");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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