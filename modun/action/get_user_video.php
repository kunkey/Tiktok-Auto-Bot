<?php
require '../../Core.php';
use Core\System;
$kun = new System;

$clone_user = 'choulinng';
$clone_pass = '01635912116@Aa';


require 'Class.Tiktok.php';


$tiktok = new Tiktok_Api;

$login = json_encode($tiktok->login($clone_user,$clone_pass,null));

$json = json_decode($login, true);

echo var_dump($json);

if($json['message'] == 'success') {

	$check = $tiktok->userMedias($_SESSION['user_id'], 0);
	//$status = json_decode($check, true);

//echo $check;



}

