let params = {
  automate: {
    automation: false,
    speed: 1
  },
  navDots: true,
  captions: false,
  arrows: false,
  expand: false
}

addEventListener("load", () => {
  const slider = sliderFactory(document.querySelector('.slider'), params);
  slider.init();
})
