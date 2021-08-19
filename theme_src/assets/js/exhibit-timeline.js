let params = {
  automate: {
    automation: false,
    speed: 1
  },
  imgClick: false,
  navDots: true,
  captions: false,
  arrows: true,
  textBlocks: true,
}

addEventListener('load', () => {
  document.querySelector('#mosio_widget_tab').style.opacity = '0';
  let slider = sliderFactory( document.querySelector('.slider'), params );
  slider.init();
})
