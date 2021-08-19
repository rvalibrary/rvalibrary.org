
const textSliderFactory = (node) => {

  let domItems = {
    arrowRight: undefined,
    arrowLeft: undefined,
    textList: undefined
  }

  let values = {
    counter: 0,
    intervalId: undefined
  }

  const retrieval = (node) => {
    domItems.textList = document.querySelectorAll('.notification');
    domItems.arrowRight = document.querySelector('#next');
    domItems.arrowLeft = document.querySelector('#previous');
  }

  const loopSlide = () => {
    values.intervalId = setInterval(moveForward, 5000);
  }

  const stopLoop = () => {
    if(values.intervalId){
      clearInterval(values.intervalId);
    }
  }

  const moveForward = () => {
    if(values.counter === domItems.textList.length - 1){
      stopLoop();
      loopSlide();
      values.counter = 0;
      domItems.textList[domItems.textList.length - 1].classList.toggle('show');
      domItems.textList[values.counter].classList.toggle('show');
      return;
    }
    values.counter++;
    if(values.counter != 0){
      stopLoop();
      loopSlide();
      domItems.textList[values.counter - 1].classList.toggle('show');
    }
    domItems.textList[values.counter].classList.toggle('show');
  }

  const moveBackwards = () => {
    if(values.counter === 0){
      stopLoop();
      loopSlide();
      domItems.textList[values.counter].classList.toggle('show');
      values.counter = domItems.textList.length - 1;
      domItems.textList[values.counter].classList.toggle('show');
    } else {
      stopLoop();
      loopSlide();
      domItems.textList[values.counter].classList.toggle('show');
      values.counter--;
      domItems.textList[values.counter].classList.toggle('show');
    }
  }

  const hideArrow = (ele) => {
    ele.style.display = 'none';
  }

  const init = () => {
    retrieval(node);
    if(domItems.textList.length === 1){
      hideArrow(domItems.arrowRight);
      hideArrow(domItems.arrowLeft);
    }
    loopSlide();
    domItems.arrowRight.addEventListener('click', () => {
      moveForward();
    });
    domItems.arrowLeft.addEventListener('click', () => {
      moveBackwards();
    });
  }

  return{
    node,
    domItems,
    values,
    retrieval,
    loopSlide,
    stopLoop,
    moveForward,
    moveBackwards,
    hideArrow,
    init
  }

}


  addEventListener('load', () => {

    const sliderParams = {
      automate:{
        automation: false,
        speed: 5
      },
      navDots: true,
      captions: false,
      arrows: false
    }

    let width = document.querySelector('.picture-row');
    width = width.clientWidth;

    let sliderNodeList = document.querySelectorAll('.slider');
    let textMarquee = document.querySelectorAll('.marquee-container');

    Array.from(textMarquee).forEach((marqueeNode) => {
      let marquee = textSliderFactory(marqueeNode);
      marquee.init();
    })

    Array.from(sliderNodeList).forEach((sliderNode, i) => {
      let slider = `slider${i}`;
      slider = sliderFactory(sliderNode, sliderParams);
      slider.init();
    })

  })
