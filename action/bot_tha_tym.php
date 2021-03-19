<?php 
require '../Core.php';
use Core\System;
$kun = new System;

        $result = mysqli_query($kun->connect_db(), "SELECT * FROM `bot_tha_tym` WHERE `username`='".$_SESSION['username']."'");
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
        	$checked = 'checked';
        }else {
        	$checked = '';
        }

?>

<div class="card card-default mb-4 mb-lg-5">
										<div class="card-header card-header-border-bottom">
											<h2><center>Bot Thả Tym Tiktok</center></h2>
										</div>

											<div class="card-body p-4 py-xl-6 px-xl-2">




<div class="col-xl-12">
									<div class="card card-default mt-6 mb-4">
										<div class="card-body text-center p-4">

												<div class="image mb-3 mt-n9">
													<img style="width:150px;" src="<?php echo $_SESSION['avatar'];?>" class="img-fluid rounded-circle" alt="<?php echo $_SESSION['name'];?>">
												</div>

												<h5 class="card-title text-dark"><?php echo $_SESSION['name'];?></h5>

<center>
	

											<label class="switch switch-text switch-primary switch-pill form-control-label">
												<input type="checkbox" id="option" class="switch-input form-check-input" <?php echo $checked;?>>
												<span class="switch-label" data-on="On" data-off="Off"></span>
												<span class="switch-handle"></span>
											</label>


	
</center>


											<p class="card-text text-center mb-3">Click vào công tắc để bật hoặc tắt bot thả tym. </p>
											
											</div>
										</div>
									</div>
								</div>





										</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	var checkbox = $('input[id="option"]'); 

	  checkbox.change(function(){

  	var checked = $(this).prop('checked');

  	send_action(checked, 'bot_tha_tym');

  });
});

function send_action(option, action) {
 $.ajax({
 				url: 'modun/action/'+action+'.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    option: option
                }
            }).done(function(json) {
            	if(json.status == true){
            		toastr["success"]("Bật Bot Thành Công!", "Thông Báo!");
           		 }else {
            		toastr["info"]("Tắt Bot Thành Công!", "Thông Báo!");
            	}

            });
}

</script>