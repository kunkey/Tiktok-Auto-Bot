<?php 
error_reporting(0);
require '../Core.php';
use Core\System;
$kun = new System;
require 'Class.Tiktok.php';

$limit_bot = 5; // thả tim 5 post liền lúc
$time = time();

    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `bot_tha_tym` ORDER BY RAND() LIMIT 0,10");

    if($result) {

	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

		$username = $row['username'];
		$password = $row['password'];


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

		 $video_id = $aweme_list[$i]['aweme_id'];
		 $tha_tim = $tiktok->heart($video_id);
		 $data_tha_tim = json_encode($tha_tim);
		 $json_tha_tim = json_decode($data_tha_tim, true);

		 /*** DEBUG 
		 echo $video_id;
		 echo '<br>';
		 echo $data_tha_tim;
		 echo '<hr>';
			***/

		 if($json_tha_tim['extra']['now']) {
		 	$cmd = "INSERT INTO `history` (`username`, `action`, `text`, `time`) VALUES ('".$username."', 'bot_tha_tym', 'Bạn vừa thả tim video <a href=\'https://t.tiktok.com/i18n/share/video/".$video_id."\' target=\'_blank\'>".$video_id."</a>', '".$time."')";
		 	//echo $cmd.'<br>';
		 	mysqli_query($kun->connect_db(), $cmd);
		 	echo $username.' thả tim video <a href="https://t.tiktok.com/i18n/share/video/'.$video_id.'" target="_blank">'.$video_id.'</a>';
		 	echo '<hr>';		 	
		 } // Kiểm tra khi thả tim có lỗi không


	} // Vòng Lặp Thả Tym


} // Check Xem Có Video Mới Không





	} // End Check Acc Login



	}	 // End While  



    }	// End Result Check Query