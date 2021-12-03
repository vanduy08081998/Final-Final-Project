<style>
  #thumbnails img,
  #main {
    box-shadow: 2px 2px 10px 5px #b8b8b8;
    border-radius: 10px;
  }

  * {
    transition: all 0.5s ease;
  }

  #content-wrapper {
    text-align: center;
    align-items: center;
    justify-content: center;
  }

  #thumbnails {
    text-align: center;
  }

  #thumbnails img {
    width: 100px;
    min-height: 100px;
    margin: 10px;
    cursor: pointer;
  }

  @media only screen and (max-width: 480px) {
    #thumbnails img {
      width: 50px;
      height: 50px;
    }
  }

  #thumbnails img:hover {
    transform: scale(1.05);
  }

  .a {
    width: 100%;
    min-height: 300px;
    object-fit: cover;
    display: block;
    margin: 0 auto;
  }

  #main img {
    width: 100%;
    height: 600px;
    object-fit: cover;
    display: block;
    margin: 20px auto;
  }

  @media only screen and (max-width: 480px) {
    #main {
      width: 100%;
    }
  }

  .hidden {
    opacity: 0;
  }

</style>


<style>
  .form-comment {
    border: 1px solid #a09797;
  }

  .line {
    padding-bottom: 10px;
    overflow: hidden;
    position: relative;
  }

  .line::before {
    content: '';
    position: absolute;
    height: 100%;
    width: 4px;
    margin-top: 40px;
    margin-left: 12px;
    background: #4a90e2;
    border-radius: 5px;
  }

  .infocomment {
    display: block;
    clear: both;
    margin-bottom: 20px;
  }

  .commentask {
    display: block;
    overflow: visible;
    margin: 10px 0 0;
  }

  .commentask strong {
    margin-top: 5px;
    text-transform: capitalize;
  }

  .iconcom-user {
    display: inline-block;
    width: 25px;
    height: 25px;
    background-image: none;
    background-color: rgb(213, 145, 156);
    margin-right: 3px;
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 26px;
    font-style: normal;
  }

  .relate_infocom .reply {
    cursor: pointer;
    color: #4a90e2;
  }

  .infocom_ask {
    padding-top: 8px;
    display: block;
    font-size: 14px;
    color: #4a4a4a;
    line-height: 22px;
    margin-left: 30px;
  }

  .relate_infocom {
    display: flex;
    align-items: center overflow: visible;
    height: 18px;
    padding: 5px 0;
    font-size: 12px;
    color: #666;
    position: relative;
  }

  .relate_infocom span {
    float: left;
  }

  .clr {
    clear: both;
  }

  .relate_infocom .dot {
    float: left;
    display: inline;
    font-size: 8px;
    vertical-align: middle;
    margin: 2px 5px;
    color: #babbb8;
  }

  .relate_infocom .like {
    float: none;
    color: #4a90e2;
  }

  .fa-thumbs-o-up {
    background-position: -106px -25px;
    width: 13px;
    height: 13px;
    margin-top: 5px;
  }


  /*  Trả lời bình luận */

  .comment_reply {
    display: block;
    margin-top: 15px;
    position: relative;
    background: #ece9c7;
    border: 1px solid #e7e7e7;
    padding: 15px 10px;
    font-size: 14px;
    color: #333;
    margin-left: 30px;
  }

  .avt-qtv {
    float: left;
    width: 27px;
    height: 27px;
    margin-right: 5px;
    text-align: center;
    color: #666;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 26px;
    font-weight: 600;
    text-shadow: 1px 1px 0 rgb(255 255 255 / 20%);
  }

  .avt-qtv img {
    margin-top: -5px;
    height: 100%;
    width: 100%;
  }

  .qtv {
    text-transform: uppercase;
    margin-right: 10px;
    color: #000;
    font-weight: normal;
    font-size: 10px;
    background: #eebc49;
    padding: 2px 6px;
    border-radius: 3px;
    line-height: 18px;
    height: 18px;
    margin-left: 10px;
  }

  .comment_reply::before {
    position: absolute;
    content: '';
    background: #ece9c7;
    height: 30px;
    width: 30px;
    transform: rotate(-45deg);
    top: -8px;
    left: 5px;
    z-index: -1;
  }

  .totalcomment-reply {
    display: block;
    padding: 10px 0 0;
    border-top: 1px solid #b4b4b4;
    font-size: 12px;
    color: #4a90e2;
    cursor: pointer;
    margin-top: 7px;
  }

  .numlike span,
  .numlike i {
    float: left;
  }

</style>
