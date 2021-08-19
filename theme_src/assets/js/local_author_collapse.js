document.addEventListener('DOMContentLoaded', function(){

  let textContainer = document.querySelectorAll('.text-container');
  let faqHeader = document.querySelectorAll('.faq-header');

  function expandContainer(node, i){
    if(textContainer[i].classList.contains('expand')){
      node.querySelector('.dashicons-plus').style.display = "inline-block";
      node.querySelector('.dashicons-minus').style.display = "none";
      textContainer[i].classList.toggle('expand');
      textContainer[i].style.maxHeight = null;
    } else {
      node.querySelector('.dashicons-plus').style.display = "none";
      node.querySelector('.dashicons-minus').style.display = "inline-block";
      textContainer[i].style.maxHeight = textContainer[i].scrollHeight + "px";
      textContainer[i].classList.toggle('expand');
    }
  }

  Array.from(faqHeader).forEach( function(node, i) {
    node.addEventListener('click', function(e) {
      expandContainer(node, i);
    })
  })

})
