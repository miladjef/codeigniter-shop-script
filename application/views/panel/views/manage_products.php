<?php
/**
 * Created by PhpStorm.
 * User: faraDars
 */
?>

<div class="row form-container">
    <form id="mainForm" method="post">
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo textbox(lang("product_name") , "name" , "small")?>
            </div>
            <div class="col-md-6">
                <?php echo numberbox(lang("price") , "price" , "small")?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo combo(lang("product_group") , "productGroupsCombo" , "small")?>
            </div>
            <div class="col-md-6">
                <?php echo combo(lang("product_manufacturer") , "productBrandsCombo" , "small")?>
            </div>
        </div>
        <div class="col-md-12">
            <?php echo textarea(lang("product_description") , "description" , "small")?>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo numberbox(lang("product_code") , "code" , "small")?>
            </div>
            <div class="col-md-6">
                <?php echo checkbox(lang("active") , "active" , "small")?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
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
            <th><?php echo lang("product_name")?></th>
            <th><?php echo lang("product_group")?></th>
            <th><?php echo lang("product_manufacturer")?></th>
            <th><?php echo lang("price")?></th>
            <th><?php echo lang("product_code")?></th>
            <th><?php echo lang("active")?></th>
            <th><?php echo lang("edit")?></th>
            <th><?php echo lang("delete")?></th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script src="<?php echo base_url().config("ScriptsURL");?>manage_products.js"></script>
