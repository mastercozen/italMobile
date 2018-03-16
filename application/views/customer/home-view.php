                
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> 
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <?php foreach($cms as $x):?>
                <img src="<?php echo base_url()?>assets/images/<?php echo $x->home_header_bg?>" class="xheader">

                <!--Services-->
                <div class="container-fluid text-center services-content">
                    <p class="services-header">Italian Cuisine At It's Finest?</p>
                    <br><br><br>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <span class="glyphicon glyphicon-list-alt logo-small"></span>
                            <h3>Choose</h3>
                            <p class="services-desc">Choose your Order</p>
                        </div>
                        <div class="col-md-2">
                            <i class="fa fa-bullseye logo-small"></i>
                            <h3>Dine with Us</h3>
                            <p class="services-desc">experience Italy</p>
                        </div>
						<div class="col-md-2">
                           <i class="fa fa-truck logo-small"></i></span>
                            <h3>or Have it To Go</h3>
                            <p class="services-desc">Delivery Coming Soon</p>
                        </div>
                        <div class="col-md-2">
                           <i class="fa fa-cc-paypal logo-small"></i></span>
                            <h3>and Pay</h3>
                            <p class="services-desc">Pay</p>
                        </div>
                        
                    </div>
                </div>

                <!--About us-->
                <div class="container-fluid who-are-we" style="background-image:url(<?php echo base_url()?>assets/images/<?php echo $x->home_about_bg?>);">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p class="waw-header">About Us</p>
                        <br>
                        <p class="waw-description gray"><!-- <?php echo 'WELCOME'?> --></p>
                        <br>
                        <br>
                        <a href="<?php echo base_url()?>shop" class="btn btn-warning btn-lg">Go to Shop now</a>
                    </div>
                </div>
                <?php endforeach ?>
                


                <style>
                    /*--------------------------------------*/
                    .xheader{
                        width:100%;
                        
                    }
                    .xheader img{
                        width:100%;

                    }
                    /*--------------------------------------*/
                    .who-are-we{
                        height: 100%;
                        
                        background-size:auto 100%;
                    	     background-position: center;
                        color:#fff;
                        font-family: customfont1;
                        text-align: center;
                        padding:350px 0px 350px 0px;
                        
                    }
                    .waw-header{
                        font-size:30px;
                        
                    }
                    .waw-description{
                        font-size:14px;
                    }


                    /*--------------------------------------*/
                    .services-content{
                        background-color:#fff;
                        background: -webkit-linear-gradient(bottom, #fff , #c1c1c1);
                        background: -o-linear-gradient(bottom, #fff, #c1c1c1);
                        background: -moz-linear-gradient(bottom, #fff, #c1c1c1); 
                        background: linear-gradient(to bottom, #fff , #c1c1c1); 
                        padding:50px 0px 20px 0px;
                        box-shadow:0px 0px 50px #000;
                        font-family:customfont1;
                        color:#606060;
                        position:relative;
                        z-index: 50;
                        
                    }
                    .logo-small {
                        color: #6B6219;
                        font-size: 50px;
                    }
                    .services-header{
                        font-size: 35px;
                        text-transform: uppercase;
                        color: #6B6219;
                    }
                    .services-desc{
                        margin-bottom:60px;
                        font-size: 14px;
                        color:#888;
                    }

                </style>