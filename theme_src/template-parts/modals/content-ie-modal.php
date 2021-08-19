<style media="screen">
  .ie_modal{
    width: fit-content;
    max-width: 350px;
    position: fixed;
    top: 80px;
    right: -1000px;
    z-index: 9998;
    background-color: white;
    border-radius: 5px;
    padding: 10px 10px 10px 20px;
    background: #fdfdfd;
    overflow: hidden;
    transition: right .4s ease;
  }

  .ie_modal_close{
    position: absolute;
    top: 0px;
    right: 10px;
    color: white;
    font-size: 25px;
  }

  .ie_modal_corner_blob{
    max-width: 260px;
    position: absolute;
    top: -180px;
    right: -120px;
    z-index: -1;
    transform: rotateY(358deg);
  }

  .ie_modal_ripple_container{
    position: relative;
  }

  .ie_modal_ripple{
    height: 100px;
    position: absolute;
    left: -34px;
  }

  .ie_modal_text_container{
    margin-left: 30px;
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
  }

  .ie_modal_text{
    color: #282828;
    font-size: 50px;
  }

  .ie_modal_text_container > p {
    margin-bottom: 10px;
    font-size: 14px;
  }

  .show-offset{
    right: 10px;
  }
</style>

<div class="ie_modal hidden">
</div>

<script type="text/javascript">
  function checkModalCookie() {
    return document.cookie.split('; ').indexOf('hideIEMessage=true');
  }
  if(/MSIE|Trident/.test(window.navigator.userAgent) && checkModalCookie() == -1){
    const ieModal = document.querySelector('.ie_modal');
    let modalContent = '<span class="ie_modal_close">×</span>';
    modalContent += '<svg class="ie_modal_corner_blob" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">';
    modalContent += '<path fill="#013862" d="M47.4,-63C54.9,-50.1,50,-29,48.9,-12.1C47.7,4.8,50.2,17.6,48.1,33.9C46,50.1,39.3,69.8,24.8,80.4C10.4,90.9,-11.9,92.3,-31.3,85.4C-50.7,78.6,-67.4,63.5,-76.3,45.4C-85.1,27.2,-86.2,5.9,-80.6,-12.3C-75.1,-30.4,-62.9,-45.4,-48.4,-57.1C-33.8,-68.7,-16.9,-77,1.5,-78.8C19.9,-80.5,39.8,-75.9,47.4,-63Z" transform="translate(100 100)"></path>';
    modalContent += '</svg>';
    modalContent += '<div class="ie_modal_ripple_container">';
    modalContent += '<img class="ie_modal_ripple" src="https://s3.amazonaws.com/rvalibrary-deskbook/deskbook-uploads/public/ripple-graphics/Ripple%20peeking-R%202.png" alt="">';
    modalContent += '</div>';
    modalContent += '<div class="ie_modal_text_container">';
    modalContent += '<div class="ie_modal_text">';
    modalContent += 'Whoops!';
    modalContent += '</div>';
    modalContent += '<p>It looks like you\'re using an older Internet Explorer browser. Please reopen the site in a browser like Firefox, Chrome or Edge.</p>';
    modalContent += '<p>The features on our site work best with new browsers as IE is no longer supported.</p>';
    modalContent += '<div class="btn btn-primary ie_modal_cookie">';
    modalContent += 'Don\'t Show Again';
    modalContent += '</div>';
    modalContent += '</div>';
    ieModal.insertAdjacentHTML('afterbegin', modalContent);
    ieModal.classList.remove('hidden');
    // ieModal.classList.remove('offscreen-right');
    setTimeout(function() {
      ieModal.style.right = '10px';
      ieModal.querySelector('.ie_modal_close').addEventListener('click', function(){
        ieModal.style.display = 'none'
      });
      ieModal.querySelector('.ie_modal_cookie').addEventListener('click', function(){
        document.cookie = 'hideIEMessage=true;';
        ieModal.style.display = 'none';
      })
    }, 1000);
  }
</script>
