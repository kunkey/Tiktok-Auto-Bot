<?php
require '../../Core.php';
use Core\System;
$kun = new System;

$thread =  10; 



$time = time();

		//$data = array('status' => false, 'msg' => '');

if(!is_numeric($_POST['limit'])) {
		$data = array('status' => false, 'msg' => 'Đã Phát hiện thấy lỗi gian lận! Lỗi: Số Lượng không phải dạng số!');	
		die(json_encode($data));
}



if($_POST['limit'] > $thread) {
		$data = array('status' => false, 'msg' => 'Đã Phát hiện thấy lỗi gian lận! Lỗi: Số lượng auto quá hạn mức!');	
		die(json_encode($data));
}


        $result = mysqli_query($kun->connect_db(), "SELECT * FROM `auto_log` WHERE `user_id`='".$_SESSION['user_id']."'");
        $row = mysqli_fetch_array($result);

        $kiemtra = $time - $row['time']; 


        if($kiemtra >= 900) {

        	$soluong = $_POST['limit'];



		$res = mysqli_query($kun->connect_db(),"SELECT * FROM `clone` ORDER BY rand() LIMIT 0, {$soluong}");
		


		while ($req = mysqli_fetch_array($res)) {
			
			$clone_user = $req['username'];
			$clone_pass = $req['password'];

require 'Class.Tiktok.php';

$tiktok = new Tiktok_Api;

$login = json_encode($tiktok->login($clone_user,$clone_pass,null));

$json = json_decode($login, true);


if($json['message'] == 'success') {

	$check = $tiktok->follow($_SESSION['user_id']);
	$status = json_encode($check);

	log_data('log/log_follow.txt', $status);

}



		}


        //mysqli_query($kun->connect_db(), "INSERT INTO `auto_log` (`user_id`, `time`) VALUES ('".$_SESSION['user_id']."', '".$time."')");


		$data = array('status' => true, 'msg' => 'Auto Follow Thành công! Vui lòng chờ 15 phút để tiếp tục!');	
		die(json_encode($data));

        }else {

		$data = array('status' => false, 'msg' => 'Bạn vừa chạy Auto! Vui lòng chờ đủ 15 phút để chạy tiếp!');	
		die(json_encode($data));
		
        	
        }




function log_data($file, $contents) {

	$f = fopen($file, 'w');
	fwrite($f, $contents."\n\n");
	fclose($f);

}




?>
