$(function () {
    $("#submit").on("click" , function () {
        $.post(base_url + "Customer/check_login" , $("#lgnForm").serialize(), function (data) {
            //please complete this part with suitable plugin for response
            if(data['code']==0){
                window.location.href= base_url + "home";
            }
            else{
                alert(data['message']);
            }

        } , 'json')
    });
});
