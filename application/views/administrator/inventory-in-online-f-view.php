<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Online(Out)</h3>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url() ?>administrator_page/inventory_in_online">Online In</a></li> 
                    <li><a href="<?php echo base_url() ?>administrator_page/inventory_out_online">Online Out</a></li>
                    <!-- <li><a href="<?php echo base_url() ?>administrator_page/inventory_in_walkin">Walkin In</a></li>
                    <li><a href="<?php echo base_url() ?>administrator_page/inventory_out_walkin">Walkin Out</a></li> -->
                    <li><a href="<?php echo base_url() ?>administrator_page/inventory_in_online_f">Online Out With Forecasting</a></li>
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
        <div class="row">
            <div class="col-md-12">
               <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <!-- <th>Product ID</th> -->
                            <!-- <th>Name</th>
                            <th>Type</th>
                            <th>Sizing</th> -->
                            <th>Main Ingredient</th>
                           <!--  <th>XS</th>
                            <th>SM</th>
                            <th>MD</th>
                            <th>LG</th>
                            <th>XL</th>
                            <th>XXL</th>
                            <th>XXXL</th> -->
                            <th>Forecasted Inventory</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $x): ?>
                        <tr>
                            <?php if($x->sizing=="Multi"): ?>
                           <!--  <td><?php echo $x->product_id ?></td> -->
                            <td>
                            <!--     <?php echo $x->product_name ?>
                            </td>
                            <td><?php echo $x->type ?></td> -->
                           <!--  <td><?php echo $x->sizing ?></td> -->
                            <!--For Multi-size Products-->
                            <td class="info"><?php echo $x->xs ?></td>
                            <td class="info"><?php echo $x->sm ?></td>
                            <td class="info"><?php echo $x->md ?></td>
                            <td class="info"><?php echo $x->lg ?></td>
                            <td class="info"><?php echo $x->xl ?></td>
                            <td class="info"><?php echo $x->xxl ?></td>
                            <td class="info"><?php echo $x->xxxl ?></td>
                            <td></td>
                            <?php endif ?>
                            <!--For One-size Products-->
                            <?php if($x->sizing=="One"): ?>
                            <!-- <td><?php echo $x->product_id ?></td> -->
                         <!--    <td><?php echo $x->product_name ?></td>
                            <td><?php echo $x->type ?></td>
                            <td><?php echo $x->sizing ?></td> -->
                            <td><?php echo $x->main_ing ?></td>
                           <!--  <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> -->
                            <td class="info"><?php echo ceil ($x->one*1.1) ?></td>
                            <?php endif ?>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>s