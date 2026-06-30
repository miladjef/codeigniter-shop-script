<?php
/**
 * Created by PhpStorm.
 * User: faraDars
 * Date: 9/30/2016
 * Time: 3:05 PM
 */
?>
<div class="row form-container">
    <form id="mainForm" method="post">
        <div class="col-md-6">
            <div class="col-md-12">
                <?php echo textbox(lang("product_group_name") , "name" , "small")?>
            </div>
            <div class="col-md-12">
                <?php echo checkbox(lang("active") , "active" , "small")?>
            </div>
            <div class="col-md-12">
                <?php echo button("submit" , lang("submit"))?>
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
                <th><?php echo lang("active")?></th>
                <th><?php echo lang("edit")?></th>
                <th><?php echo lang("delete")?></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script src="<?php echo base_url().config("ScriptsURL");?>manage_product_groups.js"></script>