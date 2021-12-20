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
            show_icon_wishlist();
            if(response.result == 'success'){
                toastr.success(response.text)
                $('.btn-wishlist_'+id).removeClass('text-muted');
                $('.btn-wishlist_'+id).addClass('text-danger');
            }else{
                toastr.warning(response.text)
                $('.btn-wishlist_'+id).removeClass('text-danger');
                $('.btn-wishlist_'+id).addClass('text-muted'); 
            }
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
            show_icon_wishlist();
            if(response.result == 'warning'){
                toastr.warning(response.text)
            }
            setTimeout(function(){
                window.location.reload();
            }, 1000);
        }
    });
}

function show_icon_wishlist(){
    let url = $('.count-wishlist').data('url');
    $.ajax({
        url: url,
        method: 'GET',
        success: function (data){
           $('.count_wishlist').html('('+data+')');
        }
    })
}
show_icon_wishlist();


