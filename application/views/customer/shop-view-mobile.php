                <?php $user_session = $this->session->userdata('customer_logged_in');?>   
                <link href="<?php echo base_url()?>assets/css/multi-columns-row.css" rel="stylesheet">
                <style>
                        .multi-columns-row .col-xs-6 {
                                margin-bottom: 30px;
                        }
                </style>
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
                    
                    <div class="row">
                        <div class="product-container">
                            <div class="col-md-12">
                                <div class="row multi-columns-row">
                                    <?php foreach ($products as $product){?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-height productbox-wrapper">
                                        <div class="productbox">
                                            <img src="<?php echo base_url() ?>uploads/products/<?= $product->image_path ?>" class="img-responsive " >
                                            <div class="producttitle"><?= $product->product_name ?></div>
                                            <div class="productprice">
                                                <div class="pull-right">
                                                    <a onclick="quick_view('<?php echo $product->product_id ?>')" class="btn btn-default btn-sm add-to-cart" role="button">Quick View</a>
                                                </div>
                                                <div class="pricetext">
                                                    &#8369;&nbsp;<?php echo $product->price ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <?php if ($this->session->userdata('customer_logged_in')) { ?>
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Item Cart</h3>
                                </div>
                                <div class="panel-body">
                                    <?php echo form_open('shop-mobile/update_Cart'); ?><form action="<?php echo base_url() ?>shop-mobile/update_Cart" method="post">
                                        <table class="table table-striped">
                                            <tr>
                                                <th></th>
                                                <th>QTY</th>
                                                <th>Name</th>
                                                
                                                <th style="text-align:right">Item Price</th>
                                                <th style="text-align:right">Sub-Total</th>
                                            </tr>
                                            <?php $i = 1; ?>
                                            <?php foreach ($this->cart->contents() as $items): ?>
                                                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                                <tr>
                                                    <td>
                                                        <a href="<?= base_url() ?>shop-mobile/remove_to_cart/<?php echo $items['rowid'] ?>" >Remove</a>
                                                    </td>
                                                    
                                                    
                                                    <!-- haha -->
                                                    
                                                        <?php echo form_input(array('name' => $i . '[id]', 'value' => $items['id'], 'hidden'=>true)); ?>
                                                        <?php echo form_input(array('name' => $i . '[name]', 'value' => $items['name'], 'hidden'=>true)); ?>
                                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                                           
                                                            <?php echo form_input(array('name' => $i . '[size]', 'value' => $option_value,'hidden'=>true)); ?>
                                                            

                                                        <?php endforeach; ?>
                                                    
                                                    <!-- haha -->
                                                    
                                                    
                                                    
                                                    <td>
                                                        <?php echo form_input(array('class'=>'form-control','name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','readonly'=>true)); ?>
                                                        <!--<?php echo form_input(array('name' => $i . '[qty2]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','readonly'=>true,'hidden'=>true)); ?>-->
                                                    </td>

                                                    <td>
                                                        <?php echo $items['name']; ?>
                                                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                                            <p>
                                                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                                    <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                                <?php endforeach; ?>
                                                            </p>

                                                        <?php endif; ?>

                                                    </td>
                                                    <td style="text-align:right">
                                                        &#8369;<?php echo $this->cart->format_number($items['price']); ?>
                                                    </td>
                                                    <td style="text-align:right">
                                                        &#8369;<?php echo $this->cart->format_number($items['subtotal']); ?>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                            <tr><td colspan="5"><br><br></td></tr>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="right"><strong>Total</strong></td>
                                                <td class="right">&#8369;<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                            </tr>

                                        </table>
                                        
                                       
                                        
                                        <a href="#" onclick="remove_all()"class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Remove All</a>
                                        
                                      
                                
                                        <a href="#viewShippingAddressModal" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok"></span> Place Order</a>
                                    </form>

                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
                <script>
                function remove_all() {
                    bootbox.confirm("<font size='4'><b>Are you sure you want to remove all items in your cart?</b></font>", function(result) {
                        if (result)
                            window.location = "<?php echo base_url() ?>shop_mobile/destroy_Cart";
                    });
                }
                </script>
                
                
                
                
                