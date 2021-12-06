const cartDropdown = () => {
    $.ajax({
        type: "GET",
        url: route('cart.dropdown'),
        success: function(response) {
            $('.cart__dropdown').html(response)
        }
    });
}
cartDropdown()
$('.card_add_btn').click(function() {
    $.ajax({
        type: "POST",
        url: route('card.add'),
        data: $('#choice_attribute_options').serializeArray(),
        success: function(response) {
            console.log(response);
            if (response.success) {
                Swal.fire({
                    imageUrl: `${$('#url_to').val()}/frontend/img/1103-confetti-outline.gif`,
                    title: 'Chúc mừng',
                    text: 'Thêm giỏ hàng thành công!',
                    confirmButtonText: 'Nhấn ok để tiếp tục',
                    confirmButtonColor: 'green'
                }).then((result) => {
                    if (result.isConfirmed) {
                        cartDropdown()
                    }
                })
            }

            if (response.error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Rất tiếc',
                    text: 'Bạn phải đăng nhập trước khi mua hàng !',
                    showConfirmButton: false,
                    showCancelButton: true,
                    cancelButtonText: 'Quay lại',
                    cancelButtonColor: 'red'
                })
            }
        }
    });
})

const deleteButtons = [...$('.delete_button')]
const decButton = [...$('.dec')]
const incButton = [...$('.inc')]
const quantity_number = [...$('.quantity_number')]
const cart_price = [...$('.cart_price')]
for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener('click', () => {
        deleteCart(i)
    })
    decButton[i].addEventListener('click', () => {
        quantity_number[i].value = Number(quantity_number[i].value) - 1
        if (quantity_number[i].value < 1) {
            quantity_number[i].value = 1
        }
        updateQuantity(i, quantity_number[i].value, cart_price[i]);
    })
    incButton[i].addEventListener('click', () => {
        quantity_number[i].value = Number(quantity_number[i].value) + 1
        updateQuantity(i, quantity_number[i].value, cart_price[i]);
    })
}

const updateQuantity = (i, quantity, cart_price) => {
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: route('cart.update'),
        data: {
            _token: _token,
            index: i,
            quantity: quantity
        },
        success: function(response) {
            var formatter = new Intl.NumberFormat('en-US')
            cart_price.textContent = formatter.format(response.price * quantity);
            cartDropdown()
            cartTotals()
        }
    });
}

const deleteCartDropdown = (i) => {

    $.ajax({
        type: "GET",
        url: route('cart.delete'),
        data: {
            index: i
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Chúc mừng !',
                text: 'Xóa giỏ hàng thành công!',
                confirmButtonText: 'Nhấn ok để tiếp tục !',
                confirmButtonColor: 'green',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.reload();
                }
            })
        }
    });

}

const deleteCart = function(i) {
    Swal.fire({
        imageUrl: 'https://img.icons8.com/ultraviolet/50/000000/shopping-cart-loaded--v2.png',
        text: 'Bạn có chắc chắn muốn xóa giỏ hàng này không',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Vâng ! Tôi muốn xóa nó !',
        confirmButtonColor: 'green',
        denyButtonText: `Tôi không muốn xóa nó`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: route('cart.delete'),
                data: {
                    index: i
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Chúc mừng !',
                        text: 'Xóa giỏ hàng thành công!',
                        confirmButtonText: 'Nhấn ok để tiếp tục !',
                        confirmButtonColor: 'green',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                }
            });
        } else if (result.isDenied) {
            Swal.fire('Bạn đã hoàn tác hành động của mình !', '', 'info')
        }
    })

}

const cartTotals = () => {
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: route('cart.total'),
        data: {
            _token: _token,
        },
        success: function(response) {
            var formatter = new Intl.NumberFormat('en-US')
            $('.cart_total_price').html(
                formatter.format(response.totalprice));
        }
    });
}
cartTotals()