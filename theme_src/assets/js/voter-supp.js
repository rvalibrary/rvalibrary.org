window.onload = function(){

  slidr.create('slidr-div', {
    breadcrumbs: true,
    controls: 'border',
    direction: 'horizontal',
    fade: true,
    keyboard: true,
    overflow: true,
    pause: false,
    theme: '#222',
    timing: { 'cube': '0.5s ease-in' },
    touch: false,
    transition: 'cube'
  }).start();

}
