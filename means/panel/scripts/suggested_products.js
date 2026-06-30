$(function () {

    var submit = $("#submit");


    var url = "Suggested_Products/";
    var action = 'insert';

    getTableInfo(url + "getInfo");
    submit.on("click" , function () {
        $.post( url + action , $("#mainForm").serialize() , function (data) {
            if(data['code']=="0"){
                success_notif(data['message']);
                getTableInfo(url + "getInfo");
            }
            else{
                danger_notif(data['message']);
            }
        }, 'json');

    });

    $(document).on("click" , ".glyphicon-pencil" , function () {
        $.post(panel_url + url + "getSuggestionInfo" , {id:$(this).attr('id')} , function (data) {
            set_checkbox("#active", data['active']);
            setcombo("#productGroupsCombo", data['group_id']);
            load_combo("#productsCombo", "products/" + data['group_id'], data['product_id'])
            $("#id").val(data['id']);
            submit.text("ویرایش");
            action = "update";
        } , "json")
    });

    $(document).on("click" , ".glyphicon-erase" , function () {
        $.post(panel_url + url + "delete" , {id:$(this).attr('id')} , function (data) {
            if(data['code']=="0")
            {
                success_notif(data['message']);
                getTableInfo(url + "getInfo");
                resetForm();
            }
            else{
                danger_notif(data['message']);
            }
        } , "json")
    });

    var resetForm = function(){
        set_checkbox("#active" , 0);
        setcombo("#productGroupsCombo", -1);
        clear_combo("#productsCombo");
        action = "insert";
        submit.text("درج");
    }


});