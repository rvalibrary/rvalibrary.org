const Zoomify = (node) => {

  let domItems = {
    container: undefined,
    svg: undefined,
    rect: undefined,
    modal: undefined,
    modalContent: undefined,
    ellipses: undefined,
    close: undefined,
  }

  let values = {
    active: false,
    zoomed: false,
    initialX: 0,
    initialY: 0,
    previousX: 0,
    previousY: 0,
    currentX: 0,
    currentY: 0,
    modalText: undefined,
    modalAuthor: undefined,
    currentEle: undefined,
  }

  const retrieval = (node) => {
    domItems.container = node.querySelector('.zoom-inner');
    domItems.svg = node.querySelector('svg');
    domItems.rect = node.querySelector('rect');
    domItems.modal = node.querySelector('.bottom-modal');
    domItems.modalContent = node.querySelector('.inner-content');
    domItems.ellipses = node.querySelectorAll('ellipse');
    domItems.close = node.querySelector('.zoom-close');
  }

  const addImageListeners = (ellipsesNodeList, img, modal, contentBox) => {
    Array.from(ellipsesNodeList).forEach(ell => {
      ell.addEventListener('click', (e) => {
       if(values.zoomed === false){
        values.currentEle = e.composedPath()[0];
        retrieveText(ell);
        zoomIn(img, e, modal, contentBox);
      } else if(values.zoomed === true && e.composedPath()[0] != values.currentEle) {
        values.currentEle = e.composedPath()[0];
        retrieveText(ell);
        removeText(domItems.modalContent);
        displayText(domItems.modalContent);
      } else {
        zoomOut(img, modal, contentBox);
       }
      })
    })
  }

  const retrieveText = (el) => {
    values.modalText = el.getAttribute('data-text');
    values.modalAuthor = el.getAttribute('data-author');
  }

  const zoomIn = (img, e, modal, contentBox) => {
    values.zoomed = true;
    domItems.container.style.overflow = ""
    img.style.transformOrigin = `${e.offsetX}px ${e.offsetY}px`;
    img.style.transform = 'scale(3.5)';
    modalSlideIn(modal, contentBox);
  }

  const zoomOut = (img, modal, contentBox) => {
    values.zoomed = false;
    img.style.transform = 'scale(1)';
    img.style.top = '0px';
    img.style.left = '0px';
    modalSlideIn(modal, contentBox);
    resetPosition();
  }

  const closeListener = (el, img, modal, contentBox) => {
    el.addEventListener('click', (e) => {
      zoomOut(img, modal, contentBox);
    })
  }

  const resetPosition = () => {
    values.initialX = 0;
    values.initialY = 0;
    values.previousX = 0;
    values.previousY = 0;
    values.currentX = 0;
    values.currentY = 0;
  }

  const dragLeftValidation = (container, rect) => {
    console.log(values.previousX, values.currentX);
    if(rect.getBoundingClientRect().left >= 0 && values.currentX > values.previousX){
      console.log('drag left');
      values.active = false;
      return false;
    } else {
      return true;
    }
  }

  const dragRightValidation = (container, rect) => {
    if(rect.getBoundingClientRect().left - window.innerWidth + rect.getBoundingClientRect().width <= 0 && values.currentX < values.previousX){
      console.log('drag right');
      values.active = false;
      return false;
    } else {
      return true;
    }
  }

  const dragTopValidation = (container, rect) => {
    if(rect.getBoundingClientRect().top >= 0 && values.currentX < values.previousX){
      console.log('drag top');
      values.active = false;
      return false;
    } else {
      return true;
    }
  }

  const dragBottomValidation = (container, rect) => {
    if(rect.getBoundingClientRect().bottom - window.innerHeight <= 0 && values.currentX > values.previousX){
      console.log('drag bottom');
      values.active = false;
      return false;
    } else {
      return true;
    }
  }

  const drag = (e, img) => {
    if(e.target.tagName.toLowerCase() === 'rect' && values.zoomed === true){
      if(e.type === "touchstart"){
        values.initialX = e.touches[0].clientX - values.currentX;
        values.initialY = e.touches[0].clientY - values.currentY;
        active = true;
      } else {
        values.initialX = e.clientX - values.currentX;
        values.initialY = e.clientY - values.currentY;
        values.active = true;
      }
    }
  }

  const dragStart = (e, img) => {
    if(values.active === true){
      if(e.type === "touchmove"){
        values.previousX = values.currentX;
        values.previousY = values.currentY;
        values.currentX = e.touches[0].clientX - values.initialX;
        values.currentY = e.touches[0].clientY - values.initialY;
        if(dragLeftValidation(domItems.container, domItems.rect) && dragRightValidation(domItems.container, domItems.rect) && dragTopValidation(domItems.container, domItems.rect) && dragBottomValidation(domItems.container, domItems.rect) ){
          img.style.left = `${values.currentX}px`;
          img.style.top = `${values.currentY}px`;
        }
      } else {
        values.previousX = values.currentX;
        values.previousY = values.currentY;
        values.currentX = e.clientX - values.initialX;
        values.currentY = e.clientY - values.initialY;
        if(dragLeftValidation(domItems.container, domItems.rect) && dragRightValidation(domItems.container, domItems.rect) && dragTopValidation(domItems.container, domItems.rect) && dragBottomValidation(domItems.container, domItems.rect) ){
          img.style.left = `${values.currentX}px`;
          img.style.top = `${values.currentY}px`;
        }
      }
    }
  }

  const dragEnd = (e, img) => {
    if(e.type === "touchend"){
      values.active = false;
    } else {
      values.active = false;
    }
  }

  const dragListeners = (img) => {
    img.addEventListener('mousedown', (e) => {
      drag(e, img);
    });

    img.addEventListener('mousemove', (e) => {
      dragStart(e, img);
    })

    img.addEventListener('mouseup', (e) => {
      dragEnd(e, img);
    })

    img.addEventListener('touchstart', (e) => {
      drag(e, img);
    }, {passive: true});

    img.addEventListener('touchmove', (e) => {
      dragStart(e, img);
    }, {passive: true})

    img.addEventListener('touchend', (e) => {
      dragEnd(e, img);
    }, {passive: true})
  }

  const transitionEndListener = (img, modal, contentBox) => {
    img.addEventListener('transitionend', (e) => {
        modalSlideIn(modal, contentBox);
    })
  }

  const displayText = (content) => {
    content.insertAdjacentHTML('beforeend', `<div class="text-author"><h2>${values.modalAuthor}</h2></div>`)
    content.insertAdjacentHTML('beforeend', `<div class="text-quote">${values.modalText}</div>`);
  }

  const removeText = (content) => {
    content.innerHTML = '';
  }


  const modalSlideIn = (bottomModal, contentBox) => {
    if(values.zoomed == true){
      bottomModal.style.height = '200px';
      displayText(contentBox);
    } else {
      bottomModal.style.height = '0px';
      removeText(contentBox);
    }
  }

  const init = () => {
    retrieval(node);
    addImageListeners(domItems.ellipses, domItems.svg, domItems.modal, domItems.modalContent);
    // transitionEndListener(domItems.svg, domItems.modal, domItems.modalContent, values.modalText, values.modalAuthor);
    dragListeners(domItems.svg);
    closeListener(domItems.close, domItems.svg, domItems.modal, domItems.modalContent);
  }

  return{
    modalSlideIn,
    removeText,
    displayText,
    transitionEndListener,
    dragListeners,
    zoomOut,
    dragLeftValidation,
    dragRightValidation,
    dragTopValidation,
    dragBottomValidation,
    resetPosition,
    closeListener,
    drag,
    dragStart,
    dragEnd,
    addImageListeners,
    retrieval,
    domItems,
    values,
    init,
  }

}
addEventListener('load', () => {
  const zoom = Zoomify(document.querySelector('.zoom-container'));
  zoom.init();
})
