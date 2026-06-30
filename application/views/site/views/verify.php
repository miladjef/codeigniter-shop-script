<div class="shoes-grid">
    <h2 class="title_page">
        <?php echo lang("review_request"); ?>
    </h2>

    <div class="row">
        <div class="col-md-10">
            <table class="reviewTable">
                <tr>
                    <th><?php echo lang('product_name') ?></th>
                    <th><?php echo lang('price') ?></th>
                    <th><?php echo lang('quantity') ?></th>
                    <th><?php echo lang('discount') ?></th>
                    <th><?php echo lang('total_price') ?></th>
                </tr>
                <?php
                $totalPrice = 0;
                foreach ($cartInfo as $item) { ?>
                    <tr>
                        <td><?php echo $item['group_name'] . "-" . $item['name'] ?></td>
                        <td><?php echo $item['price'] ; ?></td>
                        <td><?php echo $item['q']; ?></td>
                        <td>0</td>
                        <td><?php echo intval($item['q']) * intval($item['price']) ; ?></td>
                    </tr>
                    <?php
                    $totalPrice += intval($item['q']) * intval($item['price']);
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo lang("total_purchase_price"); ?></td>
                    <td><?php echo $totalPrice ; ?></td>
                </tr>
            </table>
        </div>


        <div class="col-md-12 user_info">
            <div class="row">
                <div class="col-md-3"><?php echo lang("customer_name") ?></div>
                <div class="col-md-9"><?php echo $info['name'] . " " . $info['last_name'] ?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("city") ?></div>
                <div class="col-md-9"><?php echo $info['city']; ?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("address") ?></div>
                <div class="col-md-9"><?php echo $info['address']; ?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("postal_code") ?></div>
                <div class="col-md-9"><?php echo $info['postal_code']; ?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("mobile") ?></div>
                <div class="col-md-9"><?php echo $info['mobile']; ?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("tel") ?></div>
                <div class="col-md-9"><?php echo $info['tel']; ?></div>
            </div>
        </div>

        <div class="col-md-6">
            <form id="shipping">
                <?php echo combo(lang("shipping_method"), "shippingCombo" , "small")?>
                <?php echo button("accept",lang("accept")); ?>
            </form>
        </div>


        <div class="col-md-6 pay-box">
            <div class="col-md-6">
                <img class="pay" src="<?php echo MeansImages . "online.jpg" ?>">
                <label><?php echo lang('pay_online')?></label>
            </div>
            <div class="col-md-6">
                <img class="pay" src="<?php echo MeansImages . "delivery.png" ?>">
                <label><?php echo lang('pay_after_delivery')?></label>
            </div>
        </div>

    </div>
    
    <script>
        $("#accept").on("click" , function () {
           $.post(base_url + "Review/accept" , $("#shipping").serialize() , function (data) {
               alert(data['message'])
           } , 'json') 
        });
    </script>

</div> 