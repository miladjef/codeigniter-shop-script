/**
 * Created by user on 10/05/2016.
 */
$(function () {
    $(".glyphicon-refresh").on('click' , function () {
        var q = $(this).parents('tr').find('.quantity').val();
        var id = $(this).prop("id");
        $.post('Cart/refreshCart',{id:id , q:q},
            function( data ){
                if ( data != false ){
                    window.location.href= "Cart";
                }
            }
        );
    });


    $(".glyphicon-remove").on('click' , function () {
        var id = $(this).prop("id");
        $.post('Cart/deleteCartItem',{id:id},
            function( data ){
                if ( data != false ){
                    window.location.href= base_url + "Cart";
                }
            }
        );
    });

    $("#goReview").on("click" , function () {
        window.location.href= "Review";
    });
});