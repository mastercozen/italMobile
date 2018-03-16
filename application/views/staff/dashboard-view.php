<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Italiannis Dashboard</h3>
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
        <div class="row">
            <div class="col-md-12">
                <?php if(!$message_count==0):?>
                <div class="alert alert-danger">
                    <b>Stock Alert Notification:</b> You have <?php echo $message_count?> Stock Alert Notifications. <a href="<?php echo base_url()?>staff_page/stock_alert">View Notification</a>
                </div>
                <?php endif?>
                <?php if(!$new_contest_designs==0):?>
                <div class="alert alert-success">
                    <b>Contest Notification:</b> There are <?php echo $new_contest_designs?> new uploaded designs in the Contest. <a href="<?php echo base_url()?>staff_page/manage_design_pending">View Entry</a>
                </div>
                <?php endif?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box-wrapper">
                    <div class="box-header box-blue">
                        Total Customers
                    </div>
                    <div class="box-body">
                        <p><span class="glyphicon glyphicon-user"></span> <?php echo $total_customers?> Customers</p>
                        <a href="<?php echo base_url()?>staff_page/customer_settings"><span class="glyphicon glyphicon-search"></span> View</a>
                    </div>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="box-wrapper">
                    <div class="box-header box-red">
                        Products In-Display
                    </div>
                    <div class="box-body">
                        <p><span class="glyphicon glyphicon-th"></span> <?php echo $active_products?> Products</p>
                        <a href="<?php echo base_url()?>staff_page/manage_product"><span class="glyphicon glyphicon-search"></span> View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-wrapper">
                    <div class="box-header box-green">
                        New Orders
                    </div>
                    <div class="box-body">
                        <p><span class="glyphicon glyphicon-align-justify"></span> <?php echo $new_orders?> Orders</p>
                        <a href="<?php echo base_url()?>staff_page/manage_pending_orders"><span class="glyphicon glyphicon-search"></span> View</a>
                    </div>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="box-wrapper">
                    <div class="box-header box-green">
                        Total Feedbacks
                    </div>
                    <div class="box-body">
                        <p><span class="glyphicon glyphicon-user"></span> <?php echo $feedbacks?> Feedbacks</p>
                        <a href="<?php echo base_url()?>staff_page/view_feedbacks"><span class="glyphicon glyphicon-search"></span> View</a>
                    </div>
                </div>
            </div>
        </div>
        <style>
        .box-wrapper{
            border-radius:5px;

            box-shadow: 0px 0px 1px #404040;
        }
        .box-header{
            border-radius:5px 5px 0px 0px;
            background-color: #e1e1e1;
            padding:10px;
        }
        .box-body{
            border-radius:0px 0px 5px 5px;
            background-color: #fafafa;
            padding:30px;
            
            
        }
        .box-body p{
            font-size:25px;
        }
        .box-blue{background-color: #428bca; color:#fff;}
        .box-red{background-color: #d9534f; color:#fff;}
        .box-yellow{background-color: #f0ad4e; color:#fff;}
        .box-green{background-color: #5cb85c; color:#fff;}
        </style>
    </div>
</div>

        