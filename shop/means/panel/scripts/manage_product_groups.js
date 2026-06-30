/**
 * Created by faraDars on 9/30/2016.
 */
$(function () {

    var name = $("#name");
    var submit = $("#submit");


    var url = "Manage_Product_Groups/";
    var action = 'insert';

    var getInfo = function () {
        $.post(panel_url + url + "getInfo" , {} , function (data) {
            $("#infoTable").children("tbody").html(data);
        } , 'html')
    };

    getInfo();

    submit.on("click" , function () {
        $.post( url + action , $("#mainForm").serialize() , function (data) {
            if(data['code']=="0"){
                success_notif(data['message']);
                getInfo();
            }
            else{
                danger_notif(data['message']);
            }
        }, 'json');

    });

    $(document).on("click" , ".glyphicon-pencil" , function () {
        $.post(panel_url + url + "getGroupInfo" , {id:$(this).attr('id')} , function (data) {
            $("#name").val(data['name']);
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
                getInfo();
            }
            else{
                danger_notif(data['message']);
            }
        } , "json")
    });

    var resetForm = function(){
        $("#name").val("");
        set_checkbox("#active" , 0);
        action = "insert";
        submit.text("درج");
    }


});