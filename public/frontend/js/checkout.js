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
            console.log(response)
        }
    });

}

