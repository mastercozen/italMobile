<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> 
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-lg-4 col-md-12">
            <div style="background-color:#fff; padding:0px 40px 20px 40px; border:5px solid #CFB614; margin-top:50px; border-radius:5px; box-shadow:0px 0px 5px #000;">
                <form action="<?php echo base_url() ?>register/login" method="post">
                    <div class="page-header">
                        <h3>Login</h3>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control input-sm"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control input-sm"/>
                    </div> 
                    <div class="form-group">
                        <br>
                        <input type="submit" class="btn btn-warning btn-sm" value="Login">&nbsp;&nbsp;<a href="#" data-target="#forgot-password" data-toggle="modal">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
        <!--<div class="col-lg-4 col-md-12">
            <div style="background-color:#FFFFF7; padding:0px 40px 20px 40px; border:5px solid #CFB614; margin-top:50px; border-radius:5px; box-shadow:0px 0px 5px #000;">
                <form method="post" action="<?php echo base_url();?>register/registration">    
                    <div class="page-header">
                        <h3>Sign up</h3>
                    </div>
                    <div class="form-group">
                        First name
                        <input type="text" class="form-control input-sm" name="first-name" value="<?php echo set_value('first-name');?>">
                    </div>
                    <div class="form-group">
                        Middle name
                        <input type="text" class="form-control input-sm" name="middle-name" value="<?php echo set_value('middle-name');?>">
                    </div>
                    <div class="form-group">
                        Last name
                        <input type="text" class="form-control input-sm" name="last-name" value="<?php echo set_value('last-name');?>">
                    </div>
                    <div class="form-group">
                        Email
                        <input type="text" class="form-control input-sm" name="email" value="<?php echo set_value('email');?>">
                    </div>
                    <div class="form-group">
                        Password
                        <input type="password" class="form-control input-sm" name="password" >
                    </div><BR>

                    <div class="form-group">
                         Captcha
                         <?php  echo $widget;?>
                         <?php  echo $script;?>
                    </div>
                    <div class="form-group text-center">
                        <br>
                        <input type="submit" class="btn btn-warning btn-sm" value="Register">
                    </div>
                    
                </form>
            </div>
        </div>-->
    </div>
</div>
<br><br><br><br><br>
<style>
    
</style>