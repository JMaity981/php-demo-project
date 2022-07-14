<?php
    require_once('../db/connection.php');

    $qry=mysqli_query($conn,"SELECT * FROM batch_id WHERE fk_product_category_id='".$_POST['product_category_id']."'");
    $var=[];
    while($row=mysqli_fetch_assoc($qry)){
        $var[]=$row;
    }
    echo json_encode($var);
?>