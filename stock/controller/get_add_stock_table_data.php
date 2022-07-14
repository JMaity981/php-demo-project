<?php
    require_once('../db/connection.php');
    $qry=mysqli_query($conn,"SELECT * FROM add_stock WHERE id='".$_POST['product_id']."'");
    $var=[];
    while($row=mysqli_fetch_assoc($qry)){
        $var[]=$row;
    }
    echo json_encode($var);
?>