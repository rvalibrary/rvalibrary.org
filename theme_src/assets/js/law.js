const sliderParams = {
  automate: {
    automation: true,
    speed: 10
  },
  navDots: true,
  captions: false,
  arrows: false,
  expand: false
}

addEventListener('load', () => {
  expandingBtnList();
  // parallax();
  const slider = sliderFactory( document.querySelector('.slider'), sliderParams );
  slider.init();
})
