<script>
    $(document).ready(function(){
           $('#captcha_check').click(function()
             { 
                var captcha_value=$('input#captcha_value').val(); 
             });
    });    
</script>


<div class="col-md-8">
    <div class="page-body animated zoomIn">
        <div class="validation_error" style="color:red;">  
          <?php echo validation_errors(); ?> 
        </div> 
        <!--Start For display success and error massage -->
            <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-success" id="mydiv">
	            <button type="button" class="close" data-dismiss="alert">×</button>
	            <span>
		            <?php if($this->session->flashdata('message')) {
		            echo '<div class="message"> ';
		            echo ''.$this->session->flashdata('message').'';
		            //$this->session->keep_flashdata('message');
		            echo'</div>';
		            }?>
	            </span> 
            </div>    
            <script>
	            setTimeout(function() {
	            $('#mydiv').fadeOut('fast');
	            }, 4000); // <-- time in milliseconds
            </script>

            <?php } ?>
            <?php if($this->session->flashdata('danger')) { ?>
            <div class="alert alert-danger" id="mydivdanger">
	            <button type="button" class="close" data-dismiss="alert">×</button>
	            <span>
		            <?php if($this->session->flashdata('danger')) {
		            echo '<div class="danger"> ';
		            echo ''.$this->session->flashdata('danger').'';
		            //$this->session->keep_flashdata('message');
		            echo'</div>';
		            }?>
	            </span> 
            </div>    
            <script>
	            setTimeout(function() {
	            $('#mydivdanger').fadeOut('fast');
	            }, 4000); // <-- time in milliseconds
            </script>

            <?php } ?>

        <!-- /End For display success and error massage -->
            <div class="row">
                <div class="col-md-3"></div>
					<div class="col-md-6">
						<h4>Login</h4>
						<form class="form-horizontal" method="POST" action="access">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-md-3 control-label">Email: </label>
						    <div class="col-md-9">
						      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Enter your email Address">
						    </div><br>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-md-3 control-label">Order pin or Password: </label>
						    <div class="col-md-9">
						      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Enter order pin or password">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-3 col-sm-9">
						      <div class="checkbox">
								<a href="<?php echo base_url(); ?>user/reset_password"> Forgot your password?</a>
						        <button class="btn btn-success" type="login"> Login </button>
						         or <a href="<?php echo base_url(); ?>home/registration" class="btn btn-info" type="login" > Sign up </a>
						      </div>
						    </div>
						  </div>
						</form><br>
						
					</div>
						<div class="col-md-4"></div>
		        </div>
		    </div>
		</div>

