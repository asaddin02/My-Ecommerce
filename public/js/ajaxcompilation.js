// add product to cart
// var csrfToken = $('meta[name="csrf-token"]').attr("content");
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
$(document).ready(function () {
    $("#addcart").on("click", function (e) {
        e.preventDefault();
        var productId = $('[name="product_id"]').val();
        var userId = $('[name="user_id"]').val();
        var quantity = $('[name="qty"]').val();
        var price = $('[name="price_items"]').val();
        $.ajax({
            url: "http://127.0.0.1:8000/cart-list",
            type: "post",
            data: {
                product_id: productId,
                qty: quantity,
                price_items: price,
                user_id: userId,
                _token: csrfToken,
            },
            success: function (response) {
                $("#cart-logo").removeClass("fa-cart-shopping");
                $("#cart-logo").addClass("fa-pen");
                if (response.success) {
                    alert('berhasil');
                } else {
                    console.log("Error:", response.error);
                }
            },
            error: function (err) {
                let error = err.responseJSON;
                console.log(error);
            },
        });
    });
});
