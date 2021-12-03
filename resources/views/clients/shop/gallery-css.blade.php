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
