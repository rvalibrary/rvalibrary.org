


let cardElement = document.getElementsByClassName('card');
let categoryElement = document.getElementsByClassName('card-category');
let thumbElement = document.getElementsByClassName('card-thumb')
let bodyElement = document.getElementsByClassName('card-body');
let monthElement = document.getElementsByClassName('card-date_month');
let dateElement = document.getElementsByClassName('card-date');
let imgElement = document.getElementsByClassName('main-image');
let paraElement = document.getElementsByClassName('card-body-description');
let locationElement = document.getElementsByClassName('card-location');
let arrowElement = document.getElementsByClassName('dashicons-arrow-up-alt2');
let detailsElement = document.getElementsByClassName('details');


let month = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];



window.onload = function(){

function iterateCards(){
  const card = document.querySelectorAll('.card');
  let cardNums = []
  let i;
  for(i = 0; i < card.length; i++){
    cardNums.push(i);
  }
  return cardNums;
}
//returns indexed array of card Nodelist
let cardNums = iterateCards();


function expandCardThumb(x){
  thumbElement[x].classList.toggle('card-thumb-click');
  categoryElement[x].classList.toggle('card-category-click');
  cardElement[x].classList.toggle('card-click');
  paraElement[x].classList.toggle('card-body-description-click');
  locationElement[x].classList.toggle('card-location-click');
  bodyElement[x].classList.toggle('card-body-click');
  arrowElement[x].classList.toggle('expand-arrow-click');
  detailsElement[x].classList.toggle('details-click');
    if(dateElement[x].style.height === '70px'){
        dateElement[x].style.height = "55px";
        dateElement[x].style.width = "55px";
        monthElement[x].style.fontSize = "8px";
      } else{
        dateElement[x].style.height = "70px";
        dateElement[x].style.width = "70px";
        monthElement[x].style.fontSize = "12px";
      };
  };

  for(let j = 0; j < cardNums.length; j++){
    cardElement[j].addEventListener('click', function(){
      expandCardThumb(j);
    }, false);
  }

  //handles dynamic gradient height and card container margintop that renders proportionally to screen size loaded
  //implement fallback for old browsers not compatible with vertical gradient
  const header = document.querySelector('.page-entry-header');
  const footer = document.querySelector('.site-footer');
  const gradient = document.querySelector('.header-gradient');
  const cardContainer = document.querySelector('#outer-card-container');
  let headerSize = header.offsetTop + header.offsetHeight;
  let footerTop = footer.offsetTop;
  let gradientSize = footerTop - headerSize;

  if(gradient){
    gradient.style.height = gradientSize + "px";
    cardContainer.style.marginTop = "-" + gradientSize + "px";
  }else{
    //blank
  }



  //category box only displays when content is entered
  for(let i = 0; i < categoryElement.length; i++){
  	if(categoryElement[i].innerText == ""){
  		categoryElement[i].style.display = "none";
      }else{
  		categoryElement[i].style.display = "block";
      }
  }




  //handles dynamic output of link & attribute appending
  const monthArr = [];
  const monthEleArr = document.querySelectorAll('.month-header');

  monthEleArr.forEach((element, i) => {
    let monthName = element.innerText;
    monthName = monthName.toLowerCase();
    element.setAttribute("id", monthName);
    monthArr.push(monthName);
  })

  const fastLinkDiv = document.getElementById('month-link-header');

  monthArr.forEach((month, i) => {
    let aTag = document.createElement('a');
    aTag.setAttribute("href", "#" + month)
    let firstLetter = month[0];
    let newMonthName = month.replace(firstLetter, firstLetter.toUpperCase());
    if(i != monthArr.length - 1){
      aTag.innerText = newMonthName + " - ";
    }else{
      aTag.innerText = newMonthName;
    }
    fastLinkDiv.appendChild(aTag);
  })

  if(cardElement){
    document.documentElement.style.scrollBehavior = "smooth";
    console.log("card present");
  }else{
    console.log("card not present" );
  }

  let paraText = document.querySelectorAll('.card-body-description');
  //handles text resize for card-body-description
  for(let i = 0; i < paraElement.length; i++){
    let paraLength = paraElement[i].innerText.length;
      if(paraLength > 390){
        paraElement[i].style.fontSize = "13px";
      }else{
        paraElement[i].style.fontSize = "14px";
      }
  }

  //handles fontSize when many authors/performers are entered
  let subtitle = document.querySelectorAll('.card-body_subtitle');
  for(let i = 0; i < subtitle.length; i++){
	   let subLength = subtitle[i].innerText.length;
    	if(subLength < 70 && subLength > 50 ){
    		subtitle[i].style.fontSize = "11px";
      }else if(subLength > 70){
        subtitle[i].style.fontSize = "10px";
      }else{
    		subtitle[i].style.fontSize = "12px";
        }
      }


  }//window onload closure
