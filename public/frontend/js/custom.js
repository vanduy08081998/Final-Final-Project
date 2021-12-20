$('body').resize(function(){
    const width = $('body').width();
    // console.log(width)
    if(width < 1024){
        $('.card-body').removeClass('card-body-hidden');
    }
})
.resize()

$(document).ready(function() {
    $(window).scroll(function(event) {
        var pos_body = $('html,body').scrollTop();
        //   console.log(pos_body);
        if (pos_body > 545.4545288085938) {
            $('.banner-main').addClass('banner-fixed');
        }
        if (pos_body < 545.4545288085938) {
            $('.banner-main').removeClass('banner-fixed');
        }
    });
});