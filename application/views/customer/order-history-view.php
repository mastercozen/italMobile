                
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
                <br><br><br>
                <div class="container">
                    <div class="row">
                        <div class="panel panel-warning" style="margin:10px;">
                            <div class="panel-heading">
                                View Order History
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Date Ordered</th>
                                            <th>Invoice ID</th>
                                            <th>Order Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($orders as $order){?>
                                        <tr>
                                            <td><?php echo $order->date_ordered?></td>
                                            <td><?php echo $order->invoice_id?></td>
                                            <td><?php echo $order->order_status?></td>
                                            <td>
                                                <a href="#" onclick="view_order_details('<?php echo $order->invoice_id ?>')" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                
<script>
    function view_order_details(id){
        $.LoadingOverlay("show");
        $.ajax({
            url : "<?php echo base_url('shop/ajax_view_order_by_id')?>/"+id,
            type: "POST",

            success: function(data){
                var json = JSON.parse(data);
                
                console.log(data);
                $('#ajax-view-order-header').html('Invoice ID: '+json['order'][0]['invoice_id']);
                $('#ajax-customer-name').html(json['order'][0]['first_name']);
                $('#ajax-invoice-id').html(json['order'][0]['invoice_id']);
                $('#ajax-payment-type').html(json['order'][0]['payment_type']);
                $('#ajax-pp-txn-id').html(json['order'][0]['transaction_id']);
                $('#ajax-order-status').html(json['order'][0]['order_status']);
                $('#ajax-payment-status').html(json['order'][0]['payment_status']);
                $('#ajax-shipping-address').html(json['order'][0]['shipping_address']);
                $('#ajax-date-ordered').html(json['order'][0]['date_ordered']);
                
                
                var content = "<table class='table table-striped table-condensed'><tr><th>Name</th><th>Price</th><th>Quantity</th><th>Size</th><th>Subtotal</th></tr>"
                for(var i = 0; i < json['order_details'].length; i++) { 
                    content += '<tr><td>' + json['order_details'][i]['name'] + '</td> <td>' + json['order_details'][i]['price'] + '</td> <td>' + json['order_details'][i]['quantity'] + '</td> <td>' + json['order_details'][i]['size'] + '</td> <td>' + json['order_details'][i]['subtotal'] + '</td></tr>';
                }
                $('#view-order-table').html(content);
                $.LoadingOverlay("hide");
                $('#viewOrderDetails').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error !');
            }
        });
    }
</script>
                