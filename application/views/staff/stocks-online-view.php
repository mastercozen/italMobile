<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Manage Online Stocks</h3>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url() ?>staff_page/manage_product">Products</a></li>
                    <li><a href="<?php echo base_url() ?>staff_page/stocks_online">Current Online Stocks</a></li>
                    <li><a href="<?php echo base_url() ?>staff_page/stocks_walkin">Current Walkin Stocks</a></li> 
                </ul>
            </div>
        </nav>
        
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
                <style>
                    .no-s{
                        background-color:#f2dede;
                    }
                    .with-s{
                        background-color:#dff0d8;
                    }
                </style>
                <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Type</th>
                            <th>Sizing</th>
                            <th>XS Stocks</th>
                            <th>SM Stocks</th>
                            <th>MD Stocks</th>
                            <th>LG Stocks</th>
                            <th>XL Stocks</th>
                            <th>XXL Stocks</th>
                            <th>XXXL Stocks</th>
                            <th>One size</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td><?php echo $product->product_id ?></td>
                                <td><img src="<?php echo base_url()."uploads/products/".$product->image_path ?> " width="40px">&nbsp;&nbsp;&nbsp;<?php echo $product->product_name ?></td>
                                <td><?php echo $product->type ?></td>
                                <td><?php echo $product->sizing ?></td>
                                
                                <!--XS-->
                                <?php 
                                    if($product->sizing=="One") 
                                        echo "<td class='no-s'>"."N/A"; 
                                    
                                    elseif($product->xs==0) 
                                        echo "<td class='no-s'>".$product->xs ; 
                                    
                                    else 
                                        echo "<td class='with-s'>".$product->xs ;
                                ?>
                                </td>
                                
                                <!--SM-->
                                <?php 
                                    if($product->sizing=="One") 
                                        echo "<td class='no-s'>"."N/A"; 
                                    
                                    elseif($product->sm==0) 
                                        echo "<td class='no-s'>".$product->sm ; 
                                    
                                    else 
                                        echo "<td class='with-s'>".$product->sm ;
                                ?>
                                </td>
                                
                                <!--MD-->
                                <?php 
                                    if($product->sizing=="One") 
                                        echo "<td class='no-s'>"."N/A"; 
                                    
                                    elseif($product->md==0) 
                                        echo "<td class='no-s'>".$product->md ; 
                                    
                                    else 
                                        echo "<td class='with-s'>".$product->md ;
                                ?>
                                </td>
                                
                                <!--LG-->
                                <?php 
                                    if($product->sizing=="One") 
                                        echo "<td class='no-s'>"."N/A"; 
                                    
                                    elseif($product->lg==0) 
                                        echo "<td class='no-s'>".$product->lg ; 
                                    
                                    else 
                                        echo "<td class='with-s'>".$product->lg ;
                                ?>
                                </td>
                                
                                <!--XL-->
                                <?php 
                                    if($product->sizing=="One") 
                                        echo "<td class='no-s'>"."N/A"; 
                                    
                                    elseif($product->xl==0) 
                                        echo "<td class='no-s'>".$product->xl ; 
                                    
                                    else 
                                        echo "<td class='with-s'>".$product->xl ;
                                ?>
                                </td>
                                
                                <!--XXL-->
                                <?php 
                                    if($product->sizing=="One") 
                                        echo "<td class='no-s'>"."N/A"; 
                                    
                                    elseif($product->xxl==0) 
                                        echo "<td class='no-s'>".$product->xxl ; 
                                    
                                    else 
                                        echo "<td class='with-s'>".$product->xxl ;
                                ?>
                                </td>
                                
                                <!--XXXL-->
                                <?php 
                                    if($product->sizing=="One") 
                                        echo "<td class='no-s'>"."N/A"; 
                                    
                                    elseif($product->xxxl==0) 
                                        echo "<td class='no-s'>".$product->xxxl ; 
                                    
                                    else 
                                        echo "<td class='with-s'>".$product->xxxl ;
                                ?>
                                </td>
                                
                                <!--ONE SIZE-->
                                <?php 
                                    if($product->sizing=="Multi") 
                                        echo "<td class='no-s'>"."N/A"; 
                                    
                                    elseif($product->one==0) 
                                        echo "<td class='no-s'>".$product->one ; 
                                    
                                    else 
                                        echo "<td class='with-s'>".$product->one ;
                                ?>
                                </td>
                                
                                
                                
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a data-toggle="modal" href="#" id="editBtn" onclick="add_stocks('<?php echo $product->product_id ?>')"> Add Stocks</a></li>
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
    function add_stocks(id){
        $.LoadingOverlay("show");
        
        $.ajax({
            url : "<?php echo base_url('staff_page/ajax_view_stocks_online_by_id')?>/"+id,
            type: "POST",
            success: function(data){
        
                var json = JSON.parse(data);
                var product_id=(json['result'][0]['product_id']);
                var product_name=(json['result'][0]['product_name']);
                var ajax_sizing=(json['result'][0]['sizing']);
                
              
                
                $("#prod-id").val(product_id); 
                $("#prod-name").val(product_name); 
                $("#prod-sizing").val(ajax_sizing); 
                $("#ajax-title-name").text(product_name); 
                
                if(ajax_sizing==="Multi"){
                    $("#onesize").hide();
                    $("#xs").show();
                    $("#sm").show();
                    $("#md").show();
                    $("#lg").show();
                    $("#xl").show();
                    $("#xxl").show();
                    $("#xxxl").show();
                    
                    $("#xs-current-stock").val(json['result'][0]['xs']);
                    $("#sm-current-stock").val(json['result'][0]['sm']);
                    $("#md-current-stock").val(json['result'][0]['md']);
                    $("#lg-current-stock").val(json['result'][0]['lg']);
                    $("#xl-current-stock").val(json['result'][0]['xl']);
                    $("#xxl-current-stock").val(json['result'][0]['xxl']);
                    $("#xxxl-current-stock").val(json['result'][0]['xxxl']);
                    
                    $.LoadingOverlay("hide");
                    $('#add-stocks-modal').modal('show');
                    
                }
                else if(ajax_sizing==="One"){
                    $("#onesize").show();
                     $("#onesize-current-stock").val(json['result'][0]['one']);
                    
                    $("#xs").hide();
                    $("#sm").hide();
                    $("#md").hide();
                    $("#lg").hide();
                    $("#xl").hide();
                    $("#xxl").hide();
                    $("#xxxl").hide();
                    
                    $.LoadingOverlay("hide");
                    $('#add-stocks-modal').modal('show');
                }
                
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error !');
            }
        });
    }
