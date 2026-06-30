var path = $(location).attr('href');
var base_url = location.protocol + "//" + location.host + "/shop/";


//functions
var clear_combo , load_combo , setcombo , success_notif , danger_notif , info_notif;
var set_checkbox;

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
            $.post(base_url + 'Combo/' + url , {} , function(data){
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

    
    if($(".get-cart-in").length){
        $(".get-cart-in").on('click' , function () {
            $.post(base_url +  'Cart/add2Cart/' + $(this).prop("id"),{},
                function( data ){

                    if ( data != false ){
                        window.location.href= base_url  + "Cart";
                    }
                }
            );

        });
    }
    
    $("#search").on("click" , function () {
      if($("#searchText").val()!=''){
          window.location.href = base_url + "search/" + $("#searchText").val();
      }
    });

    
    load_combo("#productGroupsCombo" , "product_groups");
    load_combo("#productBrandsCombo" , "product_brands");
    load_combo("#shippingCombo" , "shippingCombo");

    load_combo("#provinceCombo" , "provinceCombo");
    $("#provinceCombo").chosen().change(function () {
        load_combo("#cityCombo" , "cityCombo/" + $(this).chosen().val());
    });
});