function cartCheckout() {
    $.ajax({
        type: "GET",
        url: route("checkout.cart-checkout"),
        success: function (response) {
            $("#cart_checkout").html(response);

            let promocode = localStorage.getItem("promocode");
            if (!promocode) {
            } else {
                let totalprice = $('input[name="totalprice"]').val();
                console.log(totalprice);
                const formatter = new Intl.NumberFormat("vi-VN", {
                    style: "currency",
                    currency: "VND",
                    minimumFractionDigits: 0,
                });
                $("#totalprice").text(
                    `Tổng tiền: ${formatter.format(
                        (totalprice * (100 - Number(promocode))) / 100
                    )}`
                );
            }
        },
    });
}

cartCheckout();

const localPromocode = (discount, response, promocodeText) => {
    let promocode = localStorage.getItem("promocode");
    let promoText = localStorage.getItem("promoText")
    if (!promocode) {
        if (response.success) {
            toastr.success(response.success, "Chúc mừng");
            $("#hidden_sale_code").val(promocodeText);
            localStorage.setItem("promocode", discount);
            localStorage.setItem("promoText", promocodeText);
            const formatter = new Intl.NumberFormat("vi-VN", {
                style: "currency",
                currency: "VND",
                minimumFractionDigits: 0,
            });
            $("#totalprice").text(
                `Tổng tiền: ${formatter.format(
                    (totalprice * (100 - promocode)) / 100
                )}`
            );
        }
        if (response.error) {
            toastr.error(response.error, "Rất tiếc");
        }
        cartCheckout();
    } else {
        toastr.error("Bạn đã nhập mã giảm giá rồi", "Rất tiếc");
    }
};

$(".needs-validation").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: route("checkout.promotioncode"),
        data: $(this).serializeArray(),
        success: function (response) {
            localPromocode(
                response.discount,
                response,
                $('input[name="promocode"]').val()
            );
        },
    });
});

const checkoutComplete = () => {
    let localcheckout = localStorage.getItem("promocode");
    let promoText = localStorage.getItem("promoText");
    let proText = "";
    if (!promoText) {
        proText = "";
    } else {
        proText = promoText;
    }
    let promocodeInsert = 0;
    if (!localcheckout) {
        promocodeInsert = 0;
    } else {
        promocodeInsert = Number(localcheckout);
    }
    $.ajax({
        type: "POST",
        url: route("checkout.checkout"),
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            total: $('input[name="totalprice"]').val(),
            promocodeInsert: promocodeInsert,
            hiddenSaleCode: proText,
        },
        success: function (response) {
            localStorage.removeItem("promocode");
            localStorage.removeItem("promoText");
            window.location.href = route("checkout.checkout-review");
        },
    });
};
