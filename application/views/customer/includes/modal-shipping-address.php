
<!--SHIPPING ADDRESS MODAL-->
<div class="modal fade" id="viewShippingAddressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Table Number</h4>
            </div>
            <form action="<?php echo base_url()?>shop/place_order" method="post" id="check-out-form">
            <div class="modal-body">
                <div class="product-modal">
                    <?php 
                    if(empty($addresses)){
                        echo "NO ADDRESS FOUND";
                    }
                    else{
                    ?>
                    <?php foreach ($addresses as $address) { ?>
                    	<input type="hidden" name="state" value="<?php echo $address->state ?>">
                    <?php } ?> 
                    
                   
                    <select name="shipping-address" class="form-control">
                        <?php foreach ($addresses as $address) { ?>
                            
                            <option value="<?php echo $address->street.", ".$address->city.", ".$address->zip?>">
                                <?php 
                                    echo $address->street. " " .
                                         $address->city.   "  " 
                                ?>
                            </option>
                        <?php } ?>  
                            
                    <?php } ?>  
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <?php $user_session = $this->session->userdata('customer_logged_in');?>   
                
               <!--  <a href="<?php echo base_url() ?>profile?id=<?php echo $user_session['id'];?>" id="add-address-link">Add New Address</a><br> -->
                <div id="check-out-wrapper" style="font-size:17px; font-family:calibri; color:#606060;">
                    <input type="image" src="<?php echo base_url()?>assets/images/paypal-checkout.png" id="check-out-btn">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    
    
    $('#check-out-btn').click(function(e) {
        e.preventDefault();

    bootbox.confirm('<font color="#f00">By clicking the "OK" Button, you agree to our Terms and condtions below:</font><br><br>\n\
    <b>PURCHASE TERMS AND CONDITIONS</b><br>\n\
   1. Pay as you order.\n\
    ', function(result) {
        
        
        if (result) {
            $('#check-out-form').submit();
        }
    });
});
</script>










