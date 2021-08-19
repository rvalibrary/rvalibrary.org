class Categorical{
  constructor(textInput, spanContainer, inputName = ''){
    this.textInput = textInput;
    this.spanContainer = spanContainer;
    this.strArr = [];
    this.inputName = inputName
  }

  doesNotMatch(eleArr, newStr){
    return Array.from(eleArr).every(ele => {
      return ele.innerText.slice(0, -1) != newStr;
    })
  }

  keyDownListener(){
      this.textInput.addEventListener('keydown', event => {
      if(event.keyCode > 47 && event.keyCode < 58 ||
         event.keyCode > 64 && event.keyCode < 91 ||
         event.keyCode == 32 ||
         event.keyCode > 185 && event.keyCode < 193
         || event.keyCode > 218 && event.keyCode < 223) {
          this.strArr.push(event.key);
      } else if(event.key === "Enter") {
        if(this.spanContainer.children.length == 0 || this.doesNotMatch(this.spanContainer.children, this.strArr.join(""))){
          const newSpan = this.addSpan(this.spanContainer, this.strArr.join(""));
          this.addHiddenInput(newSpan, this.strArr.join(""));
          this.strArr = [];
          this.textInput.value = '';
        }
      } else if(event.key === 'Backspace') {
        this.strArr.pop();
      } else {
        return;
      }
    })
  }

  closeListener(ele){
    ele.addEventListener('click', (e) => {
      e.target.parentElement.remove();
    })
  }

  addHiddenInput(domEle, val){
    const renderedInput = this.createHiddenInput('entry[category]');
    renderedInput.value = val;
    this.render(domEle, renderedInput);
    const close = this.createClose();
    this.closeListener(close);
  }

  createHiddenInput(){
    const newInput = document.createElement('input');
    newInput.type = "hidden";
    newInput.name = this.inputName;
    return newInput;
  }

  addSpan(domEle, val){
    const renderedSpan = this.createSpan();
    renderedSpan.textContent = val;
    this.render(domEle, renderedSpan);
    const close = this.createClose();
    this.closeListener(close);
    this.render(renderedSpan, close);
    return renderedSpan;
  }

  createSpan(){
    const newSpan = document.createElement('span');
    newSpan.classList.add('data-added');
    return newSpan;
  }

  createClose(){
    const close = document.createElement('span');
    close.classList.add('category-close');
    close.innerHTML = '&times;';
    return close;
  }

  render(domEle, newEle){
    domEle.appendChild(newEle);
  }

  checkCloseOnRender(){
    const categoryClose = document.querySelectorAll('.category-close');
    if(categoryClose.length){
      Array.from(categoryClose).forEach(closeBox => this.closeListener(closeBox));
    }
  }

  init(){
    this.keyDownListener();
    this.checkCloseOnRender();
  }
}
