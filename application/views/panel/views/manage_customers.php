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
            <th><?php echo lang("name")?></th>
            <th><?php echo lang("last_name")?></th>
            <th><?php echo lang("email")?></th>
            <th><?php echo lang("mobile")?></th>
            <th><?php echo lang("province")?></th>
            <th><?php echo lang("city")?></th>
            <th><?php echo lang("more_details")?></th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script src="<?php echo base_url().config("ScriptsURL");?>manage_customers.js"></script>