<div class="shoes-grid">
    <div class="content">
        <h2 class="title_page"><i class="icon icon-caret-left-blue"></i>
            <?php echo lang("your_shopping_cart");?>
        </h2>
        <table class="table">
            <tr>
                <th></th>
                <th><?php echo lang('description');?></th>
                <th><?php echo lang('quantity');?></th>
                <th><?php echo lang('unit_price');?></th>
                <th><?php echo lang('total_price');?></th>
                <th></th>
            </tr>
            <?php

            if(count($info)>0){
                $count = 0;
                $totalPrice = 0;
                foreach ($info as $item){
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo $item['group_name']."-".$item['name'] ?></td>
                        <td><input type="text" class="quantity" id="<?php echo $item['prId'] ?>" value="<?php echo $item['q'];?>"> </td>
                        <td><?php echo $item['price'];?></td>
                        <td><?php echo intval($item['q'])*intval($item['price']);?></td>
                        <td><i class="glyphicon glyphicon-refresh" aria-hidden="true" id="<?php echo $item['prId'] ?>"></i><span class="glyphicon glyphicon-remove" id="<?php echo $item['prId'] ?>"></span></td>
                    </tr>
                    <?php
                    $count+= $item['q'];
                    $totalPrice += intval($item['q'])*intval($item['price']);
                }?>
                <tr class="trLast">
                    <td></td>
                    <td></td>
                    <td><?php echo $count; ?></td>
                    <td></td>
                    <td><?php echo lang('your_purchase_price')." : ".$totalPrice; ?></td>
                    <td></td>
                </tr>
                <?php
            }else{
                ?>
                <tr><td colspan="6">
                        <?php lang('no_product_on_shopping_card');?>
                    </td> </tr>
                <?php
            }

            ?>
        </table>
        <button id="goReview" type="button" class="btn btn-success"><?php echo lang('finalize_your_purchase')?></button>
    </div>
</div>
<script src="<?php echo base_url() . $this->config->item("ScriptsURL"); ?>cart.js"></script>