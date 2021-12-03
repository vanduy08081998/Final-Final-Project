function add_to_wishlist(id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $.ajax({
        type: "POST",
        url: "/wishlist/addToWish",
        data: {
            id: id,
        },
        success: function (response) {
            Swal.fire({
                position: 'center',
                icon: response.icon,
                title: response.text,
                showConfirmButton: response.confirm,
                showCancelButton: response.cancel,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đăng nhập',

            }).then((result) => {
                location.reload();
                if (result.isCancel) {
                    // window.location.href = 'http://127.0.0.1:8000/Custommers/login';
                }
            })
            // console.log(response)
        }
    });
}

function delete_wishlist(id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $.ajax({
        type: "POST",
        url: "/wishlist/deleteWishlist",
        data: {
            id: id,
        },
        success: function (response) {
            Swal.fire({
                position: 'center',
                icon: response.icon,
                title: response.text,
                showConfirmButton: response.confirm,
                showCancelButton: response.cancel,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đăng nhập',

            }).then((result) => {
                location.reload();
                if (result.isConfirmed) {
                }
            })
        }
    });
}


