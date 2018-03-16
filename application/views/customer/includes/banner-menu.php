
                <?php foreach($cms as $y):?>
                <img src="<?php echo base_url() ?>assets/images/<?php echo $y->shop_banner?>" class="custom-banner img-responsive" align="center" width="100%"/>
                <?php endforeach?>
                <nav class="navbar navbar-inverse product-navigation">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav" >
                        	<li><a href="<?php echo base_url() ?>shop">All</a></li>
                        	<?php foreach($product_type as $x):?>
                        	<li><a href="<?php echo base_url() ?>shop?x=<?php echo $x->type ?>"><?php echo $x->type ?></a></li>
                       		<?php endforeach?>
                        </ul>
                    </div>
                </nav>
                
