<?php 
require '../Core.php';
use Core\System;
$kun = new System;

        $result = mysqli_query($kun->connect_db(), "SELECT * FROM `bot_comment` WHERE `username`='".$_SESSION['username']."'");

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if($row['status'] == 'true') {
        	$checked = 'checked';
        }else {
        	$checked = '';
        }

?>

<div class="card card-default mb-4 mb-lg-5">
										<div class="card-header card-header-border-bottom">
											<h2><center>Bot Comment Tiktok</center></h2>
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
	

											<label id="trangthai" class="switch switch-text switch-primary switch-pill form-control-label">
												<input type="checkbox" id="option" class="switch-input form-check-input" <?php echo $checked;?>>
												<span class="switch-label" data-on="On" data-off="Off"></span>
												<span class="switch-handle"></span>
											</label>


	
</center>


											<p class="card-text text-center mb-3">Nhập nội dung bình luận vào khung bên dưới sau đó Click vào công tắc để bật hoặc tắt bot comment. </p>




												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-comment-text-multiple"></i>
														</span>
													</div>
													<textarea id="noidung" class="form-control" placeholder="Nhập nội bình luận, mỗi bình luận để một dòng nha!" style="margin-top: 0px; margin-bottom: 0px; height: 120px;"><?php echo htmlentities($row['noidung']);?></textarea>
												</div>









											
											</div>
										</div>
									</div>
								</div>





										</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	if(!$('#noidung').val()) {
		$('#trangthai').hide();
	}

	$('#noidung').keyup(function(){
  if($(this).val().length)
    $('#trangthai').show();
  else
    $('#trangthai').hide();
	});


	var checkbox = $('input[id="option"]'); 

	  checkbox.change(function(){

  	var checked = $(this).prop('checked');

  	if(checked == true) {

  		if(!$('#noidung').val()) {
  			toastr["error"]("Vui lòng nhập nội dung bình luận vào khung rồi mới bật bot!", "Lỗi!");
  		}else {
  			send_action(checked, 'bot_comment', $('#noidung').val());
  		}



  	}else {
			send_action(checked, 'bot_comment', $('#noidung').val());
  	}


  });
});

function send_action(option, action, msg) {
 $.ajax({
 				url: 'modun/action/'+action+'.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    option: option,
                    noidung: msg
                }
            }).done(function(json) {
            	if(json.status == true){
            		toastr["success"]("Bật Bot Comment Thành Công!", "Thông Báo!");
           		 }else {
            		toastr["info"]("Tắt Bot Comment Thành Công!", "Thông Báo!");
            	}

            });
}

</script>