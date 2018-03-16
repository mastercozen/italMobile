
                
                <section id="contact">
                    <div class="container-fluid">
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
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <br>
                                <h3 class="section-heading">Feedback</h3>
                                <h4 class="section-subheading gray">What can you say about our shop? Yay or nah?</h4>
                                <br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <form action="<?php echo base_url()?>feedback/send_feedback" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name *" value="<?php echo set_value('name');?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="Enter Your Email *" value="<?php echo set_value('email');?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone *" value="<?php echo set_value('phone');?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" placeholder="Enter Your Message *" value="<?php echo set_value('message');?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-12 text-center">
                                            <div id="success"></div>
                                            <input type="submit" class="btn btn-warning btn-md" value="Send Message">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>