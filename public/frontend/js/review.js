
window.addEventListener('OpenNewReviewModal', function(event) {
    $('.new_review').modal('show');
})

window.addEventListener('CloseNewReviewModal', function(event) {
    alert('ok');
    $('.new_review').modal('hide');
})

 $(document).on('click', '#upload_content_image', function() {
      $('#content_image').click();
})

window.addEventListener('show_text', function(event) {
   $('.text_review').focus();
})





