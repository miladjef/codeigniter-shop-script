<div class="shoes-grid">
    <h1>
        <?php echo $title; ?>
    </h1>
    <div class="row">
        <form id="lgnForm">
            <div class="row">
                <div class="col-md-6">
                    <?php echo emailbox(lang("email"), "email", "small"); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo passwordbox(lang("password"), "password", "small"); ?>
                </div>
            </div>
            
            <div class="col-md-6">
                <?php echo button("submit", lang("enter")); ?>
            </div>
        </form>
    </div>

</div>
<script src="<?php echo base_url().config("ScriptsURL");?>signin.js"></script>