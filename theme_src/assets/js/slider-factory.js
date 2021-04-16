const sliderFactory = (node, params) => {

  let domItems = {
    arrowRight: undefined,
    arrowLeft:  undefined,
    dotContainer: undefined,
    dotList: [],
    imgContainer: undefined,
    imgList: undefined,
    currentSlide: undefined,
    expandIcon: undefined,
    captionContainer: undefined,
    sliderContainer: undefined,
    showTextIcon: undefined,
  }

  let values = {
    width: undefined,
    height: undefined,
    translated: undefined,
    counter: 1,
    active: false,
    currentX: undefined,
    initialX: undefined,
    dots: false,
    moved: false,
    expand: false,
    captions: params.captions,
    arrows: false,
    parallax: undefined,
    firstRender: true,
  }

  const retrieval = (node) => {
    // domItems
    domItems.arrowRight = node.querySelector('.right-arrow');
    domItems.arrowLeft = node.querySelector('.left-arrow');
    domItems.dotContainer = node.querySelector('.dot-container');
    domItems.imgContainer = node.querySelector('.picture-row');
    domItems.imgList = node.querySelectorAll('.carousel-img');
    // domItems.imgs = node.querySelectorAll('.img');
    domItems.expandIcon = node.querySelector('.expand-icon-container');
    domItems.captionContainer = node.querySelector('.caption-container');
    domItems.sliderContainer = node.querySelector('.slider-container');
    if(params.textBlocks){
      domItems.showTextIcon = node.querySelector('.show-text-icon');
    }

    //values
    values.width = domItems.imgContainer.clientWidth;
    values.currentX = -values.width;

  }

  const setupImages = (imgNodeList, imgContainer) => {
    let firstImg = imgNodeList[0].outerHTML;
    let lastImg = imgNodeList[imgNodeList.length - 1].outerHTML;
    imgContainer.insertAdjacentHTML('afterbegin', lastImg);
    imgContainer.insertAdjacentHTML('beforeend', firstImg);
    domItems.imgList = (node.querySelectorAll('.carousel-img'));
    domItems.currentSlide = domItems.imgList[1];
    // populateCaption();
    values.width = imgNodeList[0].clientWidth;
    values.height = domItems.currentSlide.height;
    if(values.firstRender === true){
      imgContainer.style.transition = 'none';
      values.firstRender = false;
      moveSlides(imgContainer);
    }
  }

  const imgClickListener = (imgNodeList) => {
    Array.from(imgNodeList).forEach((img) => {
      img.addEventListener('click', (e) => {
        if(values.moved == false){
          loadModal();
        }
      })
    })
  }


  const populateCaption = () => {
    if(values.captions === true){
      let caption = domItems.currentSlide.getAttribute('alt');
      if(caption.length >= 1){
        domItems.captionContainer.style.visibility = "visible";
        domItems.captionContainer.innerText = caption;
        console.log('value here');
        return caption;
      } else {
        domItems.captionContainer.style.display = "none !important";
        console.log('set to true...no value');
        return "";
      }
    } else {
      domItems.captionContainer.style.display = "none !important";
      console.log('set to false...no value');
      return "";
    }
  }

  const resizeImagesToContainer = (imgNodeList, imgContainer) => {
    let imgContainerWidth = imgContainer.clientWidth;
    Array.from(imgNodeList).forEach( (img) => {
      img.style.width = imgContainerWidth + 'px';
    })
    values.width = imgContainerWidth;
    mobileStyleAdjustments();
  }

  const resizeContainerToImages = (imgContainer) => {
    let currentSlideHeight = domItems.currentSlide.clientHeight;
    if(imgContainer.clientHeight != currentSlideHeight){
      console.log(imgContainer.clientHeight);
        imgContainer.style.height = `${currentSlideHeight}px`;
    }
  }

  const createDynamicDots = (imgNodeList, dotContainer, imgContainer) => {
    values.dots = true;
    Array.from(imgNodeList).forEach((node, i) => {
      if(i < imgNodeList.length - 2){
        let dot = document.createElement('DIV');
        dot.setAttribute('data-i', i+1);
        dot.setAttribute('class', 'nav-dots');
        domItems.dotList.push(dot);
        dotContainer.appendChild(dot);
      } else {
        return;
      }
      domItems.dotList[0].classList.add('selected');
    })
  }

  const moveSlides = (imgContainer) => {
    values.translated = -values.width * values.counter;
    values.currentX = values.translated;
    imgContainer.style.transform = `translateX(${values.translated}px)`;
    domItems.currentSlide = domItems.imgList[values.counter];
    // imgContainer.parentElement.style.height = domItems.currentSlide.height + 'px';
    resizeContainerToImages(imgContainer);
    if(values.captions){
      populateCaption();
    }
  }

  const currentSlideSrc = () => {
    if(domItems.currentSlide.getAttribute('src') === null){
      if(domItems.currentSlide.querySelector('img')){
        return domItems.currentSlide.querySelector('img').getAttribute('src');
      } else {
        return null;
      }
    } else {
      return domItems.currentSlide.getAttribute('src');
    }
  }

  const moveForward = (imgContainer, imgNodeList) => {
    if(values.counter != imgNodeList.length-1){
       imgContainer.style.transition = 'all .3s ease';
       values.counter++;
       moveSlides(imgContainer);
      } else {
        values.counter = 1;
        moveSlides(imgContainer);
      }
  }

  const moveBackwards = (imgContainer, imgNodeList) => {
    if(values.counter != 0){
       imgContainer.style.transition = 'all .3s ease';
       values.counter--;
       moveSlides(imgContainer);
    } else {
      values.counter = imgNodeList.length - 2;
      moveSlides(imgContainer);
    }
  }

  const automateSlide = (imgContainer, imgNodeList, seconds) => {
      let boundMoveForward = moveForward.bind(this);
      if(values.dots === true){
        let boundChangeDotClass = changeDotClass.bind(this);
        setInterval(function(){
          boundMoveForward(imgContainer, imgNodeList);
          if(values.counter == imgNodeList.length - 1){
            boundChangeDotClass(domItems.dotList[0], domItems.dotList);
          } else {
            boundChangeDotClass(domItems.dotList[values.counter-1], domItems.dotList);
          }
        }, seconds * 1000);
      } else {
        setInterval(function(){
          boundMoveForward(imgContainer, imgNodeList);
          if(values.counter == imgNodeList.length - 1){
          } else {
          }
        }, seconds * 1000);
      }
  }

  const changeDotClass = (targetDot, dotArr) => {
    targetDot.classList.add('selected');
    dotArr.forEach((dot) => {
      if(dot.classList.contains('selected') && dot != targetDot){
        dot.classList.remove('selected');
      }
    })
  }

  const changeDotClassWithoutClick = (imgNodeList) => {
    if(values.counter != imgNodeList.length - 1){
      changeDotClass(domItems.dotList[values.counter -1 ], domItems.dotList);
    }
    // else {
    //   changeDotClass(domItems.dotList[0], domItems.dotList);
    // }
    // if(values.counter != 0){
    //   changeDotClass(domItems.dotList[values.counter - 1 ], domItems.dotList);
    // } else {
    //   changeDotClass(domItems.dotList[imgNodeList.length - 3], domItems.dotList);
    // }
  }

  const loadModal = (text) => {
    const modal = document.getElementById("imgModal");
    const modalContent = document.querySelector("#img01");
    const modalCaption = document.querySelector('#caption');
    const modalText = document.querySelector('#modalText');
    modalText.innerHTML = '';
    modalContent.setAttribute('src', '');
    modal.style.display = "block";
    modal.onclick = function(e) {
      if(e.target.className === 'modal' || e.target.className === 'close'){
        modal.style.display = "none";
      }
    }
    if(!text){
      let imgSrc = currentSlideSrc();
      if(imgSrc === null){
        modalText.innerText = 'no image data for this slide';
      } else {
        modalCaption.innerText = populateCaption();
        modalContent.setAttribute('src', imgSrc);
      }
      // var span = document.getElementsByClassName("close")[0];
      // modal.onclick = function(e) {
      //   if(e.target.className !== 'modal-content'){
      //     modal.style.display = "none";
      //   }
      // }
    } else {
      text.forEach((text) => {
        modalText.insertAdjacentHTML('beforeend', text);
      })
      let toolTips = jQuery('[data-toggle="tooltip"]');
      if(toolTips.length != 0){
        toolTips.tooltip();
      }
    }
  }

  // const parallax = (val) => {
  //   if(values.active === true){
  //     // const translateDistance = values.currentX;
  //     // domItems.imgs[values.counter-1].style.transform = `translate3d(${(values.currentX - val) * 0.2}%, 0, 0)`;
  //     domItems.imgs[values.counter].style.transform = `translate3d(${(values.currentX - val) * 0.1}%, 0, 0)`;
  //
  //   }
  // }

  const expandIconListener = (icon) => {
    icon.addEventListener('click', (e) => {
      loadModal();
    })
  }

  const drag = (e, imgContainer) => {
    if(e.target.tagName.toLowerCase() === "div" || e.target.tagName.toLowerCase() === "img" || e.target.tagName.toLowerCase() === "p" || e.target.tagName.toLowerCase().includes('h')){
      if (e.type === "touchstart") {
        imgContainer.style.transition = 'none';
        values.initialX = e.touches[0].clientX - values.currentX;
        values.active = true;
      } else {
       imgContainer.style.transition = 'none';
       values.initialX = e.clientX - values.currentX;
       values.parallax = values.currentX;
       values.active = true;
      }
    }
  }

  const dragStart = (e, imgContainer) => {
    if(values.active){
      if(e.type === "touchmove"){
        // e.preventDefault();
        values.currentX = e.touches[0].clientX - values.initialX;
        imgContainer.style.transform = `translateX(${values.currentX}px)`;
      } else {
        e.preventDefault();
        values.currentX = e.clientX - values.initialX;
        imgContainer.style.transform = `translateX(${values.currentX}px)`;
      }
    }
  }


  const dragEnd = (e, imgNodeList, imgContainer) => {
    if(values.counter >= imgNodeList.length - 1){
      return;
    }
    if(values.active && values.currentX < -(values.width * values.counter + values.width / 8)){
      moveForward(imgContainer, imgNodeList);
      values.currentX = values.translated;
      values.active = false;
      if(values.dots === true){
        // changeDotClassWithoutClick(imgNodeList);
        if(values.counter != imgNodeList.length - 1){
          changeDotClass(domItems.dotList[values.counter -1 ], domItems.dotList);
        } else {
          changeDotClass(domItems.dotList[0], domItems.dotList);
        }
      }
    } else if(values.active && values.currentX > -(values.width * values.counter - values.width / 8)){
      moveBackwards(imgContainer, imgNodeList);
      values.currentX = values.translated;
      values.active = false;
      if(values.dots === true){
        if(values.counter != 0){
          changeDotClass(domItems.dotList[values.counter - 1 ], domItems.dotList);
        } else {
          changeDotClass(domItems.dotList[imgNodeList.length - 3], domItems.dotList);
        }
      }
    } else {
      imgContainer.style.transition = 'all .3s ease';
      imgContainer.style.transform = `translateX(${values.translated}px)`;
      values.currentX = values.translated;
      values.active = false;
    }
  }

  const slideListeners = (sliderContainer, imgContainer, imgNodeList) => {

    sliderContainer.addEventListener('mousedown', (e) => {
      drag(e, imgContainer);
    });

    sliderContainer.addEventListener('mousemove', (e) => {
      // parallax(values.parallax);
      dragStart(e, imgContainer);
    })

    sliderContainer.addEventListener('mouseup', (e) => {
      dragEnd(e, imgNodeList, imgContainer);
    })

    sliderContainer.addEventListener('touchstart', (e) => {
      drag(e, imgContainer);
    }, {passive: true});

    sliderContainer.addEventListener('touchmove', (e) => {
      dragStart(e, imgContainer);
    }, {passive: true})

    sliderContainer.addEventListener('touchend', (e) => {
      dragEnd(e, imgNodeList, imgContainer);
    })
  }

  const dotListener = (dotList, imgContainer) => {
    dotList.forEach((dot, i, arr) => {
      dot.addEventListener('click', (e) => {
        let selectedDot = parseInt(e.target.getAttribute('data-i'));
        domItems.currentSlide = domItems.imgList[selectedDot];
        values.counter = selectedDot;
        changeDotClass(e.target, domItems.dotList);
        imgContainer.style.transition = 'all .3s ease';
        moveSlides(imgContainer);
      })
    })
  }


  const imgContainerTransitionListener = (imgNodeList, imgContainer) => {
    imgContainer.addEventListener('transitionend', () => {
      if(values.counter === imgNodeList.length - 1){
        imgContainer.style.transition = 'none';
        values.counter = 1;
        moveSlides(imgContainer);
      }
      if(values.counter === 0){
        imgContainer.style.transition = 'none';
        values.counter = imgNodeList.length - 2;
        moveSlides(imgContainer);
      }
    })
  }

  const windowListener = (imgNodeList, imgContainer) => {
    window.addEventListener('resize', () => {
      resizeImagesToContainer(imgNodeList, imgContainer);
      values.width = imgNodeList[0].clientWidth;
      moveSlides(imgContainer);
    })
  }

  const rightBtnListener = (rightBtn, imgContainer, imgNodeList) => {
    rightBtn.addEventListener('click', () => {
      if(values.counter >= imgNodeList.length - 1){
        return;
      }
      moveForward(imgContainer, imgNodeList);
      if(values.counter != imgNodeList.length - 1){
        changeDotClass(domItems.dotList[values.counter -1 ], domItems.dotList);
      } else {
        changeDotClass(domItems.dotList[0], domItems.dotList);
      }
    })
  }

  const leftBtnListener = (leftBtn, imgContainer, imgNodeList) => {
    leftBtn.addEventListener('click', () => {
      if(values.counter <= 0){
        return;
      }
      moveBackwards(imgContainer, imgNodeList);
      if(values.counter != 0){
        changeDotClass(domItems.dotList[values.counter - 1 ], domItems.dotList);
      } else {
        changeDotClass(domItems.dotList[imgNodeList.length - 3], domItems.dotList);
      }
    })
  }

  const mobileStyleAdjustments = () => {
    // handle style tweaks for smaller slider view
    if(values.captions != true){
      // domItems.dotContainer.style.bottom = "-20px";
    }
    if(values.width <= 500){

      // if(values.dots === true && values.captions === true){
      //   domItems.dotContainer.style.bottom = "-23px";
      //   domItems.captionContainer.style.visibility = "hidden !important";
      // }
      domItems.expandIcon.style.transform = 'scale(1)';
      domItems.expandIcon.style.opacity = '1';
    } else {
      domItems.expandIcon.style.transform = 'scale(0)';
      domItems.expandIcon.style.opacity = '0';
      // domItems.dotContainer.style.bottom = "2px";
      // domItems.captionContainer.style.visibility = "visible";
    }
  }

  const showTextListener = () => {
    domItems.showTextIcon.addEventListener('click', () => {
      if(domItems.currentSlide.querySelector('.text-container')){
        let text = [];
        Array.from(domItems.currentSlide.querySelector('.text-container').childNodes).forEach((node) => {
          if(node.nodeName != '#text'){
            text.push(node.outerHTML);
          }
        })
        loadModal(text);
      }
    })
  }

  const init = () => {
    //initialize value retrieval for slider build
    retrieval(node);

    //create head and tail images after dom render
    setupImages(domItems.imgList, domItems.imgContainer);

    //render proper size container for screen
    resizeImagesToContainer(domItems.imgList, domItems.imgContainer);

    // initialize transition listener for first and last images
    imgContainerTransitionListener(domItems.imgList, domItems.imgContainer);

    // //move slide up to first in rotation
    // moveSlides(domItems.imgContainer);

    // setup arrow listeners
    if(params.arrows){
      values.arrows = true;
      rightBtnListener(domItems.arrowRight, domItems.imgContainer, domItems.imgList);
      leftBtnListener(domItems.arrowLeft, domItems.imgContainer, domItems.imgList);
    }

    if(params.textBlocks){
      showTextListener();
    }

    // img listener to fire loadModal event
    if(params.imgClick){
      imgClickListener(domItems.imgList);
    }

    // set mouse swipe listeners
    slideListeners(domItems.sliderContainer, domItems.imgContainer, domItems.imgList);

    //
    // //setup dot listeners for moving slides
    if(params.navDots){
      // //setup navigation dots for each slide
      createDynamicDots(domItems.imgList, domItems.dotContainer);
      dotListener(domItems.dotList, domItems.imgContainer);
    }

    //expand Icon Listener setup
    if(!params.automate.automation){
      expandIconListener(domItems.expandIcon);
      values.expand = true;
    } else {
      domItems.expandIcon.style.display = "none";
    }

    if(params.expand === false){
      console.log(values.expand);
      domItems.expandIcon.style.display = "none";
    }

    if(params.captions === false && domItems.captionContainer){
      domItems.captionContainer.style.display = "none";
    }


    //setup window listener for resize
    windowListener(domItems.imgList, domItems.imgContainer);
    //move slide up to first in rotation
    moveSlides(domItems.imgContainer);

    if(params.automate.automation && domItems.imgList.length != 3){
      automateSlide(domItems.imgContainer, domItems.imgList, params.automate.speed);
    }

  }

  return{
    node,
    domItems,
    values,
    retrieval,
    setupImages,
    resizeImagesToContainer,
    createDynamicDots,
    moveSlides,
    resizeContainerToImages,
    moveForward,
    moveBackwards,
    automateSlide,
    currentSlideSrc,
    changeDotClass,
    changeDotClassWithoutClick,
    dotListener,
    slideListeners,
    imgContainerTransitionListener,
    windowListener,
    rightBtnListener,
    leftBtnListener,
    loadModal,
    expandIconListener,
    init,
    populateCaption,
    imgClickListener,
    mobileStyleAdjustments,
    showTextListener,
  }

}

//
//
// let params = {
//   automate: {
//     automation: false,
//     speed: 1
//   },
//   imgClick: false,
//   navDots: true,
//   captions: false,
//   arrows: true,
//   textBlocks: true,
// }
//
// let slider = sliderFactory( document.querySelector('.slider'), params );
// slider.init();
