





document.addEventListener('DOMContentLoaded', function(){


  let button = document.getElementsByClassName('dashicons-plus');
  let button2 = document.getElementsByClassName('dashicons-minus');
  let textContainer = document.getElementsByClassName('text-container');
  let faqHeader = document.querySelectorAll('.faq-header');




  function iterateBtns(){
    const btn = document.querySelectorAll('.dashicons-plus');

    let btnNums = []
    let i;
    for(i = 0; i < btn.length; i++){
      btnNums.push(i);

    }
    return btnNums;
  }

  //returns indexed array of card Nodelist
  let btnNums = iterateBtns();

  function expandContainer(x){
    textContainer[x].classList.toggle('expand');
    if(button[x].style.display != "none" && button2[x].style.display != "inline-block"){
      button[x].style.display = "none";
      button2[x].style.display = "inline-block";
    }else{
      button[x].style.display = "inline-block";
      button2[x].style.display = "none";
    }
  }


  for(let i = 0; i < btnNums.length; i++){
    faqHeader[i].addEventListener('click', function(){
      expandContainer(i);
    })

    button[i].addEventListener('click', function(){
      expandContainer(i);
    }, false);

    button2[i].addEventListener('click', function(){
      expandContainer(i);
    }, false);
  }


})






console.log('connected');
