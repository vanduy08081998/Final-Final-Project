
window.addEventListener('OpenNewReviewModal', function(event) {
    $('.new_review').modal('show');
})

window.addEventListener('CloseNewReviewModal', function(event) {
    $('.new_review').modal('hide');
})

 $(document).on('click', '#upload_content_image', function() {
      $('#content_image').click();
    })




