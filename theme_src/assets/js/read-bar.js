window.onload = function(){

  function scrollEvent(){
    let scrollBar = document.querySelector('.page-length-scroll-bar');
    let footerHeight = document.querySelector('.site-footer').offsetHeight;


    window.addEventListener('scroll', () => {
      let contentHeight = (document.documentElement.scrollHeight - document.documentElement.clientHeight - footerHeight);
      let pagePos = window.pageYOffset;
      let percentage = 100 * (pagePos / contentHeight);
      scrollBar.style.width = `${percentage}%`;


      if(percentage >= 100){
        scrollBar.style.backgroundColor = "#004765";
      } else {
        scrollBar.style.backgroundColor = "#ff7236";
      }

    })

  }

  scrollEvent();

}
