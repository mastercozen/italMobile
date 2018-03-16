

<!--QUICK VIEW MODAL-->
<div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title"></h4>
            </div>
            <form action="#" method="post" id="ajax-prod-form">
                <input type="text"  name="hd-stocks" id="hd-stocks" hidden>
            <div class="modal-body">
                <div class="product-modal">
                    <table border="0" align="center" >
                        <tr>
                            <td colspan="2"><img src="#" width="200" id="ajax-prod-image"/><br><br></td>
                        </tr>
                        
                        <tr>
                            <td>Product</td>
                            <td id="ajax-prod-name"></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td id="ajax-prod-id"></td>
                        </tr>
                        <tr>
                            <td>Main Ingredient</td>
                            <td id="ajax-prod-main_ing" width="100%"></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td id="ajax-prod-desc" width="100%"></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td id="ajax-prod-price" width="100%"></td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>
                                <div>
                                    <select name="size" class="form-control" id="quick-view-select">
                                        <option value="haha" id="please-select-size" selected disabled>Please select</option>
                                        <option value="xs" id="size-xs">XS</option>
                                        <option value="sm" id="size-s">S</option>
                                        <option value="md" id="size-m">M</option>
                                        <option value="lg" id="size-l">L</option>
                                        <option value="xl" id="size-xl">XL</option>
                                        <option value="xxl" id="size-2xl">2XL</option>
                                        <option value="xxxl" id="size-3xl">3XL</option>
                                        <option value="one" id="size-one">One size</option>
                                    </select>
                                </div>
                                
                                <div id="stocks-available" style="margin:5px; color:#f00; font-family: calibri;" ></div>
                               <!--  <div id="stocks-available-walkin" style="margin:5px; color:#f00; font-family: calibri;" ></div> -->
                        </tr>
                        <tr id="quantity-wrapper">
                            <td>Quantity</td>
                            <td><input type="number" name="quantity"  class="form-control" id="prod-quantity"/></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-id="0"data-dismiss="modal">Cancel</button>
                <?php  if($this->session->userdata('customer_logged_in')){ ?>
                    <button type="submit" class="btn btn-warning" id="add-to-cart" >Add to Cart</button>
                <?php  }else{ ?>
                    <a data-toggle="modal" onclick="not_logged_in()" class="btn btn-warning" role="button">Add to Cart</a>
                <?php  } ?>
                
            </div>
            </form>
        </div>
    </div>
</div>


                <script>
                    function not_logged_in() {
                        bootbox.confirm("You need to Log in.", function(x) {
                            if (x)
                                window.location = "<?php echo base_url() . 'register_mobile' ?>";
                        });
                    }
                </script>
                <script>
                    
                    
                    function quick_view(id){
                        $.LoadingOverlay("show");
                        
                        
                        $("#quantity-wrapper").hide();
                        $("#prod-quantity").val("0");
                        $("#quick-view-select option[value='haha']").prop('selected', 'selected');
                        $("#add-to-cart").attr('disabled','disabled');
                        
                        $("#stocks-available").hide();
                        $("#stocks-available-walkin").hide();
                        $.ajax({
                            url : "<?php echo base_url('administrator_page/ajax_view_product_by_id')?>/"+id,
                            type: "POST",

                            success: function(data){
                                
                                var json = JSON.parse(data);
                                var product_id=(json['result'][0]['product_id']);
                                var product_name=(json['result'][0]['product_name']);
                                var main_ing=(json['result'][0]['main_ing']);
                                var image=(json['result'][0]['image_path']);
                                var desc=(json['result'][0]['description']);
                                var price=(json['result'][0]['price']);

                                if(json['result'][0]['sizing']=='One'){
                                    $('#size-xs').hide();
                                    $('#size-s').hide();
                                    $('#size-m').hide();
                                    $('#size-l').hide();
                                    $('#size-xl').hide();
                                    $('#size-2xl').hide();
                                    $('#size-3xl').hide();
                                    $('#size-one').show();

                                }
                                if(json['result'][0]['sizing']=='Multi'){
                                    $('#size-xs').show();
                                    $('#size-s').show();
                                    $('#size-m').show();
                                    $('#size-l').show();
                                    $('#size-xl').show();
                                    $('#size-2xl').show();
                                    $('#size-3xl').show();
                                    $('#size-one').hide();
                                }
                                
                                
                                $("#ajax-prod-form").attr("action", "<?php echo base_url() . 'shop/add_to_cart/'?>"+product_id);

                                $('#ajax-prod-id').text(product_id);
                                $('#ajax-prod-name').text(product_name); 
                                $('#ajax-prod-main_ing').text(main_ing); 
                                $("#ajax-prod-image").attr("src", "<?php echo base_url().'uploads/products/'?>"+image);
                                $("#ajax-prod-desc").text(desc); 
                                $("#ajax-prod-price").text(price); 
                                $.LoadingOverlay("hide");
                                $('#viewProductModal').modal('show');
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown){
                                alert('Error !');
                            }
                        });
                    }
                </script>
                
                <script>
                $( "#quick-view-select" ).change(function () {
                    $.LoadingOverlay("show");
                    
                    var product_id = $("#ajax-prod-id").text();
                    var size = $("#quick-view-select option:selected").attr("value");
                    
                  
                    $.ajax({
                        url : "<?php echo base_url()?>shop/test?id="+product_id+"&size="+size,  
                      type: "POST",

                        success: function(data){
                            var json = JSON.parse(data);
                            
                            console.log(data);
                            $("#stocks-available").text("Available Orders: "+json['result'][0][size]);
                            $("#stocks-available-walkin").text("Walkin: "+json['result2'][0][size]);
                            
                            $("#hd-stocks").val(json['result'][0][size]);
     
                            $("#stocks-available").show();
                            $("#stocks-available-walkin").show();
                            if (json['result'][0][size]==0) {
                                $("#add-to-cart").attr('disabled','disabled');
                                $("#quantity-wrapper").hide();
                            }
                            
                            if (json['result'][0][size]>0) {
                                $("#add-to-cart").prop("disabled", false);
                                $("#quantity-wrapper").show();
                            }
                            
                            $.LoadingOverlay("hide");
                            $('#viewProductModal').modal('show');
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            alert('Error !');
                        }
                    }); 
                    
                });
                
                </script>

