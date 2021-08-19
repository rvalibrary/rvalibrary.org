
//ajax call for creating new master gardener answers
function fetch(id, title, answer, categories){
  let catArr = [];
  Array.from(categories).forEach(category => {
    catArr.push(category.value);
  })
  jQuery.post('/wp-admin/admin-ajax.php', {'action': 'gravity_form', 'id': id, 'answer': answer, 'title': title, 'categories': catArr},
    function(data){
      if(data){
        let notification = document.querySelector('.saved-notification');
        let state = document.querySelectorAll('.saved-state');
        let loaderEle = document.querySelector('.submitAnswer');
        state[0].innerText = '*Answer Updated'
        state[1].innerText = '*Answer Updated'
        notification.innerText = 'Answer Saved';
        loaderEle.innerHTML = '';
        loaderEle.innerText = "Post Successful";
        console.log(data);
        setTimeout(function(){
          location.href = "https://rvalibrary.org/master-gardener/private-view/";
        }, 1000);
      }
    })
}

//check input state
function validationCheck(inputField){
  inputField.addEventListener('input', (e) => {
    let notification = document.querySelector('.saved-notification');
    let state = document.querySelectorAll('.saved-state');
    if(e.data != null && inputField.value.length != 0){
      notification.innerText = "";
      state[0].innerText = '';
      state[1].innerText = '';
    } else {
      notification.innerText = 'Please Submit a valid Answer and Title before submitting';
      state[0].innerText = 'Forms invald';
      state[1].innerText = 'Forms invald';
    }
  })
}

//close and clear modal content
function closeModal(parentNode, modalEle){
  Array.from(parentNode.childNodes).forEach((node) => {
    if(node.className != 'submitAnswer2' && node.className != 'close2'){
      parentNode.removeChild(node);
    }
  })
  modalEle.style.display = 'none';
}

//load modal
function loadAnswerModal(modalEle){
  modalEle.style.display = "block";
}

function loadModalConfirmation(title, answer, categories){
  let modal = document.querySelector('.modal');
  let close = document.querySelector('.close');
  let content = document.querySelector('.modal-content');
  let edit = document.querySelector('.close2');

  edit.addEventListener('click', () => {
    closeModal(content, modal);
  })

  close.addEventListener('click', () => {
    closeModal(content, modal);
  })

  loadAnswerModal(modal);

  let textBlock =
  `<div class="container">
    <h2 style="margin: 15px 0 5px 0; color: #003652;">Verify your submission before submitting!</h2>
    <hr>
    <div>
      <h3 style="color: #333; margin-bottom: 15px; text-align: left;">Title to Question:</h5>
      <p style="text-align: left; border-left: 1px solid #003652; padding-left: 5px;">${title}</p>
    </div>
    <br>
    <div>
      <h3 style="color: #333; margin-bottom: 15px; text-align: left;">Answer to Question:</h5>
      <p style="text-align: left; border-left: 1px solid #003652; padding-left: 5px;">${answer}</p>
    </div>
    <div style="text-align: left;">`;
    if(categories){
      textBlock += `<h3>Categories</h3>`;
      Array.from(categories).forEach(category => {
        textBlock += `<span style="background-color: #ff7236; color: white; padding: 5px; border-radius: 15px; margin: 2px 5px;" class="category-bubble">${category.value} </span>`;
      });
    }
    textBlock += `</div>
    <div></div>
  </div>`;

  content.insertAdjacentHTML('afterbegin', textBlock);
}

function triggerLoader(ele){
  ele.innerText = "";
  ele.insertAdjacentHTML('afterBegin', `<div class="loaderCircle"></div>`);
}

addEventListener('load', () => {

  const categorical = new Categorical(document.querySelector('.tag-input-component'), document.querySelector('#spanContainer'), 'answer[category]');
  categorical.init();

  let notification = document.querySelector('.saved-notification');
  let state = document.querySelectorAll('.saved-state');
  let titleInput = document.querySelector('.newTitle');
  let answerInput = document.querySelector('.answer');
  let catContainer = document.querySelector('#spanContainer');

  validationCheck(titleInput);
  validationCheck(answerInput);

  document.querySelector('.submitAnswer').addEventListener('click', () => {

    if( answerInput.value.length != 0 && catContainer.childNodes.length != 0 && titleInput.value.length != 0) {
      loadModalConfirmation(document.querySelector('.newTitle').value, document.querySelector('.answer').value, document.querySelectorAll('input[name="answer[category]"]'));
    } else {
      validationCheck(titleInput);
      validationCheck(answerInput);
    }

  })

  document.querySelector('.submitAnswer2').addEventListener('click', () => {

    let submitBtn1 = document.querySelector('.submitAnswer');
    let submitBtn2 = document.querySelector('.submitAnswer2');
    let modal = document.querySelector('.modal');

    modal.style.display = "none";
    submitBtn1.disabled = true;
    submitBtn2.disabled = true;
    triggerLoader(submitBtn1);

    fetch(document.querySelector('.int').innerText, document.querySelector('.newTitle').value, document.querySelector('.answer').value, document.querySelectorAll('input[name="answer[category]"]'));

  })

})
