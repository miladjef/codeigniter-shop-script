<div class="shoes-grid">

    <h2 class="title_page"><?php echo lang("contact_info_review");?></h2>
    <?php if($info['address']=='' || $info['city']=='' || $info['tel']=='' || $info['postal_code']==''){ ?>
        <div class="message_box">
            <div class="alert alert-warning">
                <?php echo lang("your_shipping_information_is_not_complete_go_to_profile");?>
            </div>
        </div>

    <?php }else {?>
        <div class="col-md-8 user_info">
            <div class="row">
                <div class="col-md-3"><?php echo lang("customer_name")?></div>
                <div class="col-md-9"><?php echo $info['name']." ".$info['last_name']?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("city")?></div>
                <div class="col-md-9"><?php echo $info['city'];?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("address")?></div>
                <div class="col-md-9"><?php echo $info['address'];?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("postal_code")?></div>
                <div class="col-md-9"><?php echo $info['postal_code'];?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("mobile")?></div>
                <div class="col-md-9"><?php echo $info['mobile'];?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?php echo lang("tel")?></div>
                <div class="col-md-9"><?php echo $info['tel'];?></div>
            </div>
            <div class="alert alert-info userInfoAlert">
                <?php echo lang("if_your_information_is_correct_go_to_next_step");?><br>
                <?php echo lang("or_if_is_incorrect_go_to_profile");?>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <button id="goFinal" type="button" class="btn btn-success"><?php echo lang('review_request')?>
                    </button>
                </div>
            </div>
        </div>
        <script>
            $("#goFinal").on("click" , function () {
                window.location.href= "<?php echo base_url(); ?>Review/verify";
            });
        </script>

    <?php } ?>
</div>

