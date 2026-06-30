$(function () {

    var submit = $("#submit");


    var url = "Shipping_Methods/";
    var action = 'insert';

    getTableInfo(url + "/getInfo");


    submit.on("click" , function () {
        $.post( url + action , $("#mainForm").serialize() , function (data) {
            if(data['code']=="0"){
                success_notif(data['message']);
                getTableInfo(url + "/getInfo");
                resetForm();
            }
            else{
                danger_notif(data['message']);
            }
        }, 'json');

    });

    $(document).on("click" , ".glyphicon-pencil" , function () {
        $.post(panel_url + url + "getShippingInfo" , {id:$(this).attr('id')} , function (data) {
            $("#name").val(data['name']);
            $("#description").val(data['description']);
            set_checkbox("#active", data['active']);
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
                getTableInfo(url + "/getInfo");
            }
            else{
                danger_notif(data['message']);
            }
        } , "json")
    });

    var resetForm = function(){
        $("#name").val("");
        $("#description").val("");
        set_checkbox("#active" , 0);
        action = "insert";
        submit.text("درج");
    }


});