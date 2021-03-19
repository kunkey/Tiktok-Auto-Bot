<?php 
require '../Core.php';
use Core\System;
$kun = new System;
?>


                            <div class="row" id="result" style=""><div class="col-xl-12">
<div class="card card-default mb-4 mb-lg-5">
										<div class="card-header card-header-border-bottom">
											<h2><center>Auto Heart Tiktok</center></h2>
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
  
<div class="col-md-6 col-xs-12 col-lg-6 col-md-offset-5">

                        <div class="form-group">
                          <label for="exampleFormControlSelect3">Số Lượng Follow</label>
                          <select class="form-control" id="limit">

                            <?php 
                            for($i=1;$i<=10;$i++) {
                              echo '<option value="'.$i.'">'.$i.' follow</option>';
                            }
                            ?>
                            
                          </select>
                        </div>


</div>

  



                      <p class="card-text text-center mb-3" id="refer">Click vào nút "Auto" bên dưới để Auto Follow. </p>
                      


              <button id="auto_follow" type="button" class="mb-1 btn btn-primary">Auto</button>



</center>

                      </div>
                    </div>
                  </div>
                </div>





                    </div>

</div>


<script type="text/javascript">
$(document).ready(function(){

$('#auto_follow').click(function() {

 $.ajax({
        url: '/system/auto_follows',
                type: 'POST',
                dataType: 'json',
                data: {
                    limit: $('#limit').val()
                }
            }).done(function(json) {


              if(json.status == true){

                toastr["success"](json.msg, "Thành công!");
                $('#refer').html(json.msg);

               }else {
                toastr["error"](json.msg, "Lỗi!");
                $('#refer').html(json.msg);
              }



            });

});

});



</script></div>
                            



                                              </div>
                                                
                                            </div>