$(function () {
   $("#submit").on("click" , function () {
       $.post(base_url + "Customer/add_user" , $("#regForm").serialize(), function (data) {
           //please complete this part with suitable plugin for response
           alert(data['message']);
       } , 'json') 
   });
});
