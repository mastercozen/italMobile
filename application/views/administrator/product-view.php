<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Manage Product</h3>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url() ?>administrator_page/manage_product">Products</a></li>
                    <li><a href="<?php echo base_url() ?>administrator_page/stocks_online">Current Online Stocks</a></li>
                    <li><a href="<?php echo base_url() ?>administrator_page/stocks_walkin">Current Walkin Stocks</a></li> 
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button"   class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> 
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-product-modal">Add Product</button> 
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#add-product-type-modal">Add Product Type</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Type</th>
                            <th>Sizing</th>
                            <th>Main Ingredient</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) { ?>
                            <?php 
                            if($product->status=="Active")
                                echo "<tr class='success'>" ;
                            else
                                echo "<tr class='danger'>" ;
                            ?>
                                <td><?php echo $product->product_id ?></td>
                                <td><img src="<?php echo base_url()."uploads/products/".$product->image_path ?> " width="50px">&nbsp;&nbsp;&nbsp;<a data-toggle="modal" href="#view-image-modal" id="viewImage" onclick="edit_image('<?php echo $product->product_id ?>')"><?php echo $product->product_name ?></a></td>
                                <td><?php echo $product->type ?></td>
                                <td><?php echo $product->sizing ?></td>
                                <td><?php echo $product->main_ing ?></td>
                                <td>&#8369;<?php echo number_format($product->price) ?></td>
                                <td><?php echo $product->status ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" id="editBtn" onclick="edit_product('<?php echo $product->product_id ?>')"><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                                            <li><a href="#" id="viewImage" onclick="edit_image('<?php echo $product->product_id ?>')"><span class="glyphicon glyphicon-picture"></span> Update Image</a></li>
                                            <li><a href="#" onclick="delete_product('<?php echo $product->product_id ?>');"><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
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
    <br>
    <br><br><br><br><br>
</div>





<!--ADD PRODUCT MODAL-->
<div class="modal fade madal" id="add-product-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Product</h4>
            </div>
            <form method="post" action="<?php echo base_url() . 'administrator_page/add_product' ?>" enctype="multipart/form-data">
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" id="name" name="product-name" placeholder="" value="<?php echo set_value('product-name');?>">
                </div>
                <div class="form-group">
                    <label>Product Type</label>
                    <select name="type" class="form-control">
                        <?php foreach($product_type as $x):?>
                        <option><?php echo $x->type?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sizing</label>
                    <select class="form-control" id="name" name="sizing">
                        <option value="One">One size </option>
                        <option value="Multi">Multi size </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Main Ingredient</label>
                    <input type="text" class="form-control" id="name" name="main_ing" placeholder="" value="<?php echo set_value('main_ing');?>">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" style="resize: none;" value="<?php echo set_value('description');?>"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" id="name" name="status">
                        <option value="Active">Active</option>
                        <option value="Not Active">Not Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">Php</div>
                        <input type="number" class="form-control" id="exampleInputAmount" placeholder="" name="price" value="<?php echo set_value('price');?>" step="0.01">
                    </div>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <div class="input-group">
                       <input type="file" class="form-control" name="userfile">
                    </div>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Item</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--Edit PRODUCT MODAL-->
<div class="modal fade modal" id="edit-product-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Product</h4>
            </div>
            <form method="post" action="<?php echo base_url() . 'administrator_page/update_product' ?>" enctype="multipart/form-data">     
            <div class="modal-body">

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" id="edit-name" name="product-name" placeholder="" value="">
                    <input type="text" id="fake-id" name="product-id" readonly hidden>
                </div>
                 <div class="form-group">
                    <label>Product Type</label>
                    <select name="type" class="form-control" id="edit-type">
                        <?php foreach($product_type as $x):?>
                        <option><?php echo $x->type?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Main Ingredient</label>
                    <input type="text" class="form-control" id="edit-main_ing" name="main_ing" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" id="edit-description" name="description" style="resize: none;"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" id="edit-status" name="status">
                        <option value="Active" id="option-active">Active</option>
                        <option value="Not Active" id="option-not-active">Not Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">Php</div>
                        <input type="number" class="form-control" id="edit-price" placeholder="" name="price" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Item</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--View Image MODAL-->
<div class="modal fade modal" id="view-image-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View</h4>
            </div>
            <form method="post" action="<?php echo base_url() . 'administrator_page/update_product_image' ?>" enctype="multipart/form-data">
                 <input type="text" id="fake-id2" name="product-id" readonly hidden>
                 <input type="text"name="product-name" id="ajax-name" hidden>
            <div class="modal-body">
                <img src="#" id="view-image"style="width:100%;">
                <br><br>
                <div class="form-group">
                   
                <label>Change Image</label>
                <div class="input-group">
                   <input type="file" class="form-control" name="userfile">
                </div>
                </div>
            </div>            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Change Image</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function delete_product(id) {
        bootbox.confirm("Are you sure you want to delete This item?", function(result) {
            if (result)
                window.location = "<?php echo base_url() . 'administrator_page/delete_product/' ?>" + id;
        });
    }
</script>
<script>
    function edit_product(id){
        $.LoadingOverlay("show");
        $.ajax({
            url : "<?php echo base_url('administrator_page/ajax_view_product_by_id')?>/"+id,
            type: "POST",
            success: function(data){
                var json = JSON.parse(data);
                var product_id=(json['result'][0]['product_id']);
                var product_name=(json['result'][0]['product_name']);
                var type=(json['result'][0]['type']);
                 var main_ing=(json['result'][0]['color']);
                var description=(json['result'][0]['description']);
                var status=(json['result'][0]['status']);
                var price=(json['result'][0]['price']);

                if(status==="Active"){
                    $('#option-active').attr('selected','selected')
                }
                if(status==="Not Active"){
                     $('#option-not-active').attr('selected','selected')
                }

                $("#fake-id").val(product_id); 
                $("#edit-name").val(product_name); 
                $("#edit-type").val(type); 
                $("#edit-color").val(main_ing); 
                $("#edit-description").val(description); 
                $("#edit-price").val(Math.floor(price)); 
                
                $.LoadingOverlay("hide");
                $('#edit-product-modal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error !');
            }
        });
    }
    function edit_image(id){
        $.LoadingOverlay("show");
        $.ajax({
            url : "<?php echo base_url('administrator_page/ajax_view_product_by_id')?>/"+id,
            type: "POST",
            success: function(data){
        
                var json = JSON.parse(data);
                var product_id=(json['result'][0]['product_id']);
                var name=(json['result'][0]['product_name']);
                var image=(json['result'][0]['image_path']);
                
                $("#fake-id2").val(product_id); 
                $("#ajax-name").val(name); 
                $("#view-image").attr("src", "<?php echo base_url().'uploads/products/'?>"+image)
                
                $.LoadingOverlay("hide");
                $('#view-image-modal').modal('show');
                
                
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error !');
            }
        });
    }
    
</script>

<!--ADD PRODUCT TYPE MODAL-->
<div class="modal fade modal" id="add-product-type-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Product</h4>
            </div>
            <form method="post" action="<?php echo base_url() . 'administrator_page/add_product_type' ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>New Product Type</label>
                    <input type="text" class="form-control" name="product-type" value="<?php echo set_value('product-type');?>">
                </div>
                <div class="container-fluid">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Existing Product Types</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($product_type as $x): ?>
                            <tr>
                                <td><?php echo $x->type?></td>
                                <td><a href="#" onclick="delete_type('<?php echo $x->type ?>')">Delete</a></td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Item</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
function delete_type(type){
        $.LoadingOverlay("show");
        $.ajax({
            url : "<?php echo base_url('administrator_page/delete_product_type')?>/"+type,
            type: "POST",
            success: function(data){
                var json = JSON.parse(data);

                if(json==1){
                    $.LoadingOverlay("hide");
                    bootbox.alert("You cannot delete this product type because it is used by an existing product.");
                }
                if(json==0){
                    $.LoadingOverlay("hide");
                    location.reload();
                }


                

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error !');
            }
        });
    }
</script>