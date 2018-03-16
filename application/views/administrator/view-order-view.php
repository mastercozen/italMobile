    <div class="content-wrapper">
    &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>administrator_page/manage_orders" class="btn btn-primary btn-md">Go Back</a>
    <div class="container" style="border:1px solid #e1e1e1;
                                  background-image:url('<?php echo base_url()?>assets/images/paper.jpg');
                                  box-shadow:0px 0px 5px #303030;
                                 ">
        <div class="page-header">
            <img src="<?php echo base_url()?>assets/images/logo.png" width="200"><br><br>
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
        <br>
        <div class="row">
            <div class="col-md-12">
                <?php foreach($orders as $order){?>
                <table class="table table-bordered">
                     <tr>
                         <th>Customer Name</th>
                         <td><?php echo $order->first_name." ".$order->last_name ?></td>
                     </tr>
                     <tr>
                         <th>Invoice ID</th>
                         <td><?php echo $order->invoice_id ?></td>
                     </tr>
                     <tr>
                         <th>Payment Type</th>
                         <td><?php echo $order->payment_type ?></td>
                     </tr>
                     <!-- <tr>
                         <th>PayPal Transaction ID</th>
                         <td><?php echo $order->transaction_id ?></td>
                     </tr> -->
                     <tr>
                         <th>Order Status</th>
                         <td><?php echo $order->order_status ?></td>
                     </tr>
                     <tr>
                         <th>Payment Status</th>
                         <td><?php echo $order->payment_status ?></td>
                     </tr>
                     <tr>
                         <th>Shipping Address</th>
                         <td><?php echo $order->shipping_address ?></td>
                     </tr>
                     <tr>
                         <th>Date Ordered</th>
                         <td><?php echo $order->date_ordered ?></td>
                     </tr>
                 </table>
                <?php } ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>PRODUCT ID</th>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>SIZE</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total=0 ?>
                        <?php foreach($order_details as $item){?>
                        <tr>
                            <td><?php echo $item->product_id ?></td>
                            <td><?php echo $item->name ?></td>
                            <td>&#8369; <?php echo $item->price ?></td>
                            <td><?php echo $item->quantity ?></td>
                            <td><?php echo $item->size ?></td>
                            <td>&#8369; <?php echo $item->subtotal ?></td>
                            <?php $total=$total+$item->subtotal?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <table style="float:right">
                    <thead>
                        <th><h4>Total:</h4></th>
                        <th><h4>&#8369; <?php echo number_format($total);?></h4></th>
                    </thead>
                </table>
                
                <br><br><br><br>
                http://www.Italiannis.com/
                <br><br>
            </div>
        </div>
    </div>
</div>