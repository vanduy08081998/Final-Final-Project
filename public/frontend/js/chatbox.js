// const chatbox = jQuery.noConflict();
jQuery(document).ready(function($){
$(() => {
  $(".chatbox-open").click(() =>
    $(".chatbox-popup, .chatbox-close").fadeIn()
  );

  $(".chatbox-close").click(() =>
    $(".chatbox-popup, .chatbox-close").fadeOut()
  );

  $(".chatbox-maximize").click(() => {
    $(".chatbox-popup, .chatbox-open, .chatbox-close").fadeOut();
    $(".chatbox-panel").fadeIn();
    $(".chatbox-panel").css({ display: "flex" });
  });

  $(".chatbox-minimize").click(() => {
    $(".chatbox-panel").fadeOut();
    $(".chatbox-popup, .chatbox-open, .chatbox-close").fadeIn();
  });

  $(".chatbox-panel-close").click(() => {
    $(".chatbox-popup, .chatbox-close").fadeOut()

  });
});
})

