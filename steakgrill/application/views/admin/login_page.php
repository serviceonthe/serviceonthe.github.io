<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedford</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
               
                <div class="login-panel panel panel-default" style="margin-top: 30%;">   
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                            <?php echo form_open('admin/login'); ?>                            
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="user_email" value="<?php echo set_value('user_email');?>" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="user_password" type="password" value="<?php echo set_value('user_password');?>">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_type">
                                        <option>Select a User Type</option>
                                        <option value="admin"<?php echo set_select('user_type','admin');?> >Admin</option>
                                        <option value="operator"<?php echo set_select('user_type','operator');?> >Operator</option>
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>
                            </fieldset>
                        </form>
                        
                    </div>
                      
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url();?>assets/js/sb-admin.js"></script>

</body>
</html>







