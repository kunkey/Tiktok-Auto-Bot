<?php
error_reporting(0);
require 'Core.php';
use Core\System;
$kun = new System;




if($_SESSION['username'] && $_SESSION['password']) {
$user = $kun->user();

 require 'pages/main.php';
}else {
	header('Location: signin.html');
}
