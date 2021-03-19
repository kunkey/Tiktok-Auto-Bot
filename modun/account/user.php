<?php
require '../../Core.php';
use Core\System;
$kun = new System;

require 'Class.Tiktok.php';

$u = $_POST['username'];
$p = $_POST['password'];


$money_free = 0;
$time = time();
$time_expired = $time + 259200;


	$tiktok = new Tiktok_Api;

	$login = json_encode($tiktok->login($u,$p,null));

	$json = json_decode($login, true);


if($json['message'] == 'error') {
		echo '<script>toastr["error"]("'.$json['data']['description'].'", "Đăng nhập Thất Bại!")</script>';
}else if($json['message'] == 'success') {

	$check = json_encode($tiktok->userInfo($json['data']['user_id']));
	$json_check = json_decode($check, true);



$_SESSION['username'] = $u;
$_SESSION['password'] = $p;

$_SESSION['user_id'] = $json['data']['user_id'];
$_SESSION['name'] = $json['data']['name'];
$_SESSION['gender'] = $json['data']['gender'];
$_SESSION['total_favorited'] = $json_check['user']['total_favorited'];
$_SESSION['follower_count'] = $json_check['user']['follower_count'];
$_SESSION['avatar'] = $kun->img_jpg($json_check['user']['avatar_medium']['url_list'][0]);



        $result = mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `username`='".$_SESSION['username']."'");
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {

	mysqli_query($kun->connect_db(), "UPDATE `users` SET `password` = '".$_SESSION['password']."', `follow_count`='".$_SESSION['follower_count']."', `avatar`='".$_SESSION['avatar']."', `ip`='".$_SERVER['REMOTE_ADDR']."' WHERE `username` = '".$_SESSION['username']."'");

        }else {

            
	mysqli_query($kun->connect_db(), "INSERT INTO `users` (`admin`, `uid`, `name`, `username`, `password`, `follow_count`, `avatar`, `money`, `ip`, `time`, `time_expired`) VALUES ('0', '".$_SESSION['user_id']."', '".$_SESSION['name']."', '".$_SESSION['username']."', '".$_SESSION['password']."', '".$_SESSION['follower_count']."', '".$_SESSION['avatar']."', '".$money_free."', '".$_SERVER['REMOTE_ADDR']."', '".$time."', '".$time_expired."')");

                }









echo '<script>toastr["success"]("WelCome Back '.$_SESSION['name'].'!", "Thành Công!")</script>';
	echo '<meta http-equiv="refresh" content="1;URL=home" />';


}else {
	echo '<script>toastr["error"]("Lỗi Hệ Thống! Vui Lòng Thử Lại Sau!", "Lỗi!")</script>';
}


