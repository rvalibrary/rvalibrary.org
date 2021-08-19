addEventListener('load', function() {
  Array.from(document.querySelectorAll('.expanding-btn-container')).forEach(function(node) {
    expandingBtnListWithNode(node);
  })
})
