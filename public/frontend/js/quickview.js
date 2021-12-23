function quickviewModal(id) {
    $.ajax({
        type: "POST",
        url: route("shop.quickview"),
        data: {
            id: id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            $("#modal-quickview").modal("show");
            $("#quickview-details").html(response);

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
                    Number(document.querySelector("#product_quantity").value) -
                    1;
                if (document.querySelector(".quantity_number").value < 1) {
                    document.querySelector(".quantity_number").value = 1;
                }
                getVariantPrice();
            });
            qt_inc.addEventListener("click", function (e) {
                document.querySelector("#product_quantity").value =
                    Number(document.querySelector("#product_quantity").value) +
                    1;
                getVariantPrice();
            });

            const getVariantPrice = () => {
                $.ajax({
                    type: "POST",
                    url: route("products.get_variant_price"),
                    data: $("#choice_attribute_options").serializeArray(),
                    success: function (response) {
                        $(".product-price__current-price").html(
                            `<h5>Tổng tiền: </h5>
                <span>${response.price}
                  ₫</span>`
                        );
                    },
                });
            };

            $(".card_add_btn").click(function () {
                $.ajax({
                    type: "POST",
                    url: route("card.add"),
                    data: $(".choice_attribute_options").serializeArray(),
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            toastr.success(response.success, "Chúc mừng");
                            cartDropdown();
                        }
                        if (response.error) {
                            toastr.error(response.error, "Cảnh báo");
                        }
                        if (response.error_quantity) {
                            toastr.error(response.error_quantity, "Cảnh báo");
                        }
                    },
                });
            });

            let date_end = $("._314-e778ac").attr("data-date");
            $("._314-e778ac").countdown(date_end, function (event) {
                $(this).html(
                    event.strftime(
                        'Còn:&nbsp <span class="date">%D ngày</span> &nbsp <span class="hour">%H</span>:<span class="min">%M</span>:<span class="sec">%S</span>'
                    )
                );
            });
        },
    });
}
