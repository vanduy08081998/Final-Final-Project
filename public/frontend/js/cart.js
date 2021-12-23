function cartDropdown() {
    $.ajax({
        type: "GET",
        url: route("cart.dropdown"),
        success: function (response) {
            $(".cart__dropdown").html(response);
        },
    });
}

cartDropdown();

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

const deleteButtons = [...$(".delete_button")];
const decButton = [...$(".dec")];
const incButton = [...$(".inc")];
const quantity_number = [...$(".quantity_number")];
const cart_price = [...$(".cart_price")];
for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener("click", () => {
        deleteCart(i);
    });
    decButton[i].addEventListener("click", () => {
        quantity_number[i].value = Number(quantity_number[i].value) - 1;
        if (quantity_number[i].value < 1) {
            quantity_number[i].value = 1;
        }
        updateQuantity(i, quantity_number[i].value, cart_price[i]);
    });
    incButton[i].addEventListener("click", () => {
        quantity_number[i].value = Number(quantity_number[i].value) + 1;
        updateQuantity(i, quantity_number[i].value, cart_price[i]);
    });
}

const updateQuantity = (i, quantity, cart_price) => {
    var _token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "POST",
        url: route("cart.update"),
        data: {
            _token: _token,
            index: i,
            quantity: quantity,
        },
        success: function (response) {
            var formatter = new Intl.NumberFormat("en-US");
            cart_price.textContent =
                formatter.format(response.price * quantity) + "₫";
            cartDropdown();
            cartTotals();
        },
    });
};

const deleteCartDropdown = (i) => {
    $.ajax({
        type: "GET",
        url: route("cart.delete"),
        data: {
            index: i,
        },
        success: function (response) {
            window.location.reload();
        },
    });
};

const deleteCart = function (i) {
    $.ajax({
        type: "GET",
        url: route("cart.delete"),
        data: {
            index: i,
        },
        success: function (response) {
            toastr.success("Xóa thành công");
            window.location.reload();
        },
    });
};

const cartTotals = () => {
    var _token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "POST",
        url: route("cart.total"),
        data: {
            _token: _token,
        },
        success: function (response) {
            var formatter = new Intl.NumberFormat("en-US");
            $(".cart_total_price").html(
                formatter.format(response.totalprice) + "₫"
            );
        },
    });
};
cartTotals();
