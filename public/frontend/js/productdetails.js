var swiper = new Swiper(".mySwiper", {
    spaceBetween: 20,
    slidesPerView: 6,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});
$("#choice_attribute_options").on("change", function () {
    getVariantPrice();
});

let qt_inc = document.querySelector(".qt-inc");
let qt_dec = document.querySelector(".qt-dec");

qt_dec.addEventListener("click", function (e) {
    document.querySelector("#product_quantity").value =
        Number(document.querySelector("#product_quantity").value) - 1;
    if (document.querySelector(".quantity_number").value < 1) {
        document.querySelector(".quantity_number").value = 1;
    }
    getVariantPrice();
});
qt_inc.addEventListener("click", function (e) {
    document.querySelector("#product_quantity").value =
        Number(document.querySelector("#product_quantity").value) + 1;
    getVariantPrice();
});

const getVariantPrice = () => {
    $.ajax({
        type: "POST",
        url: route("products.get_variant_price"),
        data: $("#choice_attribute_options").serializeArray(),
        success: function (response) {
            $("#specifications").html(response.specifications);
            $(".total_product_price").html(
                ` <strong>Tổng tiền: </strong><span>${response.price}</span>`
            );
            // Quantity check
            quantityCheck(response.product_quantity);
            // End Quantity check
        },
    });
};

const quantityCheck = (quantity) => {
    if (quantity > 0) {
        $("#product_badge")
            .html(` <div class="product-badge product-available mt-n1 bg-green" style="right: 70px; top: 550px"><i
                                                  class="ci-security-check"></i>Sản phẩm còn hàng
                                              </div>`);
    } else {
        $("#product_badge")
            .html(`<div class="product-badge product-available mt-n1 bg-red"><i
                                                  class="fas fa-times" style="right: 70px; top: 550px"></i>Sản phẩm hết hàng
                                              </div> `);
    }
};
