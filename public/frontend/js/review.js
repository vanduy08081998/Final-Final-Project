
window.addEventListener('OpenNewReviewModal', function(event) {
    $('.new_review').modal('show');
})

window.addEventListener('CloseNewReviewModal', function(event) {
    $('.new_review').modal('hide');
})
window.addEventListener('OpenSuccess', function(event) {
    toastr.success('Thảo luận của bạn sẽ được hệ thống kiểm duyệt. Xin cám ơn.')
})

 $(document).on('click', '#upload_content_image', function() {
      $('#content_image').click();
})

window.addEventListener('show_text', function(event) {
   $('.text_review').focus();
})





