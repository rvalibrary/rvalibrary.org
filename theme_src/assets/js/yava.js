

window.onload = function(){

  let img = document.querySelector('.icon-img');
  let header = document.querySelector('.title-description');

  let winners = document.querySelectorAll('.winner-box');
  let nominees = document.querySelectorAll('.nominee-box');

  function expandContainer(x, boxNode){

    let blurCovers = boxNode[x].querySelector('.blur-cover');
    let descriptionContainer = boxNode[x].querySelector('.description-container');
    let closeBtns = boxNode[x].querySelector('.close-btn');
    let content = boxNode[x].querySelector('.content');
    let imgs = boxNode[x].querySelector('.hidden-img');
    let coverImages = boxNode[x].querySelector('.cover-image');
    let titles = boxNode[x].querySelector('.title');
    let bookContainer = boxNode[x].parentElement;

    boxNode[x].classList.toggle('expand');
    coverImages.classList.toggle('reveal');
    titles.classList.toggle('reveal');
    closeBtns.classList.toggle('reveal');
    content.classList.toggle('reveal');
    imgs.classList.toggle('reveal');
    blurCovers.classList.toggle('reveal');
    descriptionContainer.classList.toggle('reveal');
    bookContainer.classList.toggle('reveal');
    for(let i = 0; i < boxNode.length; i++){
      if(boxNode[i] !== boxNode[x]){
        boxNode[i].classList.toggle('shrink');
      }
    }
  }

  function pageLoadSetup(){
    img.classList.add('fade');
    header.classList.add('fade');
  }

  window.addEventListener("scroll", function(){
    let distance = window.pageYOffset;
    let speed2 = distance * 0.1;
     let speed3 = distance * 0.3;
    img.style.transform = `translateY(${-speed3}px)`;
    header.style.transform = `translateY(${-speed2}px)`;
  })

function appendHref(boxes, sectionName){
  Array.from(boxes).forEach((box) => {
    box.onclick = function(){
      location.href = '#'+ sectionName.id;
    }
  })
}

function bookListeners(node){
  Array.from(node).forEach(function(ele, i) {
    ele.addEventListener('click', function(){
      expandContainer(i, node);
    })
  })
}

bookListeners(winners);
bookListeners(nominees);

appendHref(document.querySelectorAll('.winners'), document.querySelector('.winners-book-section'));
appendHref(document.querySelectorAll('.nominations'), document.querySelector('.nominee-book-section'));
pageLoadSetup();
}
