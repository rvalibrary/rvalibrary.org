<style media="screen">

  .modal{
    padding-top: 45px !important;
  }
  .modal-light{
    background-color: rgba(0,0,0,0.7) !important;
  }

  .modal-banner-box-container{
    width: 100%;
    height: 100vh;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit on top */
    padding-top: 20px; /* Location of the box */
    overflow: auto; /* Enable scroll if needed */

  }

  .modal-banner-box{
    position: relative;
    min-width: 370px;
    max-width: 950px;
    background: white;
    min-height: 200px;
    border-radius: 5px;
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    line-height: 1;
    padding: 40px 80px;
    letter-spacing: 2px;
    overflow: hidden;
    margin: 10px;
    z-index: 99;
  }

  .modal-banner-box > .close {
    top: 15px;
    right: 15px;
  }

  .modal-content h2 {
    color: #282828;
    font-size: 50px;
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    margin-top: 50px;
    z-index: 1;
  }

  .modal-content small {
    color: #282828;
    display: block;
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    font-weight: 400;
    font-size: 30px;
  }

  @media (max-width: 680px){
    .modal-banner-box{
      min-width: 97% !important;
      font-size: 4rem;
      padding: 30px !important;
    }
    .bottom-text{
      font-size: 12px !important;
      bottom: -40px !important;
    }
    .close{
      top: 5px !important;
      right: 5px !important;
    }
    .modal-content h2{
      font-size: 24px;
    }
    .modal-content small {
      font-size: 18px;
    }
    .rpl-logo-blue{
      max-width: 40px !important;
    }
  }

  .bottom-text{
    font-size: 15px;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    position: absolute;
    bottom: -30px;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    background-color: #f73124;
    padding: 10px;
    letter-spacing: normal;
    border-radius: 5px;
    color: white;
  }

  .modal-banner-box > a:hover{
    color: white !important;
  }

  .modal-banner-box > a{
    color: white !important;
  }

  .corner-blob{
    max-width: 300px;
    position: absolute;
    top: -130px;
    right: -130px;
    -webkit-transform: rotate(100deg);
        -ms-transform: rotate(100deg);
            transform: rotate(100deg);
    z-index: -1;
  }

  .modal-banner-box > .modal-description {
    margin-top: 20px;
  }

  .rpl-logo-blue{
    max-width: 60px;
    position: absolute;
    bottom: 5px;
    right: 5px;
  }

</style>

<div id="homeModal" class="modal modal-light">
  <!-- <span class="close">&times;</span> -->
  <!-- <img class="modal-content modal-content-box" id="img01"> -->
  <div class="modal-banner-box-container">
    <div class="modal-content modal-banner-box bg-light margin-right">
      <span class="close">&times;</span>
      <h2>Richmond Public Library
        <small>Community Survey</small>
      </h2>
      <p class="modal-description">Please take a moment to answer this anonymous survey about the library. All questions are optional.</p>
      <p class="modal-description">Favor de tomarse un momento para responder a esta encuesta anónima sobre la biblioteca. Todas las preguntas son opcionales.</p>
      <a class="btn btn-primary" href="https://www.surveymonkey.com/r/WJTVW27">Survey</a>
      <a class="btn btn-primary" href="https://www.surveymonkey.com/r/3GWCLNH">Encuesta en Español</a>
      <!-- <div class="bottom-text">
        You can make a difference by donating to the RPL Foundation
      </div> -->
      <img class="rpl-logo-blue" src="https://rvalibrary.org/wp-content/uploads/2021/05/rpl-logo-blue.png" alt="">
      <svg class="corner-blob" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="#013862" d="M47.4,-63C54.9,-50.1,50,-29,48.9,-12.1C47.7,4.8,50.2,17.6,48.1,33.9C46,50.1,39.3,69.8,24.8,80.4C10.4,90.9,-11.9,92.3,-31.3,85.4C-50.7,78.6,-67.4,63.5,-76.3,45.4C-85.1,27.2,-86.2,5.9,-80.6,-12.3C-75.1,-30.4,-62.9,-45.4,-48.4,-57.1C-33.8,-68.7,-16.9,-77,1.5,-78.8C19.9,-80.5,39.8,-75.9,47.4,-63Z" transform="translate(100 100)" />
      </svg>
    </div>
  </div>
  <!-- <div id="modalText">Some Text Here</div>
  <div id="caption">Some body text</div> -->
</div>
