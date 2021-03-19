<?php 
require '../Core.php';
use Core\System;
$kun = new System;
?>


                            <div class="row" id="result" style=""><div class="col-xl-12">
<div class="card card-default mb-4 mb-lg-5">
										<div class="card-header card-header-border-bottom">
											<h2><center>Auto Comment Tiktok</center></h2>
										</div>

											<div class="card-body p-4 py-xl-6 px-xl-2">



<div class="col-xl-12">

                  <div class="card card-default mt-6 mb-4">
                    <div class="card-body text-center p-4">

                        <div class="image mb-3 mt-n9">
                          <img style="width:150px;" src="<?php echo $_SESSION['avatar'];?>" class="img-fluid rounded-circle" alt="<?php echo $_SESSION['name'];?>">
                        </div>

                        <h5 class="card-title text-dark"><?php echo $_SESSION['name'];?></h5>
<hr>
<center>
<h3>Video của bạn</h3>
</center>   
<br>

<div class="row">
  




                  <div class="col-md-6 col-lg-6 col-xl-4">
                      <div class="card mb-4 bg-gradient-dark">
                        <img class="card-img-top" src="https://i.pinimg.com/originals/b9/5e/2d/b95e2d069f82fb40a6942e2b7e7e2d7f.jpg">
                        <div class="card-img-overlay absolute-bottom">
                          <p class="card-text text-white pb-4 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor </p>
                          <a href="#" class="text-white">Last update 2 mins ago</a>
                        </div>
                      </div>
                    </div>

              
                  <div class="col-md-6 col-lg-6 col-xl-4">
                      <div class="card mb-4 bg-gradient-dark">
                        <img class="card-img-top" src="https://i.pinimg.com/originals/b9/5e/2d/b95e2d069f82fb40a6942e2b7e7e2d7f.jpg">
                        <div class="card-img-overlay absolute-bottom">
                          <p class="card-text text-white pb-4 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor </p>
                          <a href="#" class="text-white">Last update 2 mins ago</a>
                        </div>
                      </div>
                    </div>



                  <div class="col-md-6 col-lg-6 col-xl-4">
                      <div class="card mb-4 bg-gradient-dark">
                        <img class="card-img-top" src="https://i.pinimg.com/originals/b9/5e/2d/b95e2d069f82fb40a6942e2b7e7e2d7f.jpg">
                        <div class="card-img-overlay absolute-bottom">
                          <p class="card-text text-white pb-4 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor </p>
                          <a href="#" class="text-white">Last update 2 mins ago</a>
                        </div>
                      </div>
                    </div>


</div>




                      </div>
                    </div>
                  </div>
                </div>





                    </div>

</div>


<script type="text/javascript">
$(document).ready(function(){



 $.ajax({
        url: '/modun/action/get_user_video.php',
                type: 'POST',
                dataType: 'json',
                data: {}
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



</script></div>
                            



                                              </div>
                                                
                                            </div>