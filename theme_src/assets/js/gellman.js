function retrieveLiveStreamIframe() {
  Array.from(document.querySelectorAll('.card-livestream')).forEach(node => {
    node.addEventListener('click', (e) => {
      if(node.getAttribute('data-iframe').length != 0){
        let newDiv = document.createElement('div');
        newDiv.classList.add('video-wrapper');
        newDiv.insertAdjacentHTML('afterbegin', node.getAttribute('data-iframe'));
        loadModal({type: 'html', entry: newDiv});
      }
    })
  })
}

addEventListener('load', () => {
  expandingGradientOnScroll(document.querySelector('.bottom-gradient'));
  retrieveLiveStreamIframe();
})