</script>


<!--Add stocks MODAL-->
<div class="modal fade modal" id="add-stocks-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="ajax-title-name">Add Stocks</h4>
            </div>
            <form method="post" action="<?php base_url() ?>add_stocks_online">  
            <div class="modal-body">
                <div class="form-group" hidden>
                    <label>Product ID</label>
                    <input type="text" class="form-control" readonly value="" id="prod-id" name="prod-id">
                </div>
                <div class="form-group" hidden>
                    <label>Product Name</label>
                    <input type="text" class="form-control" readonly value="" id="prod-name">
                </div>
                <div class="form-group" hidden>
                    <label>Sizing</label>
                    <input type="text" class="form-control" readonly value="" id="prod-sizing" name="prod_sizing">
                </div><br>

                <div class="row"  id="xs">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>XS</label>
                            <input type="number" class="form-control" id="xs-current-stock" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Add Stocks</label>
                            <input type="number" class="form-control" value="0" name="xs">
                        </div>
                    </div>
                </div>
                
                <div class="row" id="sm">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>SM</label>
                            <input type="number" class="form-control" id="sm-current-stock" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Add Stocks</label>
                            <input type="number" class="form-control" value="0"name="sm">
                        </div>
                    </div>
                </div>
                
                <div class="row" id="md">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>MD</label>
                            <input type="number" class="form-control"  id="md-current-stock" readonly>
                        </div>
                    </div>
                    <div class="col-md-3"">
                        <div class="form-group">
                            <label>Add Stocks</label>
                            <input type="number" class="form-control" value="0"  name="md">
                        </div>
                    </div>
                </div>
                
                <div class="row" id="lg">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>LG</label>
                            <input type="number" class="form-control"  id="lg-current-stock" readonly>
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="form-group">
                            <label>Add Stocks</label>
                            <input type="number" class="form-control" value="0" name="lg">
                        </div>
                    </div>
                </div>
                
                <div class="row" id="xl">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>XL</label>
                            <input type="number" class="form-control" id="xl-current-stock" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Add</label>
                            <input type="number" class="form-control"  value="0" name="xl">
                        </div>
                    </div>
                </div>
                
                <div class="row" id="xxl">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>XXL</label>
                            <input type="number" class="form-control"  id="xxl-current-stock"readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Add Stocks</label>
                            <input type="number" class="form-control" value="0" name="xxl">
                        </div>
                    </div>
                </div>
                
                <div class="row" id="xxxl">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>XXXL</label>
                            <input type="number" class="form-control"  id="xxxl-current-stock" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Add Stocks</label>
                            <input type="number" class="form-control" value="0" name="xxxl">
                        </div>
                    </div>
                </div>
                
                <div class="row" id="onesize">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>One size</label>
                            <input type="number" class="form-control" id="onesize-current-stock" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Add Stocks</label>
                            <input type="number" class="form-control" value="0" name="one-size">
                        </div>
                    </div>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Stocks</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
