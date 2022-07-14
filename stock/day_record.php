<?php
	require_once('./db/connection.php');
?>
<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>
        Day Wise Record
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
</head>

<body class="">
    <div class="wrapper ">
        <!-- ============ Side menu start ==============-->

        <?php include('./common/sidebar.php');?>
            
        <!-- =============Side menu end =============-->
        <div class="main-panel">
            <!-- ============= Header start ======== -->
            <?php include('./common/header.php')?>
            <!-- =========== Header end ==============-->
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">DAY WISE RECORD Table</h4>   
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Srl No.</th>
                                        <th>DATE</th>
                                        <th>SELL</th>
                                        <th>PROFIT</th>
                                    </tr>
                                    <?php
                                        $srl_no = 0;
                                        $qry = mysqli_query($conn,"SELECT date FROM bill GROUP BY date DESC");
                                        while ($data = mysqli_fetch_assoc($qry)) {
                                            $srl_no++;
                                            $qry2 = mysqli_query($conn,"SELECT billing_price, profit FROM bill WHERE date='".$data['date']."'");
                                            $billing_price_day = 0;
                                            $profit_day = 0;
                                            while ($data_2 = mysqli_fetch_assoc($qry2)) {
                                                $billing_price_day = $billing_price_day + $data_2['billing_price'];
                                                $profit_day = $profit_day + $data_2['profit'];
                                            }
                                ?>
                                    <tr>
                                        <td><?=$srl_no?></td>
                                        <td><?=$data['date']?></td>
                                        <td><?=$billing_price_day?></td>
                                        <td><?=$profit_day?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========== Footer & core js Start =========-->
            <?php include('./common/footer.php');?>
            <!-- =========== Footer & core js End =======-->
        </div>
    </div>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
    <script>
        $('.nav-item').removeClass('active');
        $('.dayrecord-li').addClass('active');
    </script>
</body>

</html>
