<!-- FEATURED CONTEST WINNER_____________________________________________________________________________________________________ -->
<?php foreach($recent_winner as $x):?>
<div class="container-fluid">
    <div class="row featured-product">
        <br>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div>
                <h1 class="winner-header">Congratulations <?php echo $x->first_name." ".$x->last_name?></h1>
                <p class="winner-desc">For winning the <?php echo $x->name?>
                <br>
                Soon we will add this product in to our Italiannis Online Shop</p>
                <br>
                <img src="<?php echo base_url()."uploads/products/".$x->winner_image?>">
                <br><br>
                <p class="winner-shirt-name">"<?php echo $x->winner_design_name?>"</p>
            </div>
            <br><br>
        </div>
    </div>
</div>
<?php endforeach?>
<style>
	.featured-product{
	    padding: 20px 0;
	    text-align: center;
	    background-color: rgba(255,255,255,0.7);
	    color:#fff;
	}
	.featured-product > div > div{
	    padding: 10px;
	    transition: 0.2s;
	}
	.featured-product > div > div > img{
	    width:75%;
	    transition:0.3s;
	    border:5px solid #CBB720;
	    box-shadow:0px 0px 6px #000;
	    border-radius: 5px;
	}
	.winner-header{
	    color:#AE9D1C;
	}
	.winner-desc{
	    font-size:17px;
	    color:#808080;
	}
	.winner-shirt-name{
	    font-size:25px;
	    color:#707070;
	}
</style>