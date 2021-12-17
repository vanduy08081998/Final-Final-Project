function fee(){
    $(document).on('change','.choose',function(){
        var url = $('.route').data('url');
        var action = $(this).attr("id");
        var ma_id = $(this).val();
        var result = '';
        if(action=='province'){
            result = 'district';
        }else{
            result = 'ward';
        }
        $.ajax({
            url: url,
            method: "POST",
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
            data: {action:action,ma_id:ma_id},
            success: function(data){
            $('#'+result).html(data);
            }
        })
    })
}


window.addEventListener('OpenUpdatePhoneModal', function(event) {
    $('.updatePhone').modal('show')
});

window.addEventListener('CloseUpdatePhoneModal', function(event) {
    $('.updatePhone').modal('hide');
});

window.addEventListener('OpenUpdateAddressModal', function(event) {
    $('.updateAddress').modal('show');
});

window.addEventListener('CloseUpdateAddressModal', function(event) {
    $('.updateAddress').modal('hide');
});

window.addEventListener('OpenUpdatePasswordModal', function(event) {
    $('.updatePassword').modal('show');
});

window.addEventListener('CloseUpdatePasswordModal', function(event) {
    $('.updatePassword').modal('hide');
    $('.user_logout').submit();
});

window.addEventListener('CloseModal', function(event){
    $('.modal').modal('hide');
})

$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bx-hide");
            $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bx-hide");
            $('#show_hide_password i').addClass("bx-show");
        }
    });

    $("#show_hide_password2 a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password2 input').attr("type") == "text") {
            $('#show_hide_password2 input').attr('type', 'password');
            $('#show_hide_password2 i').addClass("bx-hide");
            $('#show_hide_password2 i').removeClass("bx-show");
        } else if ($('#show_hide_password2 input').attr("type") == "password") {
            $('#show_hide_password2 input').attr('type', 'text');
            $('#show_hide_password2 i').removeClass("bx-hide");
            $('#show_hide_password2 i').addClass("bx-show");
        }
    });
});



