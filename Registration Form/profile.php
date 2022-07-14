<?PHP
    require_once('db/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $qry = "SELECT * FROM student_details WHERE id= '".$_GET['student_id']."'";
        $data = mysqli_query($conn, $qry);
        $data2 = mysqli_fetch_assoc($data);
        $f_name = $data2['first_name'];
        $l_name = $data2['last_name'];
        $deparment = $data2['deparment'];
        $email = $data2['email'];
        $phone = $data2['phone_no'];
    ?>
    <div class="container">
        <h2 style="text-align: center;">Profile</h2>
        <table style="width:100%" class="table">
            <tr>
                <th>NAME</th>
                <td>
                    <?php
                        echo $f_name." ".$l_name;
                    ?>
                </td>
            </tr>
            <tr>
                <th>Department</th>
                <td>
                    <?php
                        echo $deparment;
                    ?>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <?php
                        echo $email;
                    ?>
                </td>
            </tr>
            <tr>
                <th>Phone No.</th>
                <td>
                    <?php
                        echo $phone;
                    ?>
                </td>
            </tr>
        </table>
        <a class="btn btn-warning" href="resistration.php?student_id=<?=$_GET['student_id']?>">Edit</a>
        <label class="switch">
            <input type="checkbox" checked>
            <span class="slider"></span>
        </label>
    </div>
</body>
</html>