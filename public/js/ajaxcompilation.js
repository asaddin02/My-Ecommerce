// add product to cart
var csrfToken = $('meta[name="csrf-token"]').attr("content");
$(document).ready(function () {
    $("#addcart").on("click", function (e) {
        e.preventDefault();
        var productId = $('[name="product_id"]').val();
        var userId = $('[name="user_id"]').val();
        var quantity = $('[name="qty"]').val();
        var price = $('[name="price_items"]').val();
        $.ajax({
            url: "http://localhost:8000/cart-list",
            type: "post",
            data: {
                product_id: productId,
                qty: quantity,
                price_items: price,
                user_id: userId,
                _token: csrfToken,
            },
            success: function (response) {
                if (response.type === 'cartinsert') {
                    $("#cart-logo").removeClass("fa-cart-shopping");
                    $("#cart-logo").addClass("fa-pen");
                    $("#kolom_qty").val('');
                    var successMessage = response.success;
                    $("#alert").html(successMessage).show();
                } else if (response.type === 'cartres') {
                    var successMessage = response.success;
                    $("#alert").html(successMessage).show();
                }
            },
            error: function (err) {
                let error = err.responseJSON;
                console.log(error);
            },
        });
    });
});
