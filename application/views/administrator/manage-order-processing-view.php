<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Manage Processing Orders</h3>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url()?>administrator_page/manage_orders">All</a></li>
                    <li><a href="<?php echo base_url()?>administrator_page/manage_pending_orders">Pending</a></li>
                    <li><a href="<?php echo base_url()?>administrator_page/manage_processing_orders">Processing</a></li>
                    <li><a href="<?php echo base_url()?>administrator_page/manage_shipped_orders">Served</a></li>
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
                            <th>Table Number</th>
                           <!--  <th>Payment Type</th>
                            <th>Payment Status</th> -->
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order){ ?>
                        <?php 
                            if($order->order_status=="Delivered")
                                echo "<tr class='success'>" ;
                            elseif($order->order_status=="Processing"){
                                echo "<tr class='warning'>" ;
                            }
                            else
                                echo "<tr class='danger'>" ;
                        ?>
                            
                            <td><?php echo date("F jS, Y h:i:sa",strtotime($order->date_ordered)) ?></td>
                            <td><?php echo $order->invoice_id?></td>
                            <td><?php echo $order->first_name." ".$order->last_name?></td>
                       <!--      <td><?php echo $order->payment_type?></td>
                            <td><?php echo $order->payment_status?></td> -->
                            <td><?php echo $order->order_status?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url()?>administrator_page/view_order?invoice_id=<?php echo $order->invoice_id?>&id=<?php echo $order->customer_id?>">View Order</a></li>
                                        <li><a href="#" onclick="ship_now('<?php echo $order->invoice_id ?>');">Deliver</a></li>
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
<script>
    function ship_now(id) {
        bootbox.confirm("<font size='4'><b>Are you sure you want to deliver this order now?</b></font><br> <font color='#f00'></font>", function(result) {
            if (result)
                window.location = "<?php echo base_url()?>administrator_page/update_to_shipped?id=" + id;
        });
    }
</script>