<div class="row form-container">
    <form id="mainForm">
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo combo(lang("product_group") , "productGroupsCombo" , "small")?>
            </div>
            <div class="col-md-6">
                <?php echo combo(lang("product") , "productsCombo" , "small")?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo textbox(lang("picture_name") , "name" , "small")?>
            </div>
            <div class="col-md-6">
                <?php echo filebox(lang("picture") , "file" , "small")?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo checkbox(lang("active") , "active" , "small")?>
            </div>
            <div class="col-md-6">
                <?php echo button("submit" , lang("submit") , "submit")?>
            </div>
            <input type="hidden" id="id" name="id" value=""/>
        </div>
    </form>
</div>
<div class="row table-container">
    <table id="infoTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><?php echo lang("product_group_name")?></th>
            <th><?php echo lang("product_name")?></th>
            <th><?php echo lang("picture_name")?></th>
            <th><?php echo lang("picture")?></th>
            <th><?php echo lang("active")?></th>
            <th><?php echo lang("edit")?></th>
            <th><?php echo lang("delete")?></th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<link rel="stylesheet" href="<?php echo base_url().config("TemplateMeansCSS");?>bootstrap-fileupload.min.css"/>
<script src="<?php echo base_url().config("TemplateMeansJS");?>bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url().config("TemplateMeansJS");?>jquery.file-ajax.js"></script>
<script src="<?php echo base_url().config("ScriptsURL");?>manage_product_pictures.js"></script>