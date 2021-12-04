<section class="chatbox-custom">
    <button class="chatbox-open">
        <i class="fa fa-comment fa-2x" aria-hidden="true"></i>
      </button>
    {{-- <button class="chatbox-close">
        <i class="fa fa-close fa-2x" aria-hidden="true"></i>
      </button> --}}
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
        {{-- messeges --}}
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
</section>
<script type="text/javascript">
  (function () {
      var options = {
          facebook: "106183301182718", // Facebook page ID
          call_to_action: "Message us", // Call to action
          position: "right", // Position may be 'right' or 'left'
      };
      var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
      var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
      s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
      var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
  })();
</script>
