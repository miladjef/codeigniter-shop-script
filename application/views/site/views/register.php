<div class="shoes-grid">
    <h1>
        <?php echo $title; ?>
    </h1>
    <div class="row">
        <form id="regForm">
            <div class="col-md-6">
                <?php echo textbox(lang("name"), "name", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo textbox(lang("last_name"), "last_name", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo emailbox(lang("email"), "email", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo textbox(lang("username"), "username", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo passwordbox(lang("password"), "password", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo passwordbox(lang("re_password"), "re_password", "small"); ?>
            </div>

            <div class="col-md-6">
                <?php echo combo(lang("province"), "provinceCombo", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo combo(lang("city"), "cityCombo", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo numbermask(lang("mobile"), "09999999999", "mobile", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo textbox(lang("address"), "address", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo numberbox(lang("tel"), "tel", "small"); ?>
            </div>

            <div class="col-md-6">
                <?php echo numbermask(lang("postal_code"), "9999999999", "postal_code", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo numbermask(lang("national_code"), "9999999999", "national_code", "small"); ?>
            </div>
            <div class="col-md-6">
                <?php echo button("submit", lang("send")); ?>
            </div>
        </form>
    </div>

</div>
<script src="<?php echo MeansJS; ?>jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url().config("ScriptsURL");?>register.js"></script>


