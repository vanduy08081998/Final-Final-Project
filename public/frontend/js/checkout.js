function cartCheckout(){

    $.ajax({
        type: "GET",
        url: route('checkout.cart-checkout'),
        success: function (response) {
            $('#cart_checkout').html(response)
        }
    });


}
cartCheckout()


const checkoutComplete = () => {

    $.ajax({
        type: "POST",
        url: route('checkout.checkout'),
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                title: 'Chúc mừng ?',
                text: "Thanh toán thành công !",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tiếp tục!'
              }).then((result) => {
                  window.location.href = route('clients.index')
              })
        }
    });

}

