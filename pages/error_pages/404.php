<?php
error_reporting(1);
require '../../Core.php';
use Core\System;
$kun = new System;
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title -->
    <title>404 - ERROR</title>
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">


    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo $kun->config('home');?>styles/css/animate.css"/>
    <link rel="stylesheet" href="<?php echo $kun->config('home');?>styles/css/bootstrap.css"/>

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo $kun->config('home');?>styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="<?php echo $kun->config('home');?>styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="<?php echo $kun->config('home');?>styles/style.css">
</head>
<body class="blank">

<!-- Wrapper-->
<div class="wrapper">


    <!-- Main content-->
    <section class="content">

 <div class="container-center md animated slideInDown">

            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-close-circle"></i>
                </div>
                <div class="header-title">
                    <h3>404</h3>
                    <small>
                        Page Not Found
                    </small>
                </div>
            </div>

            <div class="panel panel-filled">
                <div class="panel-body">
                    Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.

                </div>
            </div>
            <div>
                <a href="/home.html" class="btn btn-accent"><i class="fas fa-caret-left"></i> Quay lại trang chủ</a>
            </div>

        </div>
    </section>
    <!-- End main content-->

</div>
<p id="result" style="display: none"></p>

<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="<?php echo $kun->config('home');?>styles/js/pace.min.js"></script>
<script src="<?php echo $kun->config('home');?>styles/js/jquery.min.js"></script>
<script src="<?php echo $kun->config('home');?>styles/js/bootstrap.min.js"></script>

<!-- App scripts -->
<script src="<?php echo $kun->config('home');?>styles/scripts/luna.js"></script>



</body>

</html>