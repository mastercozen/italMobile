<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Content Management</h3>
        </div>
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

        <!--SHOP PAGE HEADER-->
        <?php foreach($cms as $y):?>
        <div class="row">
            <div class=" col-md-3"></div>
            <div class=" col-md-6">
                <form action="<?php echo base_url()?>administrator_page/update_shop_page_header" method="post" enctype="multipart/form-data">
                    <h4><b>Shop Page Header</b></h4>
                    <img src="<?php echo base_url()?>assets/images/<?php echo $y->shop_banner?>" width="100%">
                    <br><br>

                    <input type="file" name="userfile" class="form-control">
                    <br>
                    <input type="submit" class="btn btn-primary btn-sm" value="Update">
                </form>
            </div>
        </div>

        <hr>
         <!--HOME PAGE HEADER-->
        <div class="row">
            <div class=" col-md-3"></div>
            <div class=" col-md-6">
                <form action="<?php echo base_url()?>administrator_page/update_home_page_header" method="post" enctype="multipart/form-data">
                    <h4><b>Home Page Header</b></h4>
                    <img src="<?php echo base_url()?>assets/images/<?php echo $y->home_header_bg?>" width="100%">
                    <br><br>
                    <input type="file" name="userfile" class="form-control">
                    <br>
                    <input type="submit" class="btn btn-primary btn-sm" value="Update">
                </form>
            </div>
        </div>

        <hr>
         <!--ABOUT US-->
        <div class="row">
            <div class=" col-md-3"></div>
            <div class=" col-md-6">
                <form action="<?php echo base_url()?>administrator_page/update_about_us_bg" method="post" enctype="multipart/form-data">
                    <h4><b>About Us (Background Image)</b></h4>

                    <img src="<?php echo base_url()?>assets/images/<?php echo $y->home_about_bg?>" width="100%">
                    <br><br>
                    <input type="file" name="userfile" class="form-control">
                    <br>
                    <input type="submit" class="btn btn-primary btn-sm" value="Update">
                </form>
            </div>
        </div>

        <hr>
        <!--ABOUT US-->
        <div class="row">
            <div class=" col-md-3"></div>
            <div class=" col-md-6">
                <form action="<?php echo base_url()?>administrator_page/update_about_us_desc" method="post">
                    <h4><b>About Us</b></h4>
                    Address<br>
                    <textarea name="desc" class="form-control"><?php echo $y->home_about_desc?></textarea>
                    <br>
                    <input type="submit" class="btn btn-primary btn-sm" value="Update">
                </form>
            </div>
        </div>




        <?php endforeach ?>

        <hr>
         <!--SOCIAL-->
        <?php foreach($footer as $x):?>
        <div class="row">
            <div class=" col-md-3"></div>
            <div class=" col-md-4">
                <form action="<?php echo base_url()?>administrator_page/update_social" method="post">
                    <h4><b>Social Accounts</b></h4>

                    Facebook Link<br>
                    <input type="text" name="fb" class="form-control" value="<?php echo $x->facebook?>">
                    <br>

                    Twitter Link<br>
                    <input type="text" name="tw" class="form-control" value="<?php echo $x->twitter?>">
                    <br>

                    Instagram Link<br>
                    <input type="text" name="in" class="form-control" value="<?php echo $x->instagram?>">
                    <br>
                    <input type="submit" class="btn btn-primary btn-sm" value="Update">
                </form>
            </div>
        </div>
        <hr>

         <!--CONTACT US-->
        <div class="row">
            <div class=" col-md-3"></div>
            <div class=" col-md-4">
                <form action="<?php echo base_url()?>administrator_page/update_contact" method="post">
                    <h4><b>Contact us</b></h4>

                    Address<br>
                    <textarea name="address" class="form-control"><?php echo $x->address?></textarea>
                    <br>

                    Address Google Map Coordinates<br>
                    <textarea name="address-link" class="form-control"><?php echo $x->address_map_link?></textarea>
                    <br>

                    Days Open<br>
                    <input type="text" name="days-open" class="form-control" value="<?php echo $x->days_open?>">
                    <br>

                    Store Hours<br>
                    <input type="text" name="store-hours" class="form-control" value="<?php echo $x->store_hours?>">
                    <br>

                    Telephone<br>
                    <input type="text" name="number" class="form-control" value="<?php echo $x->contact_number?>">
                    <br>

                    <input type="submit" class="btn btn-primary btn-sm" value="Update">
                </form>
            </div>
        </div>
        <?php endforeach?>

        <br><br><br><br>
    </div>
</div>