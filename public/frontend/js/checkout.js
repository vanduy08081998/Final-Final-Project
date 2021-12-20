function cartCheckout() {
    $.ajax({
        type: "GET",
        url: route("checkout.cart-checkout"),
        success: function (response) {
            $("#cart_checkout").html(response);
        },
    });
}
cartCheckout();

$(".needs-validation").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: route("checkout.promotioncode"),
        data: $(this).serializeArray(),
        success: function (response) {
            if (response.success) {
                toastr.success(
                    "Nhập mã thành công, bạn được giảm " +
                        response.promocode.discount_deduct +
                        "%",
                    "Chúc mừng"
                );
                let totalprice = $('input[name="totalprice"]').val();
                $('input[name="totalprice"]').val(
                    (totalprice * (100 - response.promocode.discount_deduct)) /
                        100
                );
                  const formatter = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                    minimumFractionDigits: 0
                })
                $("#totalprice").text(
                    `Tổng tiền: ${formatter.format(
                        (totalprice *
                            (100 - response.promocode.discount_deduct)) /
                            100
                    )}`
                );
            }

            if (response.error) {
                toastr.error("Mã không trùng khớp", "Rất tiếc");
            }
        },
    });
});

const checkoutComplete = () => {
    $.ajax({
        type: "POST",
        url: route("checkout.checkout"),
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            total: $('input[name="totalprice"]').val(),
        },
        success: function (response) {
            Swal.fire({
                title: "Chúc mừng ?",
                text: "Thanh toán thành công !",
                icon: "success",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Tiếp tục!",
            }).then((result) => {
                window.location.href = route("checkout.checkout-review");
            });
        },
    });
};
