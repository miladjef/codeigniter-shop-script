<div class="shoes-grid">
    <h1>
        <?php echo $title; ?>
    </h1>
    <!-- grids_of_4 -->
    <div class="grid-product">
        <?php foreach($products as $pr): ?>
        <div class="product-grid">
            <div class="content_box">
                <a href="<?php echo base_url()."product/detail/".$pr['id'];?>">
                </a><div class="left-grid-view grid-view-left"><a href="<?php echo base_url()."product/detail/".$pr['id'];?>">
                        <img src="<?php echo $pr['picture'] ?>" class="img-responsive watch-right" alt="<?php echo $pr['name']?>">
                        <div class="mask">
                            <div class="info">Quick View</div>
                        </div>
                    </a>
                </div>
                <h4><a href="#"><?php echo $pr['name']?></a></h4>
                <p><?php echo $pr['description'];?></p>
                <?php echo $pr['price']; ?>
            </div>
        </div>
        <?php endforeach; ?>


    </div>
</div>