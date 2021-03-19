<?php 
require '../Core.php';
use Core\System;
$kun = new System;

        $result = mysqli_query($kun->connect_db(), "SELECT * FROM `history` WHERE `username`='".$_SESSION['username']."' ORDER BY id DESC LIMIT 0,30");

?>





<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Lịch Sử Hoạt Động</h2>
										</div>

										<div class="card-body p-0" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;">
											
											<div class="simplebar-mask">
												<div class="simplebar-offset" style="right: 0px; bottom: 0px;">
													<div class="simplebar-content-wrapper" style="height: 600px; overflow-y: auto;">
														<div class="simplebar-content" style="padding: 0px;">




<?php 

		if($result) {

	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

		$arr_color = array('success', 'primary', 'warning', 'info');
		$rand_color = $arr_color[rand(0, count($arr_color)-1)];

		switch ($row['action']) {
			case 'bot_tha_tym':
				$icon = 'mdi-heart-outline';
				$action = 'Bot Thả Tim';
				break;

			case 'bot_comment':
				$icon = 'mdi-comment-text-multiple';
				$action = 'Bot Comment';
				break;

			case 'bot_follow':
				$icon = 'mdi-account-multiple-plus-outline';
				$action = 'Bot Follow';
				break;

			default:
				$icon = 'mdi-help';
				$action = 'Hành Động Chưa Xác Định';
				break;
		}


?>




											<div class="media media-border-bottom py-3 align-items-center justify-content-between border-bottom px-5">
												<div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-<?php echo $rand_color;?> text-white">
													<i class="mdi <?php echo $icon;?> font-size-20"></i>
												</div>
												<div class="media-body pr-3">
													<a class="mt-0 mb-1 font-size-15 text-dark"><?php echo $action;?></a>
													<p><?php echo $row['text'];?></p>
												</div>

												<span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> <?php echo $kun->time_ago($row['time']);?></span>
											</div>

<?

}
		}
?>



														</div>
													</div>
												</div>
											</div>
											
										</div>
										
										
									</div>
										<div class="mt-3"></div>

			</div>