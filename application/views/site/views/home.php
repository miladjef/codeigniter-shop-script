<div class="shoes-grid">
    <a href="single.html">
        <div class="wrap-in">
            <div class="wmuSlider example1 slide-grid">
            </div>
        </div>
    </a>
    <!---->
    <div class="products">
        <h5 class="latest-product"><?php echo lang('suggestions') ?></h5>
    </div>
    <?php
    if($suggested_products){
        foreach ($suggested_products as $pr){?>
            <div class="col-md-4 chain-grid grid-top-chain">
                <a href="<?php echo base_url()."product/detail/".$pr['id']; ?>"><img class="img-responsive chain" src="<?php echo base_url().config("uploads_path")."images/products/".(($pr['picture']!=NULL)?$pr['picture']['pic']."_250.".$pr['picture']['ext']:"default_250.jpg");?>" alt="<?php echo $pr['name']?>"></a>
                <span class="star"> </span>
                <div class="grid-chain-bottom">
                    <h6><a href="<?php echo base_url()."product/detail/".$pr['id']; ?>"><?php echo $pr['name']?></a></h6>
                    <div class="star-price">
                        <div class="dolor-grid">
                            <span class="price"><?php echo $pr['price']?></span>
                        </div>
                        <a id="<?php echo $pr['id']; ?>" class="now-get get-cart-in" href="#"><?php echo lang("add_to_card"); ?></a>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        <?php }
    }
    ?>

    <div class="products">
        <h5 class="latest-product"><?php echo lang('new_products'); ?></h5>
        <a class="view-all" href="product.html"><?php echo lang('view_all'); ?><span> </span></a>
    </div>
    <div class="product-left">

    </div>
    <div class="products">
        <h5 class="latest-product"><?php echo lang('best_selling_products'); ?></h5>
        <a class="view-all" href="product.html"><?php echo lang('view_all'); ?><span> </span></a>
    </div>

</div>
    
