<?php
require '../../Core.php';
use Core\System;
$kun = new System;

$time = time();

switch ($_POST['option']) {
	case 'true':

        mysqli_query($kun->connect_db(), "INSERT INTO `bot_follow` (`username`, `password`, `time`) VALUES ('".$_SESSION['username']."', '".$_SESSION['password']."', '".$time."')");

		$data = array('status' => true);
		break;




	case 'false':

        mysqli_query($kun->connect_db(), "DELETE FROM `bot_follow` WHERE `username` = '".$_SESSION['username']."' ");

		$data = array('status' => false);
		break;



	default:
		$data = array('status' => false);
		break;
}

die(json_encode($data));