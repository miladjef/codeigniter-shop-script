<?php
/**
 * Created by PhpStorm.
 * User: faraDars
 * Date: 9/30/2016
 * Time: 3:05 PM
 */
?>
<div class="row form-container">

</div>
<div class="row table-container">
    <table id="infoTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><?php echo lang("customer_name")?></th>
            <th><?php echo lang("products")?></th>
            <th><?php echo lang("order_state")?></th>
            <th><?php echo lang("payment_type")?></th>
            <th><?php echo lang("price")?></th>
            <th><?php echo lang("discounts")?></th>
            <th><?php echo lang("total_price")?></th>
            <th><?php echo lang("order_date")?></th>
            <th><?php echo lang("edit")?></th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script src="<?php echo base_url().config("ScriptsURL");?>manage_orders.js"></script>