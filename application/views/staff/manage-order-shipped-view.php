<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Shipped Orders</h3>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url()?>staff_page/manage_orders">All</a></li>
                    <li><a href="<?php echo base_url()?>staff_page/manage_pending_orders">Pending</a></li>
                    <li><a href="<?php echo base_url()?>staff_page/manage_processing_orders">Processing</a></li>
                    <li><a href="<?php echo base_url()?>staff_page/manage_shipped_orders">Shipped</a></li>
                </ul>
            </div>
        </nav>
        <br>
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
        <br>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date Ordered</th>
                            <th>Invoice ID</th>
                            <th>Customer Name</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order){ ?>
                        <?php 
                            if($order->order_status=="Shipped")
                                echo "<tr class='success'>" ;
                            elseif($order->order_status=="Processing"){
                                echo "<tr class='warning'>" ;
                            }
                            else
                                echo "<tr class='danger'>" ;
                        ?>
                            
                            <td><?php echo $order->date_ordered ?></td>
                            <td><?php echo $order->invoice_id?></td>
                            <td><?php echo $order->first_name." ".$order->last_name?></td>
                            <td><?php echo $order->payment_type?></td>
                            <td><?php echo $order->payment_status?></td>
                            <td><?php echo $order->order_status?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url()?>staff_page/view_order?invoice_id=<?php echo $order->invoice_id?>&id=<?php echo $order->customer_id?>">View Order</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>