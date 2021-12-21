{{-- <section class="chatbox-custom">
    <button class="chatbox-open">
        <i class="fa fa-comment fa-2x" aria-hidden="true"></i>
      </button>
    <section class="chatbox-popup">
      <header class="chatbox-popup__header">
        <aside style="flex:2">
          <i class="fa fa-user-circle fa-4x chatbox-popup__avatar" aria-hidden="true"></i>
        </aside>
        <aside style="flex:8">
          <h4 style="padding-top: 15px; padding-left:20px; color: rgb(254 105 106 / 90%);">Chat cùng BigDeal</h4>
        </aside>
        <aside style="flex:2">
          <button class="chatbox-panel-close" style="padding-left: 20px; font-size: 20px"><i class="fa fa-close" aria-hidden="true"></i></button>
        </aside>
      </header>
      <main class="chatbox-popup__main">
      </main>
      <footer class="chatbox-popup__footer">
        <aside style="flex:1;color:#888;text-align:center;">
          <i class="fa fa-camera" aria-hidden="true"></i>
        </aside>
        <aside style="flex:10">
          <textarea type="text" placeholder="Type your message here..." autofocus></textarea>
        </aside>
        <aside style="flex:1;color:#888;text-align:center;">
          <i class="fa fa-paper-plane" aria-hidden="true"></i>
        </aside>
      </footer>
    </section>
</section> --}}
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "106183301182718");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>