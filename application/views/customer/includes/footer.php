                <?php foreach($footer as $x):?>
                <footer>
                    <div class="footer" id="footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                                    <h3> <img src="<?php echo base_url() ?>assets/images/logo.png" width="100%"> </h3>
                                </div>
                                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                                    <h3>Links</h3>
                                    <ul>
                                        <li> <a href="<?php echo base_url()?>home"> Home </a> </li>
                                        <li> <a href="<?php echo base_url()?>shop"> Shop </a> </li>
                                        <li> <a href="<?php echo base_url()?>feedback"> Feedback </a> </li>
                                        <!--<li> <a href="<?php echo base_url()?>download"> Download </a> </li>-->
                                    </ul>
                                </div>
                                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                                    <h3>Visit us at</h3>
                                    <ul>
                                        <li><b>Address</b><a target="_blank" href="<?php echo $x->address_map_link?>"><?php echo $x->address?></a></li>
                                        <li><b>Store Hours</b><a style="text-decoration:none;"><?php echo $x->days_open?><br><?php echo $x->store_hours?></a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                                    <h3>Contact us</h3>
                                    <ul>
                                        <li><b>Telephone</b> <a href="tel:<?php echo $x->contact_number?>"><?php echo $x->contact_number?></a><br></li>
                                    </ul>
                                </div>
                                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6"></div>
                                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6"></div>
                                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                                    <h3> Social Accounts </h3>

                                    <ul class="social">
                                        <li> <a href="<?php echo $x->facebook?>" target="_blank"> <i class=" fa fa-facebook">   </i> </a> </li>
                                        <li> <a href="<?php echo $x->twitter?>" target="_blank"> <i class="fa fa-twitter">   </i> </a> </li>
                                        <li> <a href="<?php echo $x->instagram?>" target="_blank"> <i class="fa fa-instagram">   </i> </a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-bottom">
                        <div class="container">
                            <p class="pull-left"> Italiannis ® 2018. Squammy Inc © 2018.  All rights reserved.</p>
                            <div class="pull-right">
                                <ul class="nav nav-pills payments">
                                    <!-- <li><i class="fa fa-cc-paypal"></i></li> -->
                                </ul>
                                
                            </div>
                        </div>
                    </div> 
                </footer>
                <?php endforeach?>
		    <div class="footer-bottom">
                        <div class="container">
                            
                        <p>
                            Web Developer: <a href="https://www.facebook.com/Master">Squammy</a><br>
                            Mobile Developer: <a href="https://www.facebook.com/Master">Squammy</a><br>
                           
                            Documentation:  <a href="https://www.facebook.com/Master">Squammy</a>
                        </p>
                            
                        </div>
                    </div> 
            </div>
        </div>
    </body>
</html>


