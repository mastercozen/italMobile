<div class="content-wrapper">
    <div class="container-fluid">
        <a href="<?php echo base_url()?>staff_page/reports" class="btn btn-primary btn-md">Go Back</a>
        <div class="page-header">
            <h3>Sales Report (<?php echo $header?>)</h3>
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
                <table id="example" class="table table-striped table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $grandtotal=0 ?>
                    <?php foreach ($results as $result) { ?>
                        <?php $grandtotal=$grandtotal+$result->subtotal?>
                        <tr class="info">
                            <td><?php echo $result->date_ordered ?></td>
                            <td><?php echo $result->name ?></td>
                            <td><?php echo $result->quantity ?></td>
                            <td><?php echo $result->subtotal ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                
                <h3>Grand Total: <?php echo $grandtotal ?></h3>
            </div>
            
        </div>
    </div>
</div>