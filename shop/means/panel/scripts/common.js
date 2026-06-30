var path = $(location).attr('href');
var base_url = location.protocol + "//" + location.host + "/shop/";

var panel_url = base_url + "panel/";

//functions
var clear_combo , load_combo , setcombo , success_notif , danger_notif , info_notif;
var set_checkbox;

var action = 'insert';
var insert_ = 'درج';
var edit_ = 'ویرایش';




var getTableInfo = function(url , table){
    table = (table==undefined)?"#infoTable":table;
    $.post(panel_url + url , {} , function (data) {
        $(table).children("tbody").html(data);
    } , 'html')
};

$(function () {
    $(".chosen-select").chosen({"width":"100%" , "width-space":"nowrap" , "search_contains":true});
    
    clear_combo = function (element) {
        $(element).empty();
        $(element).trigger("chosen:updated");
    };

    load_combo = function(element , url , value){

        //first removing current options
        clear_combo(element);
        var default_value = $(element).attr("data-value"); //in the times that we want to set the selected value by php

        value = typeof value !== 'undefined' ? value : (typeof default_value !== 'undefined'?default_value :'');
        //first we check that whether that element exists or not; if exists then we get information from server for it
        if($(element).length){
            //then getting information about options from server
            $.post(base_url + 'combo/' + url , {} , function(data){
                $.each(data, function (key,option) {
                    $(element).append(
                        $("<option></option>")
                            .attr("value", option['value'])
                            .text(option['text'])
                    );
                    if(value!=0)
                        $(element).val(value);
                    $(element).trigger("chosen:updated");

                });
            },"json");
        }
    };
    
    setcombo = function (comboname , value) {
        $(comboname).val(value);
        $(comboname).trigger("chosen:updated");
    };
    
    success_notif = function (text) {
        $.gritter.add({
           title :"تبریک!" ,
           text : text ,
            class_name :'growl-success',
            image :'',
            sticky :false,
            time :5000
        });
    };

    danger_notif = function (text) {
        $.gritter.add({
            title :"اخطار" ,
            text : text ,
            class_name :'growl-danger',
            image :'',
            sticky :false,
            time :5000
        });
    };

    info_notif = function (text) {
        $.gritter.add({
            title :"نکته" ,
            text : text ,
            class_name :'growl-info',
            image :'',
            sticky :false,
            time :5000
        });
    };

    set_checkbox = function(element , value){
        if(value==true){
            $(element).prop("checked" , true);
            $(element).val(1);
        }
        else{
            $(element).prop("checked" , false);
            $(element).val(0);
        }
    };

    load_combo("#productGroupsCombo" , "product_groups");
    load_combo("#productBrandsCombo" , "product_brands");
    $("#productGroupsCombo").chosen().change(function () {
        load_combo("#productsCombo", "products/" + $(this).chosen().val())
    })
});