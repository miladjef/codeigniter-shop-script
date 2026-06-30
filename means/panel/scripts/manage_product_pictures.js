/**
 * Created by faraDars
 */
$(function () {
    var url = "Manage_Product_Pictures/";
    var action = 'insert';

    getTableInfo(url + "/getInfo");


    $("#mainForm").fileAjax(function () {
        return {
            url: url + action,
            dataType: 'json',
            success: function (data) {
                if (data['code'] == "0") {
                    success_notif(data['message']);
                    getTableInfo(url + "/getInfo");
                }
                else {
                    danger_notif(data['message']);
                }
            }
        }
    }, true);


    $(document).on("click", ".glyphicon-pencil", function () {
        $.post(panel_url + url + "getPictureInfo", {id: $(this).attr('id')}, function (data) {
            $("#name").val(data['name']);
            set_checkbox("#active", data['active']);
            setcombo("#productGroupsCombo", data['group_id']);
            load_combo("#productsCombo", "products/" + data['group_id'], data['product_id'])
            $("#id").val(data['id']);
            submit.text("ویرایش");
            action = "update";
        }, "json")
    });

    $(document).on("click", ".glyphicon-erase", function () {
        $.post(panel_url + url + "delete", {id: $(this).attr('id')}, function (data) {
            if (data['code'] == "0") {
                success_notif(data['message']);
                getTableInfo(url + "/getInfo");
                resetForm();
            }
            else {
                danger_notif(data['message']);
            }
        }, "json")
    });

    var resetForm = function () {
        $("#name").val("");
        setcombo("#productGroupsCombo", -1);
        setcombo("#productsCombo", -1);
        set_checkbox("#active", 0);
        action = "insert";
        submit.text("درج");
    };


   


});