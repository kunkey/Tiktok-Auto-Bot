<?php 
error_reporting(0);
require '../Core.php';
use Core\System;
$kun = new System;
require 'Class.Tiktok.php';

$limit_bot = 3; // thả tim 5 post liền lúc
$time = time();

    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `bot_comment` WHERE `status`='true' ORDER BY RAND() LIMIT 0,10");

    if($result) {

	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

		$username = $row['username'];
		$password = $row['password'];
		$string_noidung = $row['noidung'];
		$noidung = explode("\n", $string_noidung);

	$tiktok = new Tiktok_Api;

	$login = json_encode($tiktok->login($username,$password,null));

	$json = json_decode($login, true);


	if($json['message'] == 'error') {
		echo $json['data']['description'];
		echo '<hr>';
	}else if($json['message'] == 'success') {


	$newfeed = json_encode($tiktok->ForYou());

	$json_data = json_decode($newfeed ,true);

	$aweme_list = $json_data['aweme_list'];

if($aweme_list[0]['aweme_id']) {



	for ($i=0; $i <= $limit_bot -1 ; $i++) { 

		 $msg = $noidung[rand(0, count($noidung)-1)];

		 $video_id = $aweme_list[$i]['aweme_id'];
		 $tha_tim = $tiktok->CmtPost($video_id, $msg);
		 $data_tha_tim = json_encode($tha_tim);
		 $json_tha_tim = json_decode($data_tha_tim, true);

		 /***
		 echo $video_id;
		 echo '<br>';
		 echo $data_tha_tim;
		 echo '<hr>';
			***/

		 if($json_tha_tim['status_msg'] == "Bình luận được gửi đi thành công") {
		 	$cmd = "INSERT INTO `history` (`username`, `action`, `text`, `time`) VALUES ('".$username."', 'bot_comment', 'Bạn vừa bình luận video <a href=\'https://t.tiktok.com/i18n/share/video/".$video_id."\' target=\'_blank\'>".$video_id."</a>', '".$time."')";
		 	//echo $cmd.'<br>';
		 	mysqli_query($kun->connect_db(), $cmd);
		 	echo $username.' comment video <a href="https://t.tiktok.com/i18n/share/video/'.$video_id.'" target="_blank">'.$video_id.'</a> => '.$msg;
		 	echo '<hr>';		 	
		 } // Kiểm tra khi thả tim có lỗi không


	} // Vòng Lặp Thả Tym


} // Check Xem Có Video Mới Không





	} // End Check Acc Login



	}	 // End While  



    }	// End Result Check Query