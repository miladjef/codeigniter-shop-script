<?php
/**
 * Created by PhpStorm.
 * User: faraDars
 */
?>
<div class="row form-container">
    <form id="mainForm" method="post">
        <div class="col-md-6">
            <div class="col-md-12">
                <?php echo textbox(lang("manufacturer_name") , "name" , "small")?>
            </div>
            <div class="col-md-12">
                <?php echo filebox(lang("logo") , "file" , "small")?>
            </div>
            <div class="col-md-12">
                <?php echo checkbox(lang("active") , "active" , "small")?>
            </div>
            <div class="col-md-12">
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
                <th><?php echo lang("manufacturer_name")?></th>
                <th><?php echo lang("logo")?></th>
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
<script src="<?php echo base_url().config("ScriptsURL");?>manage_manufacturers.js"></script>