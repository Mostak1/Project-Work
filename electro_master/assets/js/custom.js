$(document).ready(function(){

    $(".increment-btn").click(function(e){
        e.preventDefault();

        let qval = $(this).closest(".product-data").find(".qval").val();
        // alert(qval);
        let value = parseInt(qval,10)
        if(value<20){
            value ++;
            
            $(this).closest(".product-data").find(".qval").val(value);

        }
    })

    $(".decrement-btn").click(function(e){
        e.preventDefault();

        let qval = $(this).closest(".product-data").find(".qval").val();
        // alert(qval);
        let value = parseInt(qval,10)
        if(value>1){
            value --;
            
            $(this).closest(".product-data").find(".qval").val(value);

        }
    })
});