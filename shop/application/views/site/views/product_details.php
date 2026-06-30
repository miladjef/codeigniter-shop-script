<link rel="stylesheet" href="<?php echo MeansCSS; ?>etalage.css" type="text/css" media="all" />

<div class=" single_top">
    <div class="single_grid">
        <div class="grid images_3_of_2">
            <ul id="etalage">
                <?php foreach($pics as $pic){?>
                <li>
                    <img class="etalage_thumb_image" src="<?php echo base_url().config('uploads_path')."images/products/".$pic['pic']."_250.".$pic['ext']?>" class="img-responsive" />
                    <img class="etalage_source_image" src="<?php echo base_url().config('uploads_path')."images/products/".$pic['pic']."_1200.".$pic['ext']?>" class="img-responsive" title="" />
                </li>
                <?php }?>
            </ul>
            <div class="clearfix"> </div>
        </div>
        <div class="desc1 span_3_of_2">


            <h4><?php echo $prInfo['name']?></h4>
            <div class="cart-b">
                <div class="left-n "><?php echo $prInfo["price"]; ?></div>
                <a id="<?php echo $prInfo["id"];?>" class="now-get get-cart-in" href="#"><?php echo lang("add_to_card")?></a>
                <div class="clearfix"></div>
            </div>
            <h6>تعداد موجود </h6>
            <?php echo lang('manufacturer')." : ". $prInfo['manufacturer']; ?>



        </div>
        <div class="clearfix"> </div>
    </div>
    

    <script type="text/javascript" src="<?php echo MeansJS; ?>jquery.flexisel.js"></script>
    <script src="<?php echo MeansJS; ?>jquery.etalage.min.js"></script>

    

    <div class="toogle">
        <h3 class="m_3">Product Details</h3>
        <p class="m_text"><?php echo $prInfo["description"]; ?></p>
    </div>
</div>


<script src="<?php echo base_url().config("ScriptsURL");?>product_details.js"></script>