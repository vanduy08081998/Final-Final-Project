const dec = [...$(".qt-dec-qk")];
const inc = [...$(".qt-inc-qk")];
for (let index = 0; index < [...$(".product_id")].length; index++) {
    var swiper = new Swiper(".mySwiper" + [...$(".product_id")][index].value, {
        spaceBetween: 20,
        slidesPerView: 6,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(
        ".mySwiper2" + [...$(".product_id")][index].value,
        {
            spaceBetween: 20,
            navigation: {
                nextEl:
                    "#swiper-button-next-" + [...$(".product_id")][index].value,
                prevEl:
                    "#swiper-button-prev-" + [...$(".product_id")][index].value,
            },
            thumbs: {
                swiper: swiper,
            },
        }
    );

    $("#choice_attribute_options_" + [...$(".product_id")][index].value).on(
        "change",
        function () {
            getVariantPrice([...$(".product_id")][index].value);
        }
    );

    //quantity_number"
    dec[index].addEventListener("click", function (e) {
        [...$(".quantity_number")][index].value =
            Number([...$(".quantity_number")][index].value) - 1;
        if ([...$(".quantity_number")][index].value < 1) {
            [...$(".quantity_number")][index].value = 1;
        }
        getVariantPrice([...$(".product_id")][index].value);
    });
    inc[index].addEventListener("click", function (e) {
        [...$(".quantity_number")][index].value =
            Number([...$(".quantity_number")][index].value) + 1;
        getVariantPrice([...$(".product_id")][index].value);
    });

    const getVariantPrice = (id) => {
        $.ajax({
            type: "POST",
            url: route("products.get_variant_price"),
            data: $("#choice_attribute_options_" + id).serializeArray(),
            success: function (response) {
                $(".total_product_price_" + id).html(
                    ` <strong>Tổng tiền: </strong><span>${response.price}</span>`
                );
                // Quantity check
                quantityCheck(response.product_quantity, id);
                // End Quantity check
            },
        });
    };

    const quantityCheck = (quantity, id) => {
        if (quantity > 0) {
            $("#product_badge_" + id)
                .html(` <div class="product-badge product-available mt-n1 bg-green" style="right: 70px; top: 550px"><i
                                                  class="ci-security-check"></i>Sản phẩm còn hàng
                                              </div>`);
        } else {
            $("#product_badge_" + id)
                .html(`<div class="product-badge product-available mt-n1 bg-red"><i
                                                  class="fas fa-times" style="right: 70px; top: 550px"></i>Sản phẩm hết hàng
                                              </div> `);
        }
    };

    $(".card_add_btn_" + [...$(".product_id")][index].value).click(function () {
        $.ajax({
            type: "POST",
            url: route("card.add"),
            data: $(
                "#choice_attribute_options_" +
                    [...$(".product_id")][index].value
            ).serializeArray(),
            success: function (response) {
                console.log(response);
                if (response.success) {
                    toastr.success("Thêm giỏ hàng thành công", "Chúc mừng");
                    cartDropdown();
                }

                if (response.error) {
                    toastr.error(
                        "Bạn phải đăng nhập trước khi mua hàng",
                        "Cảnh báo"
                    );
                }
            },
        });
    });
}
