<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Task Manager Web App</title>
    <meta name = "viewport" content = "width = 630">
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <link rel="icon" type="image/jpg" href="images/cornfuse_white.jpg">
	<link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Mobile Menu Style -->
    <link href="public/css/mobile-menu.css" rel="stylesheet">

    <!-- Owl carousel -->
    <link href="public/css/owl.carousel.css" rel="stylesheet">
    <link href="public/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- Theme Style -->
    <link href="public/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="public/css/custom.css">
    
    <link rel="stylesheet" type="text/css" href="public/css/animated.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <body>	
        <div class="container_sty">
            <div class="container">
                    <?php
                            $time =  time();
                            $actual_time_modify = date('h:i A — D M dS Y', $time+3600);
                            $time_current = date('h:i A', $time+3600);
                            $date_current = date('Y-m-d', $time+3600);
                            echo " <span class='time'>
                                        $actual_time_modify
                                   </span>";
                     
                		 require('nav.php'); 
                     ?>