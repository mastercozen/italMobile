<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Stock Alert (<?php echo $message_count?> Notifications)</h3>
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
        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-striped table-hover">
                    <tbody>
                    <?php foreach($online as $x):?>
                        <?php 
                            if($x->sizing=="Multi"){
                                if( $x->xs <= 5 ){
                                    echo "<tr class='danger'><td>Online Stocks for Size XS ".$x->product_name." has only ".$x->xs." remaining stocks now. <a href='".base_url()."staff_page/stocks_online'>Go to online Stocks now.</a></td></tr>";
                                }
                                if( $x->sm <= 5 ){
                                    echo "<tr class='danger'><td>Online Stocks for Size SM ".$x->product_name." has only ".$x->sm." remaining stocks now. <a href='".base_url()."staff_page/stocks_online'>Go to online Stocks now.</a></td></tr>";
                                }
                                if( $x->md <= 5 ){
                                    echo "<tr class='danger'><td>Online Stocks for Size MD ".$x->product_name." has only ".$x->md." remaining stocks now. <a href='".base_url()."staff_page/stocks_online'>Go to online Stocks now.</a></td></tr>";
                                }
                                if( $x->lg <= 5 ){
                                    echo "<tr class='danger'><td>Online Stocks for Size LG ".$x->product_name." has only ".$x->lg." remaining stocks now. <a href='".base_url()."staff_page/stocks_online'>Go to online Stocks now.</a></td></tr>";
                                }
                                if( $x->xl <= 5 ){
                                    echo "<tr class='danger'><td>Online Stocks for Size XL ".$x->product_name." has only ".$x->xl." remaining stocks now. <a href='".base_url()."staff_page/stocks_online'>Go to online Stocks now.</a></td></tr>";
                                }
                                if( $x->xxl <= 5 ){
                                    echo "<tr class='danger'><td>Online Stocks for Size XXL ".$x->product_name." has only ".$x->xxl." remaining stocks now. <a href='".base_url()."staff_page/stocks_online'>Go to online Stocks now.</a></td></tr>";
                                }
                                if( $x->xxxl <= 5 ){
                                    echo "<tr class='danger'><td>Online Stocks for Size XXXL ".$x->product_name." has only ".$x->xxxl." remaining stocks now. <a href='".base_url()."staff_page/stocks_online'>Go to online Stocks now.</a></td></tr>";
                                }
                            }
                            elseif($x->sizing=="One"){
                                if( $x->one <= 5 ){
                                    echo "<tr class='danger'><td>Online Stocks for ".$x->product_name." has only ".$x->one." remaining stocks now. <a href='".base_url()."staff_page/stocks_online'>Go to online Stocks now.</a></td></tr>";
                                }
                            }
                        ?>
                    <?php endforeach ?>
                    
                    <?php foreach($walkin as $x):?>
                        <?php 
                            if($x->sizing=="Multi"){
                                if( $x->xs <= 5 ){
                                    echo "<tr class='danger'><td>Walkin Stocks for Size XS ".$x->product_name." has only ".$x->xs." remaining stocks now. <a href='".base_url()."staff_page/stocks_walkin'>Go to walkin Stocks now.</a></td></tr>";
                                }
                                if( $x->sm <= 5 ){
                                    echo "<tr class='danger'><td>Walkin Stocks for Size SM ".$x->product_name." has only ".$x->sm." remaining stocks now. <a href='".base_url()."staff_page/stocks_walkin'>Go to walkin Stocks now.</a></td></tr>";
                                }
                                if( $x->md <= 5 ){
                                    echo "<tr class='danger'><td>Walkin Stocks for Size MD ".$x->product_name." has only ".$x->md." remaining stocks now. <a href='".base_url()."staff_page/stocks_walkin'>Go to walkin Stocks now.</a></td></tr>";
                                }
                                if( $x->lg <= 5 ){
                                    echo "<tr class='danger'><td>Walkin Stocks for Size LG ".$x->product_name." has only ".$x->lg." remaining stocks now. <a href='".base_url()."staff_page/stocks_walkin'>Go to walkin Stocks now.</a></td></tr>";
                                }
                                if( $x->xl <= 5 ){
                                    echo "<tr class='danger'><td>Walkin Stocks for Size XL ".$x->product_name." has only ".$x->xl." remaining stocks now. <a href='".base_url()."staff_page/stocks_walkin'>Go to walkin Stocks now.</a></td></tr>";
                                }
                                if( $x->xxl <= 5 ){
                                    echo "<tr class='danger'><td>Walkin Stocks for Size XXL ".$x->product_name." has only ".$x->xxl." remaining stocks now. <a href='".base_url()."staff_page/stocks_walkin'>Go to walkin Stocks now.</a></td></tr>";
                                }
                                if( $x->xxxl <= 5 ){
                                    echo "<tr class='danger'><td>Walkin Stocks for Size XXXL ".$x->product_name." has only ".$x->xxxl." remaining stocks now. <a href='".base_url()."staff_page/stocks_walkin'>Go to walkin Stocks now.</a></td></tr>";
                                }
                            }
                            elseif($x->sizing=="One"){
                                if( $x->one <= 5 ){
                                    echo "<tr class='danger'><td>Walkin Stocks for ".$x->product_name." has only ".$x->one." remaining stocks now. <a href='".base_url()."staff_page/stocks_walkin'>Go to walkin Stocks now.</a></td></tr>";
                                }
                            }
                        ?>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>