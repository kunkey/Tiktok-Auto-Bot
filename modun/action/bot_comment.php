<?php
require '../../Core.php';
use Core\System;
$kun = new System;

$time = time();




switch ($_POST['option']) {
	case 'true':



        $result = mysqli_query($kun->connect_db(), "SELECT * FROM `bot_comment` WHERE `username`='".$_SESSION['username']."'");
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {

        mysqli_query($kun->connect_db(), "UPDATE `bot_comment` SET `username` = '".$_SESSION['username']."', `password` = '".$_SESSION['password']."', `noidung` = '".$_POST['noidung']."', `status` = '".$_POST['option']."', `time`='".$time."' WHERE `username` = '".$_SESSION['username']."'");

        }else {

        mysqli_query($kun->connect_db(), "INSERT INTO `bot_comment` (`username`, `password`, `noidung`, `status`, `time`) VALUES ('".$_SESSION['username']."', '".$_SESSION['password']."', '".$_POST['noidung']."', '".$_POST['option']."', '".$time."')");
        	
        }








		$data = array('status' => true);
		break;




	case 'false':

        mysqli_query($kun->connect_db(), "UPDATE `bot_comment` SET `username` = '".$_SESSION['username']."', `password` = '".$_SESSION['password']."', `noidung` = '".$_POST['noidung']."', `status` = '".$_POST['option']."', `time`='".$time."' WHERE `username` = '".$_SESSION['username']."'");


		$data = array('status' => false);
		break;



	default:
		$data = array('status' => false);
		break;
}

die(json_encode($data));